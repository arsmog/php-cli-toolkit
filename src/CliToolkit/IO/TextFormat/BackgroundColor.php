<?php

namespace CliToolkit\IO\TextFormat;

use CliToolkit\TextFormat\{BackgroundColor as Color, Text};

enum BackgroundColor implements ColorInterface, AttributeInterface
{
    case Black;

    case Red;

    case Green;

    case Yellow;

    case Blue;

    case Magenta;

    case Cyan;

    case White;

    public function getAttribute(): string
    {
        $text = new Text();
        return match ($this) {
            BackgroundColor::Black => $text->getAttribute(Color::BLACK),
            BackgroundColor::Red => $text->getAttribute(Color::RED),
            BackgroundColor::Green => $text->getAttribute(Color::GREEN),
            BackgroundColor::Yellow => $text->getAttribute(Color::YELLOW),
            BackgroundColor::Blue => $text->getAttribute(Color::BLUE),
            BackgroundColor::Magenta => $text->getAttribute(Color::MAGENTA),
            BackgroundColor::Cyan => $text->getAttribute(Color::CYAN),
            BackgroundColor::White => $text->getAttribute(Color::WHITE)
        };
    }
}