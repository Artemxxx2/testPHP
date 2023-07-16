<?php

class TableModel
{
    
    private array $hashMap = [];
    private array $maxLenHashMap = [];
    private ?SortingStrategy $sortingStrategy;
    private array $head = [];
    private static $lineWidth;
    public array $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    function initalDataSetUp(string $fillEmptySpace = '')  : self
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
    
    public function makeHeadDelimiter(string $delimiter = '|')  : self
    {
        foreach($this->maxLenHashMap as $key => $val)
        {

            if (($keyLen = strlen($key)) < $val) {
                $this->head[] = $delimiter . str_repeat(' ', $val - $keyLen) . $key;
            }
            elseif(strlen($key) === $val)
            {
                $this->head[] = $delimiter . $key;
            }
        }
        $this->head = [implode($this->head) . $delimiter];

        return $this;
    }

    public function getLine(string $delimiter = '=') : array
    {
        if (self::$lineWidth === null) {
            $keys = array_keys($this->maxLenHashMap);
            self::$lineWidth += count($keys);
            self::$lineWidth += 1;
            foreach($this->maxLenHashMap as $key => $val)
            {
                self::$lineWidth += $val;
            }
            return [str_repeat($delimiter , self::$lineWidth)];
        }
        return [str_repeat($delimiter , self::$lineWidth)];
    }

    public function getHead() : array
    {
        return $this->head;
    }

    public function makeBodyDelimiter(string $delimiter = '|') :self
    {
        foreach($this->hashMap as $key => &$value)
        {
            for ($i=0; $i < count($value); $i++) { 
            if (strlen($value[$i]) ===$this->maxLenHashMap[$key]) {
                $value[$i] = $delimiter . $value[$i];
            }
            else if (($len = strlen($value[$i])) < $this->maxLenHashMap[$key]) {
                $value[$i] = $delimiter . str_repeat(' ' , $this->maxLenHashMap[$key] - $len) . $value[$i];
            }
        }
        }
        return $this;
    }

    public function setSortingStrategy(SortingStrategy $strategy) :self
    {
        $this->sortingStrategy = $strategy;
        return $this;
    }

    public function sortData() :self
    {
        if ($this->sortingStrategy) {
            $this->hashMap = $this->sortingStrategy->sort($this->hashMap);
            $this->maxLenHashMap = $this->sortingStrategy->sort($this->maxLenHashMap);
            return $this;
        }
        
        return $this;
    }

    public function getBody() :array
    {
        $arr = [];
        $res = [];
        foreach($this->hashMap as $key => $val)
        {
            $arr[] = $val;
        }

        $res = array_fill(0, count($arr[0]), '');
        for ($i=0; $i < count($arr); $i++) { 
            for ($j=0; $j < count($arr[$i]) ; $j++) { 
                $res[$j] .= $arr[$i][$j]; 
            }
        }
        return $res;
    }

}