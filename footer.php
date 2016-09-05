			<!-- footer of the page -->
			<footer id="footer">
				<!-- footer cent -->
				<div class="footer-cent bg-dark-jungle">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-3 info-box column1">
								<div class="f-get-touch">
									<h5>Get in touch</h5>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry .</p>
									<address><i class="fa fa-map-marker"></i> 1422 1st St. Santa Rosa,t CA 94559. USA</address>
									<a href="mailto:&#097;&#100;&#109;&#105;&#110;&#064;&#101;&#045;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;" class="email"><i class="fa fa-envelope-o"></i> &#097;&#100;&#109;&#105;&#110;&#064;&#101;&#045;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;</a>
									<a href="tel:00201008431112" class="tel"><i class="fa fa-phone"></i> 002- 01008431112</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 column2">
								<!-- f-popular-tags -->
								<div class="f-popular-tags">
									<h5>Popular Tags</h5>
									<ul class="list-inline footer-tags">
										<li><a href="#">Business</a></li>
										<li><a href="#">Creative</a></li>
										<li><a href="#">One Page</a></li>
										<li><a href="#">Parallax</a></li>
										<li><a href="#">Clean</a></li>
										<li><a href="#">Customization</a></li>
										<li><a href="#">Themeforest</a></li>
										<li><a href="#">Visual</a></li>
										<li><a href="#">Elegant</a></li>
										<li><a href="#">Development </a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 column3 clearfix-sm">
								<!-- footer-lastest-news -->
								<div class="f-lastest-news">
									<h5>Latest News</h5>
									<!-- footer-news-box -->
									<div class="footer-news-box">
										<div class="img-box">
											<a href="#"></a>
										</div>
										<div class="txt">
											<p><a href="#">Lorem Ipsum is simply dummy text of the printing typese.</a></p>
											<time datetime="2015-02-02">2 FEB 2015</time>
										</div>
									</div>
									<!-- footer-news-box -->
									<div class="footer-news-box">
										<div class="img-box">
											<a href="#"></a>
										</div>
										<div class="txt">
											<p><a href="#">Lorem Ipsum is simply dummy text of the printing typese.</a></p>
											<time datetime="2015-02-02">2 FEB 2015</time>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 column4">
								<!-- f-flicker -->
								<div class="f-flicker">
									<h5>Flickr Stream</h5>
                                    <div class="insta-box flickr-feed" data-id="44802888@N04" data-count="8" data-lightbox="gallery"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- footer bottom -->
				<div class="footer-bottom bg-shark">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="bottom-box1">
									<!-- foote-nav -->
									<ul class="list-inline footer-nav">
										<li><a href="#">Home</a></li>
										<li><a href="#">About Us</a></li>
										<li><a href="#">Career</a></li>
										<li><a href="#">Privacy Policy</a></li>
										<li><a href="#">Use of terms</a></li>
									</ul>
									<span class="copyright">&copy; 2015 &nbsp; <a href="#">Fekra Corporation</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<div class="fa fa-chevron-up" id="gotoTop" style="display: none;"></div>
	</div>

	<!-- include jQuery library -->
	<script type="text/javascript" src="http://localhost/forum/js/jquery-1.11.3.min.js"></script>
	<!-- include custom JavaScript -->
	<script type="text/javascript" src="http://localhost/forum/js/jquery.main.js"></script>
	<!-- include JavaScript Plugins-->
	<script type="text/javascript" src="http://localhost/forum/js/plugins.js"></script>

<script type="text/javascript">

// get your select element and listen for a change event on it
$('#selecta').change(function() {
  // set the window's location property to the value of the option the user has selected
  location.href = $(this).val();
});


// get your select element and listen for a change event on it
$('#selectb').change(function() {
  // set the window's location property to the value of the option the user has selected
  location.href = $(this).val();
});

</script>	
	
	<script type="text/javascript">
    var a = document.getElementById('user_level').value;
	var b = "Admin";
	var c = "Readonly";
    if(a != b)
    {
        document.getElementById('admin1').style.display = 'none';
        document.getElementById('admin2').style.display = 'none';
    }
	if(a == c)
	{
		document.getElementById('delete1').style.display = 'none';		        
		document.getElementById('user6').style.display = 'none';
        document.getElementById('user8').style.display = 'none';
	}
</script>

</body>
</html>