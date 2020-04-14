<?php
require __DIR__ . '/vendor/autoload.php';

// if (php_sapi_name() != 'cli') {
//     throw new Exception('This application must be run on the command line.');
// }

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);

// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => true,
  'timeMin' => date('c'),
);
$results = $service->events->listEvents($calendarId, $optParams);
$events = $results->getItems();

// if (empty($events)) {
//     print "No upcoming events found.\n";
// } else {
//    // print "Upcoming events:\n";
//     foreach ($events as $event) {
//         $start = $event->start->dateTime;
//         if (empty($start)) {
//             $start = $event->start->date;
//         }
//         // Descrição
//         //print_r($event->getDescription());
//         $descricao = $event->getDescription();
//         // Titulo ou assunto
//        // print_r($event->getSummary());
//         $titulo = $event->getSummary();
//         //print_r($titulo);
//         print_r(`<p>Titulo: <b></b>."$titulo".</p><br>`);
//         echo `<p>Titulo: <b></b>."$titulo".</p><br>`;
//         // Criação
//        // print_r($event->getCreated());
//         //printf("%s (%s)\n", $event->getSummary(), $start);
        
        
        
//     }
// }

?>



<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Banco de Idéias</title>
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

            <div class="container col-md-10">
                <?php

                

                if (empty($events)) {
                    print "No upcoming events found.\n";
                } else {
                   // print "Upcoming events:\n";
                    foreach ($events as $event) {
                        $start = $event->start->dateTime;
                        if (empty($start)) {
                            $start = $event->start->date;
                        }
                        // Descrição
                        //print_r($event->getDescription());
                        $descricao = $event->getDescription();
                        // Titulo ou assunto
                       // print_r($event->getSummary());
                        $titulo = $event->getSummary();
                        
                        //print_r($titulo);
                        //print_r(`<p>Titulo: <b></b>."$titulo".</p><br>`);
                        //echo `<p>Titulo: <b></b>."$titulo".</p><br>`;
                        // Criação
                       // print_r($event->getCreated());
                        //printf("%s (%s)\n", $event->getSummary(), $start);
                        
                        
                        
                    }

                    echo "
                    <div class='form-row'>
                        <div class='form-group col-md-6'>
                            <label for='titulo'><b>Titulo: </b></label>
                                <input type='text' class='form-control' name='titulo' value='$titulo'>
                        </div>
                    </div> 
                    
                    <div class='form-row'>
                        <div class='form-group col-md-6'>
                        <label for='descricao'><b>Descrição: </b></label>
                            <textarea name='' id='' cols='30' rows='10' disabled>$descricao</textarea>
                        </div>
                    </div> 
                    ";
                }

                ?>
                <br>
            </div>

            <div class="container col-md-10">
                <label for="">Agenda</label>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titulo"><b>Titulo: </b></label>
                            <input type="text" class="form-control" name="titulo" value='$titulo'>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="data"><b>Data: </b></label>
                            <input type="date" class="form-control" name="data" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="hora"><b>Hora: </b></label>
                            <input type="time" class="form-control" name="hora" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="descricao"><b>Descrição: </b></label>
                            <textarea name="" id="" cols="30" rows="10" disabled></textarea>
                        
                    </div>
                </div>
            </div>
            

            <div class="container col-md-10">
                <br>

                
            </div>




        </div>

    </body>

</html>