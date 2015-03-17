<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Day;

class DayServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('day', function ($app) {
			return new Day;
		});

		$this->app->bind('DayService', function () {
			return new App\Services\DayService;
		});
	}

}
