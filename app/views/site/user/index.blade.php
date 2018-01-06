@extends('site.layouts.fullwidth')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.profile') }}} ::
@parent
@stop
@section('metatags')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('styles')
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
<div id="perfil">
    <div class="page-header">
        <h1 class="brasilfont">{{{ Lang::get('user/user.profile') }}}</h1>
    </div>

    <div class="col-md-4 datospersonales">
        <div class="row fotoydatos">
            <div class="imagenuser">
                @if (!empty($user->photo))
                <img src="{{ asset('uploads/' . $user->id . '/250x250/' . $user->photo) }}" />
                @else
                <img src="{{ asset('assets/img/imagenpordefecto.png') }}" />
                @endif
            </div>
            <div class="nombreuser">
                {{ $user->realname }}:
                <div class="secundario">{{{$user->joined()}}}</div>
                @if (Config::get('prode.modo') == 'grupal')
                    <div class="row miembros">
                        <?php $miembros = $miembros->first()->miembros; ?>
                        @foreach ($miembros as $int => $miembro)
                            <span class="miembro">{{ $miembro->nombre }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
            @if ($user->id == Auth::user()->id)
            <div class="botoneditar">
                <a href="{{{ URL::to(App::getLocale() . '/user/settings') }}}" class="editar btn btn-small btn-info"><span class="glyphicon glyphicon-pencil"></span> {{{ Lang::get("general.editar") }}}</a>
            </div>
            @endif

        </div>
        <div class="row puntos">

        </div>
    </div>
    <div class="col-md-4 cajadecomentarios">
        <?php
            $escribircomentario = Lang::get('post.escribecomentario');
        ?>
        @if ($user->id == Auth::user()->id)
        {{ Form::open(['url' => 'user/post', 'method' => 'post','autocomplete'=>'off', 'class' => 'form-horizontal']) }}
            <input id="cajacomentario" onfocus='if($(this).val() == "{{$escribircomentario}}")$(this).val(""); $(this).addClass("clicked");' onblur='$(this).removeClass("clicked"); if($(this).val() == "")$(this).val("{{$escribircomentario}}");' name="content" type="text" value="{{$escribircomentario}}">
        {{ Form::close() }}
        @endif
        <div class="comentarios">
            @if ($posts->count())
            @foreach ($posts as $int => $post)
            <div class="rowcomentario <?php echo fmod($int, 2) ? 'even' : 'odd' ?>">
                <div class="nombreusercomentando">
                    <span class="nombre">{{{ $post->author->realname or $post->author->username }}}</span>
                    &bull;
                    <span class="fecha">{{{ $post->date() }}}</span>
                </div>
                <div class="cuerpocomentario">
                    {{{ String::tidy(Str::limit($post->content(), 255)) }}}
                </div>
            </div>
            @endforeach
            @else
            <hr />
            @endif
        </div>
    </div>
    <div class="col-md-4 apuestasusuario">
        <h3>{{{ Lang::get('user/user.partidos') }}}</h3>
        <small class="secundario">{{{ Lang::get('user/user.especulacion') }}}</small>
        <table class="tablaapuestas">
            <thead>
                <tr>
                    <th>
                        {{{ Lang::get('user/user.resultados') }}}
                    </th>
                    <th>
                        {{{ Lang::get('user/user.ultimaactualizacion') }}}
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($apuestas as $int => $apuesta)
                <tr class="rowpartido <?php echo fmod($int, 2) ? 'even' : 'odd' ?>">
                    <td >
                        <div>
                            <span class="equipo1 equipo {{ $apuesta->partido->equipolocal->codigo }}">{{ Lang::get('equipos.' . $apuesta->partido->equipolocal->codigo) }}</span>
                            <span class="marcador">{{ $apuesta->marcador_equipo1 }}</span> <span class="versus">vs</span> <span class="marcador">{{ $apuesta->marcador_equipo2 }}</span>
                            <span class="equipo2 equipo {{ $apuesta->partido->equipovisitante->codigo }}">{{ Lang::get('equipos.' . $apuesta->partido->equipovisitante->codigo) }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="fechaapuesta">{{date( 'H:i d-m',  strtotime(Carbon::parse($apuesta->updated_at)))}}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/js/jquery.countdown/jquery.plugin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.countdown/jquery.countdown.min.js') }}"></script>
@if (App::getLocale() === 'es')
<script type="text/javascript" src="{{ asset('assets/js/jquery.countdown/jquery.countdown-es.js') }}"></script>
@endif
<script>
    @if ($tiempoparaveda)
    $(function(){
        $('#descontando').countdown({
            until: new Date('{{ Carbon::parse($tiempoparaveda->inicio)->year }}', '{{ Carbon::parse($tiempoparaveda->inicio)->month }}'-1, '{{ Carbon::parse($tiempoparaveda->inicio)->day }}', '{{ Carbon::parse($tiempoparaveda->inicio)->hour }}', '{{ Carbon::parse($tiempoparaveda->inicio)->minute }}'),
            layout: '<div class="faltapoco">{{{ Lang::get("site.menuprincipal.contadorjuga") }}}</div><span class="brasilfont">{dn}</span> <span class="dias">{dl}</span>, <span class="brasilfont">{hn}:{mn}:{sn}</span>'
        });
    });
    @endif
    var request;
    var amomentago = '{{{ Lang::get("general.amomentago") }}}';
    // bind to the submit event of our form
    $(".form-horizontal").submit(function(event){
        // abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);
        // let's select and cache all the fields
        //var $inputs = $form.find("input, select, button, textarea");
        var $inputs = $form.find("input");
        // serialize the data in the form
        var serializedData = $form.serialize();

        // let's disable the inputs for the duration of the ajax request
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // fire off the request to /form.php
        request = $.ajax({
            url: $(this).attr('action'),
            type: "post",
            data: serializedData
        });

        // callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // add the comment

            $newrow =   $('<div class="rowcomentario"><div class="nombreusercomentando"><span class="nombre"></span>&bull;<span class="fecha"></span></div><div class="cuerpocomentario"></div></div>');
            $newrow.find('.cuerpocomentario').html(response);
            $newrow.find('.nombre').html('<?php if(!empty(Auth::user()->realname)){echo Auth::user()->realname;}else{echo Auth::user()->username;} ?>');
            $newrow.find('.fecha').html(amomentago);
            $form.parent().parent().parent().find('.comentarios').prepend($newrow);
            $inputs.val("");
        });

        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // log the error to the console
            console.error(
                "The following error occured: "+
                    textStatus, errorThrown
            );
        });

        // callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // reenable the inputs
            $inputs.prop("disabled", false);
        });

        // prevent default posting of form
        event.preventDefault();
    });
</script>
@stop