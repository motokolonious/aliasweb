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

Copy-Item -Path "..\src\*.php" -Destination "..\docroot\"
Copy-Item -Path "..\..\..\client\htm\*.css" -Destination "..\docroot\"
if (Test-Path -Path "..\..\..\client\htm\aliasweb.png") {
  Copy-Item -Path "..\..\..\client\htm\aliasweb.png" -Destination "..\docroot\"
}
Copy-Item -Path "..\..\..\client\js\Modules\Modal\GetAccessModal.mjs" -Destination "..\docroot\"
Copy-Item -Path "..\..\..\client\js\Scripts\Modal\GetAccessModal.js" -Destination "..\docroot\"
