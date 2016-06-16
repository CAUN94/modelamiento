<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class dijkstra extends Controller
{
    			public function dijkstra(){
			$a = "X";
			$b = "A";

//initialize the array for storing
$S = array();//the nearest path with its parent and weight
$Q = array();//the left nodes without the nearest path
foreach(array_keys($data) as $val) $Q[$val] = 99999;
$Q[$a] = 0;

//start calculating
while(!empty($Q)){
    $min = array_search(min($Q), $Q);//the most min weight
    if($min == $b) break;
    foreach($data[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
        $Q[$key] = $Q[$min] + $val;
        $S[$key] = array($min, $Q[$key]);
    }
    unset($Q[$min]);
}

//list the path
$path = array();
$pos = $b;
while($pos != $a){
    $path[] = $pos;
    $pos = $S[$pos][0];
}
$path[] = $a;
$path = array_reverse($path);

//print result

echo "<br />From $a to $b";
echo "<br />The length is ".$S[$b][1];
echo "<br />Path is ".implode('->', $path);

}
}
