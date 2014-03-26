<?php


//$client_ip="123.118.5.170";
$client_ip="202.198.16.3";
$ak ="EC2c8758ac1800b663aac075e619c8dc";

function getIP()
{
	global $ip;
	
	if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
	else 
		$ip = "Unknow";
		
	return $ip;
}

// 使用方法：
echo getIP();
echo "<br>";

$url = "http://api.map.baidu.com/location/ip?ak=$ak&ip=$client_ip&coor=bd0911";
echo $url;
echo "<hr>";

echo http_get( $url );

//echo "url: ".$url;

/**
$.get( $url, 
		function(data)
		{
			alert("get json:" + data );
		}
	);
**/
//get client ip, and get loaction info from baidu ditu
//eg: http://api.map.baidu.com/location/ip?
//ak=F454f8a5efe5e577997931cc01de3974&ip=202.198.16.3&coor=bd09ll



//echo "<br>";
//echo phpinfo();
?>
