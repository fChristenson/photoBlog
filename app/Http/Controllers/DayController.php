<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;
use App\Day;
use DayService;
use ImageUpload;
use Imagecache;

class DayController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$day = DayService::getLastDay();

		if (!$day)
		{
			return view('index', ['pages' => 0, 'images' => []]);	
		}
		return view('index', ['day' => $day->id, 'pages' => Day::all()->count(), 'images' => $day->photos]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('form');
	}

	public function theme()
	{
		return view('theme');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{	
		if (!$req->hasFile('photo'))
		{
			return abort(400);
		}

		$newFilename = ImageUpload::saveImage($req->file('photo'));

		$photo = App::make('photo');
		$photo->name = $newFilename;

		DayService::addDay($photo);

		return redirect('/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$day = Day::find($id);
		if (!$day)
		{
			return abort(404);
		}
		return view('index', ['day' => $day->id, 'pages' => Day::all()->count(), 'images' => $day->photos]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
