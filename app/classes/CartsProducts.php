<?php

namespace app\classes;

use app\interfaces\CartInterface;

class CartsProducts
{


  

    public function producsts(CartInterface $cartInterface): array {
        $productsInCart = $cartInterface->cart();
        $productsInDatabase = require(BASE_PATH."/helpers/products.php");

        $products = [];
        $total = 0;

        foreach ($productsInCart as $productId => $quantity) {
            $product = $productsInDatabase[$productId];
            $products[] = [
                'id' => $productId,
                'product' => $product['name'],
                'price' => $product['price'],
                'qty' => $quantity,
                'subtotal' => $quantity * $product['price']

            ];

            $total += $quantity * $product['price'];
        }

        return [
            'products' => $products,
            'total' => $total
        ];

    }
}
