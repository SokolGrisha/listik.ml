<?php 
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['i'])) {
	if(file_exists("./story/".hash("crc32", $_POST['i']).".txt")==False&&hash("crc32", $_POST['i'])!="00000000"&&hash("crc32", explode("≟",$_POST['i'])[1])!="00000000"){
	file_put_contents("./story/".hash("crc32", $_POST['i']).".txt", $_POST['i']);
	$i=explode("≟", $_POST['i'])[1];
	$name=explode("≟", $_POST['i'])[0];
	file_put_contents("./story/".hash("crc32", $_POST['i']).".html", '
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
<body onload="document.getElementsByTagName(\'p\')[0].focus()">
<div><p id="story">Написал(а): '.$name.'<br>'.preg_replace("/≝/", "<br>", $i).'</p></div>

<div class="navbar-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="text-align: center" onclick="window.location=\'/\'">🏠</div>
        </div>
    </div>
</div>

<div class="navbar-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="text-align: left" onclick="window.location=\'/map.php\'">🗺</div>
            <div class="col" style="text-align: center" onclick="send()">📢</div>
            <div class="col" style="text-align: right" onclick="window.location=\'/user/\'">👤</div>
        </div>
    </div>
</div>
</body>
</html>');
	$ish=fopen("index.txt", "a");fwrite($ish, ",".hash("crc32", $_POST['i']));fclose($ish);
	echo "/story/".hash("crc32", $_POST['i']).".html";
}} ?>