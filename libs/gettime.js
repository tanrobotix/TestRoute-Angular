function mydate() {
	// body...
	// document.getElementById('bonjour').innerHTML = "Good morning";
		var d = new Date();
		/*var time = d.getHour();*/
		if (d.getHours() < 12){
			document.getElementById('well-come').innerHTML = "Good morning";
				
		}
		if ( 12 <= d.getHours() && d.getHours() <= 17){
			document.getElementById('well-come').innerHTML = "Good afternoon";
			
		}
		if (d.getHours() > 17){
			document.getElementById('well-come').innerHTML = "Good evening";
			
		}
}
 	