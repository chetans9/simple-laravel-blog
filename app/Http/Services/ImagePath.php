<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\File;

/**
* 
*/
class ImagePath
{
	
	public $original;
	public $thumb;
	public $medium;
	public $url;

	function __construct($relative_path)
	{
		$this->original = $relative_path;

		$base_name = basename($relative_path);
		$thumb_path = str_replace($base_name, "thumb_" . $base_name , $relative_path);
		$medium_path = str_replace($base_name, "medium_" . $base_name , $relative_path);
		
		$this->medium = $medium_path;
		$this->thumb = $thumb_path;
	}
}