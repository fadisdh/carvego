<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{

	public function delete(){
		$file = Input::get('file');

		if(!$file){
			return response()->json(jsonResult(false, 'No Files Deleted'));
		}

		File::delete(public_path($file));
		return response()->json(jsonResult(true, 'File Deleted'));
	}
}