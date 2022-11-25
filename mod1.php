<?php
include ('db_config.php');
$a=$_GET['pod'];

$res = mysqli_query($polaczenie,"SELECT * FROM podstrony WHERE id='".$a."'");
$wiersz = mysqli_fetch_array($res, MYSQLI_ASSOC);

$nazwa = $wiersz['nazwapodstr'];
$tresc = $wiersz['tresc'];


echo '<form action="mod2.php" method="POST">
          nazwa podstrony<br><textarea cols="30" rows="1" name="nazwapodstr" class="inputbox">'.$nazwa.'</textarea>
          <br>tresc podstrony<br><textarea cols="30" rows="5" name="trescpodstr" class="inputbox">'.$tresc.'</textarea>
          
          <input type="hidden" name="pod" value="'.$a.'">

          
          <br><input type=submit value="Zapisz"></form>';
          
?>