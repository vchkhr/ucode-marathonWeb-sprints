CREATE DATABASE ucode_web;

CREATE USER 'vkharchenk'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';
-- ALTER USER 'vkharchenk'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';

GRANT ALL PRIVILEGES ON *.* TO 'vkharchenk'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
