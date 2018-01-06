@extends('site.layouts.default')

{{-- Content --}}
@section('content')
<div class="container">


    <?php foreach ($partidosporfecha as $partido): ?>
        <ul>
                    <li><?php echo $partido->estadio->nombre;?></li>
                    <li><?php echo $partido->inicio; ?></li>
                    <li><?php echo $partido->equipolocal->nombre; ?></li>
                    <li><?php echo $partido->equipovisitante->nombre; ?></li>
        </ul>
    <?php endforeach; ?>


</div>
@stop