<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/master.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stars.css" />
<link rel="stylesheet" type="text/css" href="css/background.css" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#shell-link").on("mouseenter", function(){
			$("#shell-link").css("background-color", "#296097");
		});
		$("#shell-link").on("click", function(e){
			e.preventDefault();
			var new_window = window.open("shell", "_blank", "menubar=1,resizable=0,width=570,height=320");
			$("#shell-link").css("background-color", $("#main-menu-container").css("background-color"));
		});
		$("#shell-link").on("mouseleave", function(e){
			$("#shell-link").css("background-color", $("#main-menu-container").css("background-color"));
		});
		
		$(window).load(function(){
			var $contentHeight = $("#content").outerHeight(true) + "px";
			if($(window).height() > $("#content").outerHeight(true)){
				$contentHeight = $(window).height() + "px";
			}
			$("#group1").css("height", $contentHeight);
			$("#group1").css("overflow", "hidden");
			$("#content").css("position", "relative");
			$("#content").css("top", "-"+$contentHeight);
			$("#page-overflow-border").css("height", $contentHeight);
			//$("#page-container").css("height", $(window).height()+"px");
		});
	});
</script>