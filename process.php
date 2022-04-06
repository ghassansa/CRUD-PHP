<?php

// print_r($_POST);
$mysqli = new mysqli('localhost', 'root','','crud' )or die(mysqli_error($mysqli));

    session_start();


if (isset($_POST['save'])){
    $name = $_POST['Name'];
    $age = $_POST['Age'];

    $mysqli->query("INSERT INTO crud (name , age  ) VALUES('$name', '$age')")or die($mysqli->error);
}

    $_SESSION['massage'] = "record has been saved";
    $_SESSION['msg_type'] = "Success";

    header("age: index.php"); 



if (isset($_GET['delete'])){
    $ID =  $_GET['delete'];
    $mysqli->query("DELETE FROM crud WHERE id=$ID") or die($mysqli->error);
}

    $_SESSION['massage'] = "record has been deleted";
    $_SESSION['msg_type'] = "Success";
    
    header("age: index.php"); 


// if (isset($_Get['edit'])){
//     $id =
// }