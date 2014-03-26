<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript">
function display_time( )
{
	var time =  new Date();
	var hour= time.getHours();
	var minute = time.getMinutes();
	var seconde = time.getSeconds();
	var apm = "AM";

	if( hour > 12 )
	{
		hour = hour-12;
		apm = "PM";
	}
	
	document.clock_form.my_clock.value = hour+":"+minute+":"+seconde+" "+apm;
	var myTime = setTimeout("display_time()", 1000 );
}
</script>

<title> Dynamic display site </title>
</head>

<body onLoad="display_time()">

<h1>Dynamic show tempratures</h1>
<form name="clock_form">
	<input name="my_clock" type="text" value="" >
</form>

</body>
