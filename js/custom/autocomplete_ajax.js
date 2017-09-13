$('.city').ready(function() {
  $('.city').autocomplete({
    source: function( request, response ) {
      $.ajax({
        url: "http://api.sandbox.amadeus.com/v1.2/airports/autocomplete",
        dataType: "json",
        data: {
          apikey: "9ayCYeVIATeYLQMsbp8zbU436IQvrloV",
          term: request.term
        },
        success: function(data){
          response(data);
        },
        error: function(err){
          alert("Error");
        }
      });
    },
    minLength: 3,
        
        });
});