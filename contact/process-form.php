<?php

// Include DB Connection
include('../db_connect.php');

// Retrieve incoming data & decode
$data = json_decode(file_get_contents('php://input'), true);

$sql = "INSERT INTO `contact` (`id`, `name`, `email`, `message`)
                        VALUES (NULL, :name, :email, :message)";

$statement = $db->prepare($sql);

$statement->bindValue(':name', $data['name']);
$statement->bindValue('email', $data['email']);
$statement->bindValue('message', $data['message']);

$result = $statement->execute();

if ($result) {
  echo json_encode(array("Message" => "Successfully submitted contact info!"));
} else {
  echo json_encode(array("Message" => "Could not submit contact info!"));
}

?>
