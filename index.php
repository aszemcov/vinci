<?php

$PROXY = 'https://cors-pmmlabs.rhcloud.com/';
$endpoints = [
    'list' => 'http://vinci.camera/list',
    'preload' => 'http://vinci.camera/preload',
    'process' => 'http://vinci.camera/process',
    'register' => 'http://vinci.camera/register_device'
];

$url = $PROXY . $endpoints['preload'];

$file = '@'.realpath('./photo.jpg');
$data = array(
    'name' => 'photo.jpg',
    'type' => 'image/jpg',
    'tmp_name' => $file,
);

$ch = curl_init($url);
curl_setopt_array($ch, array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_HEADER => false,
	CURLOPT_HTTPHEADER => array(
		'Host: cors-pmmlabs.rhcloud.com',
		'Content-Type: multipart/form-data'
	),
	CURLOPT_POSTFIELDS => $data,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_CONNECTTIMEOUT => 6000,
	CURLOPT_SSL_VERIFYPEER => false
));
$result = curl_exec($ch);
curl_close($ch);

print_r($result);

?>
