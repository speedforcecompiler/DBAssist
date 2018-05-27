<?php
	// error_reporting(0);


	function getAll($connection,$tablename){
		$query = "SELECT * FROM ".$tablename;
		$stmt = $connection->prepare($query);
		$exec=$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	// $conn : Connection to Database
	// $table : The Table name from where you want to get the Data
	// $params : The parameters for the search
	// $columns : the column name (in the same order in which you pass the parameter values)
	// for example : columns('id','username') and params('263','speedforce')
	// will be interpreted as id='263' and username = 'speedforce' 
	// $mode : The mode for search "and" or "AND" or "or" or "OR" ("null" or "null" for just one parameter)

	
	function get($conn,$table,$columns,$params,$mode){
		// echo $mode;
		$query = "SELECT * FROM ".$table." WHERE ";
		if($mode == "NULL" || $mode == "null"){
			foreach ($columns as $col) {
				$query = $query.$col."= ?";
			}
			$stmt = $conn->prepare($query);
			$stmt->execute($params);
			$result = $stmt->fetchAll();
			return $result;
			// echo "In Null";
		}
		elseif($mode == "AND" || $mode == "and"){
			foreach ($columns as $col) {
				$query = $query.$col." = ? AND ";
			}
			$query = substr($query,0,strlen($query)-4);
			// echo $query;
			$stmt = $conn->prepare($query);
			$stmt->execute($params);
			$result = $stmt->fetchAll();
			return $result;
			// echo "In AND";
		}
		elseif($mode == "OR" || $mode == "or"){
			foreach ($columns as $col) {
				$query = $query.$col." = ? OR ";
			}
			$query = substr($query,0,strlen($query)-3);
			// echo $query;
			$stmt = $conn->prepare($query);
			$stmt->execute($params);
			$result = $stmt->fetchAll();
			return $result;	
			// echo "In OR";
		}
	}

?>

