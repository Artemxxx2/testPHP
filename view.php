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
    public function toTxt(string $fileName) : self
    {
        $pattern = '/\.txt$/';
        if (preg_match($pattern, $fileName)) 
        {
            for ($i=0; $i < count($this->parts); $i++) 
            { 
                for ($j=0; $j < count($this->parts[$i]); $j++) { 
                    file_put_contents($fileName, $this->parts[$i][$j] . PHP_EOL, FILE_APPEND);    
                    }
            }
        }
        else print_r('file should have .txt at the end' . PHP_EOL);

        return $this;
    }
}