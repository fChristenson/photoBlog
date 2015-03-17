<?php namespace App\Services;

use Illuminate\Support\Facades\Facade;
use DB;
use App;
use App\Day;

class DayService extends Facade {

	public static function getFacadeAccessor() {return 'DayService';}

	public static function addDay($photo)
	{
		$day = self::getLastDay();

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
	}

	public static function getLastDay() {
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
}