<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Prode Mundial 2014
			@show
		</title>
		<meta name="keywords" content="prode, mundial, brasil, 2014, buenoscocos, abcomunicaciones" />
		<meta name="author" content="BuenosCocos" />
		<meta name="description" content="Disfrutá del prode jugado desde adentro!." />
        <meta name="robots" CONTENT="NOINDEX, NOFOLLOW">
        @yield('metatags')

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/bootstrap/bootstrap3-editable/css/bootstrap-editable.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/prode.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/stylesheet.css')}}">

		<style>
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="{{asset('assets/js/html5.js')}}"></script>
        <script src="{{asset('assets/js/respond.min.js')}}"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
	</head>

	<body class="@yield('bodyclasses')">
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
        @include('site.layouts.menusup')
        <div class="header-image">
            <div class="logoempresa container"><img src="{{ asset('uploads/prode/165x58_crop/' . Prode::find(1)->logoempresa) }}" /></div>
        </div>
        <div class="menuprincipal container">
        @yield('menuprincipal')
        </div>
            <?php
            if(isset($_SERVER['HTTP_REFERER'])) {
                echo '<div class="volver">';
                echo "<a class='pull-right btn btn-default btn-small btn-inverse' href=".$_SERVER['HTTP_REFERER'].">Volver</a>";
                echo "</div>";
            }
            ?>
		<!-- Container -->
		<div class="container">
			<!-- Notifications -->
			@include('notifications')
			<!-- ./ notifications -->


            <div class="col-sm-12 izquierda">
                <!-- Content -->
                @yield('content')
                <!-- ./ content -->
            </div>
		</div>
		<!-- ./ container -->

		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->


	    <div id="footer">
	      <div class="logosabcocos">
	      </div>
	    </div>

		<!-- Javascripts
		================================================== -->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>

        @yield('scripts')
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-51169612-1', 'tuprodemundial.com.ar');
            ga('send', 'pageview');

        </script>
	</body>
</html>
