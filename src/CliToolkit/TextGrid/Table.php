<?php

namespace CliToolkit\TextGrid;

class Table extends Grid
{
    public function __construct(?array $rows = null)
    {
        parent::__construct($rows);
    }

    /**
     * Returns an array of rows with columns
     * @return array
     */
    public function getRows(): array
    {
        if (empty($this->column_length)) {
            $this->setColumnsLength();
        }
        $length = !empty($this->column_length) ? max(array_values($this->column_length)) + self::MARGIN_RIGHT : 0;
        $rows = [];
        foreach ($this->rows as $indx_row => $row) {
            foreach ($row as $cell => $column) {
                $rows[$indx_row][$cell] = mb_str_pad(
                    (string) $column,
                    $length,
                    ' ',
                    STR_PAD_RIGHT
                );
            }
        }
        return $rows;
    }
}
