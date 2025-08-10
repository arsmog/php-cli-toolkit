<?php

include __DIR__ . "/../autoload.php";

use CliToolkit\IO\OutputGrid;
use CliToolkit\TextGrid;

$grid = new OutputGrid(new TextGrid\Table());
$grid->getEntity()
        ->newRow()
            ->newColumn('apple')
            ->newColumn('banana')
            ->newColumn('cherry')
            ->newColumn('elderberry')
            ->newColumn('strawberry')
        ->newRow()
            ->newColumn('kiwi')
            ->newColumn('lemon')
            ->newColumn('mango')
            ->newColumn('nectarine')
            ->newColumn('orange')
        ->print();     
