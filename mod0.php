 <?php
include ('db_config.php');

echo '<form action="mod1.php" method="GET"><select name="pod">';
	 $res = mysqli_query($polaczenie,"SELECT * FROM podstrony");
         while($row = mysqli_fetch_array($res, MYSQLI_NUM))
                {
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                }
         echo '</select>  <input type=submit value="Modyfikuj"></form>';
            
?>
