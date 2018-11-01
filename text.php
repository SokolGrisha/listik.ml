<?php 
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['i'])) {
	if(file_exists("./story/".hash("crc32", $_POST['i']).".txt")==False&&hash("crc32", $_POST['i'])!="00000000"&&hash("crc32", explode("≟",$_POST['i'])[1])!="00000000"){
	file_put_contents("./story/".hash("crc32", $_POST['i']).".txt", $_POST['i']);
	$i=explode("≟", $_POST['i'])[1];
	file_put_contents("./story/".hash("crc32", $_POST['i']).".html", '
<!DOCTYPE html>
<html>
<head>
	<title>Text-Stories</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="static/b-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="static/b-grid.min.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	<script type="text/javascript" src="index.js"></script>

</head>
<body onload="ol()">
<div><p>'.preg_replace("/≝/", "<br>", $i).'</p></div>

<ui style="position: fixed; top: 0; height: 5%; width: 100%; background-color: white; border-bottom: 2px solid grey; padding-bottom: 30px; text-align: center;">
	<a href="/" style="font-size: 100px">🏠</a>
    </ui>

<ui style="position: fixed;bottom: 0; height: 5%; width: 100%; background-color: white; border-top: 2px solid grey; padding-bottom: 30px;">
	<li style="display: inline-block; font-size: 100px; margin-left: 1%;" onclick="window.location='."'map.php'".'">🗺</li>
	<li style="display: inline-block; margin-left: 31.5%; font-size: 100px; color: red;" onclick="window.location='."'/story/'".'">+</li>
<li style="display: inline-block; margin-left: 30%; font-size: 100px" onclick="window.location='."'/user/'".'">👤</li>
    </ui>
</body>
</html>');
	$ish=fopen("index.txt", "a");
	fwrite($ish, ",".hash("crc32", $_POST['i']));
	fclose($ish);
	echo "/story/".hash("crc32", $_POST['i']).".html";
}} ?>