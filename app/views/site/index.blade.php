@extends('site.layouts.default')
{{-- Con menu principal --}}

@section('styles')
<link href="{{asset('assets/js/bootstrap/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/jquery.bxslider.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/jquery.countdown/jquery.countdown.css') }}">
@stop
{{-- Content --}}

@section('menuprincipal')
@include('site.layouts.menuprincipal')
<div class="container">
    <div id="descontando" class="col-md-4 pull-right"></div>
</div>
<div class="fechasSlider">
    <ul class="slider">
        <?php
        $tempdate = '';
        foreach ($fechaspartidos as $cadafecha): ?>

            <?php if ($tempdate != date( 'd-m',  strtotime($cadafecha))) { ?>
            <li><div class="fechas"><a href="{{URL::to(App::getLocale() . '/play/' . date( 'Y-m-d',  strtotime($cadafecha)) )}}" class="fecha"><span class="brasilfont">{{ date( 'd',  strtotime($cadafecha)) }}</span> <span class="valera">{{ date( 'M',  strtotime($cadafecha)) }}</span> </a></div></li>
            <?php }
            $tempdate = date( 'd-m',  strtotime($cadafecha));  ?>

        <?php endforeach; ?>
    </ul>
</div>
@stop


@section('content')
<div id="apuestas">
{{ Form::open(['url' => '/play/' . date( 'Y-m-d',strtotime($fecha)), 'method' => 'post','autocomplete'=>'off', 'class' => 'form-horizontal']) }}
    <?php //dd($partidos); ?>
    <?php foreach ($partidos as $partido): ?>
        <div class=" row">
            <div class="col-md-3 lugaryhora">
                <div class="horapartido">{{ date( 'H:i', strtotime($partido->inicio)) }}</div>
                <div class="estadio"><?php echo $partido->estadio->nombre;?></div>
            </div>
            <div class="col-md-9 partido">
                <div class="equipo1 bandera derecha {{ $partido->equipolocal->codigo }}">
                    {{ Lang::get('equipos.' . $partido->equipolocal->codigo) }}
                </div>
                <div class="marcador1">
                    @if (Carbon::now()<$partido->inicio)
                    <a href="#" id="marcador_equipo1" data-type="text" data-pk="{{ $partido->id }}" title="{{{ Lang::get('apuesta.marcador_equipo1') }}}">
                        {{ $partido->apuestas->first()->marcador_equipo1 or ''}}
                    </a>
                    @else
                        {{ $partido->apuestas->first()->marcador_equipo1 or '-'}}
                    @endif
                </div>
                <div class="grupo">
                    {{ $partido->equipolocal->grupo->nombre or '-'}}
                </div>
                <div class="marcador2">
                    @if (Carbon::now()<$partido->inicio)
                    <a href="#" id="marcador_equipo2" data-type="text" data-pk="{{ $partido->id }}" title="{{{ Lang::get('apuesta.marcador_equipo2') }}}">
                        {{ $partido->apuestas->first()->marcador_equipo2 or ''}}
                    </a>
                    @else
                    {{ $partido->apuestas->first()->marcador_equipo2 or '-'}}
                    @endif
                </div>
                <div class="equipo2 bandera izquierda {{ $partido->equipovisitante->codigo }}">
                    {{ Lang::get('equipos.' . $partido->equipovisitante->codigo) }}
                </div>

            </div>
            <div class="clearfix"></div>
        </div>
    <?php endforeach; ?>
</div>
{{ Form::close() }}
@stop

@section('contentderecha')
{{-- tabla de posiciones --}}
<div id="posiciones">
    <ul>
    <?php $lugar=1; ?>
    <?php foreach ($puntajes as $puntaje): ?>
        <li class="col-md-3 posicion">
            <div class="imagenuser">
                <a href="{{URL::to(App::getLocale() . '/user/' . $puntaje->id)}}">@if (!empty($puntaje->photo))
                    <img src="{{ asset('uploads/' . $puntaje->id . '/56x44_crop/' . $puntaje->photo) }}" />
                @else
                    <img src="{{ asset('assets/img/imagenpordefecto.png') }}" />
                @endif</a>
                <span class="lugar">{{ $lugar }}</span></div>

            <div class="secundario"><a href="{{URL::to(App::getLocale() . '/user/' . $puntaje->id)}}">@if (!empty($puntaje->realname))
                {{ $puntaje->realname }}
                @else
                {{ $puntaje->username }}
                @endif</a></div>
        </li>
    <?php
        $lugar ++;
    endforeach; ?>
    </ul>
</div>
<div class="banner-fixture"><img src="{{ asset('uploads/prode/403x72_crop/' . Prode::first()->bannerfixture) }}" /></div>
@stop

@section('scripts')
<!-- x-editable -->
<script src="{{asset('assets/js/bootstrap/bootstrap3-editable/js/bootstrap-editable.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
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
</script>
<script>
    $(function(){
        $('#apuestas a').editable({
            url: "{{URL::to('jugarrapido')}}",
            emptytext: '-',
            params: function($parametros) {
                $parametros.csrf_token = '{{{ csrf_token() }}}';
                return $parametros;
            }
        });
    });
    $(function(){
        var current = '{{ date( 'Y-m-d', strtotime($fecha)) }}';
        $('.fechasSlider li a').each(function(){
            var $this = $(this);
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1){
                $this.addClass('active');
            }
        })
    });
    $(function(){
        var count = $('.active').parent().closest('li').index();
        if (count <= 5){count = 0}
        if (count > 5 && count<=20){count -= 5}
        if (count > 20) {count = 15}
        var slider = $('.slider').bxSlider({
            infiniteLoop: false,
            pager: false,
            minSlides: 10,
            maxSlides: 10,
            slideWidth: 106,
            slideMargin: 6,
            moveSlides: 1,
            startSlide: 0
        });
        slider.goToSlide(count);
    });
</script>


@stop