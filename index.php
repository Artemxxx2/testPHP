<?php
require __DIR__ . '/model.php';
require __DIR__ . '/sortStrategies.php';

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


$model = new TableModel($fruits);
$model->setSortingStrategy(new alphabeticalIncrease());
$model->initalDataSetUp();
$model->sortData();
var_dump($model);


// function printObj($out)
// {
//                         $keys = array_keys($out);
//                         $countK = count($keys);
//                         $countI = 0;
//                         foreach($out as $key => $value)
//                         {
//                                 $countI = count($out[$key]);
//                                 break;
//                             }
//                             $mainArray = array();
//                             print_r($countI);
                        
//                             for ($i = 0; $i < $countI; $i++) {
//             $mainArray[] = [];
//         }
//         foreach($out as $key => $value)
//         {
//                for ($i=0; $i < $countI; $i++) { 
//                         $mainArray[$i] .= $out[$key][$i];
//                    }
//                 }
//                 print_r($mainArray);
// }
// print_r(printObj($model));
            // var_dump(printObj($out));
            
            

            
//  $arr = [[1,2,3,4], [1,2,3,4]];
//  $str = '';
// for ($i=0; $i < count($arr); $i++) { 
    //    for ($j=0; $j < count($arr[$i]); $j++) { 
        //        $str .= $arr[$j][$i];
//    }
//    $str .= PHP_EOL;
// }

// asort($fruits);

// foreach ($fruits as $key => $value) {
//     echo $key . ": " . $value . "\n";
// }

// IMPORTANT
// foreach($hashMap as $key => &$value)
// {
    //     for ($i=0; $i < count($value); $i++) { 
        //         if (strlen($value[$i]) ===$maxLenHashMap[$key]) {
            //             $value[$i] = '|' . $value[$i];
            //         }
            //         if (($len = strlen($value[$i])) < $maxLenHashMap[$key]) {
                //            $value[$i] = '|' . str_repeat(' ' , $maxLenHashMap[$key] - $len) . $value[$i];
                //         }
                //     }
                // }
                // return $hashMap;