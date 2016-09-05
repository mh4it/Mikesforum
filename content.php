			<!-- contain main informative part of the site -->
			<main id="main" role="main">
                <!-- page banner -->
		<div id="userbar" class="container">
			<div class="row">
				<?php
							if(isset($_SESSION['signed_in']))
							{
								echo '<div style="padding-top:15px; padding-bottom:15px; float:left;"><h4>Hello ' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a></h4></div>';
							}
							else
							{
								echo '<div style="padding-top:15px; padding-bottom:15px; float:left;"><h4><a href="login.php">Sign in</a> or <a href="createuser.php">create an account</a>.</h4></div>';
							}
							if(isset($_SESSION['signed_in']))
							{
								echo '<div style="float:right;padding-top:15px; padding-bottom:15px;"><h5><a href="useradmin.php?id='.$_SESSION['user_id'].'">Manage Profile</h5></a></div> ';
							}
							if(isset($_SESSION['user_level']))
							{
								if(($_SESSION['user_level']) == 'Admin')
								{
									echo '<div style="float:right;padding-top:15px; padding-bottom:15px;"><div style="padding-right:10px;"><h5><a id="admin1" href="admin.php"> Admin </a></h5></div></div> ';
								}								
							}						
				?>
			</div>
		</div>	
							
				<header class="page-banner small">
					<div class="container">
						<div class="row">
							<div class="col-xs-9">
								<div class="holder">
									<h1 class="heading text-uppercase">Michael Hughes</h1>
								<ul class="breadcrumbs list-inline">
									<li><a href="index.php">Home</a></li>
								</ul>									
								</div>
							</div>
							<div class="col-xs-3">
								<?php
							if(isset($_SESSION['user_level']))
							{								
									if ($_SESSION['user_level'] != 'Readonly')
									{
										echo '<div style="background-color: #ffffff; border: 1px solid black; opacity: 0.6; margin:15px; text-align:center;">
											<a id="user6" href="create_topic.php" class="btn btn-load">New Topic</a></div>';
										echo '<div style="background-color: #ffffff; border: 1px solid black; opacity: 0.6; margin:15px; text-align:center;">
											<a id="user8" href="post.php" class="btn btn-load">New Post</a>
										</div>';
									}
							}
								?>
							</div>
						</div>
				    </div>
		
					<div class="stretch">
						<img src="images/forum_bg.jpg" alt="image description">
					</div>
				</header>
				<div class="container padding-top-100">
					<div class="row">
						<div class="col-xs-12 col-md-6 col-md-push-3 blog-section padding-zero">
						<!-- blog-accordion -->
							<ul class="blog-accordion list-unstyled">
							
								<!-- blog-post -->
								<?php include "view_categories.php";?>
							</ul>
						</div>
						<aside class="col-xs-12 col-sm-6 col-md-3 col-md-pull-6">
							<!-- widget -->
							<?php include "categories_widget.php"; ?>
							<!-- widget -->
							<section class="widget toppost-widget">
								<h2>Top Post</h2>
								<ul class="list-inline tabset">
									<li class="active"><a href="#tab1">POPULAR</a></li>
									<li><a href="#tab2">COMMENTS</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab1">
										<article class="box">
											<div class="img-box">
												<i class="fa fa-user"></i>
											</div>
											<div class="holder">
												<time datetime="2015-01-01">13 MAY 2015</time>
												<h3>Cicero famously orated against </h3>
											</div>
										</article>
										<article class="box">
											<div class="img-box">
												<i class="fa fa-user"></i>
											</div>
											<div class="holder">
												<time datetime="2015-01-01">13 MAY 2015</time>
												<h3>Cicero famously orated </h3>
											</div>
										</article>
										<article class="box">
											<div class="img-box">
												<i class="fa fa-user"></i>
											</div>
											<div class="holder">
												<time datetime="2015-01-01">13 MAY 2015</time>
												<h3>Cicero famously orated against </h3>
											</div>
										</article>
									</div>
									<div id="tab2">
										<article class="box">
											<time datetime="2015-01-01">13 MAY 2015</time>
											<h3>Cicero famously orated against </h3>
											<a href="#">Alfaredo hilco</a>
										</article>
										<article class="box">
											<time datetime="2015-01-01">13 MAY 2015</time>
											<h3>Cicero famously orated </h3>
											<a href="#">akram fatah</a>
										</article>
										<article class="box">
											<time datetime="2015-01-01">13 MAY 2015</time>
											<h3>Cicero famously orated against </h3>
											<a href="#">Arfa Fatah</a>
										</article>
									</div>
								</div>
							</section>
							<!-- widget -->
							<section class="widget s-social-widget">
								<ul class="list-unstyled">
									<li><a href="#"><i class="fa fa-facebook"></i> 300.000 Fans</a></li>
									<li><a href="#"><i class="fa fa-twitter"></i> 300.000 Followers</a></li>
									<li><a href="#"><i class="fa fa-youtube-play"></i> 300.000 Watchers</a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i> 300.000 Pins</a></li>
									<li><a href="#"><i class="fa fa-rss"></i> 300.000 Subcriber</a></li>
								</ul>
							</section>
						</aside>
						<aside class="col-xs-12 col-sm-6 col-md-3">
							<!-- widget -->
							<section class="widget test-widget">
								<h2>Testimonial Widget</h2>
								<!-- beans-slider -->
								<div class="beans-slider">
									<div class="beans-mask">
										<div class="beans-slideset">
											<!-- beans-slide -->
											<div class="beans-slide">
												<blockquote class="gallery-quotes">
													<i class="fa fa-quote-left"></i>
													<p>Lorem ipsum sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tincidunt.</p>
													<footer><cite title="Source Title"><a href="#">Jason,</a> <a href="#">Lawyer</a></cite></footer>
												</blockquote>
											</div>
											<!-- beans-slide -->
											<div class="beans-slide">
												<blockquote class="gallery-quotes">
													<i class="fa fa-quote-left"></i>
													<p>Lorem ipsum sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tincidunt.</p>
													<footer><cite title="Source Title"><a href="#">Jason,</a> <a href="#">Lawyer</a></cite></footer>
												</blockquote>
											</div>
											<!-- beans-slide -->
											<div class="beans-slide">
												<blockquote class="gallery-quotes">
													<i class="fa fa-quote-left"></i>
													<p>Lorem ipsum sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tincidunt.</p>
													<footer><cite title="Source Title"><a href="#">Jason,</a> <a href="#">Lawyer</a></cite></footer>
												</blockquote>
											</div>
											<!-- beans-slide -->
											<div class="beans-slide">
												<blockquote class="gallery-quotes">
													<i class="fa fa-quote-left"></i>
													<p>Lorem ipsum sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tincidunt.</p>
													<footer><cite title="Source Title"><a href="#">Jason,</a> <a href="#">Lawyer</a></cite></footer>
												</blockquote>
											</div>
											<!-- beans-slide -->
											<div class="beans-slide">
												<blockquote class="gallery-quotes">
													<i class="fa fa-quote-left"></i>
													<p>Lorem ipsum sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tincidunt.</p>
													<footer><cite title="Source Title"><a href="#">Jason,</a> <a href="#">Lawyer</a></cite></footer>
												</blockquote>
											</div>
										</div>
									</div>
									<div class="beans-pagination"></div>
								</div>
							</section>
						</aside>
					</div>
				</div>
			</main>