
<div id="nav_meny" class="col-centered text-center">
	<h3>
		<span id="icon_start_page" class="glyphicon glyphicon-home" title="Startsida"></span>
		<span id="icon_news_page" class="glyphicon glyphicon-globe" title="Nyheter"></span>
		<span id="icon_contact_page" class="glyphicon glyphicon-envelope" title="Kontakta styrelsen"></span>
		<span id="icon_member_page" class="glyphicon glyphicon-user" title="Medlem"></span>
		<?php
		if(isset($_SESSION['member'])){
			if($_SESSION['member']['login'] == 'true'){
			?>
				<br />
				<span id="icon_post_news_page" class="glyphicon glyphicon-pencil" title="Posta nyhet"></span>
				<span id="icon_member_list_page" class="glyphicon glyphicon-list" title="Medlemslista"></span>
				<span id="icon_log_off_page" class="glyphicon glyphicon-off" title="Logga ut"></span>
			<?php
			}
		}
		?>
		<hr />
	</h3>
	
	<?php 
			if(isset($_SESSION['current_page'])){
				$current_color = "#E0E0E0";
				$not_current_color = "#333333";
				$current_pages = array("start_page", "news_page", "contact_page", "member_page", "post_news_page", "member_list_page", "log_off_page");
				$icon_ids = array("#icon_start_page", "#icon_news_page", "#icon_contact_page", "#icon_member_page", "#icon_post_news_page", "#icon_member_list_page", "#icon_log_off_page");
				for($i = 0; $i < count($current_pages); $i++){
					if($_SESSION['current_page'] == $current_pages[$i]){
						echo '<script>';
							echo '$("' . $icon_ids[$i] .'").css("color", "' . $current_color . '")';
						echo '</script>';

						echo '<script>';
							echo '$("' . $icon_ids[$i] . '").css("cursor", "default")';
						echo '</script>';
					}

					else{
				
						echo '<script>';
							echo '$("' . $icon_ids[$i] . '").css("color", "' . $not_current_color . '")';
						echo '</script>';

						echo '<script>';
							echo '$("' . $icon_ids[$i] . '").css("cursor", "pointer")';
						echo '</script>';
				
					}
				}
			}
		?>
</div>
