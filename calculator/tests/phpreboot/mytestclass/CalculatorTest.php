<?php
namespace Acme\mytestclass;

use Acme\myclass\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }
    public function tearDown()
    {
        $this->calculator = null;
    }

    public function testAddReturnsAnInteger()
    {
        $result = $this->calculator->add();
        $this->assertSame(0, $result, 'Empty string on add do not return 0');
    }
    public function testAddWithSingleNumberReturnsSameNumber()
    {
        $result = $this->calculator->add('3');
        $this->assertSame(3, $result, 'Add with single number do not returns same number');
    }
    public function testAddWithTwoParametersReturnsTheirSum()
    {
        $result = $this->calculator->add('2,4');
        $this->assertSame(6, $result, 'Add with two parameter do not returns correct sum');
    }
    public function testAddWithMaxNumbers()
    {
        $result = $this->calculator->add('2,1,1001,2');
        $this->assertSame(5, $result, 'value is more then 1000 not included');
    }
    public function testAddWithLessThenZeroNumbers()
    {
        $this->calculator->displayNegativeNumbers = false;
        $result = $this->calculator->add('2,-1');
        $this->assertSame("error negitive number not allowed", $result, 'negitive');
    }
    public function testAddMUltipleInputWithLessThenZeroNumbers()
    {
        $this->calculator->displayNegativeNumbers = true;
        $result = $this->calculator->add('2,-1,-6');
        $this->assertSame("negetive number(-1,-6) not allowed", $result, 'negitive');
    }
    public function testMultipleReturnsAnInteger()
    {
        $result = $this->calculator->multiple();
        $this->assertSame(0, $result, 'Empty string on add do not return 0');
    }
    public function testMultipleWithSingleNumberReturnsSameNumber()
    {
        $result = $this->calculator->multiple('3');
        $this->assertSame(3, $result, 'multiply with single number do not returns same number');
    }
    public function testMultipleWithTwoParametersReturnsTheirvalue()
    {
        $result = $this->calculator->multiple('2,4');
        $this->assertSame(8, $result, 'multiply with two parameter do not returns correct result');
    }
    public function testMultipleWithNegitiveNumbers()
    {
        $result = $this->calculator->multiple('2,-3');
        $this->assertSame("negitive number(-3) not allowed", $result, 'Negative');
    }
    public function testMultipleInputWithLessThenZeroNumbers()
    {
        $result = $this->calculator->multiple('2,-1,-6');
        $this->assertSame("negitive number(-1,-6) not allowed", $result, 'negitive');
    }
    public function testMultipleInputWithMoreThenZeroNumbers()
    {
        $result = $this->calculator->multiple('2,2,1,4,1,4');
        $this->assertSame(64, $result, 'More then one value');
    }
    public function testAddInputWithMoreThenZeroNumbers()
    {
        $result = $this->calculator->add('2,,1,4,1,4');
        $this->assertSame(12, $result, 'More then one value');
    }
    public function testMultipleInputWithNewLineNumbers()
    {
        $result = $this->calculator->multiple('2/n,4');
        $this->assertSame(8, $result, 'More then one value');
    }
    public function testAddInputWithNewLineNumbers()
    {
        $result = $this->calculator->add('2/n,3');
        $this->assertSame(5, $result, 'More then one value');
    }
    public function testMultipleInputWithNewLinewithStringNumbers()
    {
        $result = $this->calculator->multiple('2/n/n,3//');
        $this->assertSame(6, $result, 'More then one value');
    }
    public function testAddInputWithNewLineStringNumbers()
    {
        $result = $this->calculator->add('2/n/n,3//');
        $this->assertSame(5, $result, 'More then one value');
    }
    public function testMultipleInputWithNewLinewithComplexStringNumbers()
    {
        $result = $this->calculator->multiple('//,//2/n/n,3//');
        $this->assertSame(6, $result, 'More then one value');
    }
    public function testAddInputWithNewLineComplexStringNumbers()
    {
        $result = $this->calculator->add('//,//2/n/n,3//');
        $this->assertSame(5, $result, 'More then one value');
    }
    public function testMultipleInputWithSuperComplexStringNumbers()
    {
        $result = $this->calculator->multiple('//;//;2/n/n,3//');
        $this->assertSame(6, $result, 'More then one value');
    }
    public function testAddInputWithSuperComplexStringNumbers()
    {
        $result = $this->calculator->add('//;//;2/n/n,3//');
        $this->assertSame(5, $result, 'More then one value');
    }
}
