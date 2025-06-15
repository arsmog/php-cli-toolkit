<?php

namespace CliToolkit\Dto;

/**
 * Common interface of DTO objects
 */
interface Dto
{
    public static function fromArray(array $data): Dto;
}

