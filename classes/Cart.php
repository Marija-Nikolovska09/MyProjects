<?php

namespace MyApp;

class Cart {
    private $cartItems = [];

    public function addToCart($item) {
        array_push($this->cartItems, $item);
    }

    public function printReceipt() {
        if(count($this->cartItems) != 0) {
            $sum = 0;
            foreach($this->cartItems as $cartItems) {
                $extension = '';
                if($cartItems['item']->getSellingByKg())
                {
                    $extension = "kg";
                }
                else
                {
                    $extension = "gunny sacks";
                }

                echo "{$cartItems['item']->getName()} | {$cartItems['amount']} $extension | {$cartItems['item']->getPrice()} denars <br>";

                $sum += $cartItems['item']->getPrice();
            }
            echo "Final price amount: $sum denars";
        } else{
            return "Your cart is empty.";
        }

    }
}