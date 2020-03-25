<?php
require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>MovieDB</title>
  <link rel="stylesheet" type="text/css" href="stylemain.css">
  <script src="myscripts.js"></script>
</head>
<body>
<div class="container2" style=" margin-bottom: 20px; margin-left: 70px;
      margin-right: 70px;
      margin-top: 20px;">
  <ul class="gallery">
    <li>
      <div class="flip">
        <div class="front-side"></div>
        <div class="back-side">
          <a href="movie.php?movie=Greyhound%20(2020)">
            <div class="content">
              <div class="loader"></div>
              <div class="text">
                <h3>Greyhound (2020)</h3>
                <p>Early in World War II, an inexperienced U.S. Navy captain must lead an Allied convoy being stalked by Nazi U-boat wolfpacks.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li>
      <div class="flip">
        <div class="front-side"></div>
        <div class="back-side">
          <a href="movie.php?movie=Soul%20(2020)">
            <div class="content">
              <div class="loader"></div>
              <div class="text">
                <h3>Soul (2020)</h3>
                <p>A musician who has lost his passion for music is transported out of his body and must find his way back with the help of an infant soul learning about herself.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li>
      <div class="flip">
        <div class="front-side"></div>
        <div class="back-side">
          <a href="movie.php?movie=Black%20Widow%20(2020)">
            <div class="content">
              <div class="loader"></div>
              <div class="text">
                <h3>Black Widow (2020)</h3>
                <p>A film about Natasha Romanoff in her quests between the films Civil War and Infinity War.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </li>
  </ul>
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
</style>

</html>