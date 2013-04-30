DROP TABLE Object Cascade;

DROP SEQUENCE object_id;
CREATE SEQUENCE object_id;


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

INSERT INTO Map (image,name) VALUES ('/img/game_map.png', 'World Map');

DROP TABLE Link;
CREATE TABLE Link (
	link1		VARCHAR(30),
	link2		VARCHAR(30)
);
GRANT ALL ON Link to risk;

INSERT INTO Link VALUES('alaska',' nwterritory');
INSERT INTO Link VALUES('alaska',' alberta');
INSERT INTO Link VALUES('alaska',' kamchatka');
INSERT INTO Link VALUES('nwterritory',' alaska');
INSERT INTO Link VALUES('nwterritory',' alberta');
INSERT INTO Link VALUES('nwterritory',' ontario');
INSERT INTO Link VALUES('nwterritory',' greenland');
INSERT INTO Link VALUES('alberta',' alaska');
INSERT INTO Link VALUES('alberta',' nwterritory');
INSERT INTO Link VALUES('alberta',' westernus');
INSERT INTO Link VALUES('alberta',' ontario');
INSERT INTO Link VALUES('ontario' ,'nwterritory');
INSERT INTO Link VALUES('ontario' ,'alberta');
INSERT INTO Link VALUES('ontario' ,'easterncanada');
INSERT INTO Link VALUES('ontario' ,'easternus');
INSERT INTO Link VALUES('ontario' ,'westernus');
INSERT INTO Link VALUES('ontario' ,'easternus');
INSERT INTO Link VALUES('greenland' ,'nwterritory');
INSERT INTO Link VALUES('greenland' ,'ontario');
INSERT INTO Link VALUES('greenland' ,'easterncanada');
INSERT INTO Link VALUES('greenland' ,'iceland');
INSERT INTO Link VALUES('easterncanada','greenland');
INSERT INTO Link VALUES('easterncanada','ontario');
INSERT INTO Link VALUES('easterncanada','easternus');
INSERT INTO Link VALUES('westernus','alberta');
INSERT INTO Link VALUES('westernus','ontario');
INSERT INTO Link VALUES('westernus','easternus');
INSERT INTO Link VALUES('westernus','centralamerica');
INSERT INTO Link VALUES('easternus','ontario');
INSERT INTO Link VALUES('easternus','easterncanada');
INSERT INTO Link VALUES('easternus','westernus');
INSERT INTO Link VALUES('easternus','centralamerica');
INSERT INTO Link VALUES('centralamerica','westernus');
INSERT INTO Link VALUES('centralamerica','easternus');
INSERT INTO Link VALUES('centralamerica','venezuela');
INSERT INTO Link VALUES('venezuela','centralamerica');
INSERT INTO Link VALUES('venezuela','brazil');
INSERT INTO Link VALUES('venezuela','peru');
INSERT INTO Link VALUES('peru','venezuela');
INSERT INTO Link VALUES('peru','brazil');
INSERT INTO Link VALUES('peru','argentina');
INSERT INTO Link VALUES('argentina','peru');
INSERT INTO Link VALUES('argentina','brazil');
INSERT INTO Link VALUES('brazil','peru');
INSERT INTO Link VALUES('brazil','venezuela');
INSERT INTO Link VALUES('brazil','argentina');
INSERT INTO Link VALUES('brazil','nafrica');
INSERT INTO Link VALUES('nafrica','brazil');
INSERT INTO Link VALUES('nafrica','weurope');
INSERT INTO Link VALUES('nafrica','seurope');
INSERT INTO Link VALUES('nafrica','egypt');
INSERT INTO Link VALUES('nafrica','eafrica');
INSERT INTO Link VALUES('nafrica','cafrica');
INSERT INTO Link VALUES('egypt','nafrica');
INSERT INTO Link VALUES('egypt','seurope');
INSERT INTO Link VALUES('egypt','middleeast');
INSERT INTO Link VALUES('egypt','eafrica');
INSERT INTO Link VALUES('eafrica','nafrica');
INSERT INTO Link VALUES('eafrica','egypt');
INSERT INTO Link VALUES('eafrica','middleeast');
INSERT INTO Link VALUES('eafrica','cafrica');
INSERT INTO Link VALUES('eafrica','safrica');
INSERT INTO Link VALUES('eafrica','madagascar');
INSERT INTO Link VALUES('madagascar','eafrica');
INSERT INTO Link VALUES('madagascar','safrica');
INSERT INTO Link VALUES('safrica','eafrica');
INSERT INTO Link VALUES('safrica','madagascar');
INSERT INTO Link VALUES('safrica','cafrica');
INSERT INTO Link VALUES('weurope','greatbritain');
INSERT INTO Link VALUES('weurope','neurope');
INSERT INTO Link VALUES('weurope','seurope');
INSERT INTO Link VALUES('weurope','nafrica');
INSERT INTO Link VALUES('greatbritain','iceland');
INSERT INTO Link VALUES('greatbritain','scandinavia');
INSERT INTO Link VALUES('greatbritain','neurope');
INSERT INTO Link VALUES('greatbritain','weurope');
INSERT INTO Link VALUES('iceland','greenland');
INSERT INTO Link VALUES('iceland','greatbritain');
INSERT INTO Link VALUES('iceland','scandinavia');
INSERT INTO Link VALUES('scandinavia','iceland');
INSERT INTO Link VALUES('scandinavia','greatbritain');
INSERT INTO Link VALUES('scandinavia','russia');
INSERT INTO Link VALUES('scandinavia','neurope');
INSERT INTO Link VALUES('neurope','russia');
INSERT INTO Link VALUES('neurope','scandinavia');
INSERT INTO Link VALUES('neurope','greatbritain');
INSERT INTO Link VALUES('neurope','seurope');
INSERT INTO Link VALUES('neurope','weurope');
INSERT INTO Link VALUES('russia','scandinavia');
INSERT INTO Link VALUES('russia','neurope');
INSERT INTO Link VALUES('russia','seurope');
INSERT INTO Link VALUES('russia','ural');
INSERT INTO Link VALUES('russia','afghanistan');
INSERT INTO Link VALUES('russia','middleeast');
INSERT INTO Link VALUES('middleeast','russia');
INSERT INTO Link VALUES('middleeast','seurope');
INSERT INTO Link VALUES('middleeast','egypt');
INSERT INTO Link VALUES('middleeast','eafrica');
INSERT INTO Link VALUES('middleeast','india');
INSERT INTO Link VALUES('middleeast','afghanistan');
INSERT INTO Link VALUES('afghanistan','russia');
INSERT INTO Link VALUES('afghanistan','middleeast');
INSERT INTO Link VALUES('afghanistan','india');
INSERT INTO Link VALUES('afghanistan','china');
INSERT INTO Link VALUES('afghanistan','ural');
INSERT INTO Link VALUES('ural','russia');
INSERT INTO Link VALUES('ural','afghanistan');
INSERT INTO Link VALUES('ural','china');
INSERT INTO Link VALUES('ural','siberia');
INSERT INTO Link VALUES('siberia','ural');
INSERT INTO Link VALUES('siberia','china');
INSERT INTO Link VALUES('siberia','mongolia');
INSERT INTO Link VALUES('siberia','irkutsk');
INSERT INTO Link VALUES('siberia','yakutsk');
INSERT INTO Link VALUES('yakutsk','siberia');
INSERT INTO Link VALUES('yakutsk','kamchatka');
INSERT INTO Link VALUES('yakutsk','irkutsk');
INSERT INTO Link VALUES('irkutsk','siberia');
INSERT INTO Link VALUES('irkutsk','yakutsk');
INSERT INTO Link VALUES('irkutsk','kamchatka');
INSERT INTO Link VALUES('irkutsk','mongolia');
INSERT INTO Link VALUES('mongolia','japan');
INSERT INTO Link VALUES('mongolia','kamchatka');
INSERT INTO Link VALUES('mongolia','irkutsk');
INSERT INTO Link VALUES('mongolia','siberia');
INSERT INTO Link VALUES('mongolia','china');
INSERT INTO Link VALUES('china','mongolia');
INSERT INTO Link VALUES('china','siberia');
INSERT INTO Link VALUES('china','ural');
INSERT INTO Link VALUES('china','afghanistan');
INSERT INTO Link VALUES('china','india');
INSERT INTO Link VALUES('china','siam');
INSERT INTO Link VALUES('siam','china');
INSERT INTO Link VALUES('siam','india');
INSERT INTO Link VALUES('siam','indonesia');
INSERT INTO Link VALUES('japan','mongolia');
INSERT INTO Link VALUES('japan','kamchatka');
INSERT INTO Link VALUES('indonesia','newguinea');
INSERT INTO Link VALUES('indonesia','siam');
INSERT INTO Link VALUES('indonesia','waustralia');
INSERT INTO Link VALUES('waustralia','indonesia');
INSERT INTO Link VALUES('waustralia','eaustralia');
INSERT INTO Link VALUES('waustralia','newguinea');
INSERT INTO Link VALUES('newguinea','waustralia');
INSERT INTO Link VALUES('newguinea','eaustralia');
INSERT INTO Link VALUES('newguinea','indonesia');
INSERT INTO Link VALUES('eaustralia','newguinea');
INSERT INTO Link VALUES('eaustralia','waustralia');

DROP TABLE Country;
CREATE TABLE Country (
        shortname       VARCHAR(30),
        longname        VARCHAR(30),
        map             INTEGER
) INHERITS (Object);
GRANT ALL ON Country to risk;


INSERT INTO Country (shortname,longname,map) VALUES('alaska', 'Alaska', 1);
INSERT INTO Country (shortname,longname,map) VALUES('nwterritory', 'Northwest Territory', 1);
INSERT INTO Country (shortname,longname,map) VALUES('alberta', 'Alberta', 1);
INSERT INTO Country (shortname,longname,map) VALUES('ontario', 'Ontario', 1);
INSERT INTO Country (shortname,longname,map) VALUES('easterncanada', 'Eastern Canada/Quebec', 1);
INSERT INTO Country (shortname,longname,map) VALUES('westernus', 'Western United States', 1);
INSERT INTO Country (shortname,longname,map) VALUES('easternus', 'Eastern United States', 1);
INSERT INTO Country (shortname,longname,map) VALUES('centralamerica', 'Central America', 1);
INSERT INTO Country (shortname,longname,map) VALUES('greenland', 'Greenland', 1);
INSERT INTO Country (shortname,longname,map) VALUES('iceland', 'Iceland', 1);
INSERT INTO Country (shortname,longname,map) VALUES('greatbritain', 'Great Britain', 1);
INSERT INTO Country (shortname,longname,map) VALUES('scandinavia', 'Scandinavia', 1);
INSERT INTO Country (shortname,longname,map) VALUES('russia', 'Russia',1);
INSERT INTO Country (shortname,longname,map) VALUES('neurope', ' Northern Europe',1);
INSERT INTO Country (shortname,longname,map) VALUES('weurope', 'Western Europe',1);
INSERT INTO Country (shortname,longname,map) VALUES('seurope', 'Southern Europe',1);
INSERT INTO Country (shortname,longname,map) VALUES('venezuela', 'Venezuela', 1);
INSERT INTO Country (shortname,longname,map) VALUES('brazil', 'Brazil', 1);
INSERT INTO Country (shortname,longname,map) VALUES('peru', 'Peru', 1);
INSERT INTO Country (shortname,longname,map) VALUES('argentina', 'Argentina', 1);
INSERT INTO Country (shortname,longname,map) VALUES('nafrica', 'North Africa',1);
INSERT INTO Country (shortname,longname,map) VALUES('egypt', 'Egypt', 1);
INSERT INTO Country (shortname,longname,map) VALUES('eafrica', 'East Africa', 1);
INSERT INTO Country (shortname,longname,map) VALUES('cafrica', 'Central Africa/Congo',1);
INSERT INTO Country (shortname,longname,map) VALUES('safrica', 'South Africa', 1);
INSERT INTO Country (shortname,longname,map) VALUES('madagascar', 'Madagascar',1);
INSERT INTO Country (shortname,longname,map) VALUES('indonesia', 'Indonesia',1);
INSERT INTO Country (shortname,longname,map) VALUES('newguinea', 'New Guinea',1);
INSERT INTO Country (shortname,longname,map) VALUES('waustralia', 'Western Australia',1);
INSERT INTO Country (shortname,longname,map) VALUES('eaustralia', 'Eastern Australia',1);
INSERT INTO Country (shortname,longname,map) VALUES('ural', 'Ural', 1);
INSERT INTO Country (shortname,longname,map) VALUES('siberia', 'Siberia', 1);
INSERT INTO Country (shortname,longname,map) VALUES('yakutsk', 'Yakutsk', 1);
INSERT INTO Country (shortname,longname,map) VALUES('kamchatka', 'Kamchatka', 1);
INSERT INTO Country (shortname,longname,map) VALUES('irkutsk', 'Irkutsk', 1);
INSERT INTO Country (shortname,longname,map) VALUES('afghanistan', 'Afghanistam', 1);
INSERT INTO Country (shortname,longname,map) VALUES('mongolia', 'Mongolia', 1);
INSERT INTO Country (shortname,longname,map) VALUES('japan', 'Japan',1);
INSERT INTO Country (shortname,longname,map) VALUES('china', 'China', 1);
INSERT INTO Country (shortname,longname,map) VALUES('middleeast', 'Middle East',1);
INSERT INTO Country (shortname,longname,map) VALUES('india', 'India', 1);
INSERT INTO Country (shortname,longname,map) VALUES('siam', 'Siam/South Asia', 1);


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
	unit		INTEGER,
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
