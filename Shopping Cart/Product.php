<?php


class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    public function __construct(int $id, string $title, float $price, int $availableQuantity) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->Id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;
    }
    
    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        // $cartItem is dummy variable.
        // if cart is empty
        if (count($cart->getItems()) == 0){
            $cartItem = new CartItem($this->title, $quantity);
            $cart->setItems([$cartItem]);
        }
        else{ // cart is not empty
            // if product matches item in cart, increase quantity by 1
            foreach ($cart->getItems() as $item){
                
                if ($item->getProduct()->getId() == $this->getId()){
                    $cartItem = $item->getProduct()->increasedQuantity();
                    $cart->setItems([$cartItem]);
                }
            }
            // product doesn't match item in cart, add product to the cart array
            if (isset($cartItem) == false){
                $cartItem = new CartItem($this, $quantity);
                $cart->setItems(array_merge($cart->getItems(),[$cartItem]));
            }
        }
        
        return $cartItem;
        
    }

    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */
    public function removeFromCart(Cart $cart)
    {
        //TODO Implement method

    }
}