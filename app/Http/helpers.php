<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


/**
 * Function creates Thumbnail while uploading original image and returns an array with path information of original image as
 * well as thubnail.
 * 
 * @param $input_image 
 * @param $upload_folder
 * @return array
 */

function uploadWithThumb($input_image,$upload_folder)
{

	$public_upload_path = public_path().'/uploads/';

	$upload_destination = $public_upload_path.$upload_folder;

	if(!File::exists($upload_destination))
	{
		File::makeDirectory($upload_destination, 0775,true);
	}

	$file_name = $input_image->getClientOriginalName();
	//Upload Original file
	$input_image->move($upload_destination,$file_name);
	$uploaded_file_path =  $upload_destination.'/'.$file_name;

	$return_image_path = '/uploads/'.$upload_folder.'/'.$file_name;

	//for thumbnail
	
	
	
	//Save Thumbnail
	$ImageThumbObj = Image::make($uploaded_file_path);

	$ImageThumbObj->resize(400, null, function ($constraint) {
    	$constraint->aspectRatio();
	});

	$upload_thumbnail_destination = $upload_destination.'/'.'thumb_'.$file_name;

	$ImageThumbObj->save($upload_thumbnail_destination);

	//For medium image

	$ImageMediumObj = Image::make($uploaded_file_path);
	$ImageThumbObj->resize(800, null, function ($constraint) {
    	$constraint->aspectRatio();
	});

	$upload_medium_destination = $upload_destination.'/'.'medium_'.$file_name;
	$ImageThumbObj->save($upload_medium_destination);
	
	

	return $return_image_path;
}


function str_limit($content, $limit){

	return Str::limit($content, $limit);



}