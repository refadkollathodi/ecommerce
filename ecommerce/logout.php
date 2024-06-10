<?php
include ("conn.php");
session_start();
$logout=session_destroy();
if($logout==true){
    header("location:index.php");
}else{
    echo "couldn't logout";
}
?>