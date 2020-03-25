<?php
  include_once 'includes/dbconnect.php';
  require 'header.php';

  $mtitle = $_GET["movie"]; 
  $sql="Select * FROM movies WHERE title ='$mtitle';";
  $result=mysqli_query($link, $sql);
  $resultCheck=mysqli_num_rows($result);
  if($resultCheck>0) {
      $rows=mysqli_fetch_assoc($result);
      $title=$rows['title'];
      $year=$rows['year'];
      $synopsis=$rows['synopsis'];
      $posterloc=$rows['imgloc'];
  }
    $_SESSION["title"] = $title;
    $_SESSION["imgloc"] = $posterloc;
    $sql2 = "SELECT id FROM watchlist WHERE username = '$username' AND title='$title';";
    $result2=mysqli_query($link, $sql2);
    $resultCheck2=mysqli_num_rows($result2);
    $inwatchlist="includes/addtolist.php?movie=$title";
    $mainval="Add to Watchlist";
    if($resultCheck2>0) {
      $inwatchlist="includes/removefromlist.php?movie=$title";
      $mainval="Remove From Watchlist";
    }

    $sql3="SELECT * FROM reviews WHERE title='$mtitle';";
    $avgRate="N/A";
    $count=0;
    $result3=mysqli_query($link, $sql3);
    $queryResult3=mysqli_num_rows($result3);
    if($queryResult3>0) {
      $avgRate=0;
      while($rows=$result3->fetch_assoc()) {
        $cVal=$rows['userrating'];
        echo $cVal;
        $avgRate=$avgRate+$cVal;
        $count=$count+1;
      }
      $avgRate=$avgRate/$count;
    }

    $json_url = "http://www.omdbapi.com/?apikey=d87b5a9a&t=";
    $arr = explode("(", $mtitle, 2);
    $first = $arr[0];
    $arr2=explode(")", $arr[1]);
    $first = preg_replace('/\s+/', '+', $first);
    $arr2=explode(")", $arr[1]);
    $json_url=$json_url.$first."&y=".$arr2[0];
    $json=file_get_contents($json_url);
    $data = json_decode($json);  
    $mID=$data->imdbID;
    $imdbRate=$data->imdbRating;
    $imdbVotes=$data->imdbVotes;


    $urlpart1="http://api.themoviedb.org/3/movie/";
    $urlpart2="?api_key=d30ff0891a088e06e97d6cd1130b97e1&append_to_response=videos";
    $json_url2=$urlpart1.$mID.$urlpart2;
    $json2=file_get_contents($json_url2);
    $data2 = json_decode($json2);
    $vID=$data2->videos->results;
    $vIDCount=count($vID);
    $countjson=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />    
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pagestyle.css">
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/plugins2.js"></script>
    <script src="js/custom.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      </div>
    </div>
  </div>
</div>
<div class="page-single movie-single movie_single">
  <div class="container">
    <div class="row ipad-width2">
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="movie-img sticky-sb">
          <img  class="poster" height="500px"  src="includes/<?php echo $posterloc; ?>" title="<?php echo $posterloc ?>" alt="<?php echo $title ?> poster"/>
          <div class="movie-btn"> 
            <div class="btn-transform transform-vertical red">
              <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
              <div id="youtubelinks"><a href="#" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
            </div>
            <div class="btn-transform transform-vertical">
              <div><a href="<?php echo $inwatchlist; ?>" class="item item-1 yellowbtn"><i class="ion-card"></i>
                <?php echo $mainval; ?>
              </a></div>
              <div><a href="<?php echo $inwatchlist; ?>" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="movie-single-ct main-content">
          <h1 class="bd-hd"><?php echo $title ?></h1>
          <div class="movie-rate">
            <div class="rate">
              <i class="ion-android-star"></i>
              <p><span><?php echo strval($avgRate); ?></span> /10<br>
                <span class="rv"><?php echo strval($count); ?></span>
              </p>
            </div>
            <div class="rate-star">
              <p>More Information on:  </p>
            <div class="imdbButton"><a href = "https://www.imdb.com/title/<?php echo $mID; ?>" target
            ="_blank">IMDB</a></div>
            </div>
          </div>
          <div class="movie-tabs">
            <div class="tabs">
              <ul class="tab-links tabs-mv">
                <li class="active"><a href="#overview">Synopsis</a></li>            
              </ul>
                <div class="tab-content">
                    <div id="overview" class="tab active">
                        <div class="row">
                          <div class="col-md-8 col-sm-12 col-xs-12">
                            <p><?php echo $synopsis ?></p>
                         
                    <div class="title-hd-sm">
                        <a href="reviewlist.php?movie=<?php echo $mtitle; ?>" class="time">See All Reviews <i class="ion-ios-arrow-right"></i></a>
                      </div>
                                                </div>
                          <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="sb-it">
                              <h6>Release Date:</h6>
                              <p><?php echo $year; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="bg-modal" id="bg-modal">
  <div class="modal-content" id="modal-content">
    <div class="close" id="close">+</div>
    <h2><?php echo $mtitle; ?></h2>
    <?php
      while($countjson<$vIDCount) {
        $currentID= $vID[$countjson]->key;
        $countjson=$countjson+1;
     ?>
     <div>
     <p><?php echo "<a href='https://www.youtube.com/watch?v=".$currentID."' target='_blank'>
     <div>   
        <h3>Trailer ".$countjson."</h3>
      </div>";
      ?>
      </p>
     </div>
     <hr>
     <?php
   }
   ?>
  </div>
</div>
<div class="foot">
  <?php require "footer.php"; ?>
    
</div>
<!-- footer section-->
</body>
<style type="text/css">
  tr,
  img {
    page-break-inside: avoid;
  }
  img {
    max-width: 100% !important;
  }
      .bg-modal {
  background-color: rgba(0, 0, 0, 0.8);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  display: none;
  justify-content: center;
  align-items: center;
}
    .modal-content{
      width: 500px;
      height: 400px;
      background-color: white;
      border-radius: 4px;
      text-align: center;
      padding: 20px;
      position: relative;
    }
  .close{
      color: black;
      position: absolute;
      top: 0;
      right:14px;
      font-size: 42px;
      transform:rotate(45deg);

    }
    .imdbButton{
      background: yellow;
      font-weight: bold;
      padding: 5 30 5 30;
      cursor: pointer;
    }
    a{
      text-decoration: none;
    }
    a:visited{
  color:black;
}
</style>
<script type="text/javascript">
  document.getElementById('youtubelinks').addEventListener('click', 
    function() {
      document.getElementById('bg-modal').style.display='flex';
  }) ;

  document.getElementById('close').addEventListener('click', 
    function() {
      document.getElementById('bg-modal').style.display='none';
  }) ;
</script>
</html>