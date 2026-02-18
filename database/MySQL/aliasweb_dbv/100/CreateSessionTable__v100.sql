USE aliasweb;
DROP TABLE IF EXISTS session;
CREATE TABLE session(/*Should this table have a primary key?*/
    insertedAt DATETIME NOT NULL,
    vocationToken VARCHAR(12000) NOT NULL COLLATE utf8mb4_0900_as_cs
) ENGINE INNODB ENCRYPTION 'Y';
