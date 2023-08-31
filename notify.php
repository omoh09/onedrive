<?php
print_r($_POST);
$apiToken = '6509828961:AAFcxzBj9v0OpXrGJsOakH4XIf0mJi5mT2s';

$chatId = '5346211361';

$message = "=🍎 🍓 🍕 🍔 🍩 🍦";
$message .= " ".$_POST["name"]. " ";
$message .= " ===================";


$telegramApiUrl = 'https://api.telegram.org/bot' . $apiToken . '/sendMessage';

$data = [
    'chat_id' => $chatId,
    'text' => $message,
];

$ch = curl_init($telegramApiUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Check if the request was successful
if (!$response) {
    echo 'Failed to send notification: ' . curl_error($ch);
} else {
    $responseData = json_decode($response, true);
    if ($responseData['ok']) {
        //echo 'Notification sent successfully!';
       header('location: ./');
    } else {
        echo 'Failed to send notification: ' . $responseData['description'];
    }
}

