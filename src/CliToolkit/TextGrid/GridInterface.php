<?php

namespace CliToolkit\TextGrid;

interface GridInterface
{
    public function newRow(?array $columns = null): GridInterface;

    public function newColumn(string $column = ''): GridInterface;

    public function setRows(array $rows): GridInterface;

    public function getRows(): array;

    public function clear(): GridInterface;

    public function print(): GridInterface;
}
