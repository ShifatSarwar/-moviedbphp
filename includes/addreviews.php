<?php
require_once "dbconnect.php";
session_start();
$mtitle = $_GET["movie"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
} else {
	$username=$_SESSION['username'];
    $mtitle=$_GET["movie"];
    $rev=$_POST["rev"];
    $rate=$_POST["star"];

    $sql="SELECT * FROM reviews WHERE username='$username' AND title='$mtitle';";
    $result=mysqli_query($link, $sql);
    $queryResult=mysqli_num_rows($result);
    if($queryResult>0) {
    	header("location: ../reviewlist.php?movie=$mtitle");
        exit;
    } else {
    	$query = "INSERT INTO reviews (username, title, userreview, userrating) VALUES ('$username', '$mtitle', '$rev','$rate');";
        mysqli_query($link,$query);
        if($query) {
    	    header("location: ../reviewlist.php?movie=$mtitle");
            exit;
        }
    } 
}


?>