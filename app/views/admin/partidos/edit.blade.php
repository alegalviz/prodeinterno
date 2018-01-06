@extends('admin/layouts/modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		</ul>
	<!-- ./ tabs -->
	{{-- Edit Partidos Form --}}
    {{ Form::open(['url' => 'admin/partidos/' . $partido->id . '/edit', 'method' => 'post','autocomplete'=>'off', 'class' => 'form-horizontal']) }}
		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Content -->
				<div class="form-group {{{ $errors->has('inicio') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="inicio">Inicio</label>
                        <div class="col-md-4">{{{ Input::old('inicio', $partido->inicio) }}}</div>
                        <div class="col-md-4">{{ Form::text('inicio', $partido->inicio) }}</div>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('estadio') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="estadio">Estadio</label>
                        <div class="col-md-4">{{{ Input::old('estadio', $partido->estadio->nombre) }}}</div>
                        <div class="col-md-4">{{Form::select('estadio_id', $estadios, Input::old('id', $partido->estadio_id)) }}</div>

                    </div>
                </div>
                <div class="form-group {{{ $errors->has('marcador_equipo1') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="nombre">Marcador equipo local</label>
                        @if ($resultado->first())
                        <div class="col-md-4">{{{ Input::old('marcador_equipo1', $resultado->first()->marcador_equipo1) }}}</div>
                        <div class="col-md-4">{{ Form::text('marcador_equipo1', $resultado->first()->marcador_equipo1) }}</div>
                        @else
                        <div class="col-md-4">{{{ Input::old('marcador_equipo1') }}}</div>
                        <div class="col-md-4">{{ Form::text('marcador_equipo1') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('equipo1_id') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="equipo1_id">Equipo Local</label>
                        <div class="col-md-4">{{{ Input::old('equipo1_id', $partido->equipolocal->nombre) }}}</div>
                        <div class="col-md-4">{{Form::select('equipo1_id', $equipos, Input::old('id', $partido->equipo1_id)) }}</div>

                    </div>
                </div>
                <div class="form-group {{{ $errors->has('equipo2_id') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="equipo2_id">Equipo Visitante</label>
                        <div class="col-md-4">{{{ Input::old('equipo2_id', $partido->equipovisitante->nombre) }}}</div>
                        <div class="col-md-4">{{Form::select('equipo2_id', $equipos, Input::old('id', $partido->equipo2_id)) }}</div>

                    </div>
                </div>
                <div class="form-group {{{ $errors->has('marcador_equipo2') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="nombre">Marcador equipo visitante</label>
                        @if ($resultado->first())
                        <div class="col-md-4">{{{ Input::old('marcador_equipo2', $resultado->first()->marcador_equipo2) }}}</div>
                        <div class="col-md-4">{{ Form::text('marcador_equipo2', $resultado->first()->marcador_equipo2) }}</div>
                        @else
                        <div class="col-md-4">{{{ Input::old('marcador_equipo2') }}}</div>
                        <div class="col-md-4">{{ Form::text('marcador_equipo2') }}</div>
                        @endif
                    </div>
                </div>
				<!-- ./ content -->
			</div>
			<!-- ./ general tab -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">Update</button>
			</div>
		</div>
		<!-- ./ form actions -->
    {{ Form::close() }}
@stop
