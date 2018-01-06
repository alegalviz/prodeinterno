<?php

class PartidosController extends BaseController {

    /**
     * Post Model
     * @var Partido
     */
    protected $partido;
	/**
	 * Display a listing of partidos
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $partidosporfecha = Partido::all();

		return View::make('site/partidos.index', compact('partidosporfecha'));
	}

	/**
	 * Show the form for creating a new equipo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('partidos.create');
	}

	/**
	 * Store a newly created equipo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Partido::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Partido::create($data);

		return Redirect::route('partidos.index');
	}

	/**
	 * Display the specified equipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$partido = Partido::findOrFail($id);

		return View::make('partidos.show', compact('partido'));
	}

	/**
	 * Show the form for editing the specified equipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$partido = Partido::find($id);

		return View::make('partidos.edit', compact('partido'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$partido = Partido::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Partido::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$partido->update($data);

		return Redirect::route('partido.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Partido::destroy($id);

		return Redirect::route('partidos.index');
	}

}