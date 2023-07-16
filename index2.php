<?php
require __DIR__ . '/model.php';
require __DIR__ . '/sortStrategies.php';
require __DIR__ . '/view.php';

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

$model = new TableModel($fruits);
$model
    ->setSortingStrategy(new alphabeticalIncrease())
    ->initalDataSetUp()
    ->sortData()
    ->makeBodyDelimiter()
    ->makeHeadDelimiter();
$head = $model->getHead();
// $body = $model->getBody();
$lineHead = $model->getLine();
$lineMedium = $model->getLine('-');
$lineFooter = $model->getLine();

$view = new View();
$view
   ->add($lineHead)
    ->add($head)
   ->add($lineMedium)
    // ->add($body)
    ->add($lineFooter)
    ->display();

// print_r($body[0]);
// print_r(PHP_EOL);
// print_r($body[0]);