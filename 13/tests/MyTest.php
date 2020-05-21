<?php

require_once 'ComplexNumber.php';

use compl\ComplexNumber;
use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{

    public function testAbs(){
        $number = new ComplexNumber(7, 0);
        $result = new ComplexNumber(7, 0);
        $this->assertEquals($number->abs(), $result);
    }

    public function testAdd(){
        $number1 = new ComplexNumber(3, 90);
        $number2 = new ComplexNumber(6, -3);
        $result = new ComplexNumber(9, 87);
        $this->assertEquals($number1->add($number2), $result);
    }

    public function testMult(){
        $number1 = new ComplexNumber(12, 2);
        $number2 = new ComplexNumber(0, 12);
        $result = new ComplexNumber(-24, 144);
        $this->assertEquals($number1->mult($number2), $result);
    }

    public function testDiv(){
        $number1 = new ComplexNumber(2, 1);
        $number2 = new ComplexNumber(4, 23);
        $result = new ComplexNumber(0.05688073394495413, -0.07706422018348624);
        $this->assertEquals($number1->div($number2), $result);
    }

    public function testToString(){
        $number = new ComplexNumber(12, 22);
        $this->assertEquals($number->__toString(), "12+22i");

    }

    public function testSub(){
        $number1 = new ComplexNumber(3, -10);
        $number2 = new ComplexNumber(3, -2);
        $result = new ComplexNumber(0, -8);
        $this->assertEquals($number1->sub($number2), $result);
    }

    public function testZero(){
        $number1 = new ComplexNumber(0, 0);
        $number2 = new ComplexNumber(0, 0);
        $number1->div($number2);
        $this->expectOutputString('Ты не математик, если делишь на 0');
    }
}