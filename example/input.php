<?php

include __DIR__ . "/../autoload.php";

use CliToolkit\IO\InputManager;

$input = new InputManager();
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
$input->scanf("variable_name");

echo "Enter the variable value: ";
$input->scanf($input->variable_name);

printf("STDIN:%s%s => %s%s", PHP_EOL, $input->variable_name, $input->{$input->variable_name}, PHP_EOL);
