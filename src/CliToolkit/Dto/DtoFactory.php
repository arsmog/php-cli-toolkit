<?php

namespace CliToolkit\Dto;

/**
 * DTO Object Factory
 */
abstract class DtoFactory implements Dto
{
    /**
     * Factory method of DTO objects that receives data from an array
     * @param array $data An array containing the names of the DTO object properties and their values ​​as keys
     * @return \CliToolkit\Dto\Dto
     */
    public static function fromArray(array $data): Dto
    {
        $dto = new static();
        $dtoClass = new \ReflectionClass($dto);
        foreach ($dtoClass->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $name = $property->getName();
            if (!array_key_exists($name, $data)) {
                continue;
            }
            $dto->{$name} = $data[$name];
        }
        return $dto;
    }
}

