<?php
function menu_from_db($connection){
	$menu = '';	
	if ($result = $connection -> query("SELECT * FROM podstrony")) {
		while($wiersz = mysqli_fetch_assoc($result)){
                $menu = $menu.'<a href="index.php?id='.$wiersz['id'].'">'.$wiersz['nazwapodstr'].'</a><br>';
                }
		$result -> free_result();
		}
	return $menu;
   }
   
function podstrona_from_db($connection,$id=1,$nazwa_kolumny="tresc"){	
	$zapytanie = "SELECT ".$nazwa_kolumny." FROM podstrony WHERE id='".$id."'";
	if ($result = $connection -> query($zapytanie)) {
		while ($wiersz = $result -> fetch_row()) {
			$podstrona = $wiersz[0];
			}
		$result -> free_result();
		}
	return $podstrona;
   }
function get_id(){	
	if(isset($_GET['id'])){
		return $_GET['id'];}
	else {return 1;}
	} 
?>