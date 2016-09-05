<?php 
include "header.php";
//require_once('connect.php');
include "connect.php";
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
							<div class="col-xs-8">
								<div class="holder">
									<h1 class="heading text-uppercase">Michael Hughes</h1>
								<ul class="breadcrumbs list-inline">
									<li><a href="index.php">Home</a></li>
									<li class="active"><a href"">Admin</a></li>
								</ul>	
								</div>
							</div>
							<div class="col-xs-4">
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
							<!-- blog-accordion -->
							<ul class="blog-accordion list-unstyled">
							
								<!-- blog-post -->
								
<?php

	if(!(isset($_SESSION['signed_in'])))
	{
		//the user is not signed in
		echo 'Sorry, you have to be a <a href="login.php">signed in Admin</a>.';
	}
	else
	{	
	if(!(empty($_GET['id'])))
	{
		if($_SERVER['REQUEST_METHOD'] != 'POST')
		{
			//Alternate and triple Send quoted quotes
			$sql = "SELECT user_name, user_email, user_fname, user_lname, user_level FROM `users` WHERE user_id ='" . $_GET['id'] . "'";
			$stmt22 = $db->query($sql);
			while($row = ($stmt22->fetch_assoc()))
			{
				echo '<form id="userform2" method="post" action="" class="contact-form2">
					<h2>User Maintenance: ' . $row['user_name'] . '</h2><hr style="width:40%">
					<table>
					<tr>
					<th>first name</th><th>last</th><th>password</th><th>confirm</th>
					</tr>
					<tr>
					<td><input name="fname_edit" value="' . $row['user_fname'] . '" /></td>
					<td><input name="lname_edit" value="' . $row['user_lname'] . '" /></td>
					<td><input type="password" name="user_pass" style="float:right:" value=""></td>
					<td><input type="password" name="user_pass_check" style="float:right:" value=""></td>
					<input type="hidden" name="uid" value="'. $_GET['id'] .'"></input>	
					</tr>
					</table>
					<hr style="width:40%"><br><br><input type="submit" value="Save" class="btn btn-load"/>
					</form>';
			}
			$stmt22->free();
			echo '<br><hr style="width:75%;"><hr style="width:75%;"><br>';

			
			$sql3 = "SELECT post_id FROM posts WHERE post_by='" . $_GET['id'] . "'";
			$stmt25 = $db->query($sql3);
			
				echo '<h4>Post Maintenance: </h4><hr style="width:40%">';

			//Read out each post_id
			while ($row2 = ($stmt25->fetch_assoc()))
			{
				//Post of user per post_id
				$sql2 = "SELECT  post_id, post_content, post_topic, post_title FROM posts WHERE post_id='" . $row2['post_id'] . "'";
				$post = $db->query($sql2);
				
				echo '<form id="postform" method="post" action="" class="contact-form2">';
					echo '<table>
					<tr>
					<th>title</th><th>content</th>
					</tr>
					<tr>';
					while ($post_array = $post->fetch_assoc()) {
						echo '<td><input name="ptitle_edit" value="' . $post_array['post_title'] . '"></input></td>
						<td><textarea cols="50" name="pcontent_edit">'. $post_array['post_content'].'</textarea></td>';
					}
					echo '<input type="hidden" name="pid" value="'. $row2['post_id'] .'"></input>

					</tr></table>
					<hr style="width:40%"><br><br><input type="submit" value="Save" class="btn btn-load"/>
					</form>';															
			}
			//$stmt25->free();
			//$post->free();
		}
		
		else if (isset($_POST['user_pass']))
		{
			$errors = array(); /* declare the array for later use */
			if(isset($_POST['user_pass']))
			{
				if($_POST['user_pass'] != $_POST['user_pass_check'])
				{
					$errors[] = 'The two passwords did not match.';
				}
			}
			else
			{
				$errors[] = 'The password field cannot be empty.';
			}
			
			if(!empty($errors)) 
			{
				echo 'Uh-oh.. password field is not filled in correctly..';
				echo '<ul>';
				foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
				{
					echo '<li>' . $value . '</li>'; 
				}
				echo '</ul>';
			}
			else
			{
				$namef = mysqli_real_escape_string($db, $_POST['fname_edit']);
				$namel = mysqli_real_escape_string($db, $_POST['lname_edit']);

				$sql = 'UPDATE users SET user_pass="'. sha1($_POST['user_pass']) .'", user_fname="' . $namef . '", user_lname="' . $namel . '" WHERE user_id ="'.$_GET['id'].'" '; 
				
				if ($update= $db->query($sql))
				{
					echo '<div style="display:block;clear:both; margin-top:50px; margin-right:200px; margin-bottom:50px; margin-left:200px;"><div><h3>Successfully updated. <a href="index.php">Back to Home</a> and start posting! :-)</h3></div></div>';
				}
				else{
					echo '<div style="display:block;clear:both; margin-top:50px; margin-right:200px; margin-bottom:50px; margin-left:200px;"<div><h3>Something went wrong while saving changes. Please try again later.</h3></div></div>';
				}
				
				//$update->free();
				//$stmt2->free();

				}

			}
			
			else if (isset($_POST['pcontent_edit'])) {
			$content = mysqli_real_escape_string($db, $_POST['pcontent_edit']);
			$title = mysqli_real_escape_string($db, $_POST['ptitle_edit']);

			$sql2 = 'UPDATE posts SET post_content="' . $content . '", post_title="' . $title . '" WHERE post_id="' . $_POST['pid'] . '"';

			if(!($stmt27 = $db->query($sql2)))
			{
				echo '<h4>An error occured while saving changes. Please try to press back to access form data.</h4>';
			}
			else
			{
				echo '<h4>You have successfully saved changes <a href="admin.php?id=' . $_GET['id'] . '"> Back To Home</a>.</h4>';
				//header('Location: http://www.adprose.org/forum/admin.php?=' . $_GET['id'] . '', true);
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