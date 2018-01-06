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
@stop


@section('content')

{{-- tabla de posiciones --}}
<table id="posiciones" class="table">
    <thead>
    <tr>
        <th class="col-md-2">{{{ Lang::get('posiciones.posicion') }}}</th>
        <th class="col-md-3">{{{ Lang::get('posiciones.perfil') }}}</th>
        <th class="col-md-2">{{{ Lang::get('posiciones.aciertosparciales') }}}</th>
        <th class="col-md-2">{{{ Lang::get('posiciones.aciertosexactos') }}}</th>
        <th class="col-md-3">{{{ Lang::get('posiciones.puntostotales') }}}</th>
    </tr>
    </thead>
    <tbody>
    <?php $lugar=1; ?>
    <?php foreach ($posiciones as $posicion): ?>
     <tr>
        <td class="col-md-2">
            <div class="imagenuser">
                @if (!empty($posicion->photo))
                <img src="{{ asset('uploads/' . $posicion->id . '/56x44_crop/' . $posicion->photo) }}" />
                @else
                <img src="{{ asset('assets/img/imagenpordefecto.png') }}" />
                @endif<span class="lugar">{{ $lugar }}</span>
            </div>

        </td>
        <td class="col-md-3">
            <div>
                <a href="{{URL::to(App::getLocale() . '/user/' . $posicion->id)}}">@if (!empty($posicion->realname))
                {{ $posicion->realname }}
                @else
                {{ $posicion->username }}
                @endif</a></div>
        </td>
         <td class="col-md-2">
             <div class="numero">{{ $posicion->puntaje->aciertosparciales or '0' }}</div>
         </td>
         <td class="col-md-2">
             <div class="numero">{{ $posicion->puntaje->aciertosexactos or '0' }}</div>
         </td>
         <td class="col-md-3">
             <div class="puntos">{{ $posicion->puntaje->total or '0' }}</div>
         </td>
     </tr>

        <?php
        $lugar ++;
    endforeach; ?>
    </tbody>
</table>
@stop

@section('contentderecha')
{{-- tabla de resultados cargados --}}
<div class="col-md-10 col-md-push-2">
<table id="resultados" class="table table-striped table-hover">
    <thead>
    <tr>
        <th class="col-md-1">{{{ Lang::get('posiciones.fecha') }}}</th>
        <th class="col-md-2">{{{ Lang::get('posiciones.equipos') }}}</th>
        <th class="col-md-1">{{{ Lang::get('posiciones.goles') }}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($resultados as $resultado)
        <tr>
            <td class="col-md-1">
                <div class="fecha">
                    <div class="dia brasilfont">{{ date( 'd', strtotime($resultado->partido->inicio)) }}</div>
                    <div class="mes varela">{{ date( 'M', strtotime($resultado->partido->inicio)) }}</div>
                </div>
            </td>
            <td class="col-md-2">
                <div class="equipos">
                    <div class="equipo1 bandera izquierda {{ $resultado->partido->equipolocal->codigo }}">
                        {{ Lang::get('equipos.' . $resultado->partido->equipolocal->codigo) }}
                    </div>
                    <div class="equipo2 bandera izquierda {{ $resultado->partido->equipovisitante->codigo }}">
                        {{ Lang::get('equipos.' . $resultado->partido->equipovisitante->codigo) }}
                    </div>
                </div>
            </td>
            <td class="col-md-1">
                <div class="marcador">
                    <div class="">{{ $resultado->marcador_equipo1 }}</div>
                    <div class="">{{ $resultado->marcador_equipo2 }}</div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
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
</script>
@stop