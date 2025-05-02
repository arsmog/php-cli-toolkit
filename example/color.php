<?php

include __DIR__ . "/../autoload.php";

use CliToolkit\View\{
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
