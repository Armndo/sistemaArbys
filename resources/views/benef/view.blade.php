@extends('layouts.infopersonal')
  @section('personal')
  <ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#">Dirección/Domicilio:</a></li>
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Datos Laborales:</a></li>
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Referencias Personales:</a></li>
    <li class="active"><a href="" class="ui-tabs-anchor">Datos de Beneficiarios:</a></li>
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Productos:</a></li>
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">C.R.M.:</a></li>
  </ul>
  <div class="panel-default">
    <div class="panel-heading">Datos de Beneficiarios</div>
    <div class="panel-body">
      <div class="panel-body">
            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="nombreben">Nombre(s):</label>
              <dd>{{$beneficiario->nombreben}}</dd>
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="apepatben">Apellido Paterno:</label>
              <dd>{{$beneficiario->apepatben}}</dd>
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="apematben">Apellido Materno:</label>
              <dd>{{$beneficiario->apematben}}</dd>
            </div>
        </div>
        <div class="panel-body">
          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <label class="control-label" for="edadben">Edad:</label>
            <dd>{{$beneficiario->edadben}}</dd>
          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <label class="control-label" for="parentescoben">Parentesco:</label>
            <dd>{{$beneficiario->parentescoben}}</dd>
          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <label class="control-label" for="telefonoben">Telefono:</label>
            <dd>{{$beneficiario->telefonoben}}</dd>
          </div>
        </div>
        <a class="btn btn-info btn-md" href="{{ route('personals.datosbeneficiario.edit', [$personal,$beneficiario]) }}">Editar</a>
        </div>
  </div>
	@endsection