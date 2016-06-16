@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Que Viaje necesita hacer?</div>

                <div class="panel-body">
        

<form class="form-horizontal" method="POST" action="/import">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Partida</label>
    <div class="col-sm-10">
           
 <select name="partida" class="form-control" type="text" class="form-control" id="inputEmail3" placeholder="Lugar de LLegada">
  <option value="X">bodega</option>
  <option value="A">Juan Vicuña (brandear)</option>
  <option value="B">La Cumbre 1878, Las Condes</option>
  <option value="C">Av. Las Flores, Las Condes</option>
  <option value="D">Maquehue 8129, Cerrillos</option>
    <option value="E">Av. Santa María 7090, Vitacura</option>
</select>
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Parada</label>
    <div class="col-sm-10">
           
  <select name="parada" class="form-control" type="text" class="form-control" id="inputEmail3" placeholder="Lugar de LLegada">
  <option value="0" >No Aplica</option>
  <option value="X">bodega</option>
  <option value="A">Juan Vicuña (brandear)</option>
  <option value="B">La Cumbre 1878, Las Condes</option>
  <option value="C">Av. Las Flores, Las Condes</option>
  <option value="D">Maquehue 8129, Cerrillos</option>
  <option value="E">Av. Santa María 7090, Vitacura</option>
  </select>
    </div>
  </div>
 

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Llegada</label>
    <div class="col-sm-10">
     
      <select name="llegada" class="form-control" type="text" class="form-control" id="inputEmail3" placeholder="Lugar de LLegada">
  <option value="X">bodega</option>
  <option value="A">Juan Vicuña (brandear)</option>
  <option value="B">La Cumbre 1878, Las Condes</option>
  <option value="C">Av. Las Flores, Las Condes</option>
  <option value="D">Maquehue 8129, Cerrillos</option>
    <option value="E">Av. Santa María 7090, Vitacura</option>
</select>


    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection