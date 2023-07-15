<?php

class TableModel
{
    private $hashMap = [];
    private $maxLenHashMap = [];
    private $sortingStrategy;
    public $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    function initalDataSetUp(string $fillEmptySpace = '')
    {
        for ($i=0; $i < count($this->array); $i++) { 
           foreach($this->array[$i] as $key => $value)
           {
               if (!isset($this->hashMap[$key])) {
                   $this->maxLenHashMap[$key] = max(strlen($value), strlen($key));
                   $dump = array_fill(0, $i , $fillEmptySpace);
                   $merged = array_merge($dump, [$value]);
                   $this->hashMap[$key] = $merged;
                }   
                else if(isset($this->hashMap[$key]) && count($this->hashMap[$key]) < $i)
                {
                    $this->maxLenHashMap[$key] = max(strlen($value),$this->maxLenHashMap[$key]);
                    $dump = array_fill(0, $i - count($this->hashMap[$key]), $fillEmptySpace);
                    $merged = array_merge($dump, [$value]);
                    $this->hashMap[$key] = array_merge($this->hashMap[$key], $merged);
                }
                else if(isset($this->hashMap[$key]) && count($this->hashMap[$key]) === $i)
                {
                    $this->maxLenHashMap[$key] = max(strlen($value),$this->maxLenHashMap[$key]);
                    $this->hashMap[$key] = array_merge($this->hashMap[$key], [$value]);
                }
            }
        }
        foreach($this->maxLenHashMap as $key => $value)
        {
            if (count($this->hashMap[$key]) !== count($this->array)) 
            {
                $dump = array_fill(0,  count($this->array) - count($this->hashMap[$key]) , $fillEmptySpace);
                $this->hashMap[$key] = array_merge($this->hashMap[$key] , $dump);
            }
        }

        return $this->hashMap;
    }

    public function setSortingStrategy($strategy)
    {
        $this->sortingStrategy = $strategy;
    }

    public function sortData(): array
    {
        if ($this->sortingStrategy) {
            return $this->sortingStrategy->sort($this->hashMap);
        }
        
        return $this->hashMap;
    }

}