<?php
require "header.php";
require_once "includes/dbconnect.php";
$username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Reviews</title>
</head>
<body>
	<table>
        <h1 style="color: white"><?php echo $username; ?>'s Rating: </h1>
        <?php
        $sql="SELECT * FROM reviews WHERE username = '$username';";
        $result=mysqli_query($link, $sql);
        $queryResult=mysqli_num_rows($result);
        if($queryResult>0) {
            while($rows=$result->fetch_assoc()) {
            	if($_SESSION['username']==$rows['username']) {
            		$userrev=$rows['userreview'];
            	}
    ?>
    <tr>  
    <div class="revlist">      
        <p>Rate: <?php echo $rows['userrating'] ?>/10</p>
        <hr>
        <div>
        <p style="margin-top: 5px;"><a href="movie.php?movie=<?php echo $rows['title']; ?>"><?php echo $rows['title'] ?></a></p>

        <p><?php echo $rows['userreview'] ?></p>
    </div>
    </tr>
  <?php
                }
            }

    ?>
    </table>
</body>
<footer style="color: white">
  <div class="foot">
  <?php require "footer.php"; ?>
</div>
</footer>
<link href="revStyle.css" rel="stylesheet">

