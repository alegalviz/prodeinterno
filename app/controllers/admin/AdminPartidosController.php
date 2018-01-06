<?php

class AdminPartidosController extends AdminController
{

    /**
     * Partido Model
     * @var Partido
     */
    protected $partido;

    /**
     * Inject the models.
     * @param Partido $partido
     */
    public function __construct(Partido $partido)
    {
        parent::__construct();
        $this->partido = $partido;
    }

    /**
     * Mostrar la configuración actual.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/partidos/title.partido_management');

        // Grab partido data
        $partidos = $this->partido;

        // Show the page
        return View::make('admin/partidos/index', compact('partidos', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $partido
     * @return Response
     */
	public function getEdit($partido)
	{
        // Title
        $title = Lang::get('admin/partidos/title.partido_update');
        $estadios = Estadio::lists('nombre', 'id');
        $equipos = Equipo::orderBy('nombre')->lists('nombre', 'id');
        $resultado = $partido->resultado()->get();

        // Show the page
        return View::make('admin/partidos/edit', compact('partido', 'title', 'estadios', 'equipos', 'resultado'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $prode
     * @return Response
     */
	public function postEdit($partido)
	{
        // Declare the rules for the form validation
        $rules = array(
            'estadio_id' => 'required|integer',
            'equipo1_id' => 'required|integer',
            'equipo2_id' => 'required|integer',
            'inicio'     => 'required|date',
            'marcador_equipo1' => 'integer',
            'marcador_equipo2' => 'integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $partido->estadio_id = Input::get('estadio_id');
            $partido->equipo1_id = Input::get('equipo1_id');
            $partido->equipo2_id = Input::get('equipo2_id');
            $partido->inicio = Input::get('inicio');

            // Fue modificado la configuración del prode?
            if($partido->save())
            {
                //--calculo de puntajes--
                if (Input::get('marcador_equipo1')!='' && Input::get('marcador_equipo2') !='') {

                    $resultado = Resultado::firstOrNew(array('partido_id' => $partido->id));

                    $resultado->marcador_equipo1 = Input::get('marcador_equipo1');
                    $resultado->marcador_equipo2 = Input::get('marcador_equipo2');
                    //deprecated
                    $resultado->ganador_equipo_id = $partido->equipo1_id; //pongo cualquiera porque puede ser empate
                    $resultado->partido_id = $partido->id;
                    $resultado->save();

                    //traer un array con las apuestas de este partido
                    $apuestas = Apuesta::where('partido_id', '=', $partido->id)->get();
                    //traigo los puntos configurados en el prode
                    $prode = Prode::first()->get();

                    $puntosExacto = $prode->first()->puntajeaciertoexacto;
                    $puntosParciales = $prode->first()->puntajeaciertoparcial;


                    //por cada apuesta que tenga este partido, creo o busco
                    foreach ($apuestas as $apuesta) {
                        $puntaje = Puntaje::firstOrNew(array('user_id' => $apuesta->user_id));
                        $puntaje->user_id = $apuesta->user_id;
                        if (($apuesta->marcador_equipo1 == $resultado->marcador_equipo1 &&
                            $apuesta->marcador_equipo2 == $resultado->marcador_equipo2)){
                            //acerto el puntaje exactamente
                            $puntaje->total = $puntaje->total + $puntosExacto;
                            $puntaje->aciertosexactos ++;
                        } elseif (($apuesta->marcador_equipo1 > $apuesta->marcador_equipo2 &&
                            $resultado->marcador_equipo1 > $resultado->marcador_equipo2) ||
                            ($apuesta->marcador_equipo1 == $apuesta->marcador_equipo2 &&
                                $resultado->marcador_equipo1 == $resultado->marcador_equipo2) ||
                            ($apuesta->marcador_equipo1 < $apuesta->marcador_equipo2 &&
                                $resultado->marcador_equipo1 < $resultado->marcador_equipo2)){
                            //acerto quien ganaba o empate
                            $puntaje->total = $puntaje->total + $puntosParciales;
                            $puntaje->aciertosparciales ++;
                        }

                        $puntaje->save();
                    }


                }
                // Redirect to the new comment post page
                return Redirect::to('admin/partidos/' . $partido->id . '/edit')->with('success', Lang::get('admin/partidos/messages.update.success'));
            }

            // Redirect to the comments post management page
            return Redirect::to('admin/partidos/' . $partido->id . '/edit')->with('error', Lang::get('admin/partidos/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/partidos/' . $partido->id . '/edit')->withInput()->withErrors($validator);
	}

    /**
     * Muestra los datos de la tabla prode for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $partido = Partido::leftjoin('estadios', 'estadios.id', '=', 'partidos.estadio_id')
            ->leftjoin('equipos as locales', 'locales.id', '=','partidos.equipo1_id' )
            ->leftjoin('equipos as visitantes', 'visitantes.id', '=','partidos.equipo2_id' )
            ->leftjoin('resultados', 'resultados.partido_id', '=', 'partidos.id')
            ->select(array('partidos.id as id', 'partidos.ronda as ronda', 'partidos.inicio as inicio', 'estadios.nombre as estadio', 'resultados.marcador_equipo1 as marcador_local', 'locales.nombre as local', 'visitantes.nombre as visita', 'resultados.marcador_equipo2 as marcador_visita'))
            ->orderBy('inicio');

        return Datatables::of($partido)

        //->edit_column('estadio', '{{{ DB::table(\'estadios\')->where(\'id\', \'=\', $estadio) }}}')
        /*
        ->add_column('actions', '<a href="{{{ URL::to(\'admin/partidos/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-default btn-xs">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="{{{ URL::to(\'admin/partidos/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
        */
        ->add_column('actions', '<a href="{{{ URL::to(\'admin/partidos/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-default btn-xs">{{{ Lang::get(\'button.edit\') }}}</a>

        ')

        ->remove_column('id')

        ->make();
    }

}
