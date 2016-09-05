<?php
//session_start();
//create_cat.php
include 'connect.php';
include 'header.php';

echo '<h2>Create a topic</h2>';
echo '<div style="margin:0 auto; text-align:center;">';

if(!(isset($_SESSION['signed_in'])))
{
	//the user is not signed in
	echo 'Sorry, you have to be <a href="login.php">signed in</a> to create a topic.';
	
}
else
{
	//the user is signed in
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{	
		//the form hasn't been posted yet, display it
		//retrieve the categories from the database for use in the dropdown
		$sql = "SELECT cat_id, cat_name, cat_description FROM categories";
		
		$stmt10 = $db->prepare($sql);
		$stmt10->execute();
		$stmt10->store_result();
		
		if(!($stmt10->bind_result($cID, $cName, $cDesc)))
		{
			//the query failed, uh-oh :-(
			echo 'Error while selecting from database. Please try again later.';
		}
		else
		{
			$num_rows = $stmt10->num_rows;
			if($num_rows == 0)
			{
				//there are no categories, so a topic can't be posted
				if($_SESSION['user_level'] == 1)
				{
					echo 'You have not created categories yet.';
				}
				else
				{
					echo 'Before you can post a topic, you must wait for an admin to create some categories.';
				}
			}
			else
			{
		
				echo '<form method="post" action="">
					Subject: <input type="text" name="topic_subject" />
					Category:'; 
				
				echo '<select name="topic_cat">';
					while($stmt10->fetch())
					{
						echo '<option value="' . $cID . '">' . $cName . '</option>';
					}
				echo '</select>';	
					
				echo '<br><br><br>Message: <textarea name="post_content" /></textarea>
					<br><br><br><input type="submit" value="Create topic" class="btn btn-load"/>
				 </form>';
			}
		}
	}
	else
	{
		//start the transaction
		
		$stmt10 = $db->query('BEGIN WORK;');
		
		if(!$stmt10)
		{
			//Damn! the query failed, quit
			echo 'An error occured while creating your topic. Please try again later.';
		}
		else
		{

			$sql = "INSERT INTO topics(topic_subject, topic_date, topic_cat, topic_by)
				   VALUES('" . mysqli_real_escape_string($db, $_POST['topic_subject']) . "',
							   NOW(),
							   " . mysqli_real_escape_string($db, $_POST['topic_cat']) . ",
							   " . $_SESSION['user_id'] . "
							   )";
					 
			$stmt10 = $db->query($sql);
			if(!$stmt10)
			{
				//something went wrong, display the error
				echo 'An error occured while inserting your data. Please try again later.' . $db->error;
				$sql = "ROLLBACK;";
				$stmt10 = $db->query($sql);
			}
			else
			{

					$sql = "COMMIT;";
					$stmt10 = $db->query($sql);
					//after a lot of work, the query succeeded!
					$topicid = $stmt10->insert_id;
					echo 'You have successfully created <a id="user2" href="topic.php?id='. $topicid . '">your new topic</a>.';
				
			}
			$stmt10->close();	
		}
	}
}
echo '<br><br><br>';
echo '</div>';

//$db->free_result();
$db->close();
//$mysqli->close();

include 'footer.php';
?>