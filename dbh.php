<?php
	
	try{
		$conn1 = new PDO("mysql:host=localhost;dbname=erp","root","");
		$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connected 1";
	}
	catch(PDOException $e){

	}
	try{
		$conn2 = new PDO("mysql:host=localhost;dbname=abs","root","");
		$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connected 1";
	}
	catch(PDOException $e){

	}

?>