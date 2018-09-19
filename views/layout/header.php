<?php
require_once '../../vendor/autoload.php';
?>

<html>
<head>
    <link rel="stylesheet" href="../../css/material.min.css">
    <script src="../../js/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">HQ Kiosk</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
        </div>
      </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Evenementen</span>
            <nav class="mdl-navigation">
              <a class="mdl-navigation__link" href="<?php echo  './../event/index.php' ?>">Overzicht</a>
              <a class="mdl-navigation__link" href="<?php echo './../event/create.php' ?>">Nieuw evenement</a>
            </nav>
          </div>
        <main class="mdl-layout__content">
          <div class="page-content">

              <!-- Your content goes here -->

