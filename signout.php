<?php
//session_start();
include "header.php";
//include "connect.php";
?>

                <!-- page banner -->
		<div id="userbar" class="container">
			<div class="row">
			<?php
			// remove all session variables
			session_unset();
			// destroy the session
			session_destroy();
			echo '<div style="text-align:center;"><h3>You are signed out!</h3></div>';

			?>
			</div>
		</div>						

		<?php include "footer.php" ?>
		<?php mysqli_close($db); ?>