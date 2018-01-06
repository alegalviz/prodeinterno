<?php

class EquiposController extends \BaseController {

	/**
	 * Display a listing of equipos
	 *
	 * @return Response
	 */
	public function index()
	{
		$equipos = Equipo::all();

		return View::make('equipos.index', compact('equipos'));
	}

	/**
	 * Show the form for creating a new equipo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('equipos.create');
	}

	/**
	 * Store a newly created equipo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Equipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Equipo::create($data);

		return Redirect::route('equipos.index');
	}

	/**
	 * Display the specified equipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$equipo = Equipo::findOrFail($id);

		return View::make('equipos.show', compact('equipo'));
	}

	/**
	 * Show the form for editing the specified equipo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$equipo = Equipo::find($id);

		return View::make('equipos.edit', compact('equipo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$equipo = Equipo::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Equipo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$equipo->update($data);

		return Redirect::route('equipos.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Equipo::destroy($id);

		return Redirect::route('equipos.index');
	}

}