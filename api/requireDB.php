<?php
require_once './class.DbReader.php';
// http get like:
//http://192.168.3.250/test.php?start_id=150&num=1000
$start_id = is_numeric( $_GET['start_id'])?$_GET['start_id'] : -1 ;
$num      = is_numeric( $_GET['num']) ? $_GET['num'] : 20;


$DataReader = new DbReader();
$result = $DataReader->read($start_id, $num );
$count = count($result);
//var_dump( $count );

if( $count > 0 )
{
    $data['start_id'] = $start_id;
   // $data['require_num'] = $num;
   // $data['result_num'] = $count;
    $data['data'] = $result;

    echo json_encode($data);

	/*
    foreach ( $result as $row )
    {
        echo "   id:".$row['id'];
        echo "  temp1:".$row['temp1'];
        echo "  temp3:".$row['temp3'];
        echo " <br/>";
    }
	*/
}
else
{
    echo'{}';
}

?>

