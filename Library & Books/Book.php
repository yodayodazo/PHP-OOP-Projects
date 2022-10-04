<?php


class Book
{
    public string $title;
    public float $price;
    public Author $author;

    public function getTitle(){
        return $this->title;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setAuthor($author){
        $this->author = $author;
    }

    // $author argument of the constructor can be optional
    public function __construct($title, $price){
        $this->title = $title;
        $this->price = $price;
    }
}