<!DOCTYPE html>
<html>
<head>
<?php session_start(); ?>
<!--Jquery hidden session value for Admin-->
<input id="user_level" type="hidden" name="user_level" value="<?php echo $_SESSION['user_level']; ?>"></input>

	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the title of your site -->
	<title>Michael's Forum</title>
	<!-- ========= Favicon Icons ========= -->
	<link rel="shortcut icon" href="images/favicon/favicon.ico">
	<!-- Standard iPhone Touch Icon-->
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-touch-icon-57x57.png">
	<!-- Retina iPhone Touch Icon-->
	<!-- include Google fonts  -->
	<!--<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic%7CPlayfair+Display:400,400italic,700,700italic,900,900italic%7CRoboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900%7CRaleway:400,100,200,300,500,600,700,800,900%7CGreat+Vibes%7CPoppins:400,300,500,600,700' rel='stylesheet' type='text/css'>-->
	<!-- include the site stylesheet of bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- include the font awesome stylesheet  -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- include the stylesheets of headers and footer of the page  -->
	<link rel="stylesheet" type="text/css" href="css/page-assets.css">
	<!-- include the helping elements stylesheets of  the page  -->
	<link rel="stylesheet" type="text/css" href="css/helper-elements.css">
	<!-- include the site stylesheet  -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- include the site color stylesheet  -->
	<link rel="stylesheet" type="text/css" href="css/color/color.css">
	<!-- include the site animate stylesheet  -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<style type="text/css">
		.contact-form2 {
			text-align:center;
			margin:0 auto;
		}
	</style>
	
</head>
<body>
	<!-- Page pre loader -->
    <!--<div id="pre-loader">
        <div class="loader-holder">
            <div class="frame">
               <!-- <img src="images/preloader/logo.png" alt="Fekra"/>
                <div class="spinner7">
                    <div class="circ1"></div>
                    <div class="circ2"></div>
                    <div class="circ3"></div>
                    <div class="circ4"></div>
                </div>
            </div>
        </div>
    </div>-->
	<div id="wrapper">
		<div class="w1">
			<!-- header of the page -->
			<header id="header" class="style5">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- page logo -->
							<div class="logo">
								<a href="#">
									<img src="images/logo.png" alt="Fekra" class="img-responsive w-logo">
									<img src="images/logo-2.png" alt="Fekra" class="img-responsive b-logo">
								</a>
							</div>
							<div class="holder">
								<!-- icon list -->
								<ul class="list-unstyled icon-list">
									<li>
										<a href="#" class="search-opener opener-icons"><i class="fa fa-search"></i></a>
									</li>
								</ul>
								<!-- main navigation of the page -->
								<nav id="nav">
									<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>
									<div class="nav-holder">
										<ul class="list-inline nav-top">
											<li>
												<a href="index.php">Home</a>
											</li>
											<li>
												<a href="topic.php">Topics</a>
											</li>
											
											<li>
												<a href="#">My Work</a>
												<div class="drop" style="margin-left:-50px;">
															<ul class="list-unstyled">
																<li><a href="stoneoaktreefarm.com" target="_blank">Stone Oak Tree Farm</a></li>
																<li><a href="adprose.org/waldenhumanewp" target="_blank">Humane Society of Walden</a></li>
																<li><a href="gidedental.com" target="_blank">gIDE Dental</a></li>
																<li><a href="gidephotogallery.com" target="_blank">gIDE Photogallery</a></li>
																<li><a href="padreguadalupe.com" target="_blank">Padre Guadalupe</a></li>
																<li><a href="https://avaaz.org/en/petition/stop_human_abuse" target="_blank">Human Rights Petition</a></li>
																<!--<li><a href="contact.html">contact</a></li>-->
															</ul>
												</div>
											</li>
											<li>
												<a href="login.php">Login</a>
											</li>
										</ul>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- search popup -->
			<div class="search-popup win-height">
				<div class="holder">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="close-btn">close</a>
								<form action="#" class="search-form">
									<fieldset>
										<input type="search" placeholder="search..." class="search">
										<button class="submit"><i class="fa fa-search"></i></button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>