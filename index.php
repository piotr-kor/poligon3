<?php
include ('db_config.php');
echo"<center><table border=\"1\"><tr><td width=\"200\">MENU<br>";


$wynik = mysqli_query($polaczenie,"SELECT * FROM podstrony");
         while($wiersz = mysqli_fetch_assoc($wynik))
                {
                echo $wiersz['nazwapodstr']."<br>";
                } 

				


echo"</td><td width=\"400\">TRESC<br>";



$wynik = mysqli_query($polaczenie,"SELECT tresc FROM podstrony WHERE id='1'");
$wiersz = mysqli_fetch_row($wynik);
$tekst = $wiersz[0];
echo $tekst;  



echo"</td></tr></table></center>";


mysqli_close($polaczenie);

?>