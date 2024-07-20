<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark justify-content-center bg-dark"
     style=" background-color:#00ff5573;" >
        <span class="navbar-brand mb-0 h1">PHP CRUD APPLICATION</span>
    </nav>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="user.php" class="text-light">Add User</a>
        </button>
        <table class="table" align="center">
             <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONENO</th>
                    <th scope="col" >ACTION</th>
                </tr>
            </thead>
            
            <?php 
            $sql="SELECT * FROM `operations`";
            $id=1;
            $result=mysqli_query($con,$sql);
             if($result){
                 while($row=mysqli_fetch_assoc($result)){
                     $id=$row['id'];
                     $name=$row['name'];
                     $email=$row['email'];
                     $phone=$row['phone'];
                     echo'<tr>
                      <td scope="row">'.$id.'</td>
                      <td>'.$name.'</td>
                      <td>'.$email.'</td>
                      <td>'.$phone.'</td>
                      <td>
                      <button class=" btn btn-primary">
                        <a href="update.php?
                        upid='.$id.'" class="text-light">UPDATE</a>
                     </button>
                        <button class=" btn btn-danger">
                        <a  href="delete.php? 
                    did='.$id.'" class="text-light">DELETE</a>
                    </button>
            </tr>';
        }
        
    }
    
    ?>
    
        </table>
        
    </div>
    
</body>
</html>