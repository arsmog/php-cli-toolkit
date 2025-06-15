<?php

namespace CliToolkit\IO\TextFormat;

use CliToolkit\TextFormat\{TextColor as Color, Text};

enum TextColor implements ColorInterface, AttributeInterface
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
            TextColor::Black => $text->getAttribute(Color::BLACK),
            TextColor::Red => $text->getAttribute(Color::RED),
            TextColor::Green => $text->getAttribute(Color::GREEN),
            TextColor::Yellow => $text->getAttribute(Color::YELLOW),
            TextColor::Blue => $text->getAttribute(Color::BLUE),
            TextColor::Magenta => $text->getAttribute(Color::MAGENTA),
            TextColor::Cyan => $text->getAttribute(Color::CYAN),
            TextColor::White => $text->getAttribute(Color::WHITE)
        };
    }
}
