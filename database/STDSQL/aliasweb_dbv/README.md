### aliasweb database
- A database created for custom authorization data and to support aliasweb users, groups, and validation.
- Since some target environments or servers may not have all of the available security options enabled, this database does not use them (to avoid related build errors).

### database versions (dbv)
- Ordered database scripts that create database structures and modify static data.
- Each script has a version indicating when it will be executed during database creation.
- For example, in the script called "CreateDatabase__v99.sql" the version number is prefixed by "__v".
- Other ways of indicating the version may not be supported so stick to double-underscore-v followed by a parsable number in the file name.

### version ranges
- The folder '100' contains database versions 100-199, '200' contains versions 200-299, etc.
- Versions 0-99 are reserved in case administrative scripts must be added before database creation.
- Database creation statements should reside in the 0-99 folder since some execution environments may not allow them and the database may already exist.
