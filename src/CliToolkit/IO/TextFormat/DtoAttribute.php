<?php

namespace CliToolkit\IO\TextFormat;

use CliToolkit\Dto\DtoFactory;

class DtoAttribute extends DtoFactory
{
    public ?TextColor $color = null;

    public ?BackgroundColor $backgroundColor = null;

    public ?TextAttribute $textAttribute = null;

    public readonly TextAttribute $reset;

    public function __construct()
    {
        $this->reset = TextAttribute::Reset;
    }
}
