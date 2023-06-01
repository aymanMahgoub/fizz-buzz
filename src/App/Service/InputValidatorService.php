<?php

namespace Service;

use InvalidArgumentException;

class InputValidatorService
{
    /**
     * @param int $fromNumber
     * @param int $toNumber
     * @throws InvalidArgumentException
     * @return void
     */
    public function validateUserInput($fromNumber, $toNumber): void
    {
        $this->validateIsNumber($fromNumber, $toNumber);
        $this->validateCorrectNumbersRange($fromNumber, $toNumber);
    }

    /**
     * @param $fromNumber
     * @param $toNumber
     * @throws InvalidArgumentException
     * @return void
     */
    private function validateIsNumber($fromNumber, $toNumber): void
    {
        if (!is_numeric($fromNumber) || !is_numeric($toNumber)) {
            throw new InvalidArgumentException('please enter only numbers');
        }
    }

    /**
     * @param int $fromNumber
     * @param int $toNumber
     * @throws InvalidArgumentException
     * @return void
     */
    private function validateCorrectNumbersRange(int $fromNumber, int $toNumber): void
    {
        if ($fromNumber <= 0 || $toNumber <= 0 || ($fromNumber >= $toNumber)) {
            throw new InvalidArgumentException('please enter the correct positive number range, and the Form number should be bigger than the To number');
        }
    }
}
