<?php

    $keyApi = "AIzaSyDN8q1BCYvEQ8lN6v7UXJX24Q4ReKZGy6o";  
    $IdCanal = "UC6MQScSFXELHjpYkddqYRbQ";
    $API_URL_TODAS_PLAYLIST = "https://www.googleapis.com/youtube/v3/playlists?part=%20snippet%2CcontentDetails&channelId=$IdCanal&maxResults=30&key=$keyApi";
    $todasPlaysList = json_decode( file_get_contents( $API_URL_TODAS_PLAYLIST ));
    $vetListPlayList = [];

    

    // Todos as playlistID do Canal Camara 
    foreach ($todasPlaysList->items as $key => $value){
        $dados=[];
        $dados['id'] = $value->id;
        $dados['dados'] = $value->snippet;
        array_push($vetListPlayList,$dados);
    }
  
    // Carrega um Array com todos os videos referente a uma determinada playlist
    $playListConteudo = [];
    $qtd = 10;
    for ($i = 0; $i < count($vetListPlayList); $i++) {
        $API_URL_LIST_PLAYLIST ="https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&playlistId=".$vetListPlayList[$i]['id']."&maxResults=$qtd&key=$keyApi";
        $playsListItens = json_decode( file_get_contents( $API_URL_LIST_PLAYLIST ));
        array_push($playListConteudo,$playsListItens);
    }

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

            <div class="container ">    
                <h1>Videos</h1>
                <?php
                // echo "<pre>";
                // print_r($playListConteudo[0]->items);
                // echo "<br>";
                for ($i = 0; $i < count($vetListPlayList); $i++){
                   
                    $Titulo = $vetListPlayList[$i]['dados']->title;
                    $PlayListID =$vetListPlayList[$i]['id'];
                    
                    // Definir nome da Playlist
                    $Nome = "Sessões Ordinárias 2020";
                    
                    // Condição responsavel por exibir os videos correspodente com o nome da PlayList
                    if($Titulo == $Nome ){
                        echo "<h3>$Titulo</h3>";
                        echo "<br>";
                    for ($j = 0; $j < count($playListConteudo[$i]->items); $j++){
                        if($PlayListID == $playListConteudo[$i]->items[$j]->snippet->playlistId ){
                            $id = $playListConteudo[$i]->items[$j]->snippet->resourceId->videoId;
                            echo "<h5>".$playListConteudo[$i]->items[$j]->snippet->title."</h5>";
                            echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$id' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                            echo "<br><br>";
                        }
                    }}
                    
                }
       
                ?>
            </div>
            
        </div>
    </body>
</html>

