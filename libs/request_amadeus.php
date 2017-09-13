<?php

$origin = $_GET['origin'];
$destination = $_GET['destination'];
$departure_date = $_GET['departure_date'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=9ayCYeVIATeYLQMsbp8zbU436IQvrloV&origin=".$origin."&destination=".$destination."&departure_date=".$departure_date."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err){
  echo "cURL Error #:" . $err;
} else {
 /*$response2 = json_decode($response);
  print_r($response2) ;*/

  /*print_r($response);*/
  $pr = json_decode($response);
  $results = $pr->results;

  foreach ($results as $key1 => $value1) {
    $itineraries = $value1->itineraries;
    
    foreach ($itineraries as $key2 => $value2) {
        $flights = $value2->outbound->flights;
        foreach ($flights as $key3 => $value3) {
          echo  'Departs at: '.$value3->departs_at.'<br>';
          echo  'Arrives at: '.$value3->arrives_at.'<br>';
          echo  'Origin: '.$value3->origin->airport.'<br>';
          echo  'Destination: '.$value3->destination->airport.'<br>';
          echo  'Marketing AL: '.$value3->marketing_airline.'<br>';
          echo  'Operating AL: '.$value3->operating_airline.'<br>';
          echo  'Flight num: '.$value3->flight_number.'<br>';
          echo  'Aircarft: '.$value3->aircraft.'<br>';
          echo  'Booking info: '.$value3->booking_info->travel_class.'<br>';
          echo '------------<br>';
      }
    }
    echo 'Total price: '.$value1->fare->total_price.'<br>';
    echo 'Price per adult: '.$value1->fare->price_per_adult->total_fare.'<br>';
    echo 'Tax: '.$value1->fare->price_per_adult->tax.'<br>';
    echo 'Restrictions -> Refundable: '.$value1->fare->restrictions->refundable.'<br>';
    echo 'Restrictions -> Change penalties: '.$value1->fare->restrictions->change_penalties.'<br>';
    echo "=================================<br>";
  }
}

?>