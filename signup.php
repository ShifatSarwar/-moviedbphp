<?php
require "header.php";
require_once "includes/dbconnect.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);           
            $param_username = trim($_POST["username"]);
                        if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username already exists, please try something else";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 3){
        $password_err = "Password must have atleast 3 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>MovieDB Sign up</title>
</head>
<body>
	<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Create an account</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" style="color: black; padding-left: 20px; padding-right: 20px; font-weight: bold; padding-top: 5px; padding-bottom: 5px">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    

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
  .wrapper{
  	color: white;
  	margin-left: 20%;
  	margin-right: 20%;
  	margin-bottom: 5%;
  	margin-top: 5%;
  }
</style>

</html>