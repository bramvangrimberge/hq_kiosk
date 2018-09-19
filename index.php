<?php

require_once 'vendor/autoload.php';

$db = new \Bram\DBConnection();
$connection = $db->getConnection();

//foreach($json->events as $event) {
//    $time = strtotime($event->start_time->date);
//    if($time > time()) {
//        array_push($filteredEvents, $event);
//    }
//}

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
<!--               <ul>-->
<!--                --><?php //foreach($filteredEvents as $event): ?>
<!--                   <li>--><?php //echo $event->name ?><!--</li>-->
<!--                --><?php //endforeach; ?>
<!--               </ul>-->
            </div>
        </div>
    </div>
</div>
</body>
</html>