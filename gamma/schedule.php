<!DOCTYPE html>
<html>
	<head>
		<?php
			require('common/head-includes.php');
		?>
		<title>
			RowdyHacks
		</title>
		<style type="text/css">
			.schedule-time {
				display: inline;
				float:right;
			}
			.schedule-item {
				list-style-type: none;
				padding: 10px 20px 10px 20px;
				border-style: none none solid none;
				border-color: #944E96;
				border-width: 3px;
			}
			.schedule-item:hover, .schedule-item:active{
				color: #FFFFFF;
				background-color: #944E96;
			}
		</style>
	</head>
	<body>
		<?php
			require('common/menu.php');
		?>
		<div id="page-container" style="height:100vh;">
			<div id="page-overflow-border">
				<?php
					include('common/confetti-background.php');
				?>
				<div id="content" class="container" style="">
					<div class="row" style="overflow-y:hidden;">
						<div class="col-sm-12" style="overflow-x:visible;">
							<div class="row">
								<div class="col-sm-2"></div>
								<div class="col-sm-8 section-container">
									<h1 style="margin:20px 30px 20px 30px;">
										Schedule
									</h1>
								</div>
								<div class="col-sm-2"></div>
							</div>
							
							<div class="row">
								<div class="col-sm-2"></div>
								<div class="col-sm-8 section-container" style="text-align:left;">
									<ul style="padding: 0px;">
										<li class="schedule-item">
											<h3>
												Saturday
											</h3>
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												11:00
											</div>
											Check In Starts
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												12:30
											</div>
											Opening Ceremony
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												1:00
											</div>
											Hacking Begins
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												5:00
											</div>
											Dinner
										</li>
										<li class="schedule-item">
											<h3>
												Sunday
											</h3>
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												12:00
											</div>
											Midnight Snack
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												8:00
											</div>
											Breakfast
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												11:30
											</div>
											Devpost
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												12:30
											</div>
											Lunch
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												1:00
											</div>
											Exhibit
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												2:30
											</div>
											Demos
										</li>
										<li class="schedule-item">
											<div class="schedule-time">
												3:00
											</div>
											Closing Ceremony
										</li>
									</ul>
								</div>
								<div class="col-sm-2"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			require('common/footer.php');
		?>
	</body>
</html>
