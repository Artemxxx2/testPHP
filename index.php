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
    ];

$c = new Controller();
$c->index($fruits);


// print_r($body[0]);
// print_r(PHP_EOL);
// print_r($body[0]);