<?php

include __DIR__ . "/../autoload.php";

use CliToolkit\TextGrid\Grid;

$data = [
    ['ID', 'Name', 'Age'],
    [1, 'Alex', 25],
    [2, 'Maria', 30],
    [3, 'Joe', 22]
];

$addData = [
    [4, 'Nina', 27],
    [5, 'Daria', 18],
    [6, 'Arseny', 45],
    [7, 'Elena', 30]
];

$emptyRows = [
    ['', '', '']
];

$rows = array_merge($data, $addData, $emptyRows);


/**********  Example 1 **********/
$app = new Grid();
foreach ($rows as $row) {
    $app->newRow();
    foreach ($row as $column) {
        $app->newColumn((string) $column);
    }
}
$app->print();


/**********  Example 2 **********/
$app = new Grid();
foreach ($rows as $row) {
    $app->newRow($row);
}
$app->print();


/**********  Example 3 **********/
$app = new Grid();
$app->setRows(
   $rows
)->print();


/**********  Example 4 **********/
$app = new Grid($rows);
$app->print();
