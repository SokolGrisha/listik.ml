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
<body>
<div class="userpage"><?php
    error_reporting(E_ERROR | E_PARSE);
    $ans=explode(",",file_get_contents("index.txt"));
    $test=[];
    for ($i=0; $i < count($ans); $i++) {
        if(in_array($test,$ans[$i])==False&&$ans[$i]!=""){
            array_push($test,$ans[$i]);
            $con=file_get_contents("story/".$ans[$i].".txt");
            if(isset(explode("≟",($con))[1])&explode("≟",($con))[0]=="admin"){$con=explode("≟",($con))[1];
                echo '<div id="point">'.substr($con,0,44).'<a href="/story/'.$ans[$i].'.html">...</a></div>';}
        }
    }
    ?></div>

<div class="navbar-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="text-align: center" onclick="window.location='/'">🏠</div>
        </div>
        <div class="row">
            <div class="col" style="text-align: center">admin</div>
        </div>
    </div>
</div>

<div class="navbar-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="text-align: left" onclick="window.location='/map.php'">🗺</div>
            <div class="col" style="text-align: center" onclick="window.location='./story/'">+</div>
            <div class="col" style="text-align: right" onclick="window.location='/user/'">👤</div>
        </div>
    </div>
</div>
</body>
</html>