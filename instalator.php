<?php
include ('db_config.php');

$tab1 = 'CREATE TABLE podstrony(
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	nazwapodstr VARCHAR(30) NOT NULL,
	tresc MEDIUMTEXT NOT NULL,
	czasutworz DATETIME NOT NULL)';

$tab2 = 'CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	user VARCHAR(50) NOT NULL,
	parol VARCHAR(50) NOT NULL,
	ranga VARCHAR(50) NOT NULL,
	status VARCHAR(50) NOT NULL)';

if ($polaczenie->query($tab1) === TRUE) {
	echo "Table created successfully";
	}
else {
	echo "Error creating table: " . $polaczenie->error;
	}
	
$polaczenie->query("INSERT INTO podstrony (nazwapodstr,tresc,czasutworz)VALUES ('start','Tresc podstrony startowej', now())");
$polaczenie->query("INSERT INTO podstrony (nazwapodstr,tresc,czasutworz)VALUES ('hobby','Opis mojego hobby',now())");
$polaczenie->query("INSERT INTO podstrony (nazwapodstr,tresc,czasutworz)VALUES ('kontakt','Kontakt: dane nieaktualne', now())");
$polaczenie->close();


?>
