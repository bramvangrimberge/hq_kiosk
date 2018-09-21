<?php
require_once '../../vendor/autoload.php';
?>

<html>
<head>
    <script src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/custom.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar"
            aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse justify-content-md-center collapse" id="navbar" style="">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo './../event/index.php' ?>">Evenementen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo './../event/form.php' ?>">Nieuw evenement</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="p-3">

    <!-- Your content goes here -->

