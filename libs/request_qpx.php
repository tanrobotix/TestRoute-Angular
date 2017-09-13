<?php

$request_var = '{
  "request": {
    "slice": [
      {
        "origin": '.json_encode($_POST['fr']).',
        "destination": '.json_encode($_POST['to']).',
        "date": '.json_encode($_POST['date']).'
      }
    ],
    "passengers": {
      "adultCount": 1,
      "infantInLapCount": 0,
      "infantInSeatCount": 0,
      "childCount": 0,
      "seniorCount": 0
    },
    "solutions": 5,
    "refundable": false
  }
}';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.googleapis.com/qpxExpress/v1/trips/search?key=AIzaSyA-Z_OABlCvKJj9Y7VWMNee6TaHQFbXFyI",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $request_var,
  CURLOPT_SSL_VERIFYPEER=> false,
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 23245fbe-a184-2feb-8f70-373748df28e2"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}