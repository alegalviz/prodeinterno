@extends('site.layouts.fullwidth')


@section('styles')
<link rel="stylesheet" href="{{asset('assets/css/wysihtml5/prettify.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/wysihtml5/bootstrap-wysihtml5.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/jquery.countdown/jquery.countdown.css') }}">
@stop

@section('menuprincipal')
@include('site.layouts.menuprincipal')
<div class="container">
    <div id="descontando" class="col-md-4 pull-right"></div>
</div>
@stop
{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">{{ $title }}</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Edit Blog Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($post)){{ URL::to('cartelera/create') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="title">{{{ Lang::get("post.posttitle") }}}</label>
						<input class="form-control" type="text" name="title" id="title" value="{{{ Input::old('title', isset($post) ? $post->title : null) }}}" />
						{{{ $errors->first('title', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post title -->

				<!-- Content -->
				<div class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
					<div class="col-md-12">
                        <label class="control-label" for="content">{{{ Lang::get("post.content") }}}</label>
						<textarea class="form-control full-width wysihtml5" name="content" value="content" rows="10">{{{ Input::old('content', isset($post) ? $post->content : null) }}}</textarea>
						{{{ $errors->first('content', '<span class="help-block">:message</span>') }}}
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
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">{{{ Lang::get("general.crear") }}}</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
@section('scripts')
<script src="{{asset('assets/js/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.countdown/jquery.plugin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.countdown/jquery.countdown.min.js') }}"></script>
@if (App::getLocale() === 'es')
<script type="text/javascript" src="{{ asset('assets/js/jquery.countdown/jquery.countdown-es.js') }}"></script>
@endif
<script type="text/javascript" src="{{asset('assets/js/wysihtml5/wysihtml5-0.3.0.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/wysihtml5/bootstrap-wysihtml5.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/prettify.js')}}"></script>
<script>
    $(function(){
        $('#descontando').countdown({
            until: new Date('{{ Carbon::parse($tiempoparaveda->inicio)->year }}', '{{ Carbon::parse($tiempoparaveda->inicio)->month }}'-1, '{{ Carbon::parse($tiempoparaveda->inicio)->day }}'),
            layout: '<div class="faltapoco">{{{ Lang::get("site.menuprincipal.contadorjuga") }}}</div><span class="brasilfont">{dn}</span> <span class="dias">{dl}</span>, <span class="brasilfont">{hn}:{mn}:{sn}</span>'
        });
    });

    $('.wysihtml5').wysihtml5({
        "stylesheets": [],
        "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
        "emphasis": true, //Italics, bold, etc. Default true
        "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        "html": false, //Button which allows you to edit the generated HTML. Default false
        "link": false, //Button to insert a link. Default true
        "image": false, //Button to insert an image. Default true,
        "color": false, //Button to change color of font
        "size": 'sm' //Button size like sm, xs etc.
    });
</script>


@stop