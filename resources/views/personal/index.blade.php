@extends('layouts.app')

@section('content')
<div class="container">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>Nombre</th>
					<th>Tipo de cliente</th>
					<th>RFC</th>
					<th>Correo</th>
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($personals as $personal)
				<tr class="active">
					<td>{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}</td>
					<td>{{ $personal->tipo }}</td>
					<td>{{ strtoupper($personal->rfc) }}</td>
					<td>{{$personal->mail}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('personals.show',$personal) }}">Ver</a>
						<a class="btn btn-info btn-sm" href="{{ route('personals.edit', $personal) }}">Editar</a>
						{{-- @if ( $personal->tipo == 'Cliente')
							<a type="button" class="btn btn-primary btn-xs" href="{{ url('datoslaborales/create') }}">Datos Laborales</a>
						<a type="button" class="btn btn-primary btn-xs" href="{{ url('referenciapersonales') }}">Referencias Personales</a>
						<a type="button" class="btn btn-primary btn-xs" href="{{ url('beneficiarios') }}">Datos Beneficiarios</a>
						@endif
						@if ($personal->tipo == 'Prospecto')
							<a type="button" class="btn btn-primary btn-xs">Ventas Frio</a>
						@endif
					<a type="button" class="btn btn-primary btn-xs">Productos</a> --}}
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>
		{!!$personals->render()!!}
</div>
@endsection