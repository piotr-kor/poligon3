<?php
include ('db_config.php');
include ('include.php');
if (!isset($_GET['id_do_usuniecia'])){
		$output = '<form action="delete.php" method="GET">
			Podaj id podstrony do usunięcia 
			  <input type="text" name="id_do_usuniecia"><br><br>
			  <input type="submit" value="Usuń">
			</form>  
		<a href="index.php"><input type="button" value="Pozostaw"></a>';
		echo $output;
		}
	else {
		if($polaczenie->query("DELETE FROM podstrony WHERE id='".$_GET['id_do_usuniecia']."'")){
			return 'Usunięto podstronę';}
		}
	

?>