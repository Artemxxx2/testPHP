<?php
require __DIR__ . '/model.php';
require __DIR__ . '/sortStrategies.php';
require __DIR__ . '/view.php';
require __DIR__ . '/controller.php';

$fruits = [
    [
    'House' => 'Baratheon',
    'Sigil' => 'A crowned stag',
    'Motto' => 'Ours is the Fury',
    ],
    [
    'Leader' => 'Eddard Stark',
    'House' => 'Stark',
    'Motto' => 'Winter is Coming',
    'Sigil' => 'A gray direwolf',
    ],
    [
    'House' => 'Lannister',
    'Leader' => 'Tywin Lannister',
    'Sigil' => 'A golden lion',
    ],
    [
    'Q' => 'Z',
    ],
    [
        'dsakdl;kasdkas;djasjhdpiashyfoidhyasoifhyasoiuhfiosafhishpafiopsa' => 'dsa',
    ],
    [
        'dsakdl;kasdkas;djayfoidhyasoifhyasoiuhfiosafhishpafiopsa' => 'dsa',
    ],
    [
        'dsakdl;kasdkas;djasjhdpiashyfoa' => 'dsa',
    ],
    [
        'dsakdl;kasdkas;djasjhdpiashyfoidhyasoifhyasoiuhfiosafhishpafiopsa' => 'dsa',
    ],
    [
        'dsakdl;kasdkas;djasjhdpiashyfoidhyasoifhyasoiuhfiosafhishpafiopsa' => 'dsa',
    ],
    [
        'dsakdl;kasdkas;djasjhdpiashyfoidhyasoifhyasoiuhfiosafhishpafiopsa' => 'dsa',
    ],
    [
        'afsljffsjlksadjasjhdpiashyfoidhyasoifhyasoiuhfiosafhishpafiopsa' => 'dsa',
    ],
    ];

Controller::index($fruits);

