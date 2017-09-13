<?php 
		
		$request = new HttpRequest();
		$request->setUrl('https://api.sandbox.amadeus.com/v1.2/flights/low-fare-search');
		$request->setMethod(HTTP_METH_GET);

		//Get all input form
		/*$queryData = $request->all();*/

		// $request->setQueryData(array(
		// 	'apikey' => '9ayCYeVIATeYLQMsbp8zbU436IQvrloV',
		// 	'origin' => 'BOS',
		// 	'destination' => 'LON',
		// 	'departure_date' => '2017-08-07'
		// 	));

		$origin = $request->input('origin', 'SGN');
		$destination = $request->input('destination', 'ICN');
		$date = $request->input('date', '2017-09-12');
/*
		$request->setQueryData($queryData);*/
		$request->setQueryData(array(
			'apikey' => '9ayCYeVIATeYLQMsbp8zbU436IQvrloV',
			'origin' => $origin,
			'destination' => $destination,
			'departure_date' => $date 
			));

		$request->setHeaders(array(
			
			'postman-token' => '11bfbaad-ddf4-ac40-bf51-a8268a56e767',
			'cache-control' => 'no-cache'
			));

		try {
			$response = $request->send();

			echo $response->getBody();
		} catch (HttpException $ex) {
			echo $ex;
		}
		
		
	?>