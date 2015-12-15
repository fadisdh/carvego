<?php

function jsonResult($status, $message, $data = null){
	return [
		'status'	=> $status,
		'message'	=> $message,
		'data'		=> $data
	];
}

/**
 * Upload the specified image.
 *
 * @param  Model $model model name(page, car, etc..)
 * @param  String $imgName the name of the image.
 * @param  String $folderName the name of the folder you want to save the image in.
 */

function upload($file,$folderName,$fileName=''){

	$date = date_create();
	$imageName = uniqid().date_timestamp_get($date).'.'. 
	$file->getClientOriginalExtension();
	$imagePath ='/Uploads/'.$folderName.'/'.$imageName;
	$file->move(public_path().'/Uploads/'.$folderName,$imageName);//.$folderName.'/'.$imageName);
	return $imagePath;
}