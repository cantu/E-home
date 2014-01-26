		<hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>time</th>
                    <th>counter</th>
                    <th>node</th>
                    <th>T1</th>
                    <th>T2</th>
                    <th>T3</th>
                    <th>Humidity</th>
                    <th>PIR</th>
                </tr>
                <tbody>
                <?php
                    require_once './class.DbReader.php';
                    /*
					*  http get like:
                    *  http://192.168.3.250/test.php?start_id=150&num=1000
					*/
                   	$start_id = is_numeric( $_GET['start_id'])?$_GET['start_id'] : -1 ;
                  	$num      = is_numeric( $_GET['num']) ? $_GET['num'] : 20; 
                    $DataReader = new DbReader();
                    $result = $DataReader->read($start_id, $num );
                    $count = count($result);
     
                    if( $count > 0 ) 
                    {   
                        foreach ( $result as $row )
                        {   
                            echo "<tr>";
                            echo "<td>".$row['id'],"</td>";
                            echo "<td>".$row['time'],"</td>";
                            echo "<td>".$row['counter'],"</td>";
                            echo "<td>".$row['node'],"</td>";
                            echo "<td>".$row['temp1'],"</td>";
                            echo "<td>".$row['temp2'],"</td>";
                            echo "<td>".$row['temp3'],"</td>";
                            echo "<td>".$row['humidty'],"</td>";
                            echo "<td>".$row['PIR'],"</td>";
                            echo " </tr>";
                        }   
                    }
                    else
                    {
                        //echo'{}';
                    }
                ?>
                </tbody>
        </table>

    </div>
