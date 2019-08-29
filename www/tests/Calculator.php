<?php

class Calculator
{

    public static function newInstance()
    {
        return new static();
    }

    public function add(int $x, int $y, int $z = 0): int
    {
        return $x + $y + $z;
    }

    public function sub(int $x, int $y): int
    {
        return $x - $y;
    }

}