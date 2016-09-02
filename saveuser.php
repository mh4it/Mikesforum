<?php
include 'connect.php';
//include 'header.php';
	//post_id 	post_content 	post_date 	post_topic 	post_by 	post_cat
	//post_cat = 1 for all replies
	$first = $_POST['fname_edit'];
	$last = $_POST['lname_edit'];
	$email = $_POST['email_edit'];
	$level = $_POST['level_edit'];	
	
	$sql = 'UPDATE users SET user_fname="' . mysql_real_escape_string($_POST['fname_edit']) . '",user_lname="' . mysql_real_escape_string($_POST['lname_edit']) . '",user_email="' . mysql_real_escape_string($_POST['email_edit']) . '", user_level="' . mysql_real_escape_string($_POST['level_edit']) . '" WHERE user_id="'  . $_GET['id'] . '"';
	

	if(!($stmt23 = $db2->query($sql)))
	{
		echo '<h4>An error occured while saving changes. Please try to press back to access form data.</h4>';
	}
	else
	{

		echo '<h4>You have successfully saved changes <a href="admin.php"> Back To Admin</a>.</h4>';
		header('Location: http://www.adprose.ord/forum/admin.php?=" . $_GET['id'] . "', true);	

	}
	$stmt23->free();
	//include 'footer.php';											
?>											
											