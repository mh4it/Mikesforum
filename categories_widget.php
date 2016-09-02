<?php
//categories_widget.php
$sql = "SELECT * FROM categories"; 
//cat_id, cat_name, cat_description
if(!($stmt7 = $db->query($sql)))
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	$num_rows=mysqli_num_rows($stmt7);
	if($num_rows == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
	echo'<section class="widget cate-widget">
			<h2>Pages</h2>
			<ul class="list-unstyled">';

		while($row = ($stmt7->fetch_assoc()))
		{	
			//DATE_FORMAT(NEWS_DATE, '%W, %M %e')
			$sql2 = "SELECT topic_id, topic_subject, DATE_FORMAT(topic_date, '%b, %D')
			FROM topics WHERE topic_id='" . $row['cat_id'] . "'";
	
			$stmt8 = $db->query($sql2);

			echo '<li><i class="fa fa-caret-down"></i>' . $row['cat_name'] . '(' . rand(1,20) . ')<br>';
			while($topic = ($stmt8->fetch_assoc()))
			{
				//$formatted = $pDate2->format( 'F:j');						
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-right"></i><a href="topic.php?id=' . $topic['topic_id'] . '"><font style="color:#337ab7;"><b>' . $topic['topic_subject'] .'</b></font></a>';
				//echo '<br>Created:&nbsp;' . $topic['topic_date'];
			}
			echo '</li>';
			$stmt8->free();
		}
		echo'</ul>
		</section>';			
	}
}

$stmt7->free();
?>