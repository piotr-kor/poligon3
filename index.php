<?php
include ('db_config.php');
include ('include.php');
echo"<center><table border=\"1\"><tr><td width=\"200\">MENU<br>";
echo menu_from_db($polaczenie);
echo"</td><td width=\"400\">TRESC<br>";
echo podstrona_from_db($polaczenie,1);
echo"</td></tr></table></center>";
$polaczenie -> close();
?>