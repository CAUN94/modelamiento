@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Ruta</h2></div>

                <div class="panel-body"><h2>

                    <?php 
                         $lugares=array("X"=>"bodega",
                            "A"=>"Juan Vicuña (brandear)",
                            "B"=>"La Cumbre 1878, Las Condes",
                            "C"=>"Av. Las Flores, Las Condes",
                            "D"=>"Maquehue 8129, Cerrillos",
                            "E"=>"Av. Santa María 7090, Vitacura",
                            );
                    
                    if(count($array)==4)
                    {
                   
                    echo "<br />El viaje de ". $lugares[$array[0]]." hasta ".$lugares[$array[1]];
                    echo "<br />Tiene una distancia de ".$array[2][$array[1]][1];
                     echo "<br />Y el camino es <br>";
                           // var_dump($array[$i][3])or die();
                            for($j=0;$j<count($array[3]);$j++)
                            {
                                echo $lugares[$array[3][$j]];
                                if($j+1<count($array[3]))
                                 echo "-><br>";
                            }
                            echo "<br>";
                }
                    else
                    {
                        for($i=0;$i<count($array);$i++)
                        {
                             {
                            echo "<br />El viaje de ". $lugares[$array[$i][0]]." hasta ".$lugares[$array[$i][1]]."";
                            echo "<br />Tiene una distancia de ".$array[$i][2][$array[$i][1]][1];

                            echo "<br />Y el camino es <br>";
                           // var_dump($array[$i][3])or die();
                            for($j=0;$j<count($array[$i][3]);$j++)
                            {
                                echo $lugares[$array[$i][3][$j]];
                                if($j+1<count($array[$i][3]))
                                 echo "-><br>";
                            }
                            echo "<br>";
                        }
                    }
                }

                     ?>


                     </div><h2>
                </div>
                 </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection
