@extends('site.layouts.fullwidth')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.settings') }}} ::
@parent
@stop

{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
@stop

{{-- Content --}}
@section('content')
<div id="editprofile" class=" col-md-12">
    <div class="page-header">
        <h3>{{{ Lang::get('user/user.editprofile') }}}</h3>
    </div>

    {{ Form::open(['url' => 'user/' . $user->id . '/edit', 'files' => true, 'method' => 'post','autocomplete'=>'off', 'class' => 'form-horizontal']) }}
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <!-- General tab -->
    <div class="col-md-6">
        <div class="tab-pane active" id="tab-general">
            <!-- username -->
            <div class="form-group {{{ $errors->has('username') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="username">{{{ Lang::get('user/user.fields.username') }}}</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="username" id="username" value="{{{ Input::old('username', $user->username) }}}" />
                    {{ $errors->first('username', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ username -->
            <!-- realname -->
            <div class="form-group {{{ $errors->has('realname') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="realname">{{{ Lang::get('user/user.fields.realname') }}}</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="realname" id="realname" value="{{{ Input::old('realname', $user->realname) }}}" />
                    {{ $errors->first('realname', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ username -->

            <!-- Email -->
            <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="email">Email</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', $user->email) }}}" />
                    {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ email -->

            <!-- Password -->
            <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="password">Password</label>
                <div class="col-md-10">
                    <input class="form-control" type="password" name="password" id="password" value="" />
                    {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ password -->

            <!-- Password Confirm -->
            <div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
                <div class="col-md-10">
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
                    {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
                </div>
            </div>

            <div class="form-group {{{ $errors->has('image') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="imagen">{{{ Lang::get('user/user.fields.imagen') }}}</label>
                <div class="col-md-10">
                    {{ Form::file('image') }}
                </div>
            </div>

            <!-- ./ password confirm -->
        </div>
        <!-- ./ general tab -->
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

                        @if (isset($miembros[$i-1]))
                            <input class="form-control" placeholder="{{{ Lang::get('user/user.fields.realname') }}}" type="text" name="grupo[{{ $miembros[$i-1]->id or 0 }}][realname]" id="realname" value="{{{ $miembros[$i-1]->nombre or ''}}}">
                        @else
                            <input class="form-control" placeholder="{{{ Lang::get('user/user.fields.realname') }}}" type="text" name="grupo[{{$i}}][n][realname]" id="realname" value="">
                        @endif
                    </td>
                    <td>
                        <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} </label>
                        @if (isset($miembros[$i-1]))
                            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="grupo[{{$miembros[$i-1]->id or 0}}][email]" id="email" value="{{{ $miembros[$i-1]->email or '' }}}">
                        @else
                            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="grupo[{{$i}}][n][email]" id="email" value="">
                        @endif

                    </td>
                </tr>
                @endfor
                </tbody>
            </table>
        </fieldset>
        @endif
    </div>
    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <a href="javascript:history.back();" class="btn btn-cancel">{{{ Lang::get('general.cancelar') }}}</a>
            <button type="submit" class="btn btn-success">{{{ Lang::get('general.actualizar') }}}</button>
        </div>
    </div>
    <!-- ./ form actions -->
    </form>
    {{ Form::close() }}
</div>
@stop
