
<?php
include 'connect.php';

function renumberIDs($con) {
    $selectQuery = "SELECT id FROM operations ORDER BY id";
    $result = mysqli_query($con, $selectQuery);
    
    if ($result) {
        $counter = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];

            $updateQuery = "UPDATE operations  SET id = $counter WHERE id = $id";
            mysqli_query($con, $updateQuery);
            $counter++;
        }

        $nextAutoIncrement = $counter;
        $resetAutoIncrementQuery = "ALTER TABLE operations AUTO_INCREMENT = $nextAutoIncrement";
        mysqli_query($con, $resetAutoIncrementQuery);
    }
}
if(isset($_GET['did'])){
    $id=$_GET['did'];
    $sql=" delete from `operations` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:index.php');
        renumberIDs($con);
    }
    else{
        die(mysqli_error($con));
    }
}