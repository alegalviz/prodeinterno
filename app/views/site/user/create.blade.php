@extends('site.layouts.fullwidth')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div id="signup" class=" col-md-12">
    <div class="page-header">
        <h1>{{{ Lang::get('user/user.register') }}}</h1>
    </div>
    <form method="POST" class=" col-md-12" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
        <div class="col-md-6">
            <fieldset>
                <div class="form-group">
                    <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
                </div>
                <div class="form-group">
                    <label for="realname">
                        @if (Config::get('prode.modo') == 'grupal')
                            {{{ Lang::get('user/user.fields.realnameteam') }}}
                        @else
                            {{{ Lang::get('user/user.fields.realname') }}}
                        @endif
                    </label>
                    <input class="form-control" placeholder="{{{ Lang::get('user/user.fields.realname') }}}" type="text" name="realname" id="realname" value="{{{ Input::old('realname') }}}">
                </div>
                <div class="form-group">
                    <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                </div>
                <div class="form-group">
                    <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form-group">
                    <input name="confirm" type="checkbox" value="accept" data-target="{{asset('assets/docs/reglamento_' . App::getLocale() . '.pdf')}}">
                    <label for="confirm">{{{ Lang::get('confide::confide.tosconfirmation') }}}</label>
                </div>

            </fieldset>
        </div>
        <div class="col-md-5 col-md-push-1">
            @if (Config::get('prode.modo') == 'grupal')
            <h3>{{{ Lang::get('user/user.fields.equipo') }}}</h3>
            <small>{{{ Lang::get('user/user.fields.mailequiporequired') }}}</small>
            <fieldset>
                <?php $cantidadmiembros = Config::get('prode.miembros') ?>
                <table id="gruposignup" class="table">
                    <tbody>
                        @for ($i = 1; $i <= $cantidadmiembros; $i++)
                            <tr>
                                <td>
                                    <label for="realname">{{{ Lang::get('user/user.fields.realname') }}}</label>
                                    <input class="form-control" placeholder="{{{ Lang::get('user/user.fields.realname') }}}" type="text" name="grupo[{{$i}}][realname]" id="realname" value="{{{ Input::old('grupo[{{$i}}][realname]') }}}">
                                </td>
                                <td>
                                    <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} </label>
                                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="grupo[{{$i}}][email]" id="email" value="{{{ Input::old('grupo[{{$i}}][email]') }}}">

                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </fieldset>
            @endif
        </div>

            <div class=" col-md-12 form-actions form-group">
                <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
            </div>
    </form>
</div>
@stop
@section('scripts')
<script>
    $(function(){
        $("input[type='checkbox']").change(function(){
            var item=$(this);
            var windowSize = "width=600,height=600,scrollbars=yes";
            var windowName = "Tu Prode - {{{ Lang::get('site.menusup.reglamento') }}}";
            if(item.is(":checked"))
            {
                window.open(item.data("target"), windowName, windowSize);
            }
        });
    })
</script>
@stop