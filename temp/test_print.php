<!DOCTYPE html>
<html>
<head>
	<title>card</title>
	<script type="text/javascript" src="../js/origin/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/custom-css/card.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/logo/logo_resizes.css"> -->
	<!-- jQuery -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="../js/origin/jquery-3.2.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/custom/autocomplete_ajax.js"></script>

	<!-- Fonts -->
	<!-- <link href="../fonts/awesome/font-awesome.min.css" rel="stylesheet"> -->
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<div class="container p-4">
		<div class="container-fluid">
			<div class="card text-center bg-info text-white">
				<div class="card-block-cus">
					<blockquote class="card-blockquote">
						<div class="row">
							<div class="col-md-2">
								item
							</div>
							<div class="col-md-4">
								item
							</div>
							<div class="col-md-1">
								item
							</div>
							<div class="col-md-1">
								item
							</div>
							<div class="col-md-3">
								item
							</div>
							<div class="col-md-1">
								item
							</div>
						</div>
					</blockquote>
				</div>
			</div>


			<div class="card text-center bg-light text-black">
				<div class="card-fl-info">
					<div class="row">
						<div class="col-md-2 iti-info">
							example	
						</div>
						<div class="col-md-4 itineraries-tm">
							<div class="st-tm">
								<div>example</div>
								<div>example</div>
							</div>
							<div class="estimate-tm-bl">
								<div class="estimate-tm-line"></div>
								<div class="estimate-tm">example</div>
							</div>
							<div class="st-tm">
								<div>example</div>
								<div>example</div>
							</div>
						</div>
						<div class="col-md-1 iti-info">
							example	
						</div>
						<div class="col-md-1 iti-info">
							example	
						</div>
						<div class="col-md-3 iti-info">
							example
						</div>
						<div class="col-md-1 iti-info">
							<button type="button" class="btn btn-outline-success btn-sm">View</button>
						</div>
					</div>
				</div>
			</div> 		
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

	 $pr = json_decode($response);
	 $results = $pr->results;
	 $obj_length = count($results);

	 /*echo $response;*/
	 
	 foreach ($results as $key1 => $value1) {
	 	$itineraries = $value1->itineraries;
	 	foreach ($value1 as $ghost1 => &$items1) {
	 		if (is_object($items1)) {
	 			$mang1[] = $items1;
	 		}	
	 	}
	 	foreach ($itineraries as $key2 => $value2) {
	 		$flights = $value2->outbound->flights;
	 		foreach ($value2 as $ghost2 => &$items2) {
	 			if (is_object($items2)) {
	 				$mang2[] = $items2;
	 			}	
	 		}
	 		foreach ($flights as $key3 => $value3) {	 					 		
	 			foreach ($value3 as $ghost3 => &$items3) {
	 				if (is_object($items3)){
	 					$mang3[] = $items3;
	 				}
	 				
	 			}
	 		}
	 	}
	 };

	 foreach ($results as $key1 => $value1) {
		$fare_totalprice = $value1->fare->total_price;
		$fare_tax = $value1->fare->price_per_adult->tax;
		echo $fare_totalprice .'<br>';
		echo $fare_tax . '<br>';
		echo "======================<br>";
	 };
	 

	} 
	?>


</div>
</div>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="home">...</div>
	<div role="tabpanel" class="tab-pane fade" id="profile">...</div>
	<div role="tabpanel" class="tab-pane fade" id="messages">...</div>
	<div role="tabpanel" class="tab-pane fade" id="settings">...</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
</html>