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
			.sponsor-logo {
				display: block;
				margin: 15px;
				max-width: 80%;
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
							<div class="row section-container">
								<div class="col-sm-12">
									<h1 style="margin:20px 30px 70px 30px;">
										Previous Sponsors
									</h1>
								</div>
								<!--
								<div class="col-sm-12 hidden-md-up">
									<div class="row vertical-middle-align">
										<div class="col-sm-12" style="text-align:inherit;">
											<img src="images/sponsors/logos/alexa.png" class="sponsor-logo" />
										</div>
										<div class="col-sm-12" style="text-align:inherit;">
											<img src="images/sponsors/logos/cs-department.png" class="sponsor-logo" />
										</div>
									</div>
									<div class="row vertical-middle-align">
										<div class="col-sm-12" style="text-align:inherit;">
											<img src="images/sponsors/logos/promoter.png" class="sponsor-logo" />
										</div>
										<div class="col-sm-12" style="text-align:inherit;">
											<img src="images/sponsors/logos/sa-code-jam.png" class="sponsor-logo" />
										</div>
									</div>
									<div class="row vertical-middle-align">
										<div class="col-sm-6" style="text-align:inherit;">
											<img src="images/sponsors/logos/acm.png" class="sponsor-logo" style="max-height:200px;" />
										</div>
										<div class="col-sm-6" style="text-align:inherit;">
											<img src="images/sponsors/logos/acm-w.png" class="sponsor-logo" style="max-height:200px;" />
										</div>
										<div class="col-sm-12" style="text-align:inherit;">
   											<div>
   											    <img src="images/sponsors/logos/rowdyhacks.png" class="sponsor-logo" />
   											</div>
										</div>
									</div>
								</div>
								-->
								<div class="hiden-sm-down col-md-12">
									<div class="row vertical-middle-align">
										<div class="col-md-6" style="text-align:inherit;">
											<img src="images/sponsors/logos/alexa.png" class="sponsor-logo" />
										</div>
										<div class="col-md-6" style="text-align:inherit;">
											<img src="images/sponsors/logos/cs-department.png" class="sponsor-logo" />
										</div>
									</div>
									<div class="row vertical-middle-align">
										<div class="col-md-6" style="text-align:inherit;">
											<img src="images/sponsors/logos/promoter.png" class="sponsor-logo" />
										</div>
										<div class="col-md-6" style="text-align:inherit;">
											<img src="images/sponsors/logos/sa-code-jam.png" class="sponsor-logo" />
										</div>
									</div>
									<div class="row vertical-middle-align">
										<div class="col-md-3" style="text-align:inherit;">
											<img src="images/sponsors/logos/acm.png" class="sponsor-logo" style="max-height:200px;" />
										</div>
										<div class="col-md-3" style="text-align:inherit;">
											<img src="images/sponsors/logos/acm-w.png" class="sponsor-logo" style="max-height:200px;" />
										</div>
										<div class="col-md-6" style="text-align:inherit;">
   											<div>
   											    <img src="images/sponsors/logos/rowdyhacks.png" class="sponsor-logo" />
   											</div>
										</div>
									</div>
								</div>
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
