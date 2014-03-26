<?php

require_once './class.DbReader.php';
// to data.php highchart's data area.
// call by ../resuorce/js/drawLine.js

$DataReader = new DbReader();
$xAxisNum = 12;		//define how much data to draw the line
$num = 1;
//$data_array= array[$xAxisNum];
$data_array= array("");
for( $i=1; $i<=$xAxisNum; $i++)
{	
	if( $i== 1 )
	{
		$data_array = array( $DataReader->read($i*1000, $num ) );
	}
	else
	{
		array_push( $data_array, $DataReader->read($i*1000, $num ) );
	}
}

header("Content-type: application/json");
echo json_encode($data_array);

?>

