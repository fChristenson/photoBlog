<?php namespace App\Services;

use Illuminate\Support\Facades\Facade;
use Hash;

class ImageService extends Facade{
	
	protected static function getFacadeAccessor() {return 'ImageService';}

	public static function saveImage($files)
	{
		$result = array();

		foreach ($files as $file) {
			$newFilename = base64_encode(Hash::make($file->getClientOriginalName())) . '.' . $file->getClientOriginalExtension();
			$file->move('images', $newFilename);
			array_push($result, $newFilename);
		}

		return $result;
	}
}