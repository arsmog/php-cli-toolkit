<?php

namespace CliToolkit\TextFormat;

class TextAttribute
{
    public const RESET = 0;               // Reset all attributes
    public const BOLD = 1;                // Bold text
    public const FADED = 2;               // Faded text
    public const ITALIC = 3;              // Italics
    public const UNDERLINE = 4;           // Underlined text
    public const BLINK = 5;               // Flashing text
    public const INVERTED = 7;            // Inverted color
    public const HIDDEN = 8;              // Hidden text
    public const STRIKETHROUGH = 9;       // Strikethrough text
}