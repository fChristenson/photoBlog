<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Photo;

class PhotoServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('photo', function ($app) {
			return new Photo;
		});
	}

}
