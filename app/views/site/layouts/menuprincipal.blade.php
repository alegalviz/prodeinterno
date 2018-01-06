
<!-- Navbar -->
<div class="varela menu col-md-8">
     <div class="container ">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav pull-left">
                <li {{ (Request::is('play*') ? ' class="active"' : '') }}><a href="{{{ URL::to('/' . App::getLocale() . '/play/' . date( 'Y-m-d', strtotime(Carbon::now()))) }}}">{{{ Lang::get('site.menuprincipal.juga') }}}</a></li>
                <li><a href="{{{ URL::to(App::getLocale() . '/posiciones') }}}">{{{ Lang::get('site.menuprincipal.tablaposiciones') }}}</a></li>
                <li><a href="{{{ URL::to(App::getLocale() . '/cartelera') }}}">{{{ Lang::get('site.menuprincipal.cartelera') }}}</a></li>

            </ul>
            <!-- ./ nav-collapse -->
        </div>
    </div>
</div>
<!-- ./ navbar -->