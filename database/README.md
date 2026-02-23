## Database(s) folder for aliasweb.
- Folder structure here is important. See database implementation sub-folders for more details.
- Subdirectory names should indicate the type of database (relational, document, or their database vendor name).

### Database build
- Proper client authentication and remote builds aren't supported yet.
- Builds should work okay on a local system with PowerShell when the server is configured to allow local connections.

#### build.ps1
- On Windows run build.ps1 with PowerShell 5 or later.
- The first argument is the the name of the database client program (mysql|mariadb|sqlcmd).
- The second argument is the database versions (dbv) directory path where all the scripts are organized (0, 100, 200).
- Use the -Zero option to create the initial database and do any other administrative tasks before normal database scripts execute.
- The mysql and mariadb clients currently execute single statements instead of entire files. Full SQL file execution support is still being researched for these programs (the sqlcmd program directly supports SQL input files).
- Be sure to pass the -Database "DatabaseName" option for statement style execution since they do not remember any using statements from script contents.
