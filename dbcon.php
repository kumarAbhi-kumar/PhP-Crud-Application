<?php
    $host_name = "localhost:4001";
    $username = "root";
    $password = "";
    $database = "crud_operations";

    $connection = mysqli_connect($host_name, $username, $password, $database);
    if(!$connection)
        die("Connection Failed");
    
?>