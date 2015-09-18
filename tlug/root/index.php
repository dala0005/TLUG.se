<?php
session_start();
//var_dump($_SESS)['current_page'];
if(isset($_SESSION['current_page'])){
	$temp = $_SESSION['current_page'];

	switch($temp){
		case 'start_page': {
			header('Location: ./startsida');
		}
		break;

		case 'news_page': {
			header('Location: ./nyheter');
		}
		break;

		case 'contact_page': {
			header('Location: ./kontakta');
		}
		break;

		case 'member_page': {
			header('Location: ./medlem');
		}
		break;

		case 'post_news_page': {
			header('Location: ./posta_nyhet');
		}
		break;

		case 'member_list_page': {
			header('Location: ./medlemslista');
		}
		break;		

		default:{
			$_SESSION['current_page'] = 'start_page';
			header('Location: ./startsida');
		}
		break;
	}
}

else{
	$_SESSION['current_page'] = 'start_page';
	header('Location: ./startsida');
}
?>