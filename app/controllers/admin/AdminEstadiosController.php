<?php

class AdminEstadiosController extends AdminController
{

    /**
     * Prode Model
     * @var Prode
     */
    protected $estadio;

    /**
     * Inject the models.
     * @param Prode $prode
     */
    public function __construct(Estadio $estadio)
    {
        parent::__construct();
        $this->estadio = $estadio;
    }

    /**
     * Mostrar la configuración actual.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/estadios/title.estadio_management');

        // Grab estadio data
        $estadios = $this->estadio;

        // Show the page
        return View::make('admin/estadios/index', compact('estadios', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $comment
     * @return Response
     */
	public function getEdit($estadio)
	{
        // Title
        $title = Lang::get('admin/estadios/title.estadio_update');

        // Show the page
        return View::make('admin/estadios/edit', compact('estadio', 'title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $prode
     * @return Response
     */
	public function postEdit($estadio)
	{
        // Declare the rules for the form validation
        $rules = array(
            'nombre' => 'required',
            'ciudad' => 'required',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $estadio->nombre = Input::get('nombre');
            $estadio->ciudad = Input::get('ciudad');
            // Fue modificado la configuración del prode?
            if($estadio->save())
            {
                // Redirect to the new comment post page
                return Redirect::to('admin/estadios/' . $estadio->id . '/edit')->with('success', Lang::get('admin/estadios/messages.update.success'));
            }

            // Redirect to the comments post management page
            return Redirect::to('admin/estadios/' . $estadio->id . '/edit')->with('error', Lang::get('admin/estadios/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/estadios/' . $estadio->id . '/edit')->withInput()->withErrors($validator);
	}

    /**
     * Muestra los datos de la tabla prode for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $estadio = Estadio::select(array('estadios.id as id', 'estadios.nombre as nombre', 'estadios.ciudad as ciudad'));

        return Datatables::of($estadio)

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/estadios/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-default btn-xs">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="{{{ URL::to(\'admin/estadios/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>

        ')

        ->remove_column('id')

        ->make();
    }

}
