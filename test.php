<?php

      $title="Black Widow (2020)";
      $json_url = "http://www.omdbapi.com/?apikey=d87b5a9a&t=";
    $arr = explode("(", $title, 2);
    $first = $arr[0];
    $first = preg_replace('/\s+/', '+', $first);

    $arr2=explode(")", $arr[1]);

    $json_url=$json_url.$first."&y=".$arr2[0];

    $json=file_get_contents($json_url);
    $data = json_decode($json);  
    $mID=$data->imdbID;
  
    $urlpart1="http://api.themoviedb.org/3/movie/";
    $urlpart2="?api_key=d30ff0891a088e06e97d6cd1130b97e1&append_to_response=videos";
    $json_url2=$urlpart1.$mID.$urlpart2;
    $json2=file_get_contents($json_url2);
    $data2 = json_decode($json2);
    $vID=$data2->videos->results;
    $vIDCount=count($vID);
    $countjson=0;




?>