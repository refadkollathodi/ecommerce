<?php
include ("conn.php");
session_start();

$id = $_GET['edited'];
$sql = "SELECT * FROM products where product_id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$price = $row['price'];
$p_image = $row['productimage'];
$p_name = $row['product_name'];


?>
<div class="wrapper">
    <div class="group">
        <table>
            <tr>
                <td class="item-img"><img src="<?php echo $row['productimage']; ?>"></td>
                <td class="item-details">
                    <span class="item-title"><?php echo $row['product_name']; ?></span>
                    <span class="item-size">Size:</span>
                    <span class="item-qty">Quantity: 1</span>
                </td>
                <td class="item-price"><?php echo $row['price']; ?></td>
            </tr>
            <tr>


        </table>
    </div>
    <?php
    $total = $row['price'] + 49;
    ?>
    <div class="divider"></div>
    <table>
        <tr>
            <td class="item-qty">Subtotal</td>
            <td class="item-price"><?php echo $row['price']; ?></td>
        <tr>
        <tr>
            <td class="item-qty">Shipping</td>
            <td class="item-price">49</td>
        <tr>
        <tr>
            <td style="font-size:17px;" class="item-qty">Total</td>
            <td style="font-size:17px;" class="item-price"><?php echo $total ?></td>
        <tr>

    </table>

    <div class="group">
        <button id="confirm-btn">Confirm Order</button>
    </div>
</div>

<style>
    ::selection {
        color: #FFFFFF;
        background-color: #31285C;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        list-style: none;
        text-decoration: none;
    }

    body {
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        scroll-behaviour: smooth;
        flex-direction: column;
        margin: 20px 0;
    }


    .wrapper {
        width: 340px;
        min-height: 10px;
        background-color: #CACACA;
        border-radius: 10px;
        padding: 0 30px;
        padding-top: 10px;
        padding-bottom: 20px;
        font-weight: 500;
        font-size: 15px;
    }

    .wrapper:hover {
        box-shadow: 5px 13px 25px #9c9a9a;
    }

    .footer {
        margin-top: 20px;
        font-weight: 500;
        font-size: 1rem;
    }

    .footer a {
        color: #31285C;
    }

    button {
        width: 100%;
        height: 45px;
        border-radius: 10px;
        color: black;
        font-weight: 600;
        outline: none;
        font-size: .9rem;
        background-color: transparent;
        border: none;
        border: 1px solid black;
    }

    button:hover {
        background-color: black;
        color: #fff;
    }

    .group {
        margin: 10px 0;
    }

    table {
        width: 100%;
    }

    .item-img img {
        width: 5rem;
        height: 5rem;
        border-radius: 10px;
    }

    .item-details {
        padding: 5px;
        display: flex;
        flex-direction: column;
    }

    .item-details .item-title {
        color: #000;
        font-weight: 600;
        text-transform: uppercase;

    }

    .item-details .item-size,
    .item-qty {
        color: #AAA8BB;
        font-weight: 500;
        font-size: 14px;
    }

    .item-price {
        font-weight: 600;
        text-align: right;
    }

    .divider {
        width: 100%;
        height: .5px;
        background-color: black;
        margin: 10px 0;
    }

    #confirm-btn {
        cursor: pointer;
    }