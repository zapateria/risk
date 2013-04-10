DROP SEQUENCE object_id;
CREATE SEQUENCE object_id;


DROP TABLE Object;
CREATE TABLE Object (
	id		INTEGER NOT NULL PRIMARY KEY DEFAULT nextval('object_id')
);
GRANT ALL ON Object to risk;

DROP TABLE Movable;
CREATE TABLE Movable (
	sector		INTEGER
) INHERITS (Object);
GRANT ALL ON Movable to risk;

DROP TABLE Map;
CREATE TABLE Map (
	image		VARCHAR(30),
	name		VARCHAR(30)
) INHERITS (Object);
GRANT ALL ON Map to risk;

DROP TABLE Country;
CREATE TABLE Country (
	shortname	VARCHAR(30),
	map		INTEGER
) INHERITS (Object);
GRANT ALL ON Country to risk;

DROP TABLE Game;
CREATE TABLE Game (
	name		VARCHAR(30),
	map		INTEGER,
	players		VARCHAR(30),
	turn		INTEGER
) INHERITS (Object);
GRANT ALL ON Game to risk;

DROP TABLE Player;
CREATE TABLE Player (
	game		INTEGER,
	credits		INTEGER,
	name		VARCHAR(30),
	username	VARCHAR(30),
	password	VARCHAR(40),
	active		INTEGER,
	turns		INTEGER,
	exp		INTEGER,
	ip		VARCHAR,
	title		VARCHAR(30)
) INHERITS (Object);
GRANT ALL ON Player to risk;

DROP TABLE Unit;
CREATE TABLE Unit (
	owner		INTEGER,
	game		INTEGER,
	country		INTEGER
) INHERITS (Object);
GRANT ALL ON Unit to risk;

DROP TABLE Message;
CREATE TABLE Message (
	msgto		INTEGER,
	msgfrom		INTEGER,
	message		VARCHAR,
	stamp		INTEGER,
	read		INTEGER,
	msgtype		VARCHAR
) INHERITS (Object);
GRANT ALL ON Message to risk;
