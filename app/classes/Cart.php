<?php

namespace app\classes;

use app\interfaces\CartInterface;

class Cart implements CartInterface
{

    public function add($product): void
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        (!isset($_SESSION['cart'][$product])) ?
            $_SESSION['cart'][$product] = 1 :
            $_SESSION['cart'][$product] += 1;
    } //  add
    public function remove($product): void
    {
        if (isset($_SESSION['cart'][$product]))
        {
            unset($_SESSION['cart'][$product]);
        }
    } // Remove
    public function quantity($product, $quantity): void
    {
        if (isset($_SESSION['cart'][$product])) {
            if ($quantity === 0 || $quantity === '') {
                $this->remove($product);
                return;
            }
            $_SESSION['cart'][$product] = $quantity;
        }
    }
    public function clear()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    } // clear
    public function cart(): mixed
    {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
        return [];
    } //cart

    /**
     * @return [type]
     */
    public function dump(): void
    {
        if (isset($_SESSION['cart'])) {
            var_dump($_SESSION['cart']);
        }
    } // dump

}
