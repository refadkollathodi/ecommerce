<?php
include ("conn.php");
$id=$_GET['edited'];
$sql="DELETE from carttable where product_id=$id";
mysqli_query($conn,$sql);
header("location:cart.php");
?>