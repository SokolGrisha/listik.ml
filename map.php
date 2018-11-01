<!DOCTYPE html>
<html>
<head>
	<title>Text Talk Story</title>
	<meta charset="utf-8">
	<style type="text/css">
			#main{
		position: center;
		height: 100%;
		min-width: 10%;
		padding: 20% 0px 20% 10px;
	}
	body{
		font-size: 42px;
	}
	li {
    list-style-type: none; /* Убираем маркеры */
   }
   #point{
   	padding-top: 5%;
   	padding-left: 5%;
   }
	</style>
	<script type="text/javascript" src="static/map.js"></script>
</head>
<body onload="">
<div id="main">
<?php
error_reporting(E_ERROR | E_PARSE);
$ans=explode(",",file_get_contents("index.txt"));
$test=[];
for ($i=0; $i < count($ans); $i++) { 
	if(in_array($test,$ans[$i])==False&&$ans[$i]!=""){
		array_push($test,$ans[$i]);
			$con=file_get_contents("story/".$ans[$i].".txt");
			if(isset(explode("≟",($con))[1])){$con=explode("≟",($con))[1];}
		echo '<div id="point">'.substr($con,0,44).'<a href="/story/'.$ans[$i].'.html">...</a></div>';
	}
}
 ?>
</div>

<ui style="position: fixed; top: 0; height: 5%; width: 100%; background-color: white; border-bottom: 2px solid grey; padding-bottom: 30px;">
	<li style="display: inline-block; font-size: 100px" onclick="window.location='/'"><</li>
    </ui>

<ui style="position: fixed;bottom: 0; height: 5%; width: 100%; background-color: white; border-top: 2px solid grey; padding-bottom: 30px;">
	<li style="display: inline-block; margin-left: 47.4%; font-size: 100px; color: red;" onclick="window.location='./story/'">+</li>
<li style="display: inline-block; margin-left: 30%; font-size: 100px" onclick="window.location='/user/'">👤</li>
    </ui>
</body>
</html>