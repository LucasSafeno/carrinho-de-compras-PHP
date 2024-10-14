<?php
use app\classes\Cart;
use app\classes\CartsProducts;

session_start();

require "../vendor/autoload.php";


$cartProduct = new CartsProducts(new Cart);


var_dump($cartProduct->producsts());
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <title>cart</title>
</head>

<body>

    <h2>Cart | <a href="/">Home</a></h2>
    <hr>

    <div id="container">

    </div>


</body>

</html>