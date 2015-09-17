<?php
	session_start();
	if(isset($_POST['current_page'])){
		$temp = $_POST['current_page'];
		switch($temp){
			case 'start_page':{
				$_SESSION['current_page'] = 'start_page';
			}
			break;

			case 'news_page':{
				$_SESSION['current_page'] = 'news_page';
			}
			break;

			case 'archive_page':{
				$_SESSION['current_page'] = 'archive_page';
			}
			break;

			case 'manual_page':{
				$_SESSION['current_page'] = 'manual_page';
			}
			break;

			case 'contact_page':{
				$_SESSION['current_page'] = 'contact_page';
			}
			break;

			case 'member_page':{
				$_SESSION['current_page'] = 'member_page';
			}
			break;

			case 'donate_page':{
				$_SESSION['current_page'] = 'donate_page';
			}
			break;

			case 'post_news_page':{
				$_SESSION['current_page'] = 'post_news_page';
			}
			break;

			case 'member_list_page':{
				$_SESSION['current_page'] = 'member_list_page';
			}
			break;

			case 'log_off_page':{
				$_SESSION['current_page'] = 'log_off_page';
			}
			break;

			default:{
				$_SESSION['current_page'] = 'start_page';	
			}
		}
	}
?>