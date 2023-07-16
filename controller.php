<?php

class Controller
{
    public static function index($data)
    {
        $model = new TableModel($data);
        $model
            ->setSortingStrategy(new alphabeticalIncrease())
            ->initalDataSetUp()
            ->sortData()
            ->makeBodyDelimiter()
            ->makeHeadDelimiter();
            
        $head = $model->getHead();
        $body = $model->getBody();
        $lineHead = $model->getLine();
        $lineMedium = $model->getLine('-');
        $lineFooter = $model->getLine();
        
        $view = new View();
        
        $view
            ->add($lineHead)
            ->add($head)
            ->add($lineMedium)
            ->add($body)
            ->add($lineFooter)
            ->display();
    }
}
