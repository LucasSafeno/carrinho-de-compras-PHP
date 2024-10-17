<?php

namespace app\classes;

use app\interfaces\CartInterface;

class CartsProducts
{


    public function __construct(private CartInterface $cartInterface){
        $this->cartInterface = $cartInterface;
    } // construct

    public function producsts(): array {
        $productsInCart = $this->cartInterface->cart();
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
