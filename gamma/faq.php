<!DOCTYPE html>
<html>
	<head>
		<?php
			require('common/head-includes.php');
		?>
		<title>
			RowdyHacks 2018
		</title>
		<style type="text/css">
			.faq-item {
				background-color: #ffffff;
				opacity: 0.9;
				border-radius: 2px;
				padding: 10px 20px 30px 20px;
				margin: 25px 0px;
				box-shadow: 0px 2px 7px -2px #000;
			}
			
			.faq-item>h3 {
				border-style: none none solid none;
				border-width: 5px;
				border-color: #944E96;/*#c06c84*/
				padding: 10px;
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
								<div class="col-md-6">
									<div class="faq-item">
										<h3>
											What is a hackathon?
										</h3>
										Hackathons are events where individuals form teams to create, design, and develop projects.
									</div>
									<div class="faq-item">
										<h3>
											How many people will be participating?
										</h3>
										There will be a limited number of participants. The earlier you sign up, the better the chance you have at being accepted.
									</div>
									<div class="faq-item">
										<h3>
											Who can attend?
										</h3>
										Any student enrolled at UTSA, 18 or older.
									</div>
									<div class="faq-item">
										<h3>
											How much will it cost?
										</h3>
										Free! We will provide food, internet, power, prizes, and snacks. You just have to show up.
									</div>
									<div class="faq-item">
										<h3>
											Where will I be allowed to park?
										</h3>
										Participants may park in any Faculty A/B or commuter spot over the weekend. We recommend trying the parking lot directly in front of the Bauerle Garage (Bauerle Rd Lot 3). A map of UTSA can be found <a href="https://www.utsa.edu/_files/images/visit/MainCampusMaps.jpg">here</a>.
									</div>
									<div class="faq-item">
										<h3>
											How big can a team be?
										</h3>
										We recommend having a team of 4 people
									</div>
								</div>
								<div class="col-md-6">
									<div class="faq-item">
										<h3>
											Why should I come?
										</h3>
										You'll be able to meet new people, discuss ideas, and collaborate on interesting projects.
									</div>
									<div class="faq-item">
										<h3>
											Where will RowdyHacks be located?
										</h3>
										RowdyHacks will take place on the first floor of the NPB (North Paseo Building) at UTSA's main campus.
									</div>
									<div class="faq-item">
										<h3>
											What can I build?
										</h3>
										Anything you can imagine, from websites to hardware hacks to mobile apps. The more creative, the better!
									</div>
									<div class="faq-item">
										<h3>
											What do I need to bring?
										</h3>
										Here are some items we recommend you bring: Laptops, chargers, a change of clothes, and toiletries
									</div>
									<div class="faq-item">
										<h3>
											What if I don't have a team or idea?
										</h3>
										We will give you the opportunity to form teams during the opening ceremonies.
									</div>
									<div class="faq-item">
										<h3>
											Interested in sponsoring?
										</h3>
										Please contact us via e-mail at <a href="mailto:team@rowdyhacks.org">team@rowdyhacks.org</a> for more details.
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
