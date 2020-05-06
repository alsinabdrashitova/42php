<?php

use errors\MyException1;
use errors\MyException2;
use errors\MyException3;
use errors\MyException4;
use errors\MyException5;

class ExcClass{

    private function ranExc($e)
    {
        $exc = random_int(1, 5);
        if ($exc == 1) {
            throw new MyException1("Exc1: " . $e);
        }
        if ($exc == 2) {
            throw new MyException2("Exc2: " . $e);
        }
        if ($exc == 3) {
            throw new MyException3("Exc3: " . $e);
        }
        if ($exc == 4) {
            throw  new MyException4("Exc4: " . $e);
        }
        if ($exc == 5){
            throw new MyException5("Exc5: ".$e);
        }
    }

    public function method1(){
        $x = random_int(-1, 1);
        if ($x <= 0){
            $this -> ranExc("Нельзя брать корень из отрицательного числа: " .$x."\n");
        }else {
            $this->ranExc("Поздравляю, вы можете взять корень из этого числа: ".$x."\n");
        }

    }

    public function method2(){
        $x = random_int(0, 1);
        if($x == 0){
            $this -> ranExc("Вы попытались поделить число на 0"."\n");
        } else{
            $this->ranExc("Число делеённое на 1 == само число :)"."\n");
        }

    }

    public function method3(){
        $x = random_int(12, 16);
        if($x%4 == 0){
            $this -> ranExc("Число кратное 4: ".$x."\n");
        } else{
            $this->ranExc("Число не кратное 4: ".$x ."\n");
        }
    }

    public function method4(){
        $x = random_int(2,6);
        if($x%2 == 0){
            $this -> ranExc("Чётное число: ".$x."\n");
        } else{
            $this->ranExc("Нечётное число: ".$x."\n");
        }
    }
}
