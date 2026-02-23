param(
    [Parameter(Mandatory, Position=0, HelpMessage="The database client program name to be used to execute database scripts (must be mysql, sqlcmd, or mariadb).")]
    [string]$Cmd,
    [Parameter(Mandatory, Position=1, HelpMessage="The database versions directory where scripts for a single database are organized.")]
    [string]$DbvDir,
    [Parameter(HelpMessage="If set database administrative scripts (or '0' directory scripts) will be executed.")]
    [switch]$AdminScripts,
    [Parameter(HelpMessage="If set database administrative scripts (or '0' directory scripts) will be executed.")]
    [switch]$Zero,
    [Parameter(HelpMessage="The database name (helps if the scripts themselves don't specify necessary using statements).")]
    [string]$Database
)
begin {
    enum Cmd {
        mysql = 1
        mariadb = 2
        sqlcmd = 3
    }
    filter Create-VersionedScriptObjects() {
        param([Parameter(Mandatory, Position=0, ValueFromPipeline)][System.IO.FileInfo]$script)
        $ScriptName = $script.Name
        $ScriptPath = $script.FullName
        $ScriptExists = Test-Path -Path $ScriptPath
        if (-not($ScriptExists)) {
            Write-Error "The script path was not found: $ScriptPath"
            exit 21
        }
        $ScriptNameMatched = $ScriptName -match "^.*__v([0-9].*).sql$"
        if ($ScriptNameMatched) {
            $VersionedScript = [PSCustomObject]@{
                Name = $ScriptName
                Path = $ScriptPath
                Version = $Matches[1]
          }
          return $VersionedScript
        } else {
            $UnversionedFile = [PSCustomObject]@{
                Name = $ScriptName
                Path = $ScriptPath
                Version = -100
            }
            return $UnversionedFile
        }
    }
    filter Execute-DatabaseScripts() {
        param([Parameter(Mandatory)][Cmd]$cmd, [Parameter(Mandatory, ValueFromPipeline)][PSCustomObject]$script, [Parameter()][switch]$zero)
        $ScriptName = $script.Name
        $ScriptPath = $script.Path
        if ($ScriptName -eq $null -or $ScriptPath -eq $null) {
            Write-Error "Null script! Ensure all necessary files and scripts still exist."
            exit 31
        }
        Write-Host "Executing database script called $ScriptName with the $cmd program."

        # Database client authentication options vary greatly depending on server and user configurations.
        if ($cmd -eq [Cmd]::mysql) {
            # Unless the script can always be specified as a file (preferred), then its content may need to be split by a delimiter (like ';') and/or have command breaking characters removed (like \n).
            $ScriptContents = @(Get-Content -Path $ScriptPath -Delimiter ";" | Where-Object -Property Length -gt 5)
            $ScriptContents | Execute-MySqlStatements $zero
        } elseif ($cmd -eq [Cmd]::mariadb) {
            # Unless the script can always be specified as a file (preferred), then its content may need to be split by a delimiter (like ';') and/or have command breaking characters removed (like \n).
            $ScriptContents = @(Get-Content -Path $ScriptPath -Delimiter ";" | Where-Object -Property Length -gt 5)
            $ScriptContents | Execute-MariaSqlStatements $zero
        } elseif ($cmd -eq [Cmd]::sqlcmd) {
            $script | Execute-SqlCmdScript
        } else {
            Write-Host "$Cmd support is not yet implemented."
        }
    }
    filter Execute-MySqlStatements() {
        param([Parameter(Mandatory, ValueFromPipeline)][PSCustomObject]$ScriptContent, [Parameter(Position=0)][switch]$zero)
        foreach ($ContentItem in $ScriptContent) {
            $ScriptContentItem = ($ContentItem -replace "\n", " ")
            $mysqlcmd = "$cmd --pipe"# --pipe here means we're just doing local mysql development for now.
            if ($Database.Length -gt 0 -and ($zero -eq $null -or -not($zero))) {# Only pass the database name if we're past the admin directory.
                $mysqlcmd += " --database=$Database"
            }
            $mysqlcmd += " -e ""$ScriptContentItem"""
            Invoke-Expression $mysqlcmd
            if ($LASTEXITCODE -ne 0) {
              Write-Error "Executing script $ScriptName encountered an error code: $LASTEXITCODE. Database build will exit."
              Write-Error "The statement being executed was: $ScriptContentItem."
              exit $LASTEXITCODE
            }
        }
        # This tries to use mysql 'interactively' so that the file may be specified, but standard input seems to get paused or redirected after the first expression.
        <#Invoke-Expression "$Cmd --pipe"
        Invoke-Expression "source $ScriptPath;"# Invoke some mysql client commands interactively to specify SQL files as input.
        Invoke-Expression "exit;"#>
    }
    filter Execute-MariaSqlStatements() {# Very similar to mysql filter above, but the cmd's development has diverged since mysql's Oracle acquisition. Probably better to keep them separate?
        param([Parameter(Mandatory, ValueFromPipeline)][PSCustomObject]$ScriptContent, [Parameter(Position=0)][switch]$zero)
        foreach ($ContentItem in $ScriptContent) {
            $ScriptContentItem = ($ContentItem -replace "\n", " ")
            $mysqlcmd = "$cmd --pipe"# --pipe here means we're just doing local mariadb development for now.
            if ($Database.Length -gt 0 -and ($zero -eq $null -or -not($zero))) {# Only pass the database name if we're past the admin directory.
                $mysqlcmd += " --database=$Database"
            }
            $mysqlcmd += " -e ""$ScriptContentItem"""
            Invoke-Expression $mysqlcmd
            if ($LASTEXITCODE -ne 0) {
              Write-Error "Executing script $ScriptName encountered an error code: $LASTEXITCODE. Database build will exit."
              Write-Error "The statement being executed was: $ScriptContentItem."
              exit $LASTEXITCODE
            }
        }
    }
    filter Execute-SqlCmdScript() {
        param([Parameter(Mandatory, ValueFromPipeline)][PSCustomObject]$Script)
        $sqlcmd = "$cmd -C -E"# trusted connection (local development for now)
        $ScriptName = $Script.Name
        $ScriptPath = $Script.Path
        $sqlcmd += " -i $ScriptPath"# Input SQL file path
        Invoke-Expression $sqlcmd
        if ($LASTEXITCODE -ne 0) {
          Write-Error "Executing script $ScriptName encountered an error code: $LASTEXITCODE. Database build will exit."
          exit $LASTEXITCODE
        }
    }
    if ($PSVersionTable.PSVersion.Major -lt 5) {
        Write-Error "You must have at least PowerShell major version 5 (or later)."
        exit 1
    }
    $CmdIsValid = [Cmd]::IsDefined([Cmd]::mysql.GetType(), $Cmd)
    if (-not($CmdIsValid)) {
        $CmdEnumNames = ([Cmd].GetEnumNames() -join ",")
        Write-Error "The command '$Cmd' is not valid. Use one of the following instead: $CmdEnumNames."
        exit 2
    }
    $DbvDirExists = Test-Path -Path $DbvDir -PathType Container
    if (-not($DbvDirExists)) {
        Write-Error "The directory $DbvDir did not exist."
        exit 3
    }
    $DbvDirZeroExists = Test-Path -Path "$DbvDir\0" -PathType Container
    if (($AdminScripts -or $Zero) -and -not($DbvDirZeroExists)) {# How do I make these directory names locale agnostic? Zero should mean zero in all languages!
        Write-Error "The database admin scripts directory (the '0' directory) was requested but not found."
        exit 4
    }
    $DbvDirHundredExists = Test-Path -Path "$DbvDir\100" -PathType Container
    if (-not($DbvDirHundredExists)) {
        Write-Error "The normal 100 directory is required."
        exit 5
    }
}
process {
    Write-Host "The database build is processing."
    $SqlExtRegex = ".*[.]sql"# Currently an SQL specific build.
    if ($Zero -or $AdminScripts) {
        $MatchingZeroScripts = Get-ChildItem "$DbvDir\0" | Where-Object { $_.Length -gt 0 -and $_.Name -match $SqlExtRegex }
        $MeasuredZero = $MatchingZeroScripts | Measure-Object
        $MeasuredZeroCount = $MeasuredZero.Count
        Write-Host "Found $MeasuredZeroCount database administrator script(s)."
        $MatchingZeroScripts | Create-VersionedScriptObjects | Where-Object -Property Version -gt -1 | Sort-Object -Property Version | Execute-DatabaseScripts $Cmd -Zero
    }
    $NormalDirs = (100..4000) | Where-Object { $_ % 100 -eq 0 }
    foreach ($NormalDirName in $NormalDirs) {
        $NormalDirPath = "$DbvDir\$NormalDirName"
        $NormalDirExists = Test-Path -Path $NormalDirPath
        if (-not($NormalDirExists)) {
            exit 0# Only 0 and 100 dirs are required, so exit normally here.
        }
        $MatchingNormalScripts = Get-ChildItem $NormalDirPath | Where-Object { $_.Length -gt 0 -and $_.Name -match $SqlExtRegex }
        $MeasuredNormal = $MatchingNormalScripts | Measure-Object
        $MeasuredNormalCount = $MeasuredNormal.Count
        Write-Host "Found $MeasuredNormalCount matching normal $NormalDirName script(s)."
        $MatchingNormalScripts | Create-VersionedScriptObjects | Where-Object -Property Version -gt -1 | Sort-Object -Property Version | Execute-DatabaseScripts $Cmd
    }
}
end {
    Write-Host "The database build is done."
}
