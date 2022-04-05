<?php 

if (DBSW == 'mysql')
	$connstr = 'mysql:host:'.HOST.';dbname='.DBSA;
else {
	$connstr = 'sqlite:'.LITE;
}

$options = array(
 //   PDO::ATTR_PERSISTENT => true, 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

$conn = new PDO($connstr, USER, PASS, $options);
	
/***********************************
*	CRUD - CREATE
************************************/
function create($conn, $tabela, $campos, $values){

	$QrCreate = "INSERT INTO {$tabela} ({$campos}) VALUES ({$values})";

	try {
		$StCreate = $conn->prepare($QrCreate)->execute();
		return true;
	} catch (PDOException $e) {
		trigger_error($e->getMessage());
		return false;
	}

}

/***********************************
*	CRUD - SELECT
************************************/
function read($conn, $tabela, $cond = NULL){

	$QrRead = "SELECT * FROM {$tabela} {$cond}";
	$StRead = $conn->query($QrRead);
	$StRead->setFetchMode(PDO::FETCH_ASSOC);
	//$StRead->execute();
	//return $StRead->fetchAll();

	$rows = array();
	while($row = $StRead->fetch()) {
		$rows[] = $row;
	}

	return $rows;

}

/***********************************
*	CRUD - UPDATE
************************************/
function update($conn, $tabela, $values, $cond = NULL){
	$QrUpdate = "UPDATE {$tabela} SET {$values} {$cond}";
	
	try {
		$StUpdate = $conn->prepare($QrUpdate)->execute();
		return true;
	} catch (PDOException $e) {
		return false;
	}

}

/***********************************
*	CRUD - DELETE
************************************/
function delete($conn, $tabela, $cond){
	$QrDelete = "DELETE FROM {$tabela} {$cond}";
	$StDelete = $conn->prepare($QrDelete)->execute();
}

?>