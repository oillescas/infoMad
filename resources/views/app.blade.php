<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="/css/app.css" rel="stylesheet">
	@yield('style')
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		body {

		}

		.wide {
		  width:100%;
		  height:200px;
		  background-image:url('/img/skyline.jpg');
		  background-size:cover;
		  margin-top: -20px;
		}

		.wide img {
		  width:100%;
		}
		.wide .navbar{
			background-color: transparent;
			border-bottom: none;
		}

		.wide .container{
			margin-top: 0;
		}

		.logo {
		  color:#fff;
		  font-weight:800;
		  font-size:14pt;
		  padding:25px;
		  text-align:center;
		}

		.line {
		  padding-top:20px;
		  white-space:no-wrap;
		  overflow:hidden;
		  text-align:center;
		}
		.container{
			margin-top: 20px
		}
	</style>
</head>
<body>
	<div class="wide">
		<div class="navbar navbar-inverse">
		  	<div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Brand</a>
		    </div>
		    <div class="collapse navbar-collapse">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Home</a></li>
		        <li><a href="#about">About</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Username</a></li>
		      </ul>
		    </div><!--/.nav-collapse -->
		  </div>
		</div>
	</div>

	@yield('content')

	<!-- Footer page -->

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

	@yield('scripts')


</body>
</html>