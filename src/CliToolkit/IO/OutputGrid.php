<?php

namespace CliToolkit\IO;

use CliToolkit\TextGrid\{
    GridInterface,
    Grid
};

class OutputGrid implements IOInterface
{
    private GridInterface $entity;

    private array $data;

    private readonly array $attributes;

    public function __construct(?GridInterface $entity = null)
    {
        $this->entity = !empty($entity) ? $entity : new Grid();
        $this->data = [];
        $this->attributes = ["color", "backgroundColor", "textAttribute"];
    }

    public function clearBuffer(): OutputGrid
    {
        $this->output->clear();
        return $this;
    }

    public function getEntity(): GridInterface
    {
        return $this->entity;
    }

    public function insert(array|string $data, ?TextFormat\DtoAttribute $attributes = null): OutputGrid
    {
        if (!is_array($data)) {
            $data = [$data];
        }
        if (!empty($attributes)) {
            foreach ($data as $value) {
                settype($value, "string");
                $this->addAttribute($value, $attributes);
                $this->data[] = $value;
            }
        } else {
            $this->data = array_merge($this->data, array_map("strval", $data));
        }
        return $this;
    }

    public function getRows(): array
    {
        $rows = $this->getEntity()->getRows();
        $columns_count = 0;
        if (!empty($rows)) {
            $this->trimRows($rows);
            $columns_count = count($rows[0]);
        }
        if (empty($columns_count)) {
            /**
             * @todo Implement the correct algorithm for calculating columns
             */
            $columns_count = 5;
        }
        foreach ($this->data as $k => $data) {
            if ($k % $columns_count === 0) {
                $rows[] = [];
            }
            $rows[count($rows) - 1][] = (string) $data;
        }
        return $rows;
    }

    public function print(): OutputGrid
    {
        $this->getEntity()->setRows($this->getRows())->print();
        return $this;
    }

    private function addAttribute(string &$data, TextFormat\DtoAttribute $dtoAttributes): bool
    {
        $isset = false;
        foreach ($this->attributes as $attr) {
            if (empty($dtoAttributes->{$attr})) {
                continue;
            }
            $isset = true;
            $data = sprintf("%s%s", ($dtoAttributes->{$attr})->getAttribute(), $data);
        }
        if ($isset) {
            $data .= $dtoAttributes->reset->getAttribute();
        }
        return $isset;
    }

    private function trimRows(array &$rows): void
    {
        $tmp = [];
        foreach ($rows as $row) {
            $tmp[] = array_map("trim", $row);
        }
        $rows = $tmp;
    }
}

