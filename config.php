<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'test';

    $connection = mysqli_connect('localhost','root','','test');

    //Checking the connection
    if(mysqli_connect_error()){
        die('Database connection error'.mysqli_connect_errno());
    }
 ?>