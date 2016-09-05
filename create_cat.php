<?php
//create_cat.php - Admin Control
include 'connect.php';
include 'header.php';

$sql = "SELECT cat_id, cat_name, cat_description FROM categories"; 


if(!($stmt4 = $db->query($sql)))
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	$num_rows = $stmt4->num_rows;
	if($num_rows == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
		//prepare the table
		echo '<table border="1">
			  <tr>
				<th>Category</th>
				<th>Last topic</th>
			  </tr>';	
			
		while($num_rows > 0)
		{				
			echo '<tr>';
				echo '<td class="leftpart">';
					echo '<h3><a href="category.php?id">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
				echo '</td>';
				echo '<td class="rightpart">';
							echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
				echo '</td>';
			echo '</tr>';
		echo '</table>';
			
			$num_rows--;
		}
	}
}
//$stmt4->free();

include 'footer.php';
?>