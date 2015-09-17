<div class="page-header">
	<div class="text-center"><img src=<?php echo '"/bilder/11356134_10206121164003287_1405107868_n.jpg"'; ?>><br /><img src=<?php echo '"/bilder/11356310_10206121164043288_701843667_n.jpg"';  ?>></div>
	<?php
		$temp = $_SESSION['current_page'];
		switch($temp){
			case 'start_page':{
				echo '<h1 class="text-center"><small>Linux förening i Trestad</small></h1>'; 
			}
			break;

			case 'news_page':{
				echo '<h1 class="text-center"><small>Nyheter</small></h1>';
			}
			break;

			case 'archive_page':{
				echo '<h1 class="text-center"><small>Arkiv</small></h1>';
			}
			break;

			case 'manual_page':{
				echo '<h1 class="text-center"><small>Manualer</small></h1>';
			}
			break;

			case 'contact_page':{
				echo '<h1 class="text-center"><small>Kontakta styrelsen</small></h1>';
			}
			break;

			case 'member_page':{
				echo '<h1 class="text-center"><small>Medlem</small></h1>';
			}
			break;

			case 'donate_page':{
				echo '<h1 class="text-center"><small>Donera</small></h1>';
			}
			break;

			case 'post_news_page':{
				echo '<h1 class="text-center"><small>Posta nyhet</small></h1>';
			}
			break;

			case 'member_list_page':{
				echo '<h1 class="text-center"><small>Medlemslista</small></h1>';
			}
			break;
		}
	?>
</div>
<?php
	include('nav_meny.php');
?>

