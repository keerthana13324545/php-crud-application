<?php 
    $servername = "localhost";
    $username = "root";
    $password = "YES";
    $db_name = "crud";  
    $con= new mysqli($servername, $username, $password, $db_name, 4306);
    if($con->connect_error){
        die("Connection failed".$con->connect_error);
    }
    echo "";
    
    ?>