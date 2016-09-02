<?php
include 'connect.php';
//include 'header.php';
	//post_id 	post_content 	post_date 	post_topic 	post_by 	post_cat
	//post_cat = 1 for all replies
	$sql2 = 'UPDATE posts SET post_content="' . mysqli_real_escape_string($db, $_POST['pcontent_edit']) . '",post_topic="' . mysqli_real_escape_string($db, $_POST['topic_edit']) . '",post_title="' . mysqli_real_escape_string($db, $_POST['ptitle_edit']) . '", WHERE user_id="' . $_GET['id'] . '"';
	

	if(!($stmt24 = $db->query($sql2)))
	{
		echo '<h4>An error occured while saving changes. Please try to press back to access form data.</h4>';
	}
	else
	{

		echo '<h4>You have successfully saved changes <a href="index.php"> Back To Home</a>.</h4>';
	}
	$stmt24->free();
	//include 'footer.php';										
?>										
											