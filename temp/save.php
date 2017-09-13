<?
          echo 'Price per adult: '.$value1->fare->price_per_adult->total_fare.'<br>';
	 	echo 'Tax: '.$value1->fare->price_per_adult->tax.'<br>';
	 	echo 'Restrictions -> Refundable: '.$value1->fare->restrictions->refundable.'<br>';
	 	echo 'Restrictions -> Change penalties: '.$value1->fare->restrictions->change_penalties.'<br>';
	 	echo '------------<br>';



          echo  'Arrives at: '.$value3->arrives_at.'<br>';
          echo  'Origin: '.$value3->origin->airport.'<br>';
          echo  'Destination: '.$value3->destination->airport.'<br>';
          echo  'Marketing AL: '.$value3->marketing_airline.'<br>';
          echo  'Operating AL: '.$value3->operating_airline.'<br>';
          echo  'Flight num: '.$value3->flight_number.'<br>';
          echo  'Aircarft: '.$value3->aircraft.'<br>';
          echo  'Booking info: '.$value3->booking_info->travel_class.'<br>';
          echo "=================================<br>";

foreach ($value1 as $ghost1 => &$items1) {
                    $mang1[] = $items1;
               }

foreach ($value2 as $ghost2 => &$items2) {
                         $mang2[] = $items2;
                    }
foreach ($value3 as $ghost3 => &$items3) {
                              $mang3[] = $items3;



                              <?php
foreach ($mang1 as $obj) {
          echo '<div class="card text-center bg-light text-black">';
          echo '                        <div class="card-fl-info">';
          echo '                             <div class="row">';
          echo '                                  <div class="col-md-2 iti-info">';
                         //marketing_airline;
                              
          echo                                    '</div>';
          echo '                                  <div class="col-md-4 itineraries-tm">';
          echo '                                       <div class="st-tm">';
          echo '                                            <div>';
                         // origin->airport;
                                                       
          echo '                                            </div>';
          echo '                                            <div>';
                         //departs_at;
          echo '                                            </div>';
          echo '                                       </div>';
          echo '                                       <div class="estimate-tm-bl">';
          echo '                                            <div class="estimate-tm-line"></div>';
          echo '                                            <div class="estimate-tm">11</div>';
          echo '                                       </div>';
          echo '                                       <div class="st-tm">';
          echo '                                            <div>';
                         //destination->airport;
          echo '                                            </div>';
          echo '                                            <div>';
                         //arrives_at;
          echo '                                            </div>';
                                                                 
          echo '                                       </div>';
          echo '                                  </div>';
          echo '                                  <div class="col-md-1 iti-info">';
                                             echo "nonstop";
          echo '                                  </div>';
          echo '                                  <div class="col-md-1 iti-info">';
                         //booking_info->travel_class;
          echo '                                  </div>';
                                                       
          echo '                                  <div class="col-md-3 iti-info">';
                              if(property_exists($obj, 'price_per_adult')){
                                   echo $obj->total_price;}
          echo                                    '</div>';
          echo '                                  <div class="col-md-1 iti-info">';
          echo '                                       <button type="button" class="btn btn-outline-success btn-sm">View</button>';
          echo '                                  </div>';
          echo '                             </div>';
          echo '                        </div>';
          echo '                   </div>';
          
      }

                    ?>
?>