# PHP CLI Toolkit

## Description

PHP CLI Toolkit is a powerful library for developing console applications in PHP. It provides a convenient and intuitive interface for working with the command line, allowing developers to easily create, process, and manage commands and arguments.

## Features

- **Ease of Use**: A simple API that allows you to quickly start developing console applications.
- **Argument and Option Support**: Easy handling of input arguments and command line options with validation capabilities.
- **Interactive Mode**: Ability to create interactive applications with support for user input.
- **Extensibility**: Easily add your own commands and extend the library's functionality.
- **Documentation**: Comprehensive documentation and usage examples to help you get started quickly.

## Installation

You can install the library using Composer:

To install a package via Composer from GitHub, you need to follow a few steps. Here’s the general process:

1. **Make sure Composer is installed**: If you don’t have Composer yet, you can install it by following the instructions on the [official Composer website](https://getcomposer.org/download/).

2. **Create or open the `composer.json` file**: If you already have a project with `composer.json`, open it. If not, create a new `composer.json` file in the root of your project.

3. **Add the GitHub repository**: In `composer.json`, add a `repositories` section if it doesn’t exist yet. Specify the URL of the GitHub repository. For example:

   ```json
   {
       "repositories": [
           {
               "type": "vcs",
               "url": "https://github.com/arsmog/php-cli-toolkit"
           }
       ],
       "require": {
           "arsmog/php-cli-toolkit": "master"
       }
   }
   ```


4. **Install the package**: After adding the repository to `composer.json`, run the command:

   ```bash
   composer install
   ```

   Or, if you want to add the package and install it immediately:

   ```bash
   composer require arsmog/php-cli-toolkit:master
   ```

5. **Check the installation**: After the installation is complete, verify that the package has been successfully added to your project and that you can use it in your code.

If you encounter any errors, make sure the repository is accessible and that you have specified the correct details in `composer.json`.

```bash
composer require arsmog/php-cli-toolkit
```

## Example Usage

### Change the output color

```php
<?php

require "vendor/autoload.php";

use CliToolkit\TextFormat\{
    Text,
    TextAttribute,
    TextColor,
    BackgroundColor
};

$app = new Text();

$text = [
    $app->set("This is bold red text.")
        ->insertAttribute(TextColor::RED)
        ->insertAttribute(TextAttribute::BOLD)
        ->get(),
    $app->set("This is light yellow italic text on a green background.")
        ->insertAttribute(TextColor::LIGHT_YELLOW)
        ->insertAttribute(BackgroundColor::GREEN)
        ->insertAttribute(TextAttribute::ITALIC)
        ->get(),
    $app->set("It's flashing blue text on a yellow background.")
        ->insertAttribute(TextColor::BLUE)
        ->insertAttribute(BackgroundColor::YELLOW)
        ->insertAttribute(TextAttribute::BLINK)
        ->get(),
    $app->set("It's italicized and strikethrough black text on a cyan background.")
        ->insertAttribute(TextColor::BLACK)
        ->insertAttribute(BackgroundColor::LIGHT_CYAN)
        ->insertAttribute(TextAttribute::ITALIC)
        ->insertAttribute(TextAttribute::STRIKETHROUGH)
        ->get()
];

echo implode(PHP_EOL, $text), PHP_EOL;
```

### Reading data from standard stream

```php
<?php

require "vendor/autoload.php";

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
$input->scanf("var_name");

echo "Enter the variable value: ";
$input->scanf($input->var_name);

printf("STDIN:%s%s => %s%s", PHP_EOL, $input->var_name, $input->{$input->var_name}, PHP_EOL);
```


## Contribution

We welcome contributions from the community! If you have ideas, suggestions, or fixes, please create an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

---

With PHP CLI Toolkit, you can create powerful and user-friendly console applications that are easily customizable and extendable to meet your needs. Get started today!
