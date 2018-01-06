<?php

class AdminResultadosController extends AdminController
{

    /**
     * Partido Model
     * @var Resultado
     */
    protected $resultado;

    /**
     * Inject the models.
     * @param Partido $partido
     */
    public function __construct(Resultado $resultado)
    {
        parent::__construct();
        $this->resultado = $resultado;
    }

    /**
     * Mostrar la configuración actual.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/resultados/title.resultado_management');

        // Grab resultado data
        $resultados = $this->resultado->with(array('partido' => function($query)
            {
                $query->orderBy('inicio', 'desc');

            }))->get();

        // Show the page
        return View::make('admin/resultados/index', compact('resultados', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $partido
     * @return Response
     */
	public function getEdit($resultado)
	{
        // Title
        $title = Lang::get('admin/resultados/title.resultado_update');
        $estadios = Estadio::lists('nombre', 'id');
        $equipos = Equipo::orderBy('nombre')->lists('nombre', 'id');
        // Show the page
        return View::make('admin/partidos/edit', compact('resultado', 'title', 'estadios', 'equipos'));
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
            'inicio'     => 'required|date'
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
        $partido = Resultado::leftjoin('partidos', 'partidos.id', '=', 'resultados.partido_id')
            ->leftjoin('estadios', 'estadios.id', '=', 'partidos.estadio_id')
            ->leftjoin('equipos as locales', 'locales.id', '=','partidos.equipo1_id' )
            ->leftjoin('equipos as visitantes', 'visitantes.id', '=','partidos.equipo2_id' )
            ->select(array('partidos.id as id', 'partidos.ronda as ronda', 'partidos.inicio as inicio', 'estadios.nombre as estadio', 'locales.nombre as local', 'visitantes.nombre as visita'))
            ->orderBy('inicio');

        return Datatables::of($partido)

        //->edit_column('estadio', '{{{ DB::table(\'estadios\')->where(\'id\', \'=\', $estadio) }}}')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/partidos/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-default btn-xs">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="{{{ URL::to(\'admin/partidos/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>

        ')

        ->remove_column('id')

        ->make();
    }

}
