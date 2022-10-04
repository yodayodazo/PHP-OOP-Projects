<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    public function getItems(){
        return $this->items;
    }

    public function setItems(array $items){
        $this->items = $items;
    }
    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        // $cartItem is dummy variable.
        if (count($this->items) == 0){
            $cartItem = new CartItem($product, $quantity);
            self::setItems([$cartItem]);
        }
        else{
            // find product in cart
            foreach ($this->items as $item){
                if ($item->getProduct()->getId() === $product->getId()){
                    $cartItem = $item->increaseQuantity();
                }
            }
            if (isset($cartItem) == false){
                $cartItem = new CartItem($product, $quantity);
                self::setItems(array_merge(self::items,[$cartItem]));
            }
        }
        
        return $cartItem;
        
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        // $cartItem is dummy variable.
        if (count($this->items) == 0){
            echo "Shopping cart is empty.";
        }
        else{
            // find product in cart
            foreach ($this->items as $item){
                if ($item->getProduct()->getId() === $product->getId()){
                    $cartItem = $item->decreaseQuantity();
                }
            }
        }
        
        return $cartItem;
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $count = 0;
        foreach ($this->items as $item){
            $count += $item->getQuantity();
        }
        return $count;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $sum = 0;
        foreach ($this->items as $item){
            $sum += $item->getProduct()->getPrice() * $item->getQuantity()  ;
        }
        return $sum;
    }
}