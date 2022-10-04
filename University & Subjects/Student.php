<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:40 PM
 */

/**
 * Class Student
 */
class Student
{
    public string $name;
    public string $studentNumber;

    public function __construct($name, $studentNumber){
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getStudentNumber(){
        return $this->studentNumber;
    }
    public function setStudentNumber($studentNumber){
        $this->studentNumber = $studentNumber;
    }
    
}