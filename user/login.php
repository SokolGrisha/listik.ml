<?php
session_start();
if(isset($_POST["user"])&&isset($_POST["pass"])){
	if(isset($_POST["enter"])&&is_dir($_POST["user"])){
	if(hash("sha256",$_POST["pass"])==file_get_contents("./".$_POST["user"]."/pas.sha256"))
		$_SESSION["u"]=$_POST["user"];
	    echo "<script type=\"text/javascript\">window.location='./';</script>";
	}
	if(isset($_POST["sign"])&&is_dir($_POST["user"])==False){
		mkdir("./".$_POST["user"]);
        file_put_contents("./".$_POST["user"]."/index.php", "
        ".$_POST["user"]."
        ");
		file_put_contents("./".$_POST["user"]."/pas.sha256", hash("sha256",$_POST["pass"]));
		$_SESSION["u"]=$_POST["user"];
        echo "<script type=\"text/javascript\">window.location='./';</script>";
	}
}
  ?>