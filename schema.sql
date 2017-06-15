use app;

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS 'user';
CREATE TABLE 'user' (
  'id' int(11) NOT NULL AUTO_INCREMENT,
  'email' varchar(255) NOT NULL,
  'password' varchar(255) DEFAULT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY 'email' ('email')
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO 'user' ('id', 'email', 'password') VALUES
(1,   'markus.ineichen@gibz.ch',     '1234');
