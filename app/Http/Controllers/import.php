<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use SimpleExcel\SimpleExcel;

class import extends Controller
{

	     public function __construct()
    {
        $this->middleware('auth');
    }



     public function import(Request $request)
    {

        $excel = new SimpleExcel('CSV'); // Libreria de excel
            $excel->parser->loadFile('km.csv'); // Archivo excel a leer
            $get =  $excel->parser->getColumn(1); // Toma todos los valores de la columna uno
            $count = count($get); // Cuenta los valores (para saber el largo del excel)
  
 
            for ($i=1; $i<=$count;$i++) // lee todo el excel parte del 2, porque el 1 son los titulos
            {
                    
                    
                    $get1 =  $excel->parser->getRow(($i)); //Si el valor de la columna existe entra

                    	$explode=explode(";", $get1[0]);
                    	
                    	$array[$i]=$explode;
			}   



			for($j=1;$j<=count($array);$j++)
			{
				$count=0;
				for($k=0;$k<count($array[1]);$k++)
				{
					if($array[1][$k]!="DISTANCIAS" && $array[$j][$k]!="" )
					{
							// echo $array[1][$k];
							// echo $array[$j][$k];
							// echo $array[$j][$k+1];
							if($array[$j][$k+1]=="DISTANCIAS" )
								$data[$array[1][$k]][$array[$j][$k]]=0;
							else
								$data[$array[1][$k]][$array[$j][$k]]=$array[$j][$k+1];

					}

				}
				
				
			}
	

if($request->parada != "0"){
	
$array1=$this->dijkstra($data,$request->partida,$request->llegada);
$array2=$this->dijkstra($data,$request->partida,$request->parada);


if($array1[2][$array1[1]][1]>=$array2[2][$array2[1]][1])
{
	$array3=$this->dijkstra($data,$request->parada,$request->llegada);
	$array=array($array2,$array3);
	return view('index',compact('array'));
}
elseif($array1[2][$array1[1]][1]<$array2[2][$array2[1]][1])
{
		
		$array3=$this->dijkstra($data,$request->llegada,$request->parada);

	$array=array($array1,$array3);
	return view('index',compact('array'));
}

}







else{	
$array=$this->dijkstra($data,$request->partida,$request->llegada);

return view('index',compact('array'));
}




}


public function dijkstra($data,$p,$l)
{
$a = $p;
$b = $l;

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


$array=array($a,$b,$S,$path);
return $array;

}


}
