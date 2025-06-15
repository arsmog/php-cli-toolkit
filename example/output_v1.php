<?php

include __DIR__ . "/../autoload.php";

use CliToolkit\IO\OutputManager;
use CliToolkit\TextGrid;

$grid = new OutputManager(new TextGrid\Table());
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
