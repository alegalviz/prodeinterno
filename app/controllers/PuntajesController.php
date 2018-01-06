<?php

class PuntajesController extends BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Partido Model
     * @var partido
     */
    protected $puntaje;



    /**
     * Inject the models.
     * @param Post $post
     * @param User $user
     */
    public function __construct(User $user, Puntaje $puntaje)
    {
        parent::__construct();

        $this->user = $user;
        $this->puntaje = $puntaje;
    }
    
	/**
	 * Returns all the blog posts.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Show the page
		//return View::make('site/index', compact('apuestas', 'fechaspartidos', 'fecha'));
        return Redirect::to('posiciones');
	}

    public function getPosiciones()
    {
         $tiempoparaveda = Partido::where('inicio', '>', Carbon::now())->orderBy('inicio')->get(array('inicio'))->first();

        //$posiciones = User::with(array('puntaje','miembros'))->get();

        /*
         *  $posiciones = User::with(array('puntaje' => function($query)
            {
                $query->orderBy('total', 'desc');

            }))->get();*/

         $posiciones = User::leftjoin('puntajes', 'users.id', '=', 'puntajes.user_id')
            //->leftjoin('miembros', 'miembros.user_id', '=', 'users.id')
            ->select(array('users.id', 'users.photo', 'users.realname', 'users.username', 'puntajes.aciertosparciales', 'puntajes.aciertosexactos', 'puntajes.total'))
            //->groupBy('users.id')
            ->orderBy('puntajes.total', 'desc')->get();
        //dd($posiciones);

        $resultados = Resultado::with(array('partido.equipolocal', 'partido.equipovisitante'))->get();

        //dd($resultados);
        // Show the page
        return View::make('site/posiciones/index', compact('posiciones', 'tiempoparaveda', 'resultados'));
    }

}
