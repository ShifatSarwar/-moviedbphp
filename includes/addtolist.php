<?php
    session_start();
    require_once "dbconnect.php";
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
       header("location: login.php");
       exit;
    } else {
        $title=$_GET["movie"];
        $imglocation=$_SESSION["imgloc"];
        $username=$_SESSION["username"];

        $query = "INSERT INTO watchlist (username, imgloc, title) VALUES ('$username', '$imglocation', '$title');";
        mysqli_query($link,$query);
        if($query) {
            header("location: ../movie.php?movie=$title");
            exit;
        }
    } 
        
?>