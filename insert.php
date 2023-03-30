<?php

include('config.php');

if(isset($_POST['submit']))
{
    $date = $_POST['date'];

    $todo = $_POST['input_data'];

    $SQL = "INSERT INTO todo_list (TODO, DATE_TODO, STATUS) VALUES ('$todo', '$date', 0)";
    
    if ($conn->query($SQL) === TRUE)
    {
        header('location: index.php');
    }else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

}

?>
