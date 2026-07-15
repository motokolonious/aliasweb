$loc = Get-Location
if (-Not($loc.Path -match "php\\build$")) {
  Write-Host $loc.Path
  Write-Error "This build script should not be ran from external working directories."
  return 1
}

$createRoot = -Not (Test-Path "..\docroot\")
if ($createRoot) {
  New-Item -ItemType "Directory" -Path "..\docroot\"
} else {
  Remove-Item "..\docroot\*"
}

if (-Not (Test-Path "..\docroot\")) {
  Write-Host "There was a problem creating the docroot directory."
  return 13
}

$createModules = -Not (Test-Path "..\docroot\Modules")
if ($createModules) {
  New-Item -ItemType "Directory" -Path "..\docroot\Modules"
}

Copy-Item -Path "..\src\*.php" -Destination "..\docroot\"
Copy-Item -Path "..\..\..\client\htm\*.css" -Destination "..\docroot\"
Copy-Item -Path "..\..\..\client\htm\*.js" -Destination "..\docroot\"
Remove-Item -Path "..\docroot\Modules\*.mjs"
Copy-Item -Path "..\..\..\client\js\Modules\*.mjs" -Destination "..\docroot\Modules\"
if (Test-Path -Path "..\..\..\client\htm\aliasweb.png") {
  Copy-Item -Path "..\..\..\client\htm\aliasweb.png" -Destination "..\docroot\"
}
