<?php

namespace app\classes;

use app\database\models\Read;
use app\interfaces\CartInterface;

class CartsProducts
{


  

    public function producsts(CartInterface $cartInterface): array {
        $productsInCart = $cartInterface->cart();
        //$productsInDatabase = require(BASE_PATH."/helpers/products.php");
        $productsInDatabase = (new Read)->all('products');

        

        $products = [];
        $total = 0;

        foreach ($productsInCart as $productId => $quantity) {

            $product = [...array_filter($productsInDatabase, fn($product) =>
            (int)$product->id === $productId)];

            //$product = $productsInDatabase[$productId];
            $products[] = [
                'id' => $productId,
                'product' => $product[0]->name,
                'price' => $product[0]->price,
                'qty' => $quantity,
                'subtotal' => $quantity * $product[0]->price

            ];

            $total += $quantity * $product[0]->price;
        }

        return [
            'products' => $products,
            'total' => $total
        ];

    }
}
