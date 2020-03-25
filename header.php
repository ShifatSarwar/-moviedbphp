<?php
  session_start(); 
  if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){
    $username=$_SESSION["username"];
  } else{
    $username="Sign in";
  }
?>

<html>
<head>
</head>
<body>
 <form name="search_form" action="search.php" method="POST">
  <nav class="navbar">
    <a href="index.php"><img class="logo" src="logo.png"></a>

    <ul>
      <li><input style="width: 300px; padding: 3px;" type="text" name="search" id="search" placeholder="Search Movies and TV Shows"></li>
      <li><input type="submit" id="searchbtn" name="searchbtn" value="Search"/></li>
      <li><a href="watchlist.php">Watchlist</a></li>
      <li><a href="login.php"><?php echo $username; ?></a></li>
    </ul>
  </nav>
</form>
</body>
<style>
  @import url('https://fonts.googleapis.com/css?family=Roboto:700&display=swap');
*{
  padding:0;
  margin:0;
}

.navbar{
  height: 80px;
  width: 100%;
  background: black;
}
.logo{
  padding-top: 10px;
  width: 140px;
  height: auto;
}
.navbar ul{
  margin-top: 20px;
  float: right;
  margin-right: 20px;
}
.navbar ul li{
  list-style: none;
  margin: 0 8px;
  color: white;
  display: inline-block;
}
.navbar ul li a{
  text-decoration: none;
  color:white;
  font-size: 20px; 
  font-family: 'Roboto',sans-serif;
  padding: 6px 13px;  
  transition: .4s;
}
.navbar ul li a.active,
.navbar ul li a:hover{
  background: #cc0000;
  border-radius: 2px;

}


  #searchbtn{
  background:  #cc0000;
  text-decoration: none;
  color: white;
  font-size: 12px; 
  font-family: 'Roboto',sans-serif;
  padding: 6px 13px;
  border-color: #cc0000; 
}
  </style>
</html>