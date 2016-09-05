<?php
//create_cat.php - Admin Control

$sql = "SELECT topic_id, topic_subject, topic_date FROM topics";
if(!($stmt4 = $db->query($sql)))
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	$num_rows=mysqli_num_rows($stmt4);
	//$num_rows = $stmt4->num_rows;
	if($num_rows == 0)
	{
		echo 'No topics defined yet.';
	}
	else
	{
		//prepare the table
		echo '<table border="1">
			  <tr>
				<th>Topics</th>
			  </tr>';	
		while($row2 = ($stmt4->fetch_assoc()))
		{		
			$sql2 = "SELECT cat_name, cat_description FROM categories where cat_id='".$row2['topic_id']."' "; 
			$stmt9 = $db->query($sql2);
			echo '<tr>';
				echo '<td class="leftpart">';
					echo '<div style="padding-left:25px;"><h3><a href="topic.php?id=' . $row2['topic_id'] . '">' . $row2['topic_subject'] . '</a></h3><hr style="width:40%">';
					while($row = ($stmt9->fetch_assoc()))
						{
							echo '<div style="text-align:center;"><h4>' . $row['cat_name'] . '</h4>' . $row['cat_description'] . '</div>';
						}
					//echo '</ul>';
				echo '<div></div></td>';
			echo '</tr>';
			
		}
		echo '</table>';
	}
}
$stmt4->free();
$stmt9->free();
?>