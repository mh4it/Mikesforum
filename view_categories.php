<?php
//create_cat.php - Admin Control

$sql = "SELECT * FROM categories"; 
// cat_id, cat_name, cat_description,
//$stmt4->execute();
//$stmt4->store_result();

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
		echo 'No categories defined yet.';
	}
	else
	{
		//prepare the table
		echo '<table border="1">
			  <tr>
				<th>Topics</th>
			  </tr>';	
		while($row = ($stmt4->fetch_assoc()))
		{		
			$sql2 = "SELECT topic_id, topic_subject, topic_date, DATE_FORMAT(topic_date, '%b, %D')
			FROM topics WHERE topic_cat='" . $row['cat_id'] . "'";
			$stmt9 = $db2->query($sql2);
			echo '<tr>';
				echo '<td class="leftpart">';
					echo '<h4>' . $row['cat_name'] . '</h4>' . $row['cat_description'];
					echo '<br><ul>';
					
					while($row2 = ($stmt9->fetch_assoc()))
					{
						echo '<li><h3><a href="topic.php?id=' . $row2['topic_id'] . '">' . $row2['topic_subject'] . '</a></h3></li>';
						echo '<ul><li>' . $row2['topic_date'] . '</li></ul>';
					}
					
					echo '</ul>';
				echo '</td>';
				echo '<td class="rightpart">';
					
				echo '</td>';
			echo '</tr>';
			
		}
		echo '</table>';
	}
}
$stmt4->free();
$stmt9->free();
?>