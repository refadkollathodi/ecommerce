<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
}
$customerid = $_SESSION['id'];

$id = $_GET['edited'];

include ("conn.php");
$sql = "SELECT * FROM products WHERE product_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$price = $row['price'];
$p_image = $row['productimage'];
$p_name = $row['product_name'];



$cart_sql = "INSERT INTO carttable(userid, product_id, product_name, productimage,price) VALUES ('$customerid','$id','$p_name','$p_image','$price')";
$cart_result = mysqli_query($conn, $cart_sql);
if ($cart_result == true) {
    header("location: cart.php");
} else {
    echo "Couldn't add to cart";
}

?>