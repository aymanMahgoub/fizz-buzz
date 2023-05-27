<?php
declare(strict_types=1);

namespace FizzBuzz\tests\Service;

use Service\InputValidatorService;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;

class InputValidatorServiceTest extends TestCase
{

    public function testPassFromNumberAsChar(): void
    {
        $inputValidatorService   = new InputValidatorService();
        $validateUserInputMethod = $this->getValidateIsNumberMethod($inputValidatorService);
        $this->expectException(InvalidArgumentException::class);
        $validateUserInputMethod->invokeArgs($inputValidatorService, ['one', 100]);
    }

    public function testPassToNumberAsChar(): void
    {
        $inputValidatorService   = new InputValidatorService();
        $validateUserInputMethod = $this->getValidateIsNumberMethod($inputValidatorService);
        $this->expectException(InvalidArgumentException::class);
        $validateUserInputMethod->invokeArgs($inputValidatorService, [1, 'hundred']);
    }

    public function testPassWrongFromNumber(): void
    {
        $inputValidatorService   = new InputValidatorService();
        $validateUserInputMethod = $this->getValidateCorrectNumbersRangeMethod($inputValidatorService);
        $this->expectException(InvalidArgumentException::class);
        $validateUserInputMethod->invokeArgs($inputValidatorService, [0, 100]);
        $this->expectException(InvalidArgumentException::class);
        $validateUserInputMethod->invokeArgs($inputValidatorService, [-1, 100]);
    }

    public function testPassWrongToNumber(): void
    {
        $inputValidatorService   = new InputValidatorService();
        $validateUserInputMethod = $this->getValidateCorrectNumbersRangeMethod($inputValidatorService);
        $this->expectException(InvalidArgumentException::class);
        $validateUserInputMethod->invokeArgs($inputValidatorService, [1, 0]);
        $this->expectException(InvalidArgumentException::class);
        $validateUserInputMethod->invokeArgs($inputValidatorService, [1, -100]);
    }

    public function testWrongRang(): void
    {
        $inputValidatorService   = new InputValidatorService();
        $validateUserInputMethod = $this->getValidateCorrectNumbersRangeMethod($inputValidatorService);
        $this->expectException(InvalidArgumentException::class);
        $validateUserInputMethod->invokeArgs($inputValidatorService, [100, 1]);
    }

    private function getValidateCorrectNumbersRangeMethod(InputValidatorService $inputValidatorService): ReflectionMethod
    {
        $inputValidatorServiceReflection = new ReflectionClass($inputValidatorService);
        $validateUserInputMethod         = $inputValidatorServiceReflection->getMethod('validateCorrectNumbersRange');
        $validateUserInputMethod->setAccessible(true);

        return $validateUserInputMethod;
    }

    private function getValidateIsNumberMethod(InputValidatorService $inputValidatorService): ReflectionMethod
    {
        $inputValidatorServiceReflection = new ReflectionClass($inputValidatorService);
        $validateUserInputMethod         = $inputValidatorServiceReflection->getMethod('validateIsNumber');
        $validateUserInputMethod->setAccessible(true);

        return $validateUserInputMethod;
    }
}
