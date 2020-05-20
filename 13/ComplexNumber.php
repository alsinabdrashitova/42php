<?php
namespace compl;

class ComplexNumber
{
    private float $number;
    private float $complex;

    public function __construct(float $number, float $complex)
    {
        $this->number = $number;
        $this->complex = $complex;
    }

    public function add(ComplexNumber $a)
    {
        return new ComplexNumber($this->number + $a->number, $this->complex + $a->complex);
    }

    public function sub(ComplexNumber $a)
    {
        return new ComplexNumber($this->number - $a->number, $this->complex - $a->complex);
    }

    public function mult(ComplexNumber $a)
    {
        return new ComplexNumber($this->number * $a->number - $a->complex * $this->complex, $this->number * $a->complex + $a->number * $this->complex);
    }

    public function div(ComplexNumber $a)
    {
        if ($a->complex != 0 && $a->number != 0) {
            $number = ($this->number * $a->number + $this->complex * $a->complex) / ($a->number * $a->number + $a->complex * $a->complex);
            $complex = ($a->number * $this->complex - $this->number * $a->complex) / ($a->number * $a->number + $a->complex * $a->complex);
            return new ComplexNumber($number, $complex);
        }else{
            print "Ты не математик, если делишь на 0";
        }
    }

    public function abs()
    {
        return new ComplexNumber(sqrt($this->number * $this->number + $this->complex * $this->complex), 0);
    }

    public function __toString()
    {
        $str = '';
        if($this->complex > 0){
            $str = $this->number."+".$this->complex."i";
        } elseif ($this->complex < 0){
            $str =$this->number."".($this->complex)."i";
        }
        return $str;
    }

}
