<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:16 PM
 */

/**
 * Class Subject
 */
class Subject
{
    public $code;
    public $name;
    /**
     * @var Student[]
     */
    public $students = [] ;


    public function __construct($code, $name, $students = []){
        $this->code = $code;
        $this->name = $name;
        $this->students = $students;
    }

    public function getCode(){
        return $this->code;
    }
    public function setCode($code){
        $this->code = $code;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */
    
    public function addStudent(string $name, string $studentNumber): Student
    {
        $newStudent = new Student($name, $studentNumber);
        if (isset($this->students)){ // student array not null
            array_push($this->students, $newStudent);
        }
        else { // student array is null
            $this->student = [$newStudent];
        }
        return $newStudent;
    }
}