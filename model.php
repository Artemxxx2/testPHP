<?php

class TableModel
{
    private $hashMap = [];
    private $maxLenHashMap = [];
    private $sortingStrategy;
    private $head = [];
    private static $lineWidth;
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
                $this->hashMap[$key];
            }
        }
        return $this;
    }

    public function makeHeadDelimiter(string $deliminiter = '|')
    {
        foreach($this->maxLenHashMap as $key => $val)
        {
            if (($keyLen = strlen($key)) < $val) {
                $this->head[] = $deliminiter . str_repeat(' ', $val - $keyLen) . $key;
            }
            elseif(strlen($key) === strlen($val))
            {
                $this->head[] = $deliminiter . $key;
            }
        }

        return $this;
    }

    public function getLine(string $deliminiter = '=')
    {
        if (self::$lineWidth === null) {
            $keys = array_keys($this->maxLenHashMap);
            self::$lineWidth += count($keys);
            foreach($this->maxLenHashMap as $key => $val)
            {
                self::$lineWidth += $val;
            }
            return [str_repeat($deliminiter , self::$lineWidth)];
        }
        return [str_repeat($deliminiter , self::$lineWidth)];
    }

    public function getHead()
    {
        return $this->head;
    }

    public function makeBodyDelimiter(string $deliminiter = '|')
    {
        foreach($this->hashMap as $key => &$value)
        {
            for ($i=0; $i < count($value); $i++) { 
            if (strlen($value[$i]) ===$this->maxLenHashMap[$key]) {
                $value[$i] = $deliminiter . $value[$i];
            }
            else if (($len = strlen($value[$i])) < $this->maxLenHashMap[$key]) {
                $value[$i] = $deliminiter . str_repeat(' ' , $this->maxLenHashMap[$key] - $len) . $value[$i];
            }
        }
        }
        return $this;
    }

    public function setSortingStrategy($strategy)
    {
        $this->sortingStrategy = $strategy;
        return $this;
    }

    public function sortData()
    {
        if ($this->sortingStrategy) {
            $this->hashMap = $this->sortingStrategy->sort($this->hashMap);
            $this->maxLenHashMap = $this->sortingStrategy->sort($this->maxLenHashMap);
            return $this;
        }
        
        return $this;
    }

    public function getBody()
    {
        $arr = [];
        $res = [];
        foreach($this->hashMap as $key => $val)
        {
            $arr[] = $val;
        }
        for ($i=0; $i < count($arr); $i++) { 
            print_r($arr[$i][0]);
        }
        // return $arr;
    }

}