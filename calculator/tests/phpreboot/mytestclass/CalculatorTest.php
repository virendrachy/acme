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

     /**
      * @expectedException \InvalidArgumentException
      */
    public function testAddWithNonNumbersThrowException()
    {
        $this->calculator->add('1,b', 'Parameters string must contain numbers');

    }
    public function testAddWithMaxNumbers()
    {
        $result = $this->calculator->add('2,1,1001,2');
        $this->assertSame(5, $result, 'value is more then 1000 not included');
    }

    public function testAddWithLessThenZeroNumbers()
    {
        $result = $this->calculator->add('2,-1');
        $this->assertSame('error negitive number not allowed', $result, 'error negitive number is not allowed');
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
    
     /**
      * @expectedException \InvalidArgumentException
      */
    public function testMultipleWithNonNumbersThrowException()
    {
        $this->calculator->multiple('1,b', 'Invalid parameter do not throw exception');
    }
}
