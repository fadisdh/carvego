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
function upload($file, $folderName, $fileName = ''){
	$fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
	$folderPath = 'Uploads/' . $folderName . '/';

	$file->move(public_path($folderPath), $fileName);
	return $folderPath . $fileName;
}