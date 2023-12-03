$createRoot = -Not (Test-Path "..\docroot\")
if ($createRoot)
{
    New-Item -ItemType "Directory" -Path "..\docroot\"
}
else
{
    Remove-Item "..\docroot\*"
}

if (Test-Path "..\docroot")
{
    Copy-Item -Path "..\src\*.php" -Destination "..\docroot\"
    Copy-Item -Path "..\..\..\client\htm\*.css" -Destination "..\docroot\"
    if (Test-Path -Path "..\..\..\client\htm\aliasweb.png")
    {
        Copy-Item -Path "..\..\..\client\htm\aliasweb.png" -Destination "..\docroot\"
    }
}
else
{
    Write-Host "There was a problem creating the docroot directory."
}
