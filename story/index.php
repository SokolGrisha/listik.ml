<!DOCTYPE html>
<html>
<head>
    <title>TS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/static/b-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="/static/b-grid.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index.css">
    <script type="text/javascript" src="/static/index.js"></script>
</head>
<body onload="document.getElementsByTagName('p')[0].focus()">
<?php error_reporting(E_ERROR | E_PARSE); session_start(); if(isset($_SESSION["u"])){echo '<username>'.$_SESSION["u"].'</username>';} ?>
<div><p contenteditable="true" id="story"></p></div>

<div class="navbar-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="text-align: center" onclick="window.location='/'">🏠</div>
        </div>
    </div>
</div>

<div class="navbar-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="text-align: left" onclick="window.location='/map.php'">🗺</div>
            <div class="col" style="text-align: center" onclick="send()">📢</div>
            <div class="col" style="text-align: right" onclick="window.location='/user/'">👤</div>
        </div>
    </div>
</div>
</body>
</html>