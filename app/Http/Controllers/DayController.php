<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;
use App\Day;
use Hash;
use DB;

class DayController extends Controller {

	private function getLastDay () {
		$day = DB::table('days')->orderBy('created_at', 'desc')->first();
		if (!$day)
		{
			return null;
		}
		else
		{
			return $day = Day::find($day->id);
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$day = $this->getLastDay();

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
			return abort(404);
		}

		$file = $req->file('photo');
		$newFilename = base64_encode(Hash::make($file->getClientOriginalName())) . '.' . $file->getClientOriginalExtension();
		$file->move('images', $newFilename);

		$photo = App::make('photo');
		$photo->name = $newFilename;

		$day = $this->getLastDay();

		if ($day && date('Ymd') == date('Ymd', strtotime($day->created_at)))
		{
			$day->save();
			$day->photos()->save($photo);
		}
		else
		{
			$day = App::make('day');
			$day->save();
			$day->photos()->save($photo);
		}

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
