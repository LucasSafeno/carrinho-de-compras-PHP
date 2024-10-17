<?php
use app\classes\Cart;
use app\classes\CartsProducts;

session_start();

require "../vendor/autoload.php";


$cartProduct = new CartsProducts(new Cart);

$products = $cartProduct->producsts();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <title>Cart</title>

        <!-- CSS !-->
        <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <h2>Cart | <a href="/">Home</a></h2>
    <hr>

    <div id="container">
        <?php if(count($products['products']) <= 0 ): ?>

            <h3>Nenhum Produto no carrinho de compras</h3>
       <?php else:  ?>
        <ul>
            <?php foreach($products['products'] as $product): ?>
                <li class="cart-product">
                    <?php echo $product['product'] ?>
                    <form action="quantidade.php" method="GET">
                        <input type="text" name="qty" id="cart-input-qty" value="<?= $product['qty']?>">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    </form> x R$ <?= number_format($product['price'], 2,',','.') ?> | R$ <?= number_format($product['subtotal'], 2,',','.') ?> 
                   | <a href="remove.php?id=<?=$product['id']?>" id="cart-remove">Remove</a>
                </li>

            <?php endforeach ?>
        </ul>
        <div id="cart-total-clear">
            <span id="cart-total">
                Total : R$ <?= number_format($products['total'], 2, ",", ".") ?>
            </span>
            <span id="cart-clear">
                <a href="clear.php">Clear cart</a>
            </span>
        </div>
       <?php endif; ?>
    </div>


</body>

</html>