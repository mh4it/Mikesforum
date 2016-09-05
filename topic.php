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
								echo '<div style="padding-top:15px; padding-bottom:15px; float:left;"><h4>Hello ' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a></h4></div>';
							}
							else
							{
								echo '<div style="padding-top:15px; padding-bottom:15px; float:left;"><h5><a href="login.php">Sign in</a> or <a href="createuser.php">create an account</a>.</h5></div>';
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
									<li class="active"><a href"">Posts by Topic</a></li>
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
						<img src="images/forum_bg2.jpg" alt="image description">
					</div>
				</header>
				<div class="container padding-top-100">
					<div class="row">
						<div class="col-xs-12 col-md-6 col-md-push-3 blog-section padding-zero">
							<!-- blog-accordion 
							<ul class="blog-accordion list-unstyled">-->
<?php

		if(!(isset($_SESSION['signed_in'])))
		{
			//the user is not signed in
			echo 'Sorry, you have to be <a href="login.php">signed in</a> to read or post.';
			
		}
		else
		{	

			echo '<div class="container"><div class="row"><div style="margin:0 auto;">';
			
				$sql5 = "SELECT topic_id, topic_subject FROM topics";
				$stmt = $db->query($sql5);
					echo '<select name="selectb" id="selectb"><option selected value="">Select Topic</option>';
						while($topic_array = $stmt->fetch_assoc())
						{
							echo '<option value="topic.php?id=' . $topic_array['topic_id'] . '">' . $topic_array['topic_subject'].'</option>';
						}
						echo '</select></div></div></div>';

					if (!(empty($_GET['id'])))
					{
						$PID = $_GET['id'];
						$sql = "SELECT x.post_id, y.topic_id, x.post_content, y.topic_subject, DATE_FORMAT(x.post_date, '%b,%D'), x.post_by, x.post_cat, x.post_title, x.post_reply FROM posts x INNER JOIN topics y ON y.topic_id=x.post_topic WHERE y.topic_id='" . $PID . "' ORDER BY x.post_topic ASC";

					$stmt16 = $db->query($sql);
						//prepare the table
						echo '<table style="border:none;">';

						//while($stmt16->fetch())
						while($row = ($stmt16 -> fetch_assoc()))
						{
						if(!($row['post_reply'])) {
							//echo '<tr><th>' . $row['topic_subject'] . '</th></tr>';
								echo '<tr>';
									echo '<td class="left">';
										echo '<h4>' . $row['post_title'] . '</h4><hr style="width:70%;">';
										echo '<h5>' . $row['post_content'] . '</h5>';
										echo '<div style="padding-left:80px;"><h5><a id="user4" class="btn btn-load" href="post.php?id=' . $row['topic_id'] . '&pid=' . $row['post_id'] . '"> Reply to: ' . $row['post_title'] . '</a></h5></div><br><hr style="width:70%; display:inline;">';
								if (($row['post_id'] == $row['post_by']) && ($_SESSION['user_level'] != 'Readonly'))
								{
									echo '<div style="float:right;"><form id="delete" method="post" action="" class="contact-form2">
										<input id="del"  type="hidden" name="del" value="'.$row['post_id'].'"></input>	
										<div style="left-padding:100px;"><input id="delete1" name="delete1" type="submit" value="Delete Thread!" class="btn btn-load"/></div></div><hr style="width:70%;">
										</form></div>
										<hr style="width:70%;">';
								}
									echo '</td>';
									echo '</tr>';
							}
							//Replies
							

								$pID = $row['post_id'];
								$sql2 = "SELECT post_content, post_title, post_by FROM posts WHERE '" . $pID . "'= post_cat";
								$stmt20 = $db2->query($sql2);
									while($row2 = ($stmt20->fetch_assoc()))
									{
										
									echo '<tr>';
										//echo '<td class="left">' . $row2['post_date'] . '</td>';
										echo '<td>';
										echo '<div style="padding-left:50px;"><h4>' . $row2['post_title'] . '</h4></div><hr style="width:55%;">';
										echo '<div style="padding-left:75px;"><h5>&nbsp;&nbsp;&nbsp;&nbsp;' . $row2['post_content'] . '</h5></div>';
										echo '<div style="padding-left:75px;"><h5><a id="user5" class="btn btn-load" href="post.php?id=' . $row['topic_id'] . '&pid=' . $pID . '"> Reply to: ' . $row['post_title'] . '</a></h5></div><br><hr style="width:70%;"><hr style="width:70%;">';																	
										echo '</td>';
									echo '</tr>';
									}														
						$stmt20->free();

						}
						echo '</table>';													
						$stmt16 -> free();
					}

				if ($_SESSION['signed_in'] != "Readonly" )
				{
										
					if (isset($_POST['del'])) {
					$post_id = $_POST['del'];
					$sql = "DELETE
							FROM posts
							WHERE post_id ='".$post_id."'";
					$sql2 = "DELETE
							FROM posts
							WHERE post_cat ='".$post_id."'";
					
					mysqli_query($db, $sql);
					mysqli_query($db, $sql2);	
					}					
					
				}
		}
						

?>

						</div>
						<aside class="col-xs-12 col-sm-6 col-md-3 col-md-pull-6">
							<!-- widget -->
							<?php //include "categories_widget.php"; ?>
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