<?php
include 'MidtransUtils.php';
if (!strpos($_SERVER['REQUEST_URI'], '/charge')) {
    http_response_code(404);
    echo "wrong path, make sure it's `/charge`";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(404);
    echo "Page not found or wrong HTTP request method is used";
    exit();
}
$request_body = file_get_contents('php://input');
header('Content-Type: application/json');
$ch = curl_init();
$curl_options = array(
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,


    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Basic ' . base64_encode($server_key . ':')
    ),
    CURLOPT_POSTFIELDS => $request_body
);
curl_setopt_array($ch, $curl_options);
http_response_code(curl_getinfo($ch, CURLINFO_HTTP_CODE));
echo curl_exec($ch);