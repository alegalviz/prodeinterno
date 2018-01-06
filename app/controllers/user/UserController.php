<?php

class UserController extends BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Users logged page
     *
     * @return View
     */
    public function getIndex()
    {
        list($user,$redirect) = $this->user->checkAuthAndRedirect('user');
        if($redirect){return $redirect;}

        $tiempoparaveda = Partido::where('inicio', '>', Carbon::now())->orderBy('inicio')->get(array('inicio'))->first();
        $posts = $user->posts()->take(10)->orderBy('created_at','desc')->get();
        $apuestas = Apuesta::leftjoin('partidos', 'apuestas.partido_id', '=', 'partidos.id')
            ->where('apuestas.user_id','=',$user->id)
            ->where('partidos.inicio', '<', Carbon::now())
            ->orderBy('apuestas.updated_at','asc')
            ->get(array('apuestas.id', 'apuestas.partido_id', 'apuestas.user_id', 'apuestas.marcador_equipo1', 'apuestas.marcador_equipo2','partidos.ronda', 'partidos.equipo1_id', 'partidos.equipo2_id','apuestas.updated_at'));
        //dd($apuestas);
        $miembros = $user->with('miembros')->where('id','=', Auth::user()->id)->get();

        // Show the page
        return View::make('site/user/index', compact('user', 'tiempoparaveda', 'posts', 'apuestas', 'miembros'));
    }
    /**
     * Users id page
     *
     * @return View
     */
    public function getUser($author)
    {
        list($user,$redirect) = $this->user->checkAuthAndRedirect('user');
        if($redirect){return $redirect;}

        $tiempoparaveda = Partido::where('inicio', '>', Carbon::now())->orderBy('inicio')->get(array('inicio'))->first();
        $posts = Post::where('user_id','=',$author->id)->take(10)->orderBy('created_at','desc')->get();

        $apuestas = Apuesta::leftjoin('partidos', 'apuestas.partido_id', '=', 'partidos.id')
            ->where('apuestas.user_id','=',$author->id)
            ->where('partidos.inicio', '<', Carbon::now())
            ->orderBy('apuestas.updated_at','desc')
            ->get(array('apuestas.id', 'apuestas.partido_id', 'apuestas.user_id', 'apuestas.marcador_equipo1', 'apuestas.marcador_equipo2','partidos.ronda', 'partidos.equipo1_id', 'partidos.equipo2_id','apuestas.updated_at'));

        $miembros = $author->with('miembros')->where('id','=', $author->id)->get();

        $user = $author;

        //dd($posts);        // Show the page
        return View::make('site/user/index', compact('user', 'tiempoparaveda', 'posts', 'apuestas', 'miembros'));
    }

    /**
     * Stores new user
     *
     */
    public function postIndex()
    {
        $this->user->username = Input::get( 'username' );
        $this->user->email = Input::get( 'email' );

        $this->user->realname = Input::get( 'realname' );

        $password = Input::get( 'password' );
        $passwordConfirmation = Input::get( 'password_confirmation' );

        $tos = Input::get( 'confirm' );
        if(empty($tos)) {
            return Redirect::to('user/create')
                ->withInput(Input::except('password','password_confirmation'))
                ->with('error', Lang::get('admin/users/messages.no_tos'));
        }


        if(!empty($password)) {
            if($password === $passwordConfirmation) {
                $this->user->password = $password;
                // The password confirmation will be removed from model
                // before saving. This field will be used in Ardent's
                // auto validation.
                $this->user->password_confirmation = $passwordConfirmation;
            } else {
                // Redirect to the new user page
                return Redirect::to('user/create')
                    ->withInput(Input::except('password','password_confirmation'))
                    ->with('error', Lang::get('admin/users/messages.password_does_not_match'));
            }
        } else {
            unset($this->user->password);
            unset($this->user->password_confirmation);
        }

        // Save if valid. Password field will be hashed before save
        $this->user->save();

        if ( $this->user->id )
        {
            // funcionalidad para prode por grupos
            if (Config::get('prode.modo') == 'grupal') {
                foreach (Input::get( 'grupo' ) as $jugador) {
                    if (!empty($jugador['realname']) && !empty($jugador['email'])) {
                        $miembro = new Miembro;
                        $miembro->user_id = $this->user->id;
                        $miembro->nombre = $jugador['realname'];
                        $miembro->email = $jugador['email'];
                        $miembro->save();
                    }
                }
            }

            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
            return Redirect::to('user/login')
                ->with( 'notice', Lang::get('user/user.user_account_created') );
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $this->user->errors()->all();

            return Redirect::to('user/create')
                ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Edits a user
     *
     */
    public function postEdit($user)
    {
        // Validate the inputs

        $rules = [
            'username' => 'required|alpha_dash',
            'email' => 'required|email',
            'password' => 'min:4|confirmed',
            'password_confirmation' => 'min:4',
            'image'     => 'image',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $oldUser = clone $user;
            $user->username = Input::get( 'username' );
            $user->email = Input::get( 'email' );
            $user->realname = Input::get( 'realname' );

            $password = Input::get( 'password' );
            $passwordConfirmation = Input::get( 'password_confirmation' );

            if(!empty($password)) {
                if($password === $passwordConfirmation) {
                    $user->password = $password;
                    // The password confirmation will be removed from model
                    // before saving. This field will be used in Ardent's
                    // auto validation.
                    $user->password_confirmation = $passwordConfirmation;
                } else {
                    // Redirect to the new user page
                    return Redirect::to('users')->with('error', Lang::get('admin/users/messages.password_does_not_match'));
                }
            } else {
                unset($user->password);
                unset($user->password_confirmation);
            }
            if (Input::file('image')){
                $user->photo = Image::upload(Input::file('image'), '' . $user->id, true);
            }
            if (Config::get('prode.modo') == 'grupal') {

                if (Input::get( 'grupo' )) {
                    foreach (Input::get( 'grupo' ) as $jugadorid => $jugador) {
                        if (!empty($jugador['n'])) {
                            if (!empty($jugador['n']['realname']) && !empty($jugador['n']['email'])) {
                                $miembro = new Miembro;
                                $miembro->user_id = $user->id;
                                $miembro->nombre = $jugador['n']['realname'];
                                $miembro->email = $jugador['n']['email'];
                                $miembro->save();
                            }
                        } else {
                            if (!empty($jugador['realname']) && !empty($jugador['email'])) {
                                $miembro = Miembro::find($jugadorid);
                                $miembro->nombre = $jugador['realname'];
                                $miembro->email = $jugador['email'];
                                $miembro->save();
                            }
                        }

                    }
                }
            }

            $user->prepareRules($oldUser, $user);

            // Save if valid. Password field will be hashed before save
            $user->amend($rules);
        }

        // Get validation errors (see Ardent package)
        $error = $user->errors()->all();

        if(empty($error)) {
            return Redirect::to('user')
                ->with( 'success', Lang::get('user/user.user_account_updated') );
        } else {
            return Redirect::to('user')
                ->withInput(Input::except('password','password_confirmation'))
                ->with( 'error', $error );
        }
    }

    /**
     * Post a post.
     *
     * @param  user id
     * @return post string
     */
    public function postPost()
    {
        // Declare the rules for the form validation
        $rules = array(
            'content' => 'required|max:255'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Save the post

            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->content = Input::get('content');

            // Was the comment saved with success?
            if($post->save())
            {
                // Redirect to this blog post pageS
                return $post->content;
            }

            // Redirect to this blog post page
            return ('There was a problem adding your post, please try again.');
        }

        // Redirect to this blog post page
        return ('There was a problem adding your post, please try again. Max: 140 characters');
    }

    /**
     * Displays the form for user creation
     *
     */
    public function getCreate()
    {
        return View::make('site/user/create');
    }


    /**
     * Displays the login form
     *
     */
    public function getLogin()
    {
        $user = Auth::user();
        if(!empty($user->id)){
            return Redirect::to('/');
        }

        return View::make('site/user/login');
    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin()
    {
        $input = array(
            'email'    => Input::get( 'email' ), // May be the username too
            'username' => Input::get( 'email' ), // May be the username too
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Check that the user is confirmed.
        if ( Confide::logAttempt( $input, true ) )
        {
            $r = Session::get('loginRedirect');
            if (!empty($r))
            {
                Session::forget('loginRedirect');
                return Redirect::to($r);
            }
            return Redirect::to('/');
        }
        else
        {
            // Check if there was too many login attempts
            if ( Confide::isThrottled( $input ) ) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ( $this->user->checkUserExists( $input ) && ! $this->user->isConfirmed( $input ) ) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::to('user/login')
                ->withInput(Input::except('password'))
                ->with( 'error', $err_msg );
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function getConfirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            return Redirect::to('user/login')
                ->with( 'notice', Lang::get('confide::confide.alerts.confirmation') );
        }
        else
        {
            return Redirect::to('user/login')
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_confirmation') );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function getForgot()
    {
        return View::make('site/user/forgot');
    }

    /**
     * Attempt to reset password with given email
     *
     */
    public function postForgot()
    {
        if( Confide::forgotPassword( Input::get( 'email' ) ) )
        {
            return Redirect::to('user/login')
                ->with( 'notice', Lang::get('confide::confide.alerts.password_forgot') );
        }
        else
        {
            return Redirect::to('user/forgot')
                ->withInput()
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_password_forgot') );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function getReset( $token )
    {

        return View::make('site/user/reset')
            ->with('token',$token);
    }


    /**
     * Attempt change password of the user
     *
     */
    public function postReset()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
        );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            return Redirect::to('user/login')
            ->with( 'notice', Lang::get('confide::confide.alerts.password_reset') );
        }
        else
        {
            return Redirect::to('user/reset/'.$input['token'])
                ->withInput()
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_password_reset') );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function getLogout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

    /**
     * Get user's profile
     * @param $username
     * @return mixed
     */
    public function getProfile($username=null)
    {
        $userModel = new User;
        $user = $userModel->getUserByUsername($username);
        $miembros = $userModel->miembros()->get();

        // Check if the user exists
        if (is_null($user))
        {
            //return App::abort(404);
            $user = Auth::user();
        }

        return View::make('site/user/profile', compact('user', 'miembros'));
    }

    public function getSettings()
    {
        list($user,$redirect) = User::checkAuthAndRedirect('user/settings');
        if($redirect){return $redirect;}

        $miembros = $user->miembros()->get();

        return View::make('site/user/profile', compact('user', 'miembros'));
    }

    /**
     * Process a dumb redirect.
     * @param $url1
     * @param $url2
     * @param $url3
     * @return string
     */
    public function processRedirect($url1,$url2,$url3)
    {
        $redirect = '';
        if( ! empty( $url1 ) )
        {
            $redirect = $url1;
            $redirect .= (empty($url2)? '' : '/' . $url2);
            $redirect .= (empty($url3)? '' : '/' . $url3);
        }
        return $redirect;
    }
}
