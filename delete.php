<?php

include('config.php');

$id = $_POST['delete_id'];

$sql = "DELETE FROM todo_list WHERE ID = $id;";

if($conn->query($sql) === TRUE) 
{
  header('location: index.php');
}else
{
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>