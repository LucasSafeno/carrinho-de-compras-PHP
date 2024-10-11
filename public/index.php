<?php 
//Autoload
require "../vendor/autoload.php";

$products = require "../app/helpers/products.php";

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
    <ul>
        <?php foreach($products as $index => $product): ?> 
        <li> <?= $product['name'] ?> | R$ <?=number_format($product['price'],2,',','.')?></li><a href="add.php?id=<?=$index?>">add to cart</a>   
        <?php endforeach; ?>    
    </ul>    
    </div>


</body>

</html>