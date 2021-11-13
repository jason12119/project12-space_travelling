<?php
// include 'nav.php';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='keywords' content=''>
    <meta name='description' content=''>
    <meta name="robots" content="index, follow">
    <meta name='author' content='Petr Škvarček'>
    <link rel="icon" type="img/png" sizes="32x32" href="../img/favicon-32x32.png">
    <base href="http://localhost/"/>
    <title><?php echo $title; ?></title>

    

    <!-- App fonts -->
    <link href="dist/fonts/*" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Oswald:wght@200;300;400;500;600;700&family=Quattrocento&display=swap" rel="stylesheet"> 

    <!-- Frameworks css core -->
    <link href="dist/css/frameworks.css" rel="stylesheet">

    <!-- CSS -->
    <link href='css/style.css' rel='stylesheet'>
    <link href='css/responsive.css' rel='stylesheet'>
</head>
<body id="<?php echo $body; ?>-page">
<div class="overlay-dark"></div>
<div id="header">
<div class="grid-item header"><img id="logo" src="../img/shared/logo.svg" alt=""></div>
<div class="line grid-item header"></div>
<ul id="nav" class="grid-item header">
<div id="admiral">
        <span class="nav-line"></span>
        <span class="nav-line"></span>
        <span class="nav-line"></span>
    </div>
        <a href=""><li <?php if (
            $_GET['page'] == 'home' ||
            $_GET['page'] == ''
        ) {
            echo 'class="active"';
        } ?>><span>00</span>Home</li></a>
        <a href="destination/"><li <?php if ($_GET['page'] == 'destination') {
            echo 'class="active"';
        } ?>><span>01</span>Destination</li></a>
        <a href="crew/"><li <?php if ($_GET['page'] == 'crew') {
            echo 'class="active"';
        } ?>><span>02</span>Crew</li></a>
        <a href="technology/"><li <?php if ($_GET['page'] == 'technology') {
            echo 'class="active"';
        } ?>><span>03</span>Technology</li></a>
    </ul>
<div id="nav-tail" class="grid-item header"></div>
</div>



