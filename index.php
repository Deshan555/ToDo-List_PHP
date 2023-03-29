
<?PHP

include('config.php');

$SQL = "SELECT * FROM todo_list;";

$stmt = $conn->prepare($SQL);

$stmt->execute();

$todos = $stmt->get_result();
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TO-DO</title>
</head>

<body>
  <form action="" method="post">
    <input type="text" name="input_data">
    <button type="submit">OK</button>
  </form>  

  <div class="todos">
    <span class="date">2012-10-22</span>
    <ul>
      <?php 
      foreach($todos as $todo)
      {?>
        
        <li><?php echo $todo['TODO'];?></li>
      
      <?php }?>
    </ul>
  </div>
</body>

</html>




