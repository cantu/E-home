<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>
<script type="text/javascript" src="/js/themes/gray.js"></script>

<script type="text/javascript" src="js/my_javascript.js"></script>
<script type="text/javascript">
	
	$(function () {                                                                     
		$(document).ready(function() {                                                  
			Highcharts.setOptions({                                                     
				global: {                                                               
					useUTC: false                                                       
				}                                                                       
			});                                                                         
																						
            var ser;
            var start_id;
            //var server_url="http://tusion.jios.org:88"
            var server_url="http://192.168.3.250"
            $.ajax({
                type:"get",
                dataType:"json",
                async:false,
                url: server_url + "/test.php?start_id=100&num=20",
                sucess: function(msg){
					alert( msg.start_id );
                    s1={ name:'temp1', data:[] };
                    s2={ name:'temp2', data:[] };
                   // s3={ name:'temp3', data:[] };
                    $.each(msg.data, function(k,v){
                        s1.data.push({x:v.x-0, y:v.y1-0});
                        s2.data.push({x:v.x-0, y:v.y2-0});
                     //   s3.data.push({x:v.x-0, y:v.y3-0});
                    });
                    ser = [s1, s2 ];
                    //ser = [s1, s2, s3 ];
                    start_id = msg.start_id;
                },
				error:function(data){
					alert(data);
				//	alert("error in ajax");
				},

            });

			var chart;                                                                  
			var start_id;
			$('#container').highcharts({                                                
				chart: {                                                                
					type: 'spline',                                                     
					animation: Highcharts.svg, // don't animate in old IE               
					marginRight: 10,                                                    
					events: {                                                           
						load: function() {                                              
																						
							// set up the updating of the chart each second             
                            //var series = this.series[0];
							var series1 = this.series[0];                                
                            var serier2 = this.series[1];
                            //var serier3 = this.series[2];
							start_id = 200;
                            setInterval( function(){
                                $.ajax({
                                    type:"get",
                                    dataType:"json",
                                    async:false,
                                    url: server_url + "/test_php?start_id=" + start_id + "&num=1",
                                    sucess: function( msg ){
                                        if( msg.data ){
                                            $.each( msg.data, function(k,v){
                                                series1.addPoint([v.x-0, v.y1-0], true, true);
                                                series1.addPoint([v.x-0, v.y1-0], true, true);
                                               // series1.addPoint([v.x-0, v.y1-0], true, true);
                                                 });
                                           // start_id = msg.start_id;
                                           start_id = 100;
                                        }
                                    }
                                });
                            }, 1000);


                            /*
							setInterval(function() {                                    
								var x = (new Date()).getTime(), // current time         
									y = Math.random();                                  
								series.addPoint([x, y], true, true);                    
							}, 1000);   
                            */


						}                                                               
					}                                                                   
				},                                                                      
				title: {                                                                
					text: 'Office temperature'                                            
				},                                                                      
				xAxis: {                                                                
					type: 'datetime',                                                   
					tickPixelInterval: 150                                              
				},                                                                      
				yAxis: {                                                                
					title: {                                                            
						text: 'temprature( ℃)'                                                   
					},                                                                  
					plotLines: [{                                                       
						value: 0,                                                       
						width: 1,                                                       
						color: '#808080'                                                
					}]                                                                  
				},                                                                      
				tooltip: {                                                              
					formatter: function() {                                             
							return '<b>'+ this.series.name +'</b><br/>'+                
							Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
							Highcharts.numberFormat(this.y, 2);                         
					}                                                                   
				},                                                                      
				legend: {                                                               
					enabled: false                                                      
				},                                                                      
				exporting: {                                                            
					enabled: false                                                      
				},      
                series: ser
                /*
				series: [{                                                              
					name: 'Random data',                                                
					data: (function() {                                                 
						// generate an array of random data                             
						var data = [],                                                  
							time = (new Date()).getTime(),                              
							i;                                                          
																						
						for (i = -49; i <= 0; i++) {                                    
							data.push({                                                 
								x: time + i * 1000,                                     
								y: Math.random()                                        
							});                                                         
						}                                                               
						return data;                                                    
					})()                                                                
				}]
                */


			});                                                                         
		});                                                                             
																						
	});         
	
	
	

</script>
<title>PHP StarUp</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>

<body>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<button type="button" onclick="hiddenHead()">test</button>
</div>


<div id="info" ></div>
<h1>Temperatures:</h1>

<tr >
    <td>time</td>
    <td>id</td>
    <td>node</td>
    <td>temp1</td>
    <td>temp2</td>
    <td>temp3</td>
    <td>humdity</td>
    <td>PIR</td>
</tr>
<br>
<?php


$show_num = 5;

$conn = mysql_connect("localhost", "root", "root") or die( " error at connect database".mysql_error() );
mysql_select_db("ds18b20_db", $conn ) or die("change database error.".mysql_error());
$sql = mysql_query( "select * from  sensor_data order by id desc limit $show_num" );
$row = mysql_fetch_object( $sql );
if( !$row) 
{
    echo"<font color='red'>can not find data ! </font>";
}
do 
{
?>
<tr >
    <td><?php echo $row->time; ?></td>
    <td><?php echo $row->id; ?></td>
    <td><?php echo $row->node; ?></td>
    <td><?php echo $row->temp1; ?></td>
    <td><?php echo $row->temp2; ?></td>
    <td><?php echo $row->temp3; ?></td>
    <td><?php echo $row->humidty; ?></td>
    <td><?php echo $row->PIR; ?></td>
</tr>

<br>
<?php

    }while( $row = mysql_fetch_object($sql));
mysql_free_result($sql);
mysql_close( $conn );
?>







</body>
</html>
