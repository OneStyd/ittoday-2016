<?php
    ob_start();
    session_start();
    include "author/connect.php";

?>

<!DOCTYPE html>
<!-- Made with love by IT Today's Web Team. Thanks to all of IT Today's committee and everyone whose support us -->
<html lang="en">
	<head>
		<?php include "author/header.php"; ?>
	</head>
	<?php include "author/navigation.php"; ?>


		<!-- Page Section -->
		<?php
			if(empty($_GET['page'])){
				include "page/main.php";
			}
			else if(isset($_GET['page'])){
				$page = $_GET['page'];
				if($page == "isc") $page = "iscs";
				if(include "page/".$page.".php");
				else{
					header("location: 404");
				}
			}
		?>

		<?php include "author/footer.php"; ?>
	</body>
</html>