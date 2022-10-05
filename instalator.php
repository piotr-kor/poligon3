<?php
include ('db_config.php');
$query = 'CREATE TABLE podstrony(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
nazwapodstr CHAR(255) NOT NULL,
tresc CHAR(255) NOT NULL)';


if (!$result=@mysqli_query($polaczenie,$query)){ 
	echo 'Blad tworzenia tabeli MySQL, odpowiedz serwera: '.mysqli_error($polaczenie);   
	}
else {
	echo $result;
	echo "<br>Tabelę utworzono! Dadawanie danych:<br>";
	mysqli_query($polaczenie,"INSERT INTO podstrony (nazwapodstr,tresc)VALUES ('start','Tresc podstrony startowej')");
	mysqli_query($polaczenie,"INSERT INTO podstrony (nazwapodstr,tresc)VALUES ('hobby','Opis mojego hobby')");
	mysqli_query($polaczenie,"INSERT INTO podstrony (nazwapodstr,tresc)VALUES ('kontakt','Kontakt: dane kontaktowe są już nieaktualne')");
	echo "Dane chyba dodane!<br>";
	mysqli_close($polaczenie);
	}
?>
