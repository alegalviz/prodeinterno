@extends('site.layouts.fullwidth')
{{-- Con menu principal --}}

@section('metatags')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/jquery.countdown/jquery.countdown.css') }}">

@stop
{{-- Content --}}

@section('menuprincipal')
@include('site.layouts.menuprincipal')
<div class="container">
    <div id="descontando" class="col-md-4 pull-right"></div>
</div>
@stop

@section('onload')
onload="setupBlocks();"
@stop
@section('content')

<div class="pull-right nuevopost">
    <a href="{{{ URL::to(App::getLocale() . '/cartelera/create') }}}" class="btn btn-small btn-info iframe cboxElement"><span class="glyphicon glyphicon-plus-sign"></span>{{{ Lang::get('site.cartelera.crearpost') }}}</a>
</div>
<div class="contenidocartelera">
<div class="advertencia label label-warning"><span class="glyphicon glyphicon-warning-sign"></span> {{{ Lang::get('site.cartelera.advertencia') }}} </div>

<div id="cartelera">
    <?php foreach ($posts as $post): ?>
        <div class="row">
            <div class="post">
                {{ Form::open(['url' => 'cartelera/' . $post->id . '/like', 'method' => 'post','autocomplete'=>'off', 'class' => 'form-like']) }}
                <div class="likes">{{ $post->likes->count() }}</div><button class="handlike"><img src="{{ asset('assets/img/manito.png') }}"></button>
                {{ Form::close() }}
                <div class="imagenuser">
                    @if (!empty($post->author->photo))
                    <img src="{{ asset('uploads/' . $post->author->id . '/250x250/' . $post->author->photo) }}" />
                    @else
                    <img src="{{ asset('assets/img/imagenpordefecto.png') }}" />
                    @endif
                </div>
                <div class="nombreuser">
                    <a href="{{URL::to(App::getLocale() . '/user/' . $post->author->id)}}">@if (!empty($post->author->realname))
                        {{ $post->author->realname }}
                        @else
                        {{ $post->author->username }}
                        @endif</a>
                </div>
                <div class="titulopost">
                    <h4><strong>{{ String::title($post->title) }}</strong></h4>
                </div>
                <div class="cuerpopost">
                    <p>
                        {{ Str::limit($post->content, 255) }}
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="comentarios">
                @if ($post->comments->count())
                @foreach ($post->comments as $comment)
                <div class="rowcomentario">
                    <div class="imagenuser">
                        @if (!empty($comment->author->photo))
                        <img src="{{ asset('uploads/' . $comment->author->id . '/56x44_crop/' . $comment->author->photo) }}" />
                        @else
                        <img src="{{ asset('assets/img/imagenpordefecto.png') }}" />
                        @endif
                    </div>
                    <div class="nombreusercomentando">
                        <a href="{{{ URL::to(App::getLocale() . '/user/' . $comment->author->id) }}}"><span class="nombre">{{{ $comment->author->realname or $comment->author->username }}}</span></a>
                            &bull;
                        <span class="fecha">{{{ $comment->date() }}}</span>
                    </div>
                    <div class="cuerpocomentario">
                        {{{ Str::limit($comment->content(), 140) }}}
                    </div>
                 </div>
                @endforeach
                @else
                <hr />
                @endif
            </div>
            <div class="comment-form">
                <div class="imagenuser">
                    @if (!empty(Auth::user()->photo))
                    <img src="{{ asset('uploads/' .Auth::user()->id . '/56x44_crop/' . Auth::user()->photo) }}" />
                    @else
                    <img src="{{ asset('assets/img/imagenpordefectocomentarios.png') }}" />
                    @endif
                </div>
                <div class="cajacomentario">
                    <?php
                    $escribircomentario = Lang::get('post.escribecomentario');
                    ?>
                    {{ Form::open(['url' => 'cartelera/' . $post->id . '/comment', 'method' => 'post','autocomplete'=>'off', 'class' => 'form-horizontal']) }}
                    <input id="cajacomentario" onfocus='if($(this).val() == "{{$escribircomentario}}")$(this).val(""); $(this).addClass("clicked");' onblur='$(this).removeClass("clicked"); if($(this).val() == "")$(this).val("{{$escribircomentario}}");' name="comment" type="text" value="{{$escribircomentario}}">
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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
    var colCount = 0;
    var colWidth = 0;
    var margin = 20;
    var windowWidth = 0;
    var blocks = [];

    $.fn.setupBlocks = function setupBlocks() {
        windowWidth = $('#cartelera').width();
        colWidth = $('.row').outerWidth();
        colCount = Math.floor(windowWidth/(colWidth+margin));
        for(var i=0; i < colCount; i++) {
            blocks.push(margin);
        }
        $.fn.positionBlocks();
    };
    $.fn.positionBlocks = function positionBlocks() {
        $('#cartelera .row').each(function(){
            var min = Array.min(blocks);
            var index = $.inArray(min, blocks);
            var leftPos = margin+(index*(colWidth+margin));

            $(this).css({
                'left':leftPos+'px',
                'top':min+'px'
            });
            var hue = 'rgb(' + (Math.floor((254-199)*Math.random()) + 200) + ',' + (Math.floor((252-199)*Math.random()) + 200) + ',' + (Math.floor((252-199)*Math.random()) + 200) + ')';
            $(this).css("background-color", hue);
            blocks[index] = min+$(this).outerHeight()+margin;
        });
        blocks = [];
    };
    Array.min = function(array) {
        return Math.min.apply(Math, array);
    };

    var request;
    var amomentago = '{{{ Lang::get("general.amomentago") }}}';
    var imagenuser = '@if (!empty(Auth::user()->photo)){{ asset(Auth::user()->photo) }}@else{{ asset("assets/img/imagenpordefecto.png") }}@endif';
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

            $newrow =   $('<div class="rowcomentario"><div class="imagenuser"><img src="" /></div><div class="nombreusercomentando"><span class="nombre"></span> &bull; <span class="fecha"></span></div><div class="cuerpocomentario"></div></div>');
            $newrow.find('.cuerpocomentario').html(response);
            $newrow.find('.nombre').html('<?php if(!empty(Auth::user()->realname)){echo Auth::user()->realname;}else{echo Auth::user()->username;} ?>');
            $newrow.find('.fecha').html(amomentago);
            $newrow.find('.imagenuser img').attr("src",imagenuser);
            $form.parent().parent().parent().find('.comentarios').append($newrow);
            $inputs.val("");
            $.fn.setupBlocks();
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
    $.fn.setupBlocks();

    $(".form-like").submit(function(event){
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
            // add the like
            if(response=='success') {
                var currentValue = parseInt($form.parent().find('.likes').text(),10) + 1;
                $form.parent().find('.likes').html(currentValue);
            }
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