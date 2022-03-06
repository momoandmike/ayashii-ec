CREATE DATABASE IF NOT EXISTS ayashii_db;​

CREATE USER IF NOT EXISTS ayashii_admin IDENTIFIED BY '9999';
​
GRANT ALL ON ayashii_db.* TO ayashii_admin;