<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return $this->product;
    }
    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    
    public function increaseQuantity($amount = 1)
    {

        // $quantity += 1;

        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
        if ($this->quantity + $amount > $this->product->getAvailableQuantity()) {
            echo "We only have ".$this->quantity." available, cannot increase quantity. <br>";
        }
        else {
            $this->quantity += $amount;
        }
    }

    public function decreaseQuantity($amount = 1)
    {

        // Bonus: Quantity must not become less than 1
        if ($this->quantity < $amount) {
            echo "Quantity must not be less than 0, cannot decrease quantity. <br>";
        }
        else {
            $this->quantity -= $amount;
        }
    }
}