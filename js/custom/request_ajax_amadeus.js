$('.target').click(function(){
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=9ayCYeVIATeYLQMsbp8zbU436IQvrloV&origin=BOS&destination=LON&departure_date=2017-08-07",
  "method": "GET"
}

$.ajax(settings).done(function (response) {
  console.log(response);
  $('.container').append(response);	
});
});