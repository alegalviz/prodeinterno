<?php

class AdminProdesController extends AdminController
{

    /**
     * Prode Model
     * @var Prode
     */
    protected $prode;

    /**
     * Inject the models.
     * @param Prode $prode
     */
    public function __construct(Prode $prode)
    {
        parent::__construct();
        $this->prode = $prode;
    }

    /**
     * Mostrar la configuración actual.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/prode/title.prode_management');

        // Grab prode data
        $prodes = $this->prode;

        // Show the page
        return View::make('admin/prodes/index', compact('prodes', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $comment
     * @return Response
     */
	public function getEdit($prode)
	{
        // Title
        $title = Lang::get('admin/prode/title.prode_update');

        $prode = Prode::find($prode);
        // Show the page
        return View::make('admin/prodes/edit', compact('prode', 'title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $prode
     * @return Response
     */
	public function postEdit($prode)
	{
        $prode = Prode::find($prode);
        // Declare the rules for the form validation
        $rules = array(
            'logoempresa' => 'image',
            'puntajeaciertoexacto' => 'integer',
            'puntajeaciertoparcial' => 'integer',
            'bannerfixture' => 'image',
            'bannerlogin' => 'image',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $logoempresa = Config::get('image.logoempresa');
            $bannerfixture = Config::get('image.bannerfixture');
            $bannerlogin = Config::get('image.bannerlogin');
            if (Input::file('logoempresa')) {
                $newlogoempresa = Image::resize('/uploads/prode/' . Image::upload(Input::file('logoempresa'), 'prode', false),$logoempresa[0],$logoempresa[1],$logoempresa[2],$logoempresa[3]);
                $prode->logoempresa = $newlogoempresa;
            }
            if (Input::file('bannerfixture')){
                $newbannerfixture = Image::resize('/uploads/prode/' . Image::upload(Input::file('bannerfixture'), 'prode', false),$bannerfixture[0],$bannerfixture[1],$bannerfixture[2],$bannerfixture[3]);
                $prode->bannerfixture = $newbannerfixture;
            }
            if (Input::file('bannerlogin')) {
                $newbannerlogin = Image::resize('/uploads/prode/' . Image::upload(Input::file('bannerlogin'), 'prode', false),$bannerlogin[0],$bannerlogin[1],$bannerlogin[2],$bannerlogin[3]);
                $prode->bannerlogin = $newbannerlogin;
            }

            $prode->puntajeaciertoexacto = Input::get('puntajeaciertoexacto');
            $prode->puntajeaciertoparcial = Input::get('puntajeaciertoparcial');
            // Fue modificado la configuración del prode?
            if($prode->save())
            {
                // Redirect to the new comment post page
                return Redirect::to('admin/prodes/' . $prode->id . '/edit')->with('success', Lang::get('admin/prode/messages.update.success'));
            }

            // Redirect to the comments post management page
            return Redirect::to('admin/prodes/' . $prode->id . '/edit')->with('error', Lang::get('admin/prode/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/prodes/' . $prode->id . '/edit')->withInput()->withErrors($validator);
	}

    /**
     * Muestra los datos de la tabla prode for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $prode = Prode::select(array('prodes.id as id', 'prodes.logoempresa as logoempresa', 'prodes.puntajeaciertoexacto as puntajeaciertoexacto', 'prodes.puntajeaciertoparcial as puntajeaciertoparcial', 'prodes.bannerfixture as bannerfixture', 'prodes.bannerlogin as bannerlogin'));

        return Datatables::of($prode)

        ->edit_column('logoempresa', '<img src="{{{ asset(\'uploads/prode/165x58_crop/\' . $logoempresa) }}}" width="150" />')

        ->edit_column('bannerfixture', '<img src="{{{ asset(\'uploads/prode/403x72_crop/\' .$bannerfixture) }}}" width="150" />')

        ->edit_column('bannerlogin', '<img src="{{{ asset(\'uploads/prode/353x225_crop/\' .$bannerlogin) }}}" width="150" />')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/prodes/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-default btn-xs">{{{ Lang::get(\'button.edit\') }}}</a>')

        ->remove_column('id')

        ->make();
    }

}
