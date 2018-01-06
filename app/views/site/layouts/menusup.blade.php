
<!-- Navbar -->
<div class="top-celeste varela">
     <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav pull-right">
                @if (Auth::check())
                @if (Auth::user()->hasRole('admin'))
                <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                @endif
                <li><a href="{{{ URL::to(App::getLocale() . '/user') }}}">{{{ Lang::get('user/user.sesioncomo') }}} {{{ Auth::user()->username }}}</a></li>
                <li><a href="{{{ URL::to(App::getLocale() . '/user/logout') }}}">{{{ Lang::get('site.logout') }}}</a></li>
                @else
                <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to(App::getLocale() . '/user/login') }}}">{{{ Lang::get('site.sign_in') }}}</a></li>
                <li {{ (Request::is('user/register') ? ' class="active"' : '') }}><a href="{{{ URL::to(App::getLocale() . '/user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="{{asset('assets/docs/reglamento_' . App::getLocale() . '.pdf')}}" target="_blank" class="reglamento">{{{ Lang::get('site.menusup.reglamento') }}}</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">{{{ Lang::get('site.home') }}}</a></li>
                <li><a href="{{{ URL::to(L18n::currentUrl('en')) }}}" class="USA idioma">{{{ Lang::get('site.ingles') }}}</a></li>
                <li><a href="{{{ URL::to(L18n::currentUrl('es'))}}}" class="ESP idioma">{{{ Lang::get('site.espanol') }}}</a></li>

            </ul>
            <!-- ./ nav-collapse -->
        </div>
    </div>
</div>
<!-- ./ navbar -->
