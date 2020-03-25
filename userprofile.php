<?php
require "header.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "includes/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User profile</title>

</head>
<body>
<?php
$user = "";
$sql = "SELECT username FROM users";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    while($row = mysqli_fetch_array($result)) {
        if($_SESSION["username"]  === $row["username"]){
            $user = $row["username"];
        }
    }
}
?>
    <div class="page-header">
        <h1><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>'s Profile</h1>
    <p><a href="userratings.php">Your ratings</a>.</p>
    <p>Change Password? <a href="changepass.php">Click here</a>.</p>
    <p><a href="includes/logout.php">Sign out</a>.</p>
</div>
    </body>
    <footer style="color: white">
  <div class="foot">
      <?php require "footer.php"; ?>
  </div>
</footer>
<style type="text/css">
        body{ font: 14px sans-serif;

            background:  #020d18;
         }
        .page-header{
            color: white;
            padding: 30px;
        }
    </style>
</html>