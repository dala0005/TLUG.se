<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
	// set command
	$command = 'echo ' . $_POST['password'] . ' | md5sum';
	// hash password
	$password_md5 = preg_replace('/\s+/', '', shell_exec($command));
	
	$command = 'awk -F":" \'{ print $1 ":" $2}\' /home/daniel/medlemmar';
	$search_user = array();
	$user = array();
	$login = 0;
	exec($command, $search_user);
	for($i=0;$i<count($search_user);$i++){
		$user = explode(":", $search_user[$i]);

		if(($_POST['username'] == $user[0]) && ($password_md5 == preg_replace('/\s+/', '',$user[1]))){
			$login = 1;
			break;
		}
		//$user = array();
	}

	
	switch($login){
		case 0:{
			$error_msgs = array(" Inloggningen misslyckades", " Nix, här kommer du inte in", " Vi känner inte igen dig tyvärr", " Du knackar på fel dörr", " Gör om, gör rätt");
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>' . $error_msgs[mt_rand(0,(count($error_msgs)-1))] .'</div>';
		}
		break;

		case 1:{
			$_SESSION['member']['login'] = 'true';
			$_SESSION['member']['alias'] = $user[0];
			echo 'ok';
		}
		break;
	}
}
else{
	header('Location: ./index.php');
}

?>