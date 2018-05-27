<?php 

	include 'dbh.php';
	include 'get.php';

	$param = array("7","lauda");
	$column = array("id","name");

	$result = get($conn2,"newspapers",$column,$param,"or");
	if (sizeof($result)==0) {
		echo "<br>NOT FOUND";
	}
	else{	
		foreach ($result as $row) {
			echo($row['id']." : ".$row['name']."<br>");
		}	
	}
?>