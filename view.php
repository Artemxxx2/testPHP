<?php

class View
{
    private array $parts = [];

    public function add(array $part) : self
    {
        $this->parts[] = $part;
        return $this;
    }
    public function display() : self
    {
        for ($i=0; $i < count($this->parts); $i++) 
        { 
            for ($j=0; $j < count($this->parts[$i]); $j++) { 
                print_r($this->parts[$i][$j] . PHP_EOL);       
                }
        }
        return $this;
    }
    public function toTxt()
    {
        $file = fopen('output.txt', 'w');
        for ($i=0; $i < count($this->parts); $i++) 
        { 
            for ($j=0; $j < count($this->parts[$i]); $j++) { 
                file_put_contents('output.txt', $this->parts[$i][$j] . PHP_EOL, FILE_APPEND);    
                }
        }
        return $this;
    }
}