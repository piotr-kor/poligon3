<?php
function menu_from_db($connection){
	$menu = '';	
	if ($result = $connection -> query("SELECT * FROM podstrony")) {
		while($wiersz = mysqli_fetch_assoc($result)){
                $menu = $menu.$wiersz['nazwapodstr']."<br>";
                }
		$result -> free_result();
		}
	return $menu;
   }
   
function podstrona_from_db($connection,$id){	
	$zapytanie = "SELECT tresc FROM podstrony WHERE id='".$id."'";
	if ($result = $connection -> query($zapytanie)) {
		while ($wiersz = $result -> fetch_row()) {
			$podstrona = $wiersz[0];
			}
		$result -> free_result();
		}
	return $podstrona;
   }
?>