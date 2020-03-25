<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
       header("location: login.php");
       exit;
    } else {
        require_once "dbconnect.php";
        $title=$_SESSION['title'];
        $username=$_SESSION['username'];
        $rate=$_POST['star'];
        $sql = "UPDATE userreview SET userrate='$rate' WHERE username='$username' AND title='$title';";
        mysqli_query($link, $sql);
        if($sql) {
            header("location: ../movie.php?movie=$title");
            exit;
        }
    }  
?>