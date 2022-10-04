<?php


class Author
{
    public string $name;
    public $books = [];

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getBook(){
        return $this->books;
    }
    public function setBook($books){
        $this->books = $books;
    }

    public function __construct($name, $books = []){
        $this->name = $name;
        $this->books = $books;
    }

    /**
     * @param string $title
     * @param float  $price
     * @return \Book
     */
    public function addBook(string $title, float $price): Book
    {
        $newBook = new Book($title, $price);
        if (isset($this->books)){
            array_push($this->books, $newBook);
        }
        else{
            $this->books = [$newBook];
        }
        $newBook->setAuthor($this);
        return $newBook;
    }
}