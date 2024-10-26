<?php
// Get POST data
$data = json_decode(file_get_contents('php://input'), true);

// PayMongo API Keys
$secret_key = 'sk_test_eBHcYv7bFAdcMEV3e6zychSt';  // Replace with your PayMongo secret key

// Create a Payment Intent using PayMongo's API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.paymongo.com/v1/payment_intents');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'data' => [
        'attributes' => [
            'amount' => $data['amount'],
            'payment_method_allowed' => ['gcash'],
            'currency' => 'PHP'
        ]
    ]
]));
curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ':');

$headers = [];
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

// Return the result to the JavaScript frontend
echo $result;
?>
