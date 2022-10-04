<?php
require_once "AbstractLibrary.php";

class Library extends AbstractLibrary
{
    public function addAuthor(string $authorName): Author{
        $newAuthor = new Author($authorName);
        if (isset($this->authors)) { // not null
            array_push($this->authors,$newAuthor);
        }
        else { // is null
            $this->authors = [$newAuthor];
        }
        return $newAuthor;
    }

    public function addBookForAuthor($authorName, Book $book){
        // find author in $authors array
        foreach($this->authors as $author){
            if($author->getName() == $authorName){
                $author->addBook($book->getTitle(),$book->getPrice());
                return $book;
            }
        }
    }

    public function getBooksForAuthor($authorName){
        // find author in $authors array
        foreach($this->authors as $author){
            if($author->getName() == $authorName){
                return $author->getBooks();
            }
        }
    }

    public function search(string $bookName): Book{
        foreach($this->authors as $author){
            foreach($author->getBook() as $book){
                if($book->getTitle() === $bookName){
                    return $book;
                }
            }
        }
    }

    public function print(){
        foreach($this->authors as $author){
            echo $author->getName()."<br>";
            for ($i = 0; $i <25; $i++){
                echo "-";
            }
            echo "<br>";
            foreach($author->getBook() as $book){
                echo $book->getTitle()." - ".$book->getPrice()."<br>";
            }
            echo "<br>";
        }
    }
}