CREATE TABLE w7_user
( id SERIAL NOT NULL PRIMARY KEY
, username VARCHAR(255) NOT NULL UNIQUE
, password VARCHAR(255) NOT NULL
);