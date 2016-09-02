<?php 
include "connect.php";
include "header.php";
?>
			<!-- contain main informative part of the site -->
			<main id="main" role="main">
                <!-- page banner -->
					<div id="userbar" class="container">
						<div class="row">
							<?php
							if(isset($_SESSION['signed_in']))
							{
								echo '<div style="padding-top:15px; padding-bottom:15px;"><h4>Hello ' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a></h4></div>';
							}
							else
							{
								echo '<div style="padding-top:15px; padding-bottom:15px;"><h4><a href="login.php">Sign in</a> or <a href="createuser.php">create an account</a>.</h4></div>';
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
								</div>
								<ul class="breadcrumbs list-inline">
									<li><a href="index.php">Home</a></li>
									<li class="active"><a href"">Reply to a Post</a></li>
								</ul>	
							</div>
							<div class="col-xs-3">
								<div style="background-color: #ffffff; border: 1px solid black; opacity: 0.6; margin:15px; text-align:center;">
									<a id="user6" href="topic.php" class="btn btn-load">New Post</a>
								</div>
							</div>							
						</div>
				    </div>
		
					<div class="stretch">
						<img src="images/forum_bg2.jpg" alt="image description">
					</div>
				</header>
				<div class="container padding-top-100">
					<div class="row">
						<div class="col-xs-12 col-md-6 col-md-push-3 blog-section padding-zero">
							<!-- blog-accordion -->
							<ul class="blog-accordion list-unstyled">
							
								<!-- blog-post -->
								
								<?php
								
								if(!(isset($_SESSION['signed_in'])))
								{
									//the user is not signed in
									echo 'Sorry, you have to be <a href="login.php">signed in</a> to read or post.';
									
								}
								else
								{		
									if(!(empty($_GET['id'])))
									{	
										//No PID Make a Post
										if($_SERVER['REQUEST_METHOD'] != 'POST')
										{
											$sql = "SELECT * FROM posts WHERE post_id=" . $_GET['pid'];
											//Alternate and triple
											$stmt17 = $db->query($sql);
											while($row = ($stmt17->fetch_assoc()))
											{
												echo '<form method="post" action="" class="contact-form2">
													<h2>Replying to:' . $row['post_title'] . '</h2><hr style="width:40%">
													<br><br>Original Post:<br>'; 
												//Needs to be required
												echo '<table><tr><td>' . $row['post_content'] . '</td></tr></table>';
													
												echo '<br><br><hr style="width:40%">New Post: <textarea cols="50" name="post_content" /></textarea>
													<br><br><br><input type="submit" value="Post Reply" class="btn btn-load"/>
												 </form>';	

											}
											 $stmt17->free();
										}
										else
										{
												
											$sql = "SELECT * FROM posts WHERE post_id=" . $_GET['pid'];
											//Alternate and triple
											$stmt18 = $db->query($sql);
											while($row = ($stmt18->fetch_assoc()))
											{
												$tID = $row['post_topic'];
												$pTitle = 'RE:' . $row['post_title'];
											}
											$stmt18->free();

											$sql2 = 'INSERT INTO
														posts(post_content,
															  post_date,
															  post_topic,
															  post_by,
															  post_cat,
															  post_title,
															  post_reply)
													VALUES
														("' . mysql_real_escape_string($_POST['post_content']) . '",
															  NOW(),
															  "' . $tID . '",
															  "' . $_SESSION['user_id'] . '",
															  "' . $_GET['pid'] . '",
															  "' . $pTitle . '",
															  1
														)';
											

											if(!($stmt19 = $db->query($sql2)))
											{
												echo 'An error occured while inserting your post. Please try again later.';
											}
											else
											{

												echo 'You have successfully posted <a href="topic.php?id=' . $_GET['id'] . '"> Back To Thread</a>.';
											}
												
										}
									}
									
								}								
?>
								
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
			
<?php include "footer.php"; ?>