<?php

include 'Calculator.php';

use PHPUnit\Framework\TestCase;

class TestCalculator extends TestCase {
    public function testAdd(){
        $cal = Calculator::newInstance();
        $this->assertInstanceOf(Calculator::class, $cal);
        $this->assertEquals(3, $cal->add(1,2));
        $this->assertEquals(1, $cal->add(-1,2));
    }
    public function testSub(){
        $cal = Calculator::newInstance();
        $this->assertInstanceOf(Calculator::class, $cal);
        $this->assertEquals(5, $cal->sub(10, 5));
        $this->assertEquals(10, $cal->sub(10,0));
    }
}