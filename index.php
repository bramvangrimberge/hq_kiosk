<?php

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

require_once 'vendor/autoload.php';

$fb = new Facebook([
    'app_id' => '2165962120350688',
    'app_secret' => '94a9fa41a3fd338787f5454359cb9e24',
    'default_graph_version' => 'v3.1',
]);

try {
    // Returns a `FacebookFacebookResponse` object
    $response = $fb->get(
        '/me?fields=events',
        'EAAex7lrHyZBABALHJPkLjKX76Xt1v5DYp0GMLdGBOHKaue6lpvZCVZBs6VFzYti6OKT9qcH86UZA5UTXebyct38HjFaOOAZA9UdZCreJdpSQCbNZCDZBd67MwV5gYibOce9HDaSGwJiZCNJoFuZBMkNyPZByiWMtj3QtJOwaTOV8MQ2YfkdlHeBmP1ByfLMrBUtSjIZD'
    );
} catch (FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
$graphNode = $response->getGraphNode();
$json = json_decode($graphNode->asJson());

?>

<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script defer src="js/jquery-3.3.1.min.js"></script>
    <script defer src="js/material.min.js"></script>
    <script defer src="js/slideshow.js"></script>
</head>
<body>

<div id="slideshow">
    <div class="slide-container" style="background: url('assets/img/slide_new.jpg') center / cover;">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--stretch slide-title">
                <h1>Nieuw in de club?</h1>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--stretch slide-content">
                <h3>Welkom! Vraag je <strong>gratis</strong> 3-beurten kaart aan de toog. Zij geven je ook graag meer
                    informatie over de werking van de club.</h3>
            </div>
        </div>
    </div>
    <div class="slide-container" style="background: url('assets/img/other_slide.jpg') center / cover;">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--stretch slide-title">
                <h1>Evenementen</h1>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--stretch slide-content">
               <ul>
                <?php foreach($json->events as $event): ?>
                   <li><?php echo $event->name ?></li>
                <?php endforeach; ?>
               </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>