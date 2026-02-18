Put databases here that use the widestly accepted (or most standard) SQL syntax. Avoid vendor-specific clauses and values.
- The easiest way to make SQL scripts that are mostly standard is to check vendor language documents (that are usually free), and then keep it simple (avoid anything that might look like an extension).
- Also try checking ansi.org for ISO/IEC 9075 syntax documents (prices are usually a few hundred dollars per document).
- https://blog.ansi.org/ansi/sql-standard-iso-iec-9075-2023-ansi-x3-135/

Subdirectories in this folder should have the name of the database to be built and an optional suffix.

### database versions (dbv)
- Sortable database scripts that create database structures and modify static data.
- Each script has a version indicating when it will be executed during database creation.
