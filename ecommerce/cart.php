<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
?>
<h1 id="cart-head">CART</h1>
<?php
include ("conn.php");

if (!isset($_SESSION['id'])) {
    header("location:login.php");
}

$result = "SELECT * from carttable WHERE userid='$id'";
$result = mysqli_query($conn, $result);
$number = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);


?>
<div class="cart-product">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="product">
            <img src="<?php echo $row['productimage']; ?>" alt="">
            <div class="product-info">

                <h4 class="product-title">
                    <?php echo $row['product_name']; ?>
                </h4>
                <p class="product-price"><?php echo $row['price']; ?></p>
                <a href="checkout.php?edited=<?php echo $row['product_id']; ?>" class="product-btn">buy now</a>
                <a href="delete.php?edited=<?php echo $row['product_id']; ?>" class="product-btn">delete</a>

            </div>
        </div>
        <?php
    }
    ;
    ?>

</div>