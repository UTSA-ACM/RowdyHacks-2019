<html>
    <head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <title>
            RowdyHacks
        </title>
        <style type="text/css">
            #shape-a {
                width: 400px;
                height: 200px;
                background-color: #ab36c8;
                -moz-border-radius: 150px / 50px;
                -webkit-border-radius: 150px / 50px;
                border-radius: 200px / 100px;
                -ms-transform: rotate(27deg); /* IE 9 */
                -webkit-transform: rotate(27deg); /* Safari 3-8 */
                transform: rotate(27deg);
                position:absolute;
                top:-10px;
                right:130px;
            }
            #shape-a:hover {
                background-color: green;
            }
            #shape-b {
                width: 400px;
                height: 200px;
                background-color: #a92300;
                -moz-border-radius: 150px / 50px;
                -webkit-border-radius: 150px / 50px;
                border-radius: 200px / 100px;
                -ms-transform: rotate(27deg); /* IE 9 */
                -webkit-transform: rotate(27deg); /* Safari 3-8 */
                transform: rotate(-27deg);
                position:absolute;
                top:-120px;
                right:30px;
            }
            #shape-b:hover {
                background-color: green;
            }
            #shape-c {
                width: 400px;
                height: 200px;
                background-color: #109234;
                -moz-border-radius: 150px / 50px;
                -webkit-border-radius: 150px / 50px;
                border-radius: 200px / 100px;
                -ms-transform: rotate(27deg); /* IE 9 */
                -webkit-transform: rotate(27deg); /* Safari 3-8 */
                transform: rotate(27deg);
                position:absolute;
                top:-10px;
                right:-70px;
            }
            #shape-c:hover {
                background-color: green;
            }
            #shape-d {
                width: 400px;
                height: 200px;
                background-color: #32ba7f;
                -moz-border-radius: 150px / 50px;
                -webkit-border-radius: 150px / 50px;
                border-radius: 200px / 100px;
                -ms-transform: rotate(27deg); /* IE 9 */
                -webkit-transform: rotate(27deg); /* Safari 3-8 */
                transform: rotate(-27deg);
                position:absolute;
                top:-100px;
                right:-170px;
            }
            #shape-d:hover {
                background-color: green;
            }
            #shape-e {
                width: 400px;
                height: 200px;
                background-color: #992789;
                -moz-border-radius: 150px / 50px;
                -webkit-border-radius: 150px / 50px;
                border-radius: 200px / 100px;
                -ms-transform: rotate(27deg); /* IE 9 */
                -webkit-transform: rotate(27deg); /* Safari 3-8 */
                transform: rotate(27deg);
                position:absolute;
                top:-10px;
                right:-280px;
            }
            #shape-e:hover {
                background-color: green;
            }
            
            
            body {
                font-family: helvetica, arial, sans-serif;
            }
            body, div, ul {
                margin: 0px;
                padding: 0px;
            }
            #cover {
                margin-top: 70px;
                height: calc(100vh - 70px);
                width: 100vw;
                background: url('images/skyline.png') no-repeat center center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-color: #111;
            }
            .section {
                width: 100vw;
            }
            .section-text {
                padding: 20px;
                /*width: calc(100% - 40px);*/
            }
            .section-text h2 {
                text-align: center;
                margin: 50px;
            }
            #menu {
                position: fixed;
                left: 0px;
                top: 0px;
                right: 0px;
                height: 70px;
                background-color: #a64803;
                color: #ffffff;
                z-index: 1000;
                box-shadow: 0px 0px 10px -2px #000000;
            }
            #menu h1 {
                float: left;
                display: inline-block;
            }
            #menu ul {
                list-style-type: none;
                display: inline-block;
                float: right;
            }
            #menu ul a {
                text-decoration: none;
                color: inherit;
                margin: 0px;
                padding: 0px;
            }
            #menu ul a li {
                display: inline-block;
                margin: 0px;
                padding: 25px;
                text-size: 20px;
            }
            .faq-item {
                 background-color: #202020;
                 padding: 25px;
                 color: #efefef;
                 margin: 35px 10px;
            }
            .faq-item h3 {
                 border-style: none none solid none;
                 border-width: 4px;
                 border-color: orange;
                 margin: 5px 0px 20px 0px;
                 padding: 0px 0px 10px 0px;
            }
        </style>
    </head>
    <body>
        <div id="menu">
            <div id="menu-background" style="position:absolute;top:0;right:0;bottom:0;left:0;z-index:-1;overflow:hidden;">
                <div id="shape-a">
                </div>
                <div id="shape-b">
                </div>
                <div id="shape-c">
                </div>
                <div id="shape-d">
                </div>
                <div id="shape-e">
                </div>
            </div>
            <h1 style="margin:15px 0px 0px 20px;font-family:yellowtail;">
                RowdyHacks
            </h1>
            <ul>
                <a href="">
                    <li>
                        Register
                    </li>
                </a>
                <a href="#schedule">
                    <li>
                        Schedule
                    </li>
                </a>
                <a href="#faq">
                    <li>
                        FAQ
                    </li>
                </a>
                <a href="#sponsors">
                    <li>
                        Sponsors
                    </li>
                </a>
                <a href="#contact">
                    <li>
                        Contact
                    </li>
                </a>
            </ul>
        </div>
        <div id="content">
            <div id="cover">
                
            </div>
            <div class="section" id="schedule">
                <div style="background-color:purple;color:white;">
                    <div class="section-text">
                        <h2>
                            Schedule
                        </h2>
                        <p>
                            Hacking starts on Saturday...lorem ipsum doler sit amet lorem ipsum doler sit amet lorem ipsum doler sit amet lorem ipsum doler sit amet lorem ipsum doler sit amet lorem ipsum doler sit amet lorem ipsum doler sit amet lorem ipsum doler sit amet lorem ipsum doler sit amet lorem ipsum doler sit amet
                        </p>
                    </div>
                    <div style="padding:50px;max-width:calc(100%-50px);overflow-x:scroll;">
                        <?php
                            $pixels_per_hour = 100;
                        ?>
                        <div style="background:url('images/calendar-component.png') repeat repeat;background-size:<?php echo($pixels_per_hour/4); ?>px 1px;width:<?php echo(29.5*$pixels_per_hour); ?>px;height:150px;position:relative;">
                        <?php
                            $starting_time = 11;
                            $times = array(0, 1.5, 2, 6, 13, 21, 24.5, 25.5, 26.5, 27.5, 28);
                            $durations = array(1.5, 0.5, 24, 1, 0.5, 1, 0.5, 1, 1, 0.5, 0.5);
                            $events = array('Check In', 'Opening Ceremony', 'Hacking Begins', 'Dinner', 'Midnight Snack', 'Breakfast', 'Devpost Submission', 'Lunch', 'Exhibit', 'Demos', 'Closing Ceremony');
                            $event_stack = array(0, 0, 0);
                            $last = 0;
                            for($i = 0; $i < sizeof($times); $i++){
                                for($stack_index = rand(0,2); $last == $stack_index; $stack_index = rand(0,2));
                                $last = $stack_index;
                                while($event_stack[$stack_index] > $times[$i]){
                                    $stack_index++;
                                    $stack_index %= 3;
                                }
                                $event_stack[$stack_index] = $times[$i] + $durations[$i];
                                $time = $starting_time+$times[$i];
                                if(floor($time) % 12 == 0){
                                    $min = ($time - floor($time)) * 60;
                                    if($min < 10){
                                        $min = '0' . $min;
                                    }
                                    $time = '12:' . $min;
                                }
                                else{
                                    $time %= 12;
                                    $hour = floor($time);
                                    $min = ($time - $hour) * 60;
                                    if($min < 10){
                                        $min = '0' . $min;
                                    }
                                    $time = $hour . ':' . $min;
                                    
                                }
                                echo('<div style="background-color:#ff8888;opacity:0.8;position:absolute;top:'.(100-$stack_index*50).'px;left:'.($times[$i]*$pixels_per_hour).'px;overflow:none;height:50px;width:'.($durations[$i]*$pixels_per_hour).'px;border-style:none none none solid; border-width:3px;border-color:red;color:#101010;overflow-x:show;white-space:nowrap;">'.$events[$i].'<br />'.$time.'</div>');
                            }
                            for($i = 0; $i < 29.5; $i++){
                                $time = $starting_time+$i;
                                if(floor($time) % 12 == 0){
                                    $min = ($time - floor($time)) * 60;
                                    if($min < 10){
                                        $min = '0' . $min;
                                    }
                                    $time = '12:' . $min;
                                }
                                else{
                                    $time %= 12;
                                    $hour = floor($time);
                                    $min = ($time - $hour) * 60;
                                    if($min < 10){
                                        $min = '0' . $min;
                                    }
                                    $time = $hour . ':' . $min;
                                }
                                echo('<div style="position:absolute;top:-20px;left:'.($i*$pixels_per_hour).'px;overflow:none;height:20px;width:'.$pixels_per_hour.'px;border-style: none none none solid; border-color: #ccc;border-width:1px;padding-left:5px;overflow-x:show;white-space:nowrap;">'.$time.'</div>');
                            }
                        ?>
                        </div>
                        <!--
                        Saturday
                        11:00 Check In Starts
                        12:30 Opening Ceremony
                        1:00 Hacking Begins
                        5:00 Dinner
                        Sunday
                        12:00 Midnight Snack
                        8:00 Breakfast
                        11:30 Devpost
                        12:30 Lunch
                        1:00 Exhibit
                        2:30 Demos
                        3:00 Closing Ceremony
                        -->
                    </div>
                </div>
            </div>
            <div class="section" id="faq">
                <div class="section-text" style="background-color:#444;color:white;">
                    <h2>
                        FAQ
                    </h2>
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
            <div class="section" id="sponsors">
                <div class="section-text" style="background-color:#228866;color:white;">
                    <h2>
                        Sponsors
                    </h2>
                    <p>
                        Sponsor logos here...
                    </p>
                </div>
            </div>
            <div class="section" id="contact">
                <div class="section-text" style="background-color:#234567;color:white;">
                    <h2>
                        Contact
                    </h2>
                    <p>
                        Insert contact form here...
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>