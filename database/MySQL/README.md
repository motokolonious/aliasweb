Put databases here intended for MySQL data. A popular open source database (currently powered by the Oracle corporation).
- Do not put databases here unless you intend to use MySQL specific extensions, clauses, or values.
- Standard databases that do not use vendor specific items should go in the STD SQL folder instead.
- SQL Server or MariaDB may be a more appropriate relational database option, depending on the hosting or licensing environments.

Subdirectories in this folder should have the name of the database to be built and an optional suffix.

### database versions (dbv)
- Sortable database scripts that create database structures and modify static data.
- Each script has a version indicating when it will be executed during database creation.
