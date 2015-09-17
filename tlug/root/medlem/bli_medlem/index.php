<?php
	session_start();
	$_SESSION['current_page'] =  'member_page';
	include('../../date.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			include('../../header_links.php');
		?>
		<title>
			tlug.se - medlem
		</title>
		<?php
			include('../../jquery.php');
		?>
	</head>
<body>
	<div class="container">
	<?php
		include('../../template_header.php');
		include('./content.php');
		if($update_change_date == 'true'){
			include('../../update_change_date.php');
		}

		if($show_date=='true'){
			echo '<hr><p class="text-center">' . exec('cat ../../date.txt') . '</p>';
		}
	?>
		</div>
</body>
</html>
