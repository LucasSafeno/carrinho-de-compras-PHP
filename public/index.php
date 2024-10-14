<?php

use app\classes\Cart;

session_start();


//Autoload
require "../vendor/autoload.php";

$products = require "../app/helpers/products.php";

$cart = new Cart;

//$cart->remove();
//$cart->clear();
$cart->dump();

$productsInCart = $cart->cart();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <title>Cart</title>
</head>

<body>

    <div id="container">
        <h3>Cart : <?= count($productsInCart)?> | <a href="cart.php">Go to Cart</a> </h3>
    <ul>
        <?php foreach($products as $index => $product): ?> 
        <li> <?= $product['name'] ?> | R$ <?=number_format($product['price'],2,',','.')?></li><a href="add.php?id=<?=$index?>">add to cart</a>   
        <?php endforeach; ?>    
    </ul>    
    </div>


</body>

</html>