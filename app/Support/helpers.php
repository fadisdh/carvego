<?php

function jsonResult($status, $message, $data = null){
	return [
		'status'	=> $status,
		'message'	=> $message,
		'data'		=> $data
	];
}