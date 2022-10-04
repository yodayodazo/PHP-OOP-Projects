<?php
require_once "AbstractUniversity.php";

/**
 * Class University
 */
class University extends AbstractUniversity
{
    public function addSubject(string $code, string $name): Subject{
        $newSubject = new Subject($code, $name);
        array_push($this->subjects, $newSubject);
        return $newSubject;
    }

    public function addStudentOnSubject(string $subjectCode, Student $student){
        // find Subject by subjectCode
        foreach($this->subjects as $subject){
            if($subject->getCode() == $subjectCode){
                array_push($subject->students,$student); // add student to subject's student array
            }
        }
    }

    public function getStudentsForSubject(string $subjectCode){
        // find Subject by subjectCode
        foreach($this->subjects as $subject){
            if($subject->getCode() == $subjectCode){
                return $subject->students;
            }
        } 
    }

    public function getNumberOfStudents(): int{
        $count = 0;
        foreach($this->subjects as $subject){
            $count += count($subject->students);
        }
        return $count;
    }

    public function print(){
        foreach($this->subjects as $subject){
            echo $subject->getCode()." - ".$subject->getName()."<br>";
            for ($i = 0; $i<25; $i++){
                echo "-";
            }
            echo "<br>";
            foreach($subject->students as $student){
                echo $student->getName()." - ".$student->getStudentNumber();
                echo "<br>";
            }
            echo "<br>";
        }
    }
}