@extends('layouts.app')
	@section('content')
		<div class="container" id="tab">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Personal:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipo">Tipo de Cliente:</label>
			    					<dd>{{ $personal->tipo }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<dd>{{ $personal->tipopersona }}</dd>
			  					</div>	
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">* Nombre(s):</label>
			  						<dd>{{ $personal->nombre }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">* Apellido Paterno:</label>
			  						<dd>{{ $personal->apellidopaterno }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<dd>{{ $personal->apellidomaterno }}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="permoral" style="display:none;">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial">* Razon Social:</label>
			  						<dd>{{ $personal->razonsocial }}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="mail">* Correo:</label>
									<dd>{{ $personal->mail }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="rfc">* RFC:</label>
									<dd>{{ $personal->rfc }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefonofijo">* Número de Telefono:</label>
									<dd>{{ $personal->telefonofijo }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefonocel">* Número Celular:</label>
									<dd>{{ $personal->telefonocel }}</dd>
								</div>
								@if ($personal->estadocivil)
									{{-- true expr --}}
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente2" style="display:none;">
									<label class="control-label" for="estadocivil">Estado Civil:</label>
									<dd>{{$personal->estadocivil}}</dd>
								</div>
								@endif
							</div>
						</div>
					</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li class="active"><a href="#tab1">Dirección/Domicilio:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Datos Laborales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Referencias Personales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Datos de Beneficiarios:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Productos:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">C.R.M.:</a></li>
				</ul>
				<div class="panel-default">
					<div class="panel-heading">Dirección/Domicilio:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="calle">* Calle:</label>
								<dd>{{ $personal->calle }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="numext" >* Número Exterior:</label>
								<dd>{{ $personal->numext }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="numinter">Número Interior:</label>
								<dd>{{ $personal->numinter }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="cp">Código Postal:</label>
								<dd>{{ $personal->cp }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="colonia">* Colonia:</label>
								<dd>{{ $personal->colonia }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="municipio">* Municipio/Delegación:</label>
								<dd>{{ $personal->municipio }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="ciudad">* Ciudad:</label>
								<dd>{{ $personal->ciudad }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="estado">* Estado:</label>
								<dd>{{ $personal->estado }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle1">Entre calle:</label>
								<dd>{{ $personal->calle1 }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle2">Y calle:</label>
								<dd>{{ $personal->calle2 }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="referencia">Referencia:</label>
								<dd>{{ $personal->referencia }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente" style="display:none;">
								<label class="control-label" for="recidir">Tiempo recidiendo:</label>
								<dd>{{ $personal->recidir }}</dd>
							</div>
							@if ($personal->vivienda)
								{{-- expr --}}
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="vivienda">Tipo de vivienda:</label>
								<dd>{{ $personal->vivienda }}</dd>
							</div>
							@endif
						</div>
					</div>
				</div>
  				</div>
		</div>
	@endsection