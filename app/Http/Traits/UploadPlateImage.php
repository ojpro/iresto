<?php

namespace App\Http\Traits;

use App\Models\PlateImage;

class UploadPlateImage
{
	private static string $directory = 'images/plates/';

	/**
	 * @param $image
	 *
	 * @return string
	 */

	public static function save($image,$plate_id)
	{

		$filename = 'plate_' . time() . '.' . $image->getClientOriginalExtension();

		$image->move(public_path(static::$directory), $filename);

		PlateImage::create([
			'plate_id' => $plate_id,
			'image_url' => static::$directory . $filename
		]);

	}

}