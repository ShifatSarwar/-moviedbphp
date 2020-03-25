<?php
    require "header.php";
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    include "includes/dbconnect.php";
    $username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Watchlist</title>
</head>
<body>
	<table>
        <h1 style="color: white">Your Watchlist</h1>
    <?php
        $sql="SELECT * FROM watchlist WHERE username = '$username'";
        $result=mysqli_query($link, $sql);
        $queryResult=mysqli_num_rows($result);
        if($queryResult>0) {
            while($rows=$result->fetch_assoc()) {
    ?>
    <tr>
        <td class="poster"><img  height="100px"  src="includes/<?php echo $rows['imgloc']; ?>" title="<?php echo $rows['imgloc'] ?>" alt="<?php echo $rows['title'] ?> poster"/></td>
        <td><?php echo "<a href='movie.php?movie=".$rows['title']."'><div>
                        <h3>".$rows['title']."</h3></div>";?></td>
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
<style>
  body{
    background:  #020d18;
  }
  h1{
        margin: 50px;
    }
    table{
        margin: 50px;
    }

    .poster{
        margin:0;

    }
    td{
        padding:5px; 
    }
    a{
        color: white;
        text-decoration: none;
    }
</style>
</html>