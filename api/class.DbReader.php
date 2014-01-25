<?php
/*
* define a class to operate database
*/
class DbReader
{

    public function read( $start_id = -1, $num=20 )
    {
         $db_host = "localhost";   //database host name
         $db_user = "root";
         $db_pwd  = "root";
         $db_database = "ds18b20_db";
         $db_table = "sensor_data";


        $connection = mysql_connect("$db_host", "$db_user", "$db_pwd" );
        if( !$connection )
        {
            die("error at connect database".mysql_error() );
        }
        $db_select = mysql_select_db("$db_database", $connection );
        if( !$db_select )
        {
            die("change db error.".mysql_error() );
        }
        if( $start_id > 0 )
        {
          // $result = mysql_query( "select * from sensor_data order by id desc limit $num " );
           $result = mysql_query( "select * from $db_table where id >= $start_id order by id  limit $num " );

            while( $data_array[] = mysql_fetch_array( $result, MYSQL_ASSOC ) )
            {
                ;
            }
			//delete last elment in data_array, in founction mysql_fetch_array(), if no more array data it 
			//retuns false
			unset( $data_array[count($data_array)-1] );

            //print_r( $data_array );
            //print( count($data_array));
            //var_dump( $data_array );

            mysql_free_result( $result );

        }
        mysql_close( $connection );
        return $data_array;
    }

}



