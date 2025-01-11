<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$mintAddress = $_GET['mint'];
$url = "https://frontend-api.pump.fun/coins/" . $mintAddress . "?sync=true";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>