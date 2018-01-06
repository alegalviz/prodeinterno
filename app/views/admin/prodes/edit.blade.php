@extends('admin/layouts/modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		</ul>
	<!-- ./ tabs -->
	{{-- Edit Prode Form --}}
    {{ Form::open(['url' => 'admin/prodes/' . $prode->id . '/edit', 'files' => true, 'method' => 'post','autocomplete'=>'off', 'class' => 'form-horizontal']) }}
		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">

				<!-- Content -->
				<div class="form-group {{{ $errors->has('logoempresa') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="imagen">Logo de empresa</label>
                        <div class="col-md-4"><img src="{{{ asset('uploads/prode/165x58_crop/' . Input::old('logoempresa', $prode->logoempresa)) }}}" width="150" /></div>
                            <div class="col-md-4">{{ Form::file('logoempresa') }}</div>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('bannerfixture') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="imagen">Banner pantalla Fixture</label>
                        <div class="col-md-4"><img src="{{{ asset('uploads/prode/403x72_crop/' . Input::old('bannerfixture', $prode->bannerfixture)) }}}" width="150" /></div>
                        <div class="col-md-4">{{ Form::file('bannerfixture') }}</div>

                    </div>
                </div>
                <div class="form-group {{{ $errors->has('bannerlogin') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="imagen">Banner pantalla Login</label>
                        <div class="col-md-4"><img src="{{{ asset('uploads/prode/353x225_crop/' . Input::old('bannerlogin', $prode->bannerlogin)) }}}" width="150" /></div>
                        <div class="col-md-4">{{ Form::file('bannerlogin') }}</div>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('puntajeaciertoexacto') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="imagen">Puntaje por exacto</label>
                        {{ Form::text('puntajeaciertoexacto', $prode->puntajeaciertoexacto) }}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('puntajeaciertoparcial') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="col-md-4 control-label" for="imagen">Puntaje por parcial</label>
                        {{ Form::text('puntajeaciertoparcial', $prode->puntajeaciertoparcial) }}
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
