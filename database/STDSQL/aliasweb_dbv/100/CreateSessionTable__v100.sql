USE aliasweb;
DROP TABLE IF EXISTS session;
CREATE TABLE session(/*Should this table have a primary key?*/
    insertedAt DATETIME NOT NULL,
    vocationToken VARCHAR(8000) NOT NULL/*8000 is SQL Server's max varchar length.*/
);
