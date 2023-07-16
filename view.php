<?php

class View
{
    private array $parts = [];

    public function add(array $part)
    {
        $this->parts[] = $part;
        return $this;
    }
    public function display()
    {
        for ($i=0; $i < count($this->parts); $i++) 
        { 
            for ($j=0; $j < count($this->parts[$i]); $j++) { 
                print_r($this->parts[$i][$j] .PHP_EOL);
                
                }
                // print_r(PHP_EOL);
        }
            //print_r('asdas');
            // print_r(PHP_EOL);
    }
}