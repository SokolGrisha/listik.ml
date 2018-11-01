<!DOCTYPE html>
<html>
<head>
	<?php session_start(); if(isset($_SESSION["u"])){echo '<script type="text/javascript">window.u="'.$_SESSION["u"].'"</script>';} ?>
	<title>Text-Stories</title>
	<meta charset="utf-8">
	 </head>
<style type="text/css">
	p{
		position: center;
		height: 100%;
		min-width: 10%;
		padding: 20% 0px 10px 10px;
		outline: none;
	-moz-appearance: none;
	overflow: none;
	}
	body{
		font-size: 42px;
	}
	li {
    list-style-type: none; /* Убираем маркеры */
   }
</style>
<script type="text/javascript">
	function send() {
a=document.getElementsByTagName("p")[0].innerHTML
hm_div=(a.split("<div>").length - 1)
hm_br=(a.split("<br>").length - 1)
hm_sdiv=(a.split("</div>").length - 1)

for(var i=0;i!=hm_div;i++){a=a.replace("<div>","\n")};
for(var i=0;i!=hm_br;i++){a=a.replace("<br>","")};
for(var i=0;i!=hm_sdiv;i++){a=a.replace("</div>","")};

// txt to deftxt
hm_rn=(a.split("\n").length - 1)
for(var i=0;i!=hm_div;i++){a=a.replace("\n","≝")};

// send txt
if(window.u==undefined){
var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
var xh = new XH();
xh.open('POST', "/text.php", true);
xh.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xh.send("i="+encodeURIComponent("none≟"+a))
xh.onload = function() {window.location=xh.responseText}
xh.onerror = function() {}}
else{
var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
var xh = new XH();
xh.open('POST', "/text.php", true);
xh.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xh.send("i="+encodeURIComponent(window.u+"≟"+a))
xh.onload = function() {window.location=xh.responseText}
xh.onerror = function() {}
}
}
</script>
<body onload="document.getElementsByTagName('p')[0].focus()">
<div><p contenteditable="true"></p></div>
<ui style="position: fixed; top: 0; height: 5%; width: 100%; background-color: white; border-bottom: 2px solid grey; padding-bottom: 30px;">
	<li style="display: inline-block; font-size: 100px" onclick="window.location='/'"><</li>
    </ui>

<ui style="position: fixed;bottom: 0; height: 5%; width: 100%; background-color: white; border-top: 2px solid grey; padding-bottom: 30px;">
	<li style="display: inline-block; font-size: 100px; margin-left: 1%;" onclick="window.location='map.php'">🗺</li>
	<li style="display: inline-block; margin-left: 30%; font-size: 100px; color: red;" onclick="send()">📢</li>
<li style="display: inline-block; margin-left: 25%; font-size: 100px" onclick="window.location='/user/'">👤</li>
    </ui>
</body>
</html>