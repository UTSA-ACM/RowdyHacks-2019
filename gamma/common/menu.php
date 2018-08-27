<div id="menu-container">
	<div id="main-menu-container">
		<nav class="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!--
						<a class="navbar-brand" href=".">
							<img id="logo" src="images/logo.png" alt="100 Bit">
						</a>
					-->
					<h1>
						<a href="." style="color:white;text-decoration:none;font-family:yellowtail;">RowdyHacks</a>
					</h1>
				</div> <!-- .navbar-header -->
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-right">
						<!--
						Temporarily disabled until navbar-collapse issue is resolved
						<li><a href=".">Home</a></li>
						-->
						
						<script type="text/javascript">
							$(document).ready(function(){
								var opacity = 1;
								var registration_pulse = window.setInterval(function(){
									opacity = Math.abs(opacity - 1);
									if(opacity){
										$("#registration_link_text_thing_stuffz_why_are_you_snooping_through_the_page_source").fadeTo(500, 0.5, "swing");
									}
									else{
										$("#registration_link_text_thing_stuffz_why_are_you_snooping_through_the_page_source").fadeTo(500, 1.0, "swing");
									}
								},500);
							});
						</script>
						<!--
						<li><a class="typeform-share link" href="https://acm-utsa.typeform.com/to/pRCOFi" data-mode="popup" style="text-decoration:none;" target="_blank" ><div id="registration_link_text_thing_stuffz_why_are_you_snooping_through_the_page_source" style="transition:none;">Register</div></a> <script> (function() { var qs, js, q, s, d = document, gi = d.getElementById, ce = d.createElement, gt = d.getElementsByTagName, id = "typef_orm_share", b = "https://s3-eu-west-1.amazonaws.com/share.typeform.com/"; if (!gi.call(d, id)) { js = ce.call(d, "script"); js.id = id; js.src = b + "share.js"; q = gt.call(d, "script")[0]; q.parentNode.insertBefore(js, q) } })() </script></li>
						-->
						<li><a href="schedule.php">Schedule</a></li>
						<li><a href="sponsors.php">Sponsors</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<!--
							<li><a href="https://einvitations.afit.edu/inv/anim.cfm?i=324454&k=0163460D7E53">RSVP</a></li>
						-->
						<li><a href="contact.php">Contact</a></li>
						<!-- collapse-only menu items -->
						<!--
							<li class="main-sub-menu-item">
								<a href="join">Join ACM</a>
							</li>
							<li class="main-sub-menu-item">
								<a href="dues">Pay Dues</a>
							</li>
							<li class="main-sub-menu-item">
								<a href="calendar">Calendar</a>
							</li>
							<li class="main-sub-menu-item">
								<a href="http://rowdyhacks.com">RowdyHacks</a>
							</li>
						-->
					</ul>
				</div><!-- .navbar-collapse -->
			</div> <!-- .container -->
		</nav>
	</div> <!-- #main-menu-container -->
	<!--
	<div id="sub-menu-container" class="container">
    	<div id="sub-menu" class="pull-right">
            <a href="join" id="sub-menu-item-1" class="sub-menu-item">Join ACM</a>
            <a href="dues" id="sub-menu-item-2" class="sub-menu-item">Pay Dues</a>
            <a href="calendar" id="sub-menu-item-3" class="sub-menu-item">Calendar</a>
            <a href="http://rowdyhacks.com" id="sub-menu-item-4" class="sub-menu-item">RowdyHacks</a>
		</div>
    </div>
    -->
</div> <!-- #menu-container -->
