<script>
$(document).ready(function(){
	$("#icon_start_page").click(function(){
		 $.post("../change_page.php", {current_page: "start_page"});
		 window.location.replace("/startsida");
	});

	$("#icon_news_page").click(function(){
		 $.post("../change_page.php", {current_page: "news_page"});
		 window.location.replace("/nyheter");
	});

	$("#icon_contact_page").click(function(){
		 $.post("../change_page.php", {current_page: "contact_page"});
		 window.location.replace("/kontakta");
	});

	$("#icon_member_page").click(function(){
		 $.post("../change_page.php", {current_page: "member_page"});
		 window.location.replace("/medlem");
	});

	$("#icon_post_news_page").click(function(){
		 $.post("../change_page.php", {current_page: "post_news_page"});
		 window.location.replace("/posta_nyhet");
	});

	$("#icon_member_list_page").click(function(){
		 $.post("../change_page.php", {current_page: "member_list_page"});
		 window.location.replace("/medlemslista");
	});

	$("#icon_log_off_page").click(function(){
		 $.post("../change_page.php", {current_page: "log_off_page"});
		 window.location.replace("/logga_ut");
	});

	$("#member_login_btn").click(function(){
		var user = $("#member_username").val();
		var pass = $("#member_password").val();
		 $.post("../try_login.php", {username: user, password: pass}, function(data, status){
		 	if(data == 'ok'){
		 		window.location.replace("index.php");
		 	}
		 	else{
		 		$("span#login_fail").html( data );
		 		$("#member_username").val('');
		 		$("#member_password").val('');
		 	}
		 });
	});

	$("button#btn_news_publishing").click(function(){
		var title = $("input#post_news_title").val();
		var content = $("textarea#post_news_content").val();
		var errors = 0b00;

		if(!title){
			errors = (errors | 0b01);
		}

		if(!content){
			errors = (errors | 0b10);
		}

		if(errors){
			var string = "<div class=\"alert alert-danger\" role=\"alert\"><span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span><span class=\"sr-only\">Error:</span> Fel<ul>";

			switch(errors){
				case 1:{
					string += "<li>Ingen rubrik</li>";
				}
				break;

				case 2:{
					string += "<li>Inget innehåll</li>";
				}
				break;

				case 3:{
					string += "<li>Ingen rubrik</li><li>Inget innehåll</li>";
				}
				break;
			}

			string += "</ul></div>";
			$("span#news_publishing_msg").html(string);

		}
		else{
			$("span#news_publishing_msg").html("");
			$.post("../create_news.php", {title: title, content: content}, function(data, status){
				$("span#news_publishing_msg").html(data);
				$("div#news_publishing_status").html("Status: Publicerad")
		 	});
		}
	});//news_publishing_status

	$("tr.clickable-row").click(function(){
		window.document.location = $(this).data("href");
	});

});
</script>
