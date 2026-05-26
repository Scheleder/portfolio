<?php

define('WEBHOOK_TARGET_URL', 'http://18.230.115.161/postback');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$headers = array_filter(getallheaders(), fn($k) =>
    !in_array(strtolower($k), ['host', 'content-length', 'connection', 'transfer-encoding', 'accept-encoding']),
    ARRAY_FILTER_USE_KEY
);
$queryStr = $_SERVER['QUERY_STRING'] ?? '';
$body = file_get_contents('php://input');

$targetUrl = WEBHOOK_TARGET_URL;
if ($queryStr) {
    $separator = str_contains($targetUrl, '?') ? '&' : '?';
    $targetUrl .= $separator . $queryStr;
}

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => $targetUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST  => $method,
    CURLOPT_POSTFIELDS     => $body,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_HEADER         => true,
]);

$response = curl_exec($ch);
$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$responseHeaders = substr($response, 0, $headerSize);
$responseBody = substr($response, $headerSize);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    http_response_code(502);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'webhook proxy error', 'message' => $error]);
    exit;
}

http_response_code($httpCode);
foreach (explode("\r\n", $responseHeaders) as $header) {
    if ($header !== '' && !preg_match('/^(Transfer-Encoding|Connection):/i', $header)) {
        header($header, false);
    }
}

echo $responseBody;
