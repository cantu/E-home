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

  <body>
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
          <a class="navbar-brand" href="./data.php">Tusion E-home</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="./data.php">Data</a></li>
            <li><a href="./overview.php">Overview</a></li>
            <li><a href="./smart.php">Smart</a></li>
            <li><a href="./about.php">About</a></li>
            <li class="active"><a href="./contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container " >


	<!-- Baidu map location api example -->
	<br>
	<div class="badu_location">
	
	<script type="text/javascript">
	var url = "http://api.map.baidu.com/location/ip?ak=EC2c8758ac1800b663aac075e619c8dc&ip=202.198.16.3&coor=bd0911"
	$.get( "http://api.map.baidu.com/location/ip?ak=EC2c8758ac1800b663aac075e619c8dc&ip=202.198.16.3&coor=bd0911", 
        function(data)
        {
            alert("get json:" + data );
        }
    );
	</script>
	</div>
	
	<!--- visitor leave a message, use cookie or sessions -->
	<div class="message_box">
		
	</div>

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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>  
  	<script src="./theme/bootstrap/js/bootstrap.min.js"></script>
	<script src="./resource/js/map.js"></script>
  </body>
</html>


