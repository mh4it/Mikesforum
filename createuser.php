<?php														

include "connect.php";
include "header.php";

echo '<h3>Create User</h3>';
echo '<div style="margin:0 auto; text-align:center;">';


if($_SERVER['REQUEST_METHOD'] != 'POST')
{ 
//<!-- Sign Up Form -->
echo  '<form class="login-form2" method="post" action="#">';
echo  '		<fieldset>';
			//<!-- page heading -->
echo  '		<header class="page-heading">';
echo  '			<div class="heading">';
echo  '				<h2 class="heading5 lime text-uppercase font-medium">Sign Up</h2>';
echo  '			</div>';
echo  '		</header>';
	
echo  ' 	 	Username: <input type="text" name="user_name" style="float:right:" /><br>';
echo  ' 		Password:  <input type="password" name="user_pass" style="float:right:"><br>';
echo  '			Password again: <input type="password" name="user_pass_check" style="float:right:"><br>';
echo  '			E-mail: <input type="email" name="user_email" style="float:right:"><br>';
echo  ' 		<input type="submit" value="Sign Up" style="float:right:" class="btn btn-load" />';
echo  '		</fieldset>';
echo  '</form>'; 
}
else
{
	$errors = array(); /* declare the array for later use */
	
	if(isset($_POST['user_name']))
	{
		//the user name exists
		if(!ctype_alnum($_POST['user_name']))
		{
			$errors[] = 'The username can only contain letters and digits.';
		}
		if(strlen($_POST['user_name']) > 30)
		{
			$errors[] = 'The username cannot be longer than 30 characters.';
		}
	}
	else
	{
		$errors[] = 'The username field must not be empty.';
	}
	
	
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
		echo 'Uh-oh.. a couple of fields are not filled in correctly..';
		echo '<ul>';
		foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
		{
			echo '<li>' . $value . '</li>'; 
		}
		echo '</ul>';
	}
	else
	{

			
		$sql = "INSERT INTO users(user_name, user_pass, user_email ,user_date, user_level)
				VALUES('" . mysqli_real_escape_string($db, $_POST['user_name']) . "', '" . sha1($_POST['user_pass']) . "', '" . mysqli_real_escape_string($db, $_POST['user_email']) . "', NOW(), 0)";
				
		$stmt2 = $db->prepare($sql);
		
		
		if ($stmt2->execute())
		{
			echo '<div style="display:block;clear:both; margin-top:50px; margin-right:200px; margin-bottom:50px; margin-left:200px;"><div><h3>Successfully registered. You can now <a href="login.php">sign in</a> and start posting! :-)</h3></div></div>';
		}
		else{
			echo '<div style="display:block;clear:both; margin-top:50px; margin-right:200px; margin-bottom:50px; margin-left:200px;"<div><h3>Something went wrong while registering. Please try again later.</h3></div></div>';
		}
		
		
		$stmt2->free_result();
		$stmt2->close();
		
	}
}
echo '<br><br><br></div>';
include "footer.php";
