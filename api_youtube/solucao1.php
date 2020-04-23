<?php

    $key = "AIzaSyDN8q1BCYvEQ8lN6v7UXJX24Q4ReKZGy6o";    
    $API_URL ="https://www.googleapis.com/youtube/v3/activities?part=snippet%2CcontentDetails&channelId=UC6MQScSFXELHjpYkddqYRbQ&maxResults=30&key=".$key;
    $videos = json_decode( file_get_contents( $API_URL ));
    // echo "<pre>";
    // print_r($videos);
    // https://www.youtube.com/watch?v=[videoId]
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Video Camara</title>
        <base href="/">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

        <div class="container">
            <!-- Container resposavel por exibir os eventos de hoje -->
            <div class="container ">    
                <h2>Videos</h2>
                <?php
                //Vetor de ID de Videos
                $VideosID = [];

                foreach ($videos->items as $key => $value) {
                  
                  
                  //Pegar titulo
                  //print_r($value->snippet->title);echo"<br>";

                  // Pegar Data
                  //print_r($value->snippet->publishedAt);echo"<br>";

                  // Pega Imagen
                  //print_r($value->snippet->thumbnails->default->url);echo"<br>";

                  //Pega ID
                  // print_r($value->contentDetails->upload->videoId);echo"<br>";
                  

                  array_push($VideosID,$value->contentDetails->upload->videoId);

                }
                for ($i = 0; $i < count($VideosID); $i++) {
                  $Id = $VideosID[$i];
                  echo "<br>";
                  echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$Id' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                  echo "<br>";
                  }
                
                ?>
            </div>
            
        </div>
    </body>
</html>

