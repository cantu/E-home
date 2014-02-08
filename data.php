<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tusion E-home</title>

    <!-- Bootstrap core CSS -->
    <link href="./theme/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="./theme/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./theme/customer_theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onLoad="display_data()">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.html">Tusion E-home</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="./index.php">Overview</a></li>
            <li class="active"><a href="./data.php">Data</a></li>
            <li><a href="./smart.php">Smart</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container " >


	<!--- some panel show current data -->
	<div class="row">
		<div class="col-sm-4" >
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Time:<h3>
				</div>
				<div class="panel-body">
					<!-- AJAX DOM requtest here !!! -->
					<p id="time">--</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4" >
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Tempreture:<h3>
				</div>
				<div class="panel-body">
					<!-- AJAX DOM requtest here !!! -->
					<p id="temperature">NA </p>
				</div>
			</div>
		</div>
		<div class="col-sm-4" >
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Humdity:<h3>
				</div>
				<div class="panel-body">
					<!-- AJAX DOM requtest here !!! -->
					<p id="humdity">NA</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Server Load<h3>
				</div>
				<div class="panel-body">
					<!-- AJAX DOM requtest here !!! -->
					<p id="server_load"> NA</p>
				</div>
			</div>
		</div>
	</div>

	<!--- highcharts plugin to draw data picture -->
	<div class="page-header" >
		<h2>Data Chart</h2>
		<div id="HighChart">
		<!-- this section call highchart pligin to draw data chart -->
		</div>
	</div>

	<!-- debug database's data -->
	<div class="page-header">
		<h2>DataBase quire</h2>
	</div>
	<div >
		<form class="form-inline" role="form" action="" method="get">
			<div class="form-group">
				<lable class="sr-only" for="abab">Start ID</lable>
				<input type="text" class="form-control" name="start_id" placeholder="Start ID">
			</div>
			<div class="form-group">
				<lable class="sr-only" for="haha">Number to require</lable>
				<input type="text" class="form-control" name="num" placeholder="Number to require">
			</div>
			<button type="submit"   name="submit" value="requireDB" class="btn  btn-primary"> Require Database</button>
		</form>

	</div>
	


    <hr>
	<div>
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
				if($_GET['submit'] == "requireDB"  )
				{
                    require_once './api/class.DbReader.php';
                    /*  
                    *  http get like:
                    *  http://192.168.3.250/test.php?start_id=150&num=1000
                    */
                    $start_id = is_numeric( $_GET['start_id'])?$_GET['start_id'] : 1 ;
                    $num      = is_numeric( $_GET['num']) ? $_GET['num'] : 10; 
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
				}
                ?>
                </tbody>
        </table>

    </div>
	<!-- page  botton show info -->
	<hr>
	<footer>
		<p>Design by tusion, follow my sina weibo 
		<a target="_blank" href="http://www.weibo.com/u/1923636505">tusion2011</a>
		<p>Code licensed under
		 <a target="_blank" href="http://www.apache.org/licenses/LICENSE-2.0">Apache License v2.0</a>, 
		documentation under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
		<p>Copyright &copy; Tusion</p>
	</footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  	<script src="./theme/bootstrap/js/bootstrap.min.js"></script>
	<script src="./resource/js/showdata.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="./theme/hightcharts/highcharts.js"></script>
	<script src="./theme/hightcharts/modules/exporting.js"></script>
	<script src="./resource/js/DrawLine.js" ></script>

  </body>
</html>


