<?php
declare(strict_types = 1);

namespace Service;

use InvalidArgumentException;

class FizzBuzzService
{
    /**
     * @param int $fromNumber
     * @param int $toNumber
     * @return void
     */
    public function Play($fromNumber, $toNumber): void
    {
        $userInputValidatorService = new InputValidatorService();
        try {
            $userInputValidatorService->validateUserInput($fromNumber, $toNumber);
        } catch (InvalidArgumentException $exception) {
            echo $exception->getMessage() . "\n";
            return;
        }

        $this->printOutput($fromNumber, $toNumber);
    }

    /**
     * @param int $fromNumber
     * @param int $toNumber
     * @return void
     */
    private function printOutput(int $fromNumber, int $toNumber): void
    {
        for ($i = $fromNumber; $i <= $toNumber; $i++) {
            $output = '';
            if ($i % 3 === 0) {
                $output = 'Fizz';
            }
            if ($i % 5 === 0) {
                $output .= 'Buzz';
            }
            if ($output === '') {
                $output = $i;
            }

            echo $output . "\n";
        }
    }
}
