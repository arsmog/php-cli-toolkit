<?php

include __DIR__ . "/../autoload.php";

use CliToolkit\IO\{OutputGrid, TextFormat};
use CliToolkit\TextGrid;

$fruits = [
    "apple",
    "banana",
    "cherry",
    "date",
    "elderberry",
    "fig",
    "grape",
    "honeydew",
    "kiwi",
    "lemon",
    "mango",
    "nectarine",
    "orange",
    "papaya",
    "quince",
    "raspberry",
    "strawberry",
    "tangerine",
    "ugli fruit",
    "vanilla bean",
    "watermelon",
    "xigua",
    "yamamomo",
    "zucchini"
];

$grid = new OutputGrid();
$attr = new TextFormat\DtoAttribute();
$attr->color = TextFormat\TextColor::Green;
$attr->textAttribute = TextFormat\TextAttribute::Italic;
$grid->insert($fruits, $attr)->print();

echo str_repeat(PHP_EOL, 2);

$birds = [
    "sparrow" => [
        "color"           => TextFormat\TextColor::White,
        "backgroundColor" => TextFormat\BackgroundColor::Blue
    ],
    "eagle" => [
        "color"           => TextFormat\TextColor::White,
        "backgroundColor" => TextFormat\BackgroundColor::Black
    ],
    "parrot" => [
        "color"           => TextFormat\TextColor::Red,
        "backgroundColor" => TextFormat\BackgroundColor::Yellow
    ],
    "pigeon" => [
        "color"           => TextFormat\TextColor::Magenta,
        "backgroundColor" => TextFormat\BackgroundColor::White
    ],
    "canary" => [
        "color"           => TextFormat\TextColor::Yellow,
        "backgroundColor" => TextFormat\BackgroundColor::Blue
    ],
    "finch" => [
        "color"           => TextFormat\TextColor::Green,
        "backgroundColor" => TextFormat\BackgroundColor::Magenta
    ],
    "owl" => [
        "color"           => TextFormat\TextColor::Black,
        "backgroundColor" => TextFormat\BackgroundColor::White
    ],
    "hummingbird" => [
        "color"           => TextFormat\TextColor::White,
        "backgroundColor" => TextFormat\BackgroundColor::Green
    ],
    "flamingo" => [
        "color"           => TextFormat\TextColor::White,
        "backgroundColor" => TextFormat\BackgroundColor::Magenta
    ],
    "peacock" => [
        "color"           => TextFormat\TextColor::Red,
        "backgroundColor" => TextFormat\BackgroundColor::Black
    ],
    "robin" => [
        "color"           => TextFormat\TextColor::Blue,
        "backgroundColor" => TextFormat\BackgroundColor::Green
    ],
    "woodpecker" => [
        "color"           => TextFormat\TextColor::Blue,
        "backgroundColor" => TextFormat\BackgroundColor::Cyan
    ],
    "swallow" => [
        "color"           => TextFormat\TextColor::Cyan,
        "backgroundColor" => TextFormat\BackgroundColor::Blue
    ],
    "heron" => [
        "color"           => TextFormat\TextColor::White,
        "backgroundColor" => TextFormat\BackgroundColor::Cyan
    ],
    "seagull" => [
        "color"           => TextFormat\TextColor::Yellow,
        "backgroundColor" => TextFormat\BackgroundColor::Red
    ]
];

$table = new OutputGrid(new TextGrid\Table());
foreach ($birds as $bird => $attributes) {
    $table->insert($bird, TextFormat\DtoAttribute::fromArray($attributes));
}
$table->print();

echo str_repeat(PHP_EOL, 2);
