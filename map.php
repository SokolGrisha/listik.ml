
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
