<?php
include ('db_config.php');
$a=$_POST['pod'];
$dane=$_POST['nazwapodstr'];
$dane2=$_POST['trescpodstr'];
mysqli_query($polaczenie,"UPDATE podstrony SET nazwapodstr = '".$dane."' WHERE id = '".$a."'");
mysqli_query($polaczenie,"UPDATE podstrony SET tresc = '".$dane2."' WHERE id = '".$a."'");
echo 'OK<br><a href="admin.php">PANEL</a><br>';

?>