<?php
// require __DIR__ . 'model.php';

$fruits = [
    ["l" => 'lllll', "d" => "ddddd" ],
    ["d" => "ddddd"],
    ["d" => "dddddd"],
    ["l" => "llllll"],
    ["l" => 'lllll'],
    ["d" => "ddddddddddddddddddddd" , "s" => 'ssssss'],
    ["e" => "eeeee"],
    ["l" => 'lllll'],
    ["l" => 'lllll'],
    ["d" => "ddddd"],
    ["e" => "eeeee"],
    ["d" => "ddddd"],
    ["e" => "eeeee"],
    ["l" => 'lllll'],
    ["s" => 'sssssssssssssssss'],
];

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

function initalDataSetUp(array $arr,string $fillEmptySpace = '')
{
    $maxLenHashMap = [];
    $hashMap = [];
    for ($i=0; $i < count($arr); $i++) { 
       foreach($arr[$i] as $key => $value)
       {
           if (!isset($hashMap[$key])) {
               $maxLenHashMap[$key] = max(strlen($value), strlen($key));
               $dump = array_fill(0, $i , $fillEmptySpace);
               $merged = array_merge($dump, [$value]);
               $hashMap[$key] = $merged;
            }   
            else if(isset($hashMap[$key]) && count($hashMap[$key]) < $i)
            {
                $maxLenHashMap[$key] = max(strlen($value),$maxLenHashMap[$key]);
                $dump = array_fill(0, $i - count($hashMap[$key]), $fillEmptySpace);
                $merged = array_merge($dump, [$value]);
                $hashMap[$key] = array_merge($hashMap[$key], $merged);
            }
            else if(isset($hashMap[$key]) && count($hashMap[$key]) === $i)
            {
                $maxLenHashMap[$key] = max(strlen($value),$maxLenHashMap[$key]);
                $hashMap[$key] = array_merge($hashMap[$key], [$value]);
            }
        }
    }
    foreach($maxLenHashMap as $key => $value)
    {
        if (count($hashMap[$key]) !== count($arr)) 
        {
            $dump = array_fill(0,  count($arr) - count($hashMap[$key]) , $fillEmptySpace);
            $hashMap[$key] = array_merge($hashMap[$key] , $dump);
        }
    }
    // foreach($hashMap as $key => &$value)
    // {
    //     for ($i=0; $i < count($value); $i++) { 
    //     if (strlen($value[$i]) ===$maxLenHashMap[$key]) {
    //         $value[$i] = '|' . $value[$i];
    //     }
    //     else if (($len = strlen($value[$i])) < $maxLenHashMap[$key]) {
    //         $value[$i] = '|' . str_repeat(' ' , $maxLenHashMap[$key] - $len) . $value[$i];
    //     }
    // }
    // }
    //             ksort($hashMap);
                return ['a' => $hashMap,'b' => $maxLenHashMap];
}


$out = initalDataSetUp($fruits);
print_r($out['b']);
$maxlen = $out['b'];

function getLen($arr)
{
    $res = 0;
    foreach($arr as $key => $val)
    {
        $res += $val;
    }
    return $res;
}
$l = getLen($maxlen);

$out = $out['a'];

function printObj($out,$maxlen)
{
    $keys = array_keys($out);
    $countK = count($keys);
    $countI = 0;
    foreach($out as $key => $value)
    {
            $countI = count($out[$key]);
            break;
    }
    $mainArray = array();

    for ($i = 0; $i < $countI; $i++) {
        $mainArray[] = [];
    }
    foreach($out as $key => $value)
    {
           for ($i=0; $i < $countI; $i++) { 
                    $mainArray[$i] .= $out[$key][$i];
               }
    }
    $l = getLen($maxlen);
    print_r(str_repeat('_',$l) . PHP_EOL);
    foreach($mainArray as $element)
    { 
        echo $element . PHP_EOL;
    }
}

var_dump(printObj($out,$maxlen));
            
            

            

// IMPORTANT
