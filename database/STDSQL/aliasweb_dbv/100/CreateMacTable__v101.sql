USE aliasweb;
DROP TABLE IF EXISTS mac;
CREATE TABLE mac(
    insertedAt DATETIME NOT NULL,
    macval VARCHAR(8000) NOT NULL/*8000 is SQL Server's max varchar length.*/
);
/*
  We could store authentication code metadata such as message data, private key, or key origin?
  But this could also increase key exposure problems!
*/