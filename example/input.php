<?php

include __DIR__ . "/../autoload.php";

use CliToolkit\IO\ConsoleInput;

$input = new ConsoleInput();
$params = $input->argv();

if (empty($params)) {
    echo "No arguments", PHP_EOL;
} else {
    echo "Arguments:", PHP_EOL;
    foreach ($params as $name => $value) {
        printf("%s => %s%s", $name, $value, PHP_EOL);
    }
}

echo "Enter the variable name: ";
$input->scanf("name");

echo "Enter the variable value: ";
$input->scanf($input->name);

printf("STDIN:%s%s => %s%s", PHP_EOL, $input->name, $input->{$input->name}, PHP_EOL);
