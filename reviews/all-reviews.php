<?php

// Include DB Connection
include('../db_connect.php');

$sql = "SELECT * FROM `reviews`";

// Prepare the statement for execution
$statement = $db->prepare($sql);

// Execute the statement in the database
$result = $statement->execute();


$arr = $statement->fetchAll(PDO::FETCH_ASSOC);

// Free up connection to server
$statement->closeCursor();

echo json_encode($arr);

?>
