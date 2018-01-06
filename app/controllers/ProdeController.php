<?php

class ProdeController extends BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Partido Model
     * @var partido
     */
    protected $partido;

    /**
     * Apuesta Model
     * @var apuesta
     */
    protected $apuesta;


    /**
     * Inject the models.
     * @param Post $post
     * @param User $user
     */
    public function __construct(User $user, Partido $partido, Apuesta $apuesta)
    {
        parent::__construct();

        $this->user = $user;
        $this->partido = $partido;
        $this->apuesta = $apuesta;
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
        return Redirect::to('play');
	}

    public function getPlay($fecha=null)
    {

        //GOTO fecha actual o primer fecha.
        if (is_null($fecha)){ $fecha=Carbon::now();}
        $fecha = Carbon::parse($fecha);

        if (Carbon::createFromDate(2014, 6, 12) > $fecha){
            $from = date( 'Y-m-d', strtotime($fecha));
            $to = date( 'Y-m-d',  strtotime(Carbon::createFromDate(2014, 6, 13)));
        } else {
            $from = date( 'Y-m-d', strtotime($fecha));
            $to = date( 'Y-m-d',  strtotime(Carbon::parse($from)->addDay()));
        }



        $fechaspartidos = Partido::lists('inicio');

        //partidos entre 2 fechas, con las apuestas si existen del usuario logueado laa
        //http://laravel.com/docs/eloquent#querying-relations
        //http://laravel.com/docs/eloquent#eager-loading
        $partidos = Partido::whereBetween('inicio', array($from, $to))->with(array('apuestas' => function($query)
        {
            $query->where('user_id', '=', Auth::user()->id);

        }))->orderBy('inicio', 'asc')->get();

        $tiempoparaveda = Partido::where('inicio', '>', Carbon::now())->orderBy('inicio')->get(array('inicio'))->first();


        //las 10 posiciones de usuarios
        /*$puntajes = User::with(array('puntaje' => function($query)
            {
                $query->orderBy('total', 'desc');

            }))->take(10)->get();*/

        /*$puntajes = DB::table('users')
            ->leftJoin('puntajes', 'users.id', '=', 'puntajes.user_id')
            ->orderBy('puntajes.total','desc')
            ->take(10)->get();
        */
        $puntajes = User::leftjoin('puntajes', 'users.id', '=', 'puntajes.user_id')
            ->select(array('users.id', 'users.photo', 'users.realname', 'users.username', 'puntajes.aciertosparciales', 'puntajes.aciertosexactos', 'puntajes.total'))
            ->orderBy('puntajes.total', 'desc')
            ->take(10)
            ->get();

        //dd($posiciones);
        // Show the page
        return View::make('site/index', compact('partidos', 'fechaspartidos', 'fecha', 'puntajes', 'tiempoparaveda'));
    }

    public function postJugarRapido()
    {
        $inputs = Input::all();

        $idApuesta = Apuesta::where('partido_id', '=', $inputs['pk'])->where('user_id', '=', Auth::user()->id)->get();
        $partidoapostado = Partido::find($inputs['pk']);
        if (Carbon::now() < $partidoapostado->inicio) {
            if ($idApuesta->isEmpty()) {
                $apuesta = new Apuesta;
                $apuesta->user_id = Auth::user()->id;
                $apuesta->partido_id = $inputs['pk'];
                $apuesta->marcador_equipo1 = '0';
                $apuesta->marcador_equipo2 = '0';
            } else {
                $apuesta = Apuesta::find($idApuesta->first()->id);
            }

            if ($inputs['name'] == 'marcador_equipo1') {
                $apuesta->marcador_equipo1 = $inputs['value'];
            }
            if ($inputs['name'] == 'marcador_equipo2') {
                $apuesta->marcador_equipo2 = $inputs['value'];
            }


            if ($apuesta->save()) {
                return Lang::get('apuesta.actualizada');
            } else {
                return Lang::get('apuesta.error');
            }
        } else {
            return (Lang::get('apuesta.error') . '. El partido ya comenzo.');
        }


    }
}
