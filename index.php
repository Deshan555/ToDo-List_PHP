
<?PHP

include('config.php');

$SQL = "SELECT * FROM todo_list;";

$stmt = $conn->prepare($SQL);

$stmt->execute();

$todos = $stmt->get_result();
?>

<!DOCTYPE html>

<html lang="en">

<!-- HEADER -->
<head>
  <meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>ToDo List</title>
  
  <link href="style.css" rel="stylesheet">

</head>

<body>

  <section class="intro">

    <div class="bg-image h-100" style="background-color: #6095F0;">

      <div class="mask d-flex align-items-center h-100">

        <div class="container">

          <div class="row justify-content-center">

          <div class="col-12">
              
          <!-- TODO INPUT FIELD -->
            <div class="card-body">
              
              <form action="insert.php" method="POST">
                
                <div class="input-group mb-3">

                  <input type="text" class="form-control" placeholder="Add Your Tasks Here" aria-label="Recipient's username" aria-describedby="button-addon2" name="input_data"/>

                  <input type="date" class="form-control" name="date" placeholder="Pick Date For Task" aria-label="Recipient's username" aria-describedby="button-addon2"/>

                <button class="btn btn-dark" type="submit" name="submit" id="button-addon2" data-mdb-ripple-color="dark">ADD TODO</button>

              </div>

            </form>
          
          </div>
              
          <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                
            <div class="card-body">
                  
              <div class="table-responsive">
                
                <!-- TODO LIST TABLE LAYOUT -->
                <table class="table table-borderless mb-0">
                      
                  <thead>
                        
                    <tr>
                      <th scope="col">
                          </th>
                          <th scope="col">TASK DISCRIPTION</th>
                          <th scope="col">ASSIGN DATE</th>
                          <th scope="col">TASK STATE</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php foreach($todos as $todo){ ?>
                        
                        <tr>
                          
                          <th scope="row">
                            <!-- CHECK BOX -->
                          </th>
                                                    
                          <td><?php echo $todo['TODO'];?></td>
                          
                          <td><?php echo $todo['DATE_TODO'];?></td>
                          
                          <td>
                            <?php if($todo['STATUS'] == 0){?>
                              <span class="badge rounded-pill text-bg-warning">Incomplete</span>
                            <?php }else{?>
                              <span class="badge rounded-pill text-bg-success">Complete</span>
                            <?php }?>
                          </td>
                          
                          <td>
                          
                          <div class="form-check">
                              <form action="check.php" method="POST" id="quick_access<?php echo $todo['ID'];?>">
                                
                                <input type="hidden" value="<?php echo $todo['ID']; ?>" name="task_id">

                                <input type="hidden" value="<?php echo $todo['STATUS']; ?>" name="task_status">
                                
                                <?php if($todo['STATUS'] == 0){?>
                                  
                                  <input class="form-check-input" type="checkbox" value="0" id="flexCheckDefault1" name="status" 
                                  onclick="document.getElementById('quick_access'+<?php echo $todo['ID'];?>).submit();"/>
                                
                                <?php }else{?>
                                
                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault1" name="status" 
                                  checked onclick="document.getElementById('quick_access'+<?php echo $todo['ID'];?>).submit();"/>
                                
                                  <?php }?>
                              
                              </form>
                            
                            </div>
                          </td>

                          <td>

                            <form action="delete.php" method="POST" id="delete<?php echo $todo['ID'];?>">
                              
                              <input type="hidden" value="<?php echo $todo['ID']; ?>" name="task_id">
                              
                              <i input="submit" class="material-icons" style="color:red; cursor: pointer;" 
                                onclick="document.getElementById('delete'+<?php echo $todo['ID'];?>).submit();">delete</i>
                            
                            </form>
                          
                          </td>
                        
                        </tr>

                      <?php } ?>  
                    
                    </tbody>
                  
                  </table>
                  
                </div>
                
              </div>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
      
    </div>
    
  </div>
  
</section>

</body>

</html>