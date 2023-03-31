<?php

include('config.php');

$status =  $_POST['task_status'];

$id =  $_POST['task_id'];

if($status == 0)
{
    $status = 1;
}else{
    $status = 0;
}

$sql = "UPDATE todo_list SET STATUS=$status WHERE id=$id;";

echo $sql;

if ($conn->query($sql) === TRUE) 
{
  header('location: index.php');

} else
{
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
