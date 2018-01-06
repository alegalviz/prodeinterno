@extends('admin/layouts/modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		</ul>
	<!-- ./ tabs -->
	{{-- Edit Estadios Form --}}
    {{ Form::open(['url' => 'admin/estadios/' . $estadio->id . '/edit', 'method' => 'post','autocomplete'=>'off', 'class' => 'form-horizontal']) }}
		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">

				<!-- Content -->
				<div class="form-group {{{ $errors->has('nombre') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="nombre">Nombre</label>
                        <div class="col-md-4">{{{ Input::old('nombre', $estadio->nombre) }}}</div>
                            <div class="col-md-4">{{ Form::text('nombre', $estadio->nombre) }}</div>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('ciudad') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="ciudad">Ciudad</label>
                        <div class="col-md-4">{{{ Input::old('ciudad', $estadio->ciudad) }}}</div>
                        <div class="col-md-4">{{ Form::text('ciudad', $estadio->ciudad) }}</div>

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
