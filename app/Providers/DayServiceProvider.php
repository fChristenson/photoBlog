<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Day;

class DayServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->singleton('day', function ($app) {
			return new Day;
		});
	}

}
