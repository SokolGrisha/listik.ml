<?php
session_start();
if(isset($_POST["user"])&&isset($_POST["pass"])){
    if($_POST["user"]!="anon") {
        if (isset($_POST["enter"])) {
            if(is_dir($_POST["user"])){
                if (hash("sha256", $_POST["pass"]) == file_get_contents("./" . $_POST["user"] . "/pas.sha256")){
                    $_SESSION["u"] = $_POST["user"];
                    echo "True";
                }
                else{
                    echo "E: password";
                }
            }
            else{
                echo "E: nick";
            }
        }
        if (isset($_POST["sign"])) {
            if (is_dir($_POST["user"]) == False) {
                mkdir("./" . $_POST["user"]);
                $
                file_put_contents("./" . $_POST["user"] . "/pas.sha256", hash("sha256", $_POST["pass"]));
                $_SESSION["u"] = $_POST["user"];
                echo "True";
            } else {
                echo "E: nick taken";}
        }
    }
    else{
        echo "E: anon";
    }
}
?>