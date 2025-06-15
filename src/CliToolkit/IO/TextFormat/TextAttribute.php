<?php

namespace CliToolkit\IO\TextFormat;

use CliToolkit\TextFormat\{TextAttribute as Attribute, Text};

enum TextAttribute implements AttributeInterface
{
    case Bold;

    case Faded;

    case Italic;

    case Underline;

    case Blink;

    case Inverted;

    case Hidden;

    case Strikethrough;

    case Reset;

    public function getAttribute(): string
    {
        $text = new Text();
        return match ($this) {
            TextAttribute::Bold => $text->getAttribute(Attribute::BOLD),
            TextAttribute::Faded => $text->getAttribute(Attribute::FADED),
            TextAttribute::Italic => $text->getAttribute(Attribute::ITALIC),
            TextAttribute::Underline => $text->getAttribute(Attribute::UNDERLINE),
            TextAttribute::Blink => $text->getAttribute(Attribute::BLINK),
            TextAttribute::Inverted => $text->getAttribute(Attribute::INVERTED),
            TextAttribute::Hidden => $text->getAttribute(Attribute::HIDDEN),
            TextAttribute::Strikethrough => $text->getAttribute(Attribute::STRIKETHROUGH),
            TextAttribute::Reset => $text->getAttribute(Attribute::RESET)
        };
    }
}
