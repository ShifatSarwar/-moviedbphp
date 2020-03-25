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

    if($_POST["updatebtn"]=="Update") {
        $sql="UPDATE reviews SET userreview='$rev' WHERE username='$username' AND title='$mtitle';";
        mysqli_query($link, $sql);
        if($sql) {
            header("location: ../reviewlist.php?movie=$mtitle");
            exit;
        } 
    } else {
        $sql="DELETE FROM reviews WHERE username='$username' AND title='$mtitle';";
        mysqli_query($link, $sql);
        if($sql) {
            header("location: ../reviewlist.php?movie=$mtitle");
            exit;
        } 
    }
}


?>