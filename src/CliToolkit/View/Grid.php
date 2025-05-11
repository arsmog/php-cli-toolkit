<?php

namespace CliToolkit\View;

class Grid
{
    private const MARGIN_RIGHT = 4; // Distance between columns

    /**
     * Grid Row Array
     * @var array[array]
     */
    private array $rows;

    /**
     * Array of column sizes
     * @var array
     */
    private array $column_length;

    public function __construct(?array $rows = null)
    {
        $this->rows = [];
        if (!empty($rows)) {
            $this->setRows($rows);
        }
        $this->setColumnsLength();
    }

    /**
     * Adds a new row
     * @param array|null $columns
     * @return \CliToolkit\View\Grid
     */
    public function newRow(?array $columns = null): Grid
    {
        $this->rows[] = !empty($columns) ? array_map("strval", $columns) : [];
        return $this;
    }

    /**
     * Adds a new column to the last row
     * @param string $column
     * @return \CliToolkit\View\Grid
     */
    public function newColumn(string $column = ''): Grid
    {
        $this->rows[array_key_last($this->rows)][] = $column;
        return $this;
    }

    /**
     * Sets a predefined array of rows with columns
     * @param array $rows
     * @return \CliToolkit\View\Grid
     */
    public function setRows(array $rows): Grid
    {
        $this->clear();
        foreach ($rows as $row) {
            $this->newRow($row);
        }
        return $this;
    }

    /**
     * Returns an array of rows with columns
     * @return array
     */
    public function getRows(): array
    {
        $rows = [];
        foreach ($this->rows as $indx_row => $row) {
            foreach ($row as $cell => $column) {
                $rows[$indx_row][$cell] = mb_str_pad(
                    (string) $column,
                    $this->getColumnLength($cell),
                    ' ',
                    STR_PAD_RIGHT
                );
            }
        }
        return $rows;
    }

    /**
     * Clears all lines
     * @return \CliToolkit\View\Grid
     */
    public function clear(): Grid
    {
        $this->rows = [];
        return $this;
    }

    /**
     * Prints a grid
     * @return \CliToolkit\View\Grid
     */
    public function print(): Grid
    {
        $rows = $this->getRows();
        foreach ($rows as $row) {
            echo implode('', $row), PHP_EOL;
        }
        return $this;
    }

    /**
     * Sets an array with the length of the columns
     * @return void
     */
    private function setColumnsLength(): void
    {
        $this->column_length = [];
        if (empty($this->rows)) {
            return;
        }
        $keys = array_keys($this->rows[0]);
        foreach ($keys as $key) {
            $this->column_length[$key] = max(
                ...array_map(
                    fn($column) => mb_strlen((string) $column),
                    array_column($this->rows, $key)
                )
            );
        }
    }

    /**
     * Returns the length of the column
     * @param int $cell Cell index in a row
     * @return int
     */
    private function getColumnLength(int $cell): int
    {
        if (empty($this->column_length)) {
            $this->setColumnsLength();
        }
        return $this->column_length[$cell] + self::MARGIN_RIGHT;
    }
}