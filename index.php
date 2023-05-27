<?php
declare(strict_types = 1);

require __DIR__.'/vendor/autoload.php';
use Service\FizzBuzzService;

$fromNumber = readline('Enter from number: ');
$toNumber   = readline('Enter to number: ');

$fizzBuzzService =  new FizzBuzzService();
$fizzBuzzService->Play($fromNumber, $toNumber);