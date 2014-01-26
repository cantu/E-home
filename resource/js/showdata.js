function display_data( )
{
	var time =  new Date();
	var hour= time.getHours();
	var minute = time.getMinutes();
	var second = time.getSeconds();
	var apm = "AM";

	if( hour > 12 )
	{
		hour = hour-12;
		apm = "PM";
	}	
	if(minute < 10 )
	{
		minute = "0"+minute;
	}
	if( second < 10 )
	{
		second = "0"+second;
	}

	//document.clock_form.my_clock.value = hour+":"+minute+":"+seconde+" "+apm;
	document.getElementById("time").innerHTML = apm+" "+hour+":"+minute+":"+second;
//	document.getElementById("temperature").innerHTML = apm+" "+hour+":"+minute+":"+seconde+" | ";
//	document.getElementById("humdity").innerHTML = apm+" "+hour+":"+minute+":"+seconde+" | ";
//	document.getElementById("server_load").innerHTML = apm+" "+hour+":"+minute+":"+seconde+" | ";

	var myTime = setTimeout("display_data()", 1000 );
}

