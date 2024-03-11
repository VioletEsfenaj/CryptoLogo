<?php
function handleRequest() {
    $symbol = $_GET['symbol'] ?? null;
    $res = $_GET['res'] ?? null;

    if (!$symbol || !$res) {
        header('Content-Type: text/plain');
        echo "Please provide both symbol and resolution as query parameters.";
        return;
    }

    $symbolUpperCase = strtoupper($symbol);
    $resolution = intval($res);
    $filePath = "https://violetesfenaj.github.io/CryptoLogo/icons/{$resolution}/{$symbolUpperCase}.png";

    if (file_exists($filePath)) {
        header('Content-Type: image/png');
        readfile($filePath);
    } else {
        header('HTTP/1.0 404 Not Found');
        echo "404: File not found";
    }
}

handleRequest();
?>
