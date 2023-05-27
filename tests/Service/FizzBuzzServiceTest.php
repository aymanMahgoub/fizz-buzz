<?php
declare(strict_types=1);

namespace FizzBuzz\tests\Service;

use PHPUnit\Framework\TestCase;
use Service\FizzBuzzService;

class FizzBuzzServiceTest extends TestCase
{
    public function testPlay(): void
    {
        $this->expectOutputString(
            "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nFizzBuzz\n16\n17\nFizz\n19\nBuzz\n"
        );
        $fizzBuzzService = new FizzBuzzService();
        $fizzBuzzService->play(1, 20);
    }
}
