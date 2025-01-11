<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

function fetchLatestTokens() {
    $curl = curl_init();
    
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://frontend-api.pump.fun/coins/latest',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => ['accept: */*'],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);

    if ($err) {
        return ['error' => 'cURL Error #:' . $err];
    }

    $data = json_decode($response, true);
    $solana_price = 210; // Current SOL price in USD
    
    return [
        'name' => $data['name'],
        'symbol' => $data['symbol'],
        'createdAt' => date('Y-m-d H:i:s', $data['created_timestamp'] / 1000),
        'marketCap' => '$' . number_format($data['market_cap'] * $solana_price, 2),
        'image' => $data['image_uri'],
        'mint' => $data['mint'],
        'ticker' => $data['symbol'],
        'replies' => $data['reply_count']
    ];
}

echo json_encode(fetchLatestTokens());
?>