<?php 
//session_start();
//signin.php
include 'connect.php';
include 'header.php';

echo '<h3>Sign in</h3><hr style="width:50%;">';
echo '<div style="margin:0 auto; text-align:center;">';

if((isset($_SESSION['signed_in'])))
{
	echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '<div style="display:block;clear:both; margin-top:50px; margin-right:200px; margin-bottom:50px; margin-left:200px;"<div><form method="post" action="">
			Username: <input type="text" name="user_name" /><br><br><br>
			Password: <input type="password" name="user_pass"><br><br><br>
			<input type="submit" value="Sign in" class="btn btn-load" />
		 </form></div></div>';
	}
	else
	{
		$errors = array(); /* declare the array for later use */
		
		if(!isset($_POST['user_name']))
		{
			$errors[] = 'The username field must not be empty.';
		}
		
		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'The password field must not be empty.';
		}
		
		if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
		{
			echo 'Uh-oh.. a couple of fields are not filled in correctly..';
			echo '<ul>';
			foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
			{
				echo '<li>' . $value . '</li>'; /* this generates a nice error list */
			}
			echo '</ul>';
		}
		else
		{
			//Matching password in SQL
			$sql = "SELECT user_id, user_name, user_level FROM  users WHERE user_name = '" . mysqli_real_escape_string($db, $_POST['user_name']) . "'	AND user_pass = '" . sha1($_POST['user_pass']) . "'";
		
			$stmt3 = $db->prepare($sql);
			$stmt3->execute();
			$stmt3->store_result();
		
			if ($stmt3->bind_result($uID, $uName, $uLevel))
			{
				//if(mysql_num_rows($stmt3) == 0)
				$num_rows = $stmt3->num_rows;
				if ($num_rows == 0)
				{
					echo '<div style="display:block;clear:both; margin-top:50px; margin-right:200px; margin-bottom:50px; margin-left:200px;"><div><h3>You have supplied a wrong user/password combination. Please try again.</h3></div></div>';
				}
				else
				{
					//set the $_SESSION['signed_in'] variable to TRUE
					$_SESSION['signed_in'] = true;
			
					while($stmt3->fetch())
					{
						$_SESSION['user_id'] 	= $uID;
						$_SESSION['user_name'] 	= $uName;
						$_SESSION['user_level'] = $uLevel;
					}
					
					echo '<div style="display:block;clear:both; margin-top:50px; margin-right:200px; margin-bottom:50px; margin-left:200px;"<div><h3> Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to the forum overview</a>.</h3></div></div>';
				}				
				
			}
			else{
								echo '<div style="display:block;clear:both; margin-top:50px; margin-right:200px; margin-bottom:50px; margin-left:200px;"<div><h3>Something went wrong while signing in. Please try again later.</h3></div></div>';

			}
			
			$stmt3->free_result();
			$stmt3->close();
				
		}
	}
}
echo '<br><br><br></div>';

include "footer.php";
	 