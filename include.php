<?php
//MENU - LISTA PODSTRON
function menu_from_db($connection){
	$menu = '';	
	if ($result = $connection -> query("SELECT * FROM podstrony")) {
		while($wiersz = mysqli_fetch_assoc($result)){
                $menu = $menu.'<a href="index.php?id='.$wiersz['id'].'">'.$wiersz['nazwapodstr']."</a><br>";
                }
		$result -> free_result();
		}
	return $menu;
   }
	
//WYBIERANIE TREŚCI DO WYŚWIETLENIA WRAZ Z POBIERANIEM PODSTRONY Z BAZY (JEŚLI TRZEBA)
function podstrona_czy_panel_czy_tytul($conn,$id,$co){	
						//dopisek czy_tytul w nazwie tej funkcji oznacza, że ta funkcja wyświetla nie tylko
						//treść, ale też nagłówek - tytuł podstrony
						//decyduje o tym zmienna $co
						//zmienna $co to zarazem nazwa kolumny z bazy danych
	if(isset($_GET['id']) and $_GET['id']=='panel' and $co=='tresc'){
		switch ($_GET['a']) {
			case 'add_podstr':
				return add_podstr($conn);		//uruchomienie funkcji, która jest niżej
				break;
			case 'edit_podstr':
				return 'Taka strona jescze nie istnieje';
				break;
			case 'del_podstr':
				return 'Taka strona jescze nie istnieje';
				break;
			default:
			   return 'Taka strona nie istnieje, kombinatorze';
			}
		 }
	elseif(isset($_GET['id']) and $_GET['id']=='panel' and $co=='nazwapodstr'){		
		return 'Panel administracyjny';
		}
	else {			//pobranie podstrony z bazy
		$zapytanie = "SELECT ".$co." FROM podstrony WHERE id='".$id."'";
		if ($result = $conn -> query($zapytanie)) {
			while ($wiersz = $result -> fetch_row()) {
				$podstrona = $wiersz[0];
				}
			$result -> free_result();
			}
		$output = $podstrona;
		if ($co =='tresc'){		//dodanie guzików EDYTUJ i USUŃ (powinno być dla zalogowanych!)
			$output = $podstrona.'<br>
			<a href="index.php?id=panel&a=edit_podstr&edit_id='.$id.'">
				<input type="button" value="Edytuj">
			</a>
			<a href="index.php?id=panel&a=del_podstr&del_id='.$id.'">
				<input type="button" value="Usuń">
			</a><br>';
		}
		return $output;
		}
	} 

//DODAWANIE PODSTRON
function add_podstr($conn) {
	if($conn->query("INSERT INTO podstrony (nazwapodstr,tresc,czasutworz)
		VALUES ('Jakaś podstrona','Lorem ipsum dolor sit amet...', now())")){
		return 'Dodano podstronę. <a href="index.php?id=panel&a=edit_podstr&ins_id='.$conn->insert_id.'"><input type="button" value="Edytuj"></a>';}
	}
	
//CZY TO PIERWSZE WEJŚCIE NA STRONĘ
function get_id(){	
	if(isset($_GET['id'])){
		return $_GET['id'];}
	else {return 1;}
	} 
	
//LOGOWANIE
function login_form() {
	if($_SESSION['logowanie'] == 'poprawne') {
		$string  = '<form action="index.php" method="post">';
		$string .= '   <INPUT type="submit" name="wylogowanie" value="Wyloguj">';
		$string .= '</form>';
		} 
	else {
		$string = '<form action="index.php" method="POST"><ul class="logowanie">';
		if(isset($_SESSION['logowanie'])) $string .='<li>'.$_SESSION['logowanie'].'</li>';
		$string .= '<li>Login: <INPUT type="text" name="login"></li>';
		$string .= '<li>Haslo: <INPUT type="password" name="haslo"></li>';
		$string .= '<li><INPUT type="submit" name="logowanie" value="Logowanie"></li>';
		$string .= '</ul>';
		$string .= '</form>';	   
		}
	return $string;
	}
	
//LOGOWANIE
function login_action($conn){
	if(isset($_POST['logowanie'])) {
		$q = "SELECT user, parol FROM users WHERE user ='".$_POST['login']."' AND parol = '".$_POST['haslo']."'";
		$result = @mysqli_query($conn,$q) or die(mysql_error());
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['logowanie'] = 'poprawne';
			}
		else {
			$_SESSION['logowanie'] = 'Błędny login lub hasło!';
			} 
		unset($_POST['logowanie']);
		header("refresh: 1");
		}
	if(isset($_POST['wylogowanie'])) {   
		unset($_SESSION['logowanie']);
		header("refresh: 1");
		}
	}

//SPRAWDZENIE AUTENTYKACJI 
function may_i_show($content){
	if(isset($_SESSION['logowanie']) and $_SESSION['logowanie'] == 'poprawne') { 
		echo $content;
		}
	}

?>