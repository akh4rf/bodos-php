<?php

// Include DB Connection
include('../db_connect.php');

$sql = "SELECT * FROM `locations`";

// Prepare the statement for execution
$statement = $db->prepare($sql);

// Execute the statement in the database
$result = $statement->execute();


$arr = $statement->fetchAll(PDO::FETCH_ASSOC);

$return_arr = array();

foreach ($arr as $key => $value) {
  foreach ($value as $k => $v) {
    if ($k == "hours") {
      $return_arr[$key][$k] = json_decode($value["hours"], true);
    } else {
      $return_arr[$key][$k] = $arr[$key][$k];
    }
  }
}

// Free up connection to server
$statement->closeCursor();

echo json_encode($return_arr);
