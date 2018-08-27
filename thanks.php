<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            RowdyHacks
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" href="/favicon.png">
        <link rel="shortcut icon" type="image/png" href="/favicon.png"/>


        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/stars.css" />

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
        
        <link href="https://fonts.googleapis.com/css?family=Yellowtail" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:900" rel="stylesheet" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <?php
            if($_SERVER['SERVER_NAME'] == 'localhost'){
                echo('<!--');
            }
        ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71408623-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-71408623-2');
        </script>
        <!---->
        <script type="text/javascript">
            jQuery(document).ready(function(){
            	$('.dayopen').on('click', function(e) {
            		var href, target;e.preventDefault();
            		target = $(this).data('target');
            		href = "#" + target;
            		$("#" + target).fadeIn().addClass('activeday');
            		return $(document).scrollTop(0);
            	});
            	return $('.dayclose').on('click', function(e) {e.preventDefault();
            		return $('.activeday').fadeOut().removeClass('activeday');
            	});
            });
            $(document).ready(function(){
                $("a[href*=#]").click(function(){
                    if(location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname){
                        var $target = $(this.hash);
                        $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
                        if($target.length){
                            var targetOffset = $target.offset().top;
                            var yOffset = typeof window.pageYOffset != 'undefined' ?  window.pageYOffset : document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ? document.body.scrollTop : 0;
                            var it = 50 * Math.log(1000 * Math.abs(yOffset - targetOffset));
                            console.log(targetOffset+" "+it+" "+yOffset);
                            $("html,body").animate({scrollTop: targetOffset}, it);
                            return false;
                        }
                    }
                });
                var keystrokes = "";
                document.onkeypress = function (e) {
                    e = e || window.event;
                    var charCode = (typeof e.which == "number") ? e.which : e.keyCode;
                    if (charCode > 0) {
                        keystrokes += String.fromCharCode(charCode);
                    }
                    var keywords = ["rowdy", "roadrunner", "coyote", "bird"];
                    var index = -1;
                    keywords.forEach(function(keyword){
                        index = Math.max(index, keystrokes.indexOf(keyword));
                    });
                    if(index >= 0){
                        keystrokes = "";
                        var d = window.outerWidth+900
                        $("#rowdy").animate({left: "+="+d}, d*2);
                        window.setTimeout(function(){
                            document.getElementById("rowdy").style.left="-600px";
                        }, d*2);
                    }
                };
                $(".btn").on("click", function(){
                    $(".btn").removeClass("active");
                    $(this).addClass("active");
                });
                /*
                $(".mix").on("mouseenter", function(){
                    $(this).children(".mix-description").animate({top: "0px", opacity: "1.0"}, 200);
                });
                $(".mix").on("mouseleave", function(){
                    $(this).children(".mix-description").animate({top: "-100px", opacity: "0.0"}, 200);
                });
                */
            });
        </script>
	<script type="text/javascript">
        String.prototype.encodeLinks = function(){
            var str = this;
            var matches = [];
            var additionalMatches = str.match(/\bhttps?:\/\/\S+/gi);
            if(additionalMatches != null){
                additionalMatches.forEach(function(match){
                    matches.push(match);
                });
            }
            var additionalMatches = str.match(/\b\/\S+/gi);
            if(additionalMatches != null){
                additionalMatches.forEach(function(match){
                    var notThere = true;
                    matches.forEach(function(existingMatch){
                        if(existingMatch.indexOf(match) > -1){
                            notThere = false;
                        }
                    });
                    if(notThere){
                        matches.push(match);
                    }
                });
            }
            if(matches != null){
                matches.forEach(function(match){
                    var replacement = "<a href=\"" + match + "\">" + match + "</a>";
                    str = str.split(match).join(replacement);
                });
            }
            return str;
        }
		var accessToken = "2c7bf2aff65248a7817d190b06996f93";
		var baseUrl = "https://api.api.ai/v1/";
		$(document).ready(function() {
			$("#response-input").keypress(function(event) {
				if (event.which == 13) {
					event.preventDefault();
					send();
				}
			});
			$("#rec").click(function(event) {
				switchRecognition();
			});
    		$("#response-send").on("click", function(){
    		    send();
    		});
    		var about_index = 0;
    		window.interval = window.setInterval(function(){
        		$("#about-"+(1 + about_index % 3)).fadeOut(200);
        		$("#ab"+(1 + about_index % 3)).removeClass("active-bullet");
        		about_index++;
        		window.setTimeout(function(){
            		$("#about-"+(1 + about_index % 3)).fadeIn(200);
            		$("#ab"+(1 + about_index % 3)).addClass("active-bullet");
            	}, 200);
        	}, 12000);
        	$("#ab1").on("click", function(){
        		clearInterval(window.interval);
        		$("#about-"+(1 + about_index % 3)).fadeOut(200);
        		$("#ab"+(1 + about_index % 3)).removeClass("active-bullet");
            	about_index = 0;
        		window.setTimeout(function(){
            		$("#about-"+(1 + about_index % 3)).fadeIn(200);
            		$("#ab"+(1 + about_index % 3)).addClass("active-bullet");
            	}, 200);
        		window.interval = window.setInterval(function(){
            		$("#about-"+(1 + about_index % 3)).fadeOut(200);
            		$("#ab"+(1 + about_index % 3)).removeClass("active-bullet");
            		about_index++;
            		window.setTimeout(function(){
                		$("#about-"+(1 + about_index % 3)).fadeIn(200);
                		$("#ab"+(1 + about_index % 3)).addClass("active-bullet");
                	}, 200);
            	}, 12000);
        	});
        	$("#ab2").on("click", function(){
        		clearInterval(window.interval);
        		$("#about-"+(1 + about_index % 3)).fadeOut(200);
        		$("#ab"+(1 + about_index % 3)).removeClass("active-bullet");
            	about_index = 1;
        		window.setTimeout(function(){
            		$("#about-"+(1 + about_index % 3)).fadeIn(200);
            		$("#ab"+(1 + about_index % 3)).addClass("active-bullet");
            	}, 200);
        		window.interval = window.setInterval(function(){
            		$("#about-"+(1 + about_index % 3)).fadeOut(200);
            		$("#ab"+(1 + about_index % 3)).removeClass("active-bullet");
            		about_index++;
            		window.setTimeout(function(){
                		$("#about-"+(1 + about_index % 3)).fadeIn(200);
                		$("#ab"+(1 + about_index % 3)).addClass("active-bullet");
                	}, 200);
            	}, 12000);
        	});
        	$("#ab3").on("click", function(){
        		clearInterval(window.interval);
        		$("#about-"+(1 + about_index % 3)).fadeOut(200);
        		$("#ab"+(1 + about_index % 3)).removeClass("active-bullet");
            	about_index = 2;
        		window.setTimeout(function(){
            		$("#about-"+(1 + about_index % 3)).fadeIn(200);
            		$("#ab"+(1 + about_index % 3)).addClass("active-bullet");
            	}, 200);
        		window.interval = window.setInterval(function(){
            		$("#about-"+(1 + about_index % 3)).fadeOut(200);
            		$("#ab"+(1 + about_index % 3)).removeClass("active-bullet");
            		about_index++;
            		window.setTimeout(function(){
                		$("#about-"+(1 + about_index % 3)).fadeIn(200);
                		$("#ab"+(1 + about_index % 3)).addClass("active-bullet");
                	}, 200);
            	}, 12000);
        	});
    	    $("#silver-sponsors").css("height", "0");
    	    $("#silver-sponsors").css("overflow", "hidden");
        	$("#silver-sponsors-button").on("click", function(){
        	    $("#silver-sponsors").css("height", "");
        	    $("#silver-sponsors").css("overflow", "visible");
        	});
        	$(".notsilver").on("click", function(){
        	    $("#silver-sponsors").css("height", "0");
        	    $("#silver-sponsors").css("overflow", "hidden");
        	});
    	    $("#partners").css("height", "0");
    	    $("#partners").css("overflow", "hidden");
        	$("#partner-button").on("click", function(){
        	    $("#partners").css("height", "");
        	    $("#partners").css("overflow", "visible");
        	});
        	$(".othbtn").on("click", function(){
        	    $("#partners").css("height", "0");
        	    $("#partners").css("overflow", "hidden");
        	});
		});
		var recognition;
		function startRecognition() {
			recognition = new webkitSpeechRecognition();
			recognition.onstart = function(event) {
				updateRec();
			};
			recognition.onresult = function(event) {
				var text = "";
			    for (var i = event.resultIndex; i < event.results.length; ++i) {
			    	text += event.results[i][0].transcript;
			    }
			    setInput(text);
				stopRecognition();
			};
			recognition.onend = function() {
				stopRecognition();
			};
			recognition.lang = "en-US";
			recognition.start();
		}
	
		function stopRecognition() {
			if (recognition) {
				recognition.stop();
				recognition = null;
			}
			updateRec();
		}
		function switchRecognition() {
			if (recognition) {
				stopRecognition();
			} else {
				startRecognition();
			}
		}
		function setInput(text) {
			$("#response-input").val(text);
			send();
		}
		function updateRec() {
			$("#rec").text(recognition ? "Stop" : "Speak");
		}
		function send() {
			var text = $("#response-input").val();
			$("#response-input").val("");
			$("#response").append("<div class=\"response-question-container\"><div class=\"response-item response-question\">"+text+"</div></div>");
			$.ajax({
				type: "POST",
				url: baseUrl + "query?v=20150910",
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				headers: {
					"Authorization": "Bearer " + accessToken
				},
				data: JSON.stringify({ query: text, lang: "en", sessionId: "somerandomthing" }),
				success: function(data) {
					setResponse(JSON.stringify(data, undefined, 2));
				},
				error: function() {
					setResponse("Internal Server Error");
				}
			});
			setResponse("Loading...");
		}
		function setResponse(val) {
		    while(val=="Loading..."){
		        //wait
		        JSON.parse(val);
		    }
		    console.log("uh"+val);
		    var response = JSON.parse(val);
			$("#response").append("<div class=\"response-answer-container\"><div class=\"response-item response-answer\">"+response.result.fulfillment.messages[0].speech.encodeLinks()+"</div></div>");
			if($("#response").outerHeight() >= 300){
			    $("#response").addClass("response-overflow");
			    $("#response-title").css("box-shadow", "0px 20px 20px -21px #000000");
			    $("#response-form-container").css("border-style", "solid none none none");
			}
            $("#response").animate({ scrollTop: $('#response').prop("scrollHeight")}, 400);
		}
	</script>
	<style type="text/css">
	    #response {
	        width: 100%;
	        max-height: 300px;
	        min-height: 0px;
	        border-style: none;
	        border-color: #cccccc;
	        border-width: 1px;
	        overflow-y: auto;
	        padding-top: 20px;
	        z-index: 1;
	    }
        .response-overflow {
            padding-top: 0px;
        }
	    .response-item {
	        margin: 8px;
	        display: inline-block;
	        max-width: 74%;
	        z-index: 1;
	    }
	    .response-item a {
	        color: inherit;
	        text-decoration: underline;
	    }
	    .response-question-container {
	        text-align: right;
	    }
	    .resonse-answer-container {
	        text-align: left;
	    }
	    .response-question {
	        background-color: #CFCFCF;
	        color: #202020;
	        padding: 8px 8px 8px 10px;
	        border-radius: 19px 19px 0px 19px;
	    }
	    .response-answer {
	        background-color: #2b5e9e;
	        color: #EFEFEF;
	        padding: 8px 10px 8px 8px;
	        border-radius: 19px 19px 19px 0px;
	    }
	    #response-send {
	        background-color: #2b5e9e;
	        color: #efefef;
	        padding: 2px 12px 2px 12px;
	        width: 70px;
	        float:right;
	        border-style: none;
	        height: 40px;
	        margin: 8px 8px 0px 8px;
	        border-radius: 100px;
	    }
	    /*
	    #response-send {
	        position:relative;
	        top:0px;
            -webkit-transition: 0.2s ease-in-out;
            -o-transition: 0.2s ease-in-out;
            transition: 0.2s ease-in-out;
            font-size:16px;
	        box-shadow:0px 0px 0px 0px #000000;
	    }
	    #response-send:hover {
	        position:relative;
	        top:-2px;
	        padding: 7px 17px 7px 17px;
	        font-size:19px;
	        height:50px;
	        width:80px;
	        margin: 1px 1px 0px 1px;
	        box-shadow:0px 4px 20px -8px #000000;
	    }
	    */
	    #response-input {
	        padding: 2px 12px 2px 12px;
	        width: calc(100% - 103px);
	        height: inherit;
	        height: 40px;
	        border-radius: 100px;
	        border-style: solid;
	        border-color: #696969;
	        border-width: 1px;
	        margin: 8px 8px 0px 8px;
	    }
	    #response-title {
	        position: relative;
	        z-index: 2;
	    }
	    #response-form-container {
	        border-style: none;
	        border-width: 1px;
	        border-color: #CFCFCF;
	    }
	    #response-container {
            -webkit-transition: 0.2s ease-in-out;
            -o-transition: 0.2s ease-in-out;
            transition: 0.2s ease-in-out;
	    }
	</style>
    </head>
    <body data-spy="scroll" data-target=".navbar-collapse">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <img src="assets/images/rowdy.gif" id="rowdy" style="position:fixed;top:50vh;width:600px;left:-600px;z-index:100000" />
        <header id="main_menu" class="header navbar-fixed-top" style="overflow;none;">
            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <div class="nave_menu">
                            <nav class="navbar navbar-default" id="navmenu">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="#home">
                                            <img src="assets/images/rowdyhacks_logo.png" style="height:50px;margin-top:-20px;width:148px;/*-webkit-transform: scaleX(-1);transform: scaleX(-1);*/" />
                                            <!--
                                            <div style="display:inline-block;font-family:'Yellowtail';font-size:24px;position:relative;top:-3px;color:#fefefe;">
                                                RowdyHacks
                                            </div>
                                            -->
                                        </a>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->



                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="#home">Home</a></li>
                                            <li><a href="#next">Next Year</a></li>
                                            <li><a href="#sponsors">Sponsors</a></li>
                                            <li><a href="#location">Location</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header> <!--End of header -->





        <section id="home">
            <div class="overlay">
            <div id="Clouds">
                <div class="Cloud Background1"></div>
                <div class="Cloud Background2"></div>
                <div class="Cloud Background1"></div>
                <div class="Cloud Background2"></div>
                <div class="Cloud Background1"></div>
                <div class="Cloud Background2"></div>
                <div class="Cloud Background2"></div>
                <div class="Cloud Background1"></div>
                <div class="Cloud Background2"></div>
                <div class="Cloud Background2"></div>
            </div>
            <div class="stars">
                <div id="star1" style="z-index:1;"></div>
                <div id="star2" style="z-index:1;"></div>
                <div id="star3" style="z-index:1;"></div>
            </div>
            <div class="night">
                <div class="sacity">
                </div>
                <div class="citynight1">
                </div>
                <!--
                <i class="fa fa-moon-o"></i>
                -->
            </div>
            <div style="height:100%; z-index:3;">
                <div class="home">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class=" text-center">
                                    <div class="">
                                        <div class="main_home">
                                            <h1><div class="main_home_title">ROWDYHACKS</div><br />2018</h1>
                                            <p class="subtitle">San Antonio, TX</p>
                                            <p class="subtitle">April 7 - 8</p>
                                            <div class="home_btn">
                                                <?php
                                                    if(1){
                                                        //display nothing
                                                    }
                                                    else if(0){
                                                        //waitlist
                                                        echo('<a class="btn btn-md" id="sign-up-btn" href="https://goo.gl/forms/UGJfEhNoh2GThOxo1" style="margin:10px;">Register</a>');
                                                    }
                                                    else if(time() > 1519667940 || (isset($_GET['test']) && $_GET['test'] == 'true')){
                                                        echo('<a class="btn btn-md" id="sign-up-btn" href="https://goo.gl/forms/4UrBPcmCpMZEBkXg1">Register</a>');
                                                    }
                                                    else{
                                                        echo('<a class="btn btn-md" id="sign-up-btn" onclick="preventDefault();">Registration Opens at 12:00</a>');
                                                    }
                                                ?>
                                                <!--
                                                <a class="btn btn-md" id="sign-up-btn" href="https://goo.gl/forms/dQ4sI1s7zZqL8nOu1" style="margin:10px;">Volunteer</a>
                                                -->
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
        </section>



        <section id="next">
            <div class="container">
                <div class="col-sm-12">
                    
                </div>
            </div>
        </section>


        <section id="sponsors" class="portfolio">
            <!-- Alternative Sponsor layout -->
            <!--
            <h2 style="text-align:center;margin-top:30px;">
                Sponsors
            </h2>
            <div class="sponsor-section">
                <h3 style="background-color:#3cada9;color:#efefef;">
                    Platinum
                </h3>
                <a href="http://geekdom.com/" class="sponsor-container">
                    <div class="sponsor-logo" style="max-width:600px;">
                        <img src="assets/images/geekdom.png" />
                    </div>
                    <div class="sponsor-description">
                        Geekdom is our platinum sponsor.
                    </div>
                </a>
            </div>
            <div class="sponsor-section">
                <h3 style="background-color:#e8b10c;">
                    Gold
                </h3>
                <a href="https://www.afciviliancareers.com/" class="sponsor-container">
                    <div class="sponsor-logo">
                        <img src="assets/images/usaf.png" />
                    </div>
                    <div class="sponsor-description">
                        Working shoulder to shoulder, we support and sustain the United States Air Force. Its aircraft. Its facilities. Its infrastructure. Its systems. And all 300,000 active duty Airmen.  We are the civilians who support and sustain the Air Force. At 180,000 strong, we too are a force to be reckoned with.
                    </div>
                </a>
                <a href="https://www.coxautoinc.com/" class="sponsor-container">
                    <div class="sponsor-logo">
                        <img src="assets/images/cox.png" />
                    </div>
                    <div class="sponsor-description">
                        We go all out. We make success a team sport. We’re the perfect mix of start-up attitude and big company resources. And, being part of a family-run business allows us to treat our team members and clients like they’re just that – family. We are Cox Automotive, and together, we are transforming the way the world buys, owns and sells vehicles.
                    </div>
                </a>
            </div>
            <div class="sponsor-section">
                <h3 style="background-color:#cacaca;">
                    Silver
                </h3>
                <a href="http://usaa.com/" class="sponsor-container">
                    <div class="sponsor-logo">
                        <img src="assets/images/usaa.png" />
                    </div>
                    <div class="sponsor-description">
                        The mission of the association is to facilitate the financial security of its members, associates, and their families through provision of a full range of highly competitive financial products and services; in so doing, USAA seeks to be the provider of choice for the military community.
                    </div>
                </a>
            </div>
            <div class="sponsor-section">
                <h3 style="background-color:#b76c0a;color:#efefef;">
                    Bronze
                </h3>
                <a href="https://www.motiva.com/" class="sponsor-container">
                    <div class="sponsor-logo">
                        <img src="assets/images/motiva.png" />
                    </div>
                    <div class="sponsor-description">
                        At Motiva, our success is powered by the collective energy and passion of our 2,300 dedicated US employees. We own and operate North America’s largest refinery, and through a network of 24 distribution terminals, we supply retail outlets with gasoline and diesel under the Shell and 76® brands.
                    </div>
                </a>
                <a href="https://www.infosys.com/" class="sponsor-container">
                    <div class="sponsor-logo">
                        <img src="assets/images/infosys.png" />
                    </div>
                    <div class="sponsor-description">
                        Infosys is a global leader in technology services & consulting helping clients in more than 50 countries to create & execute digital transformation strategies.
                    </div>
                </a>
            </div>
            <div class="sponsor-section">
                <h3 style="background-color:#0c2340;color:#113461">
                    Partner
                </h3>
                <a href="https://www.army.mil/armymedicine" class="sponsor-container">
                    <div class="sponsor-logo">
                        <img src="assets/images/medcom.png" />
                    </div>
                    <div class="sponsor-description">
                        US Army Medical Command is very interested in mobile applications that can support prolonged field care in the theater of operation.  Of particular interest is how these how these apps can transmit data and facilitate clinical decision making in remote areas that lack access to significant medical resources.
                    </div>
                </a>
                <a href="http://acm-utsa.org/" class="sponsor-container">
                    <div class="sponsor-logo">
                        <img src="assets/images/acm.png" />
                    </div>
                    <div class="sponsor-description">
                        ACM UTSA is the host of RowdyHacks and a student run non-profit at UTSA, dedicated to helping students grow and learn more about technology and industry.
                    </div>
                </a>
                <a href="http://acm-utsa.org/groups/" class="sponsor-container">
                    <div class="sponsor-logo">
                        <img src="assets/images/acm-w.png" />
                    </div>
                    <div class="sponsor-description">
                        ACM-W aims to create an engaging academic, professional, and social network for women and minorities in technology. Our purpose is to connect students with leaders and encourage them to pursue career opportunities in computing fields and to mentor for academic and professional success.
                    </div>
                </a>
            </div>
            -->
            <div class="container">
                <div class="row" style="overflow:visible;">
                    <div class="main_mix_content text-center sections" style="overflow:visible;">
                        <div class="head_title">
                            <h2>Sponsors</h2>
                        </div>
                        <div class="main_mix_menu">
                            <ul>
                                <li class="btn btn-primary filter othbtn notsilver" data-filter="all">All</li>
                                <li class="btn btn-primary filter othbtn notsilver" data-filter=".cat0">Platinum</li>
                                <li class="btn btn-primary filter othbtn notsilver" data-filter=".cat1">Gold</li>
                                <li class="btn btn-primary filter othbtn" data-filter=".cat2" id="silver-sponsors-button">Silver</li>
                                <li class="btn btn-primary filter othbtn notsilver" data-filter=".cat3">Bronze</li>
                                <li class="btn btn-primary filter notsilver" data-filter=".cat5" id="partner-button">Partners</li>
                            </ul>
                        </div>

                        <div id="mixcontent-desktop" class="mixcontent" style="overflow:visible;text-align:center;padding:0px 40px;">
                            <div class="row">
                                <a href="https://geekdom.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat0 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/geekdom.png');">
                                        </div>
                                        <div class="mix-description">
                                            Geekdom is our platinum sponsor.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.afciviliancareers.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat1 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/usaf.png');">
                                        </div>
                                        <div class="mix-description">
                                            Working shoulder to shoulder, we support and sustain the United States Air Force. Its aircraft. Its facilities. Its infrastructure. Its systems. And all 300,000 active duty Airmen.  We are the civilians who support and sustain the Air Force. At 180,000 strong, we too are a force to be reckoned with.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.coxautoinc.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat1 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/cox.png');">
                                        </div>
                                        <div class="mix-description">
                                            We go all out. We make success a team sport. We’re the perfect mix of start-up attitude and big company resources. And, being part of a family-run business allows us to treat our team members and clients like they’re just that – family. We are Cox Automotive, and together, we are transforming the way the world buys, owns and sells vehicles.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://usaa.com">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/usaa.png');">
                                        </div>
                                        <div class="mix-description">
                                            The mission of the association is to facilitate the financial security of its members, associates, and their families through provision of a full range of highly competitive financial products and services; in so doing, USAA seeks to be the provider of choice for the military community.
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="row">
                                <a href="http://chevron.com">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/chevron.png');">
                                        </div>
                                        <div class="mix-description">
                                            Chevron is a silver sponsor.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.motiva.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat3 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/motiva.png');">
                                        </div>
                                        <div class="mix-description">
                                            At Motiva, our success is powered by the collective energy and passion of our 2,300 dedicated US employees. We own and operate North America’s largest refinery, and through a network of 24 distribution terminals, we supply retail outlets with gasoline and diesel under the Shell and 76® brands.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.infosys.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat3 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/infosys.png');">
                                        </div>
                                        <div class="mix-description">
                                            Infosys is a global leader in technology services & consulting helping clients in more than 50 countries to create & execute digital transformation strategies.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.army.mil/armymedicine/">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/medcom.png');">
                                        </div>
                                        <div class="mix-description">
                                            US Army Medical Command is very interested in mobile applications that can support prolonged field care in the theater of operation.  Of particular interest is how these how these apps can transmit data and facilitate clinical decision making in remote areas that lack access to significant medical resources.
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="row">
                                <a href="http://accenture.com">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/accenture.png');">
                                        </div>
                                        <div class="mix-description">
                                            Accenture Federal Services, a wholly-owned subsidiary of Accenture, helps U.S. federal agencies build the government of the future. Accenture Federal Services is uniquely positioned to support federal agencies in shattering the status quo, achieving profound efficiencies and relentlessly delivering results. Accenture Federal Services is a long-time and trusted resource for the federal community. Every cabinet level agency in the United States-and 20 of the country's largest federal government agencies-have worked with Accenture Federal Services to achieve outcomes and move toward high performance.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/acm.png');">
                                        </div>
                                        <div class="mix-description">
                                            ACM UTSA is the host of RowdyHacks and a student run non-profit at UTSA, dedicated to helping students grow and learn more about technology and industry.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/groups">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/acm-w.png');">
                                        </div>
                                        <div class="mix-description">
                                            ACM-W aims to create an engaging academic, professional, and social network for women and minorities in technology. Our purpose is to connect students with leaders and encourage them to pursue career opportunities in computing fields and to mentor for academic and professional success.
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <br />
                            <div class="row" id="partners">
                                <a href="https://www.army.mil/armymedicine/">
                                    <div class="col-sm-3 hidden-xs-down mix cat5 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/medcom.png');">
                                        </div>
                                        <div class="mix-description">
                                            US Army Medical Command is very interested in mobile applications that can support prolonged field care in the theater of operation.  Of particular interest is how these how these apps can transmit data and facilitate clinical decision making in remote areas that lack access to significant medical resources.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://accenture.com">
                                    <div class="col-sm-3 hidden-xs-down mix cat5 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/accenture.png');">
                                        </div>
                                        <div class="mix-description">
                                            Accenture Federal Services, a wholly-owned subsidiary of Accenture, helps U.S. federal agencies build the government of the future. Accenture Federal Services is uniquely positioned to support federal agencies in shattering the status quo, achieving profound efficiencies and relentlessly delivering results. Accenture Federal Services is a long-time and trusted resource for the federal community. Every cabinet level agency in the United States-and 20 of the country's largest federal government agencies-have worked with Accenture Federal Services to achieve outcomes and move toward high performance.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/">
                                    <div class="col-sm-3 hidden-xs-down mix cat5 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/acm.png');">
                                        </div>
                                        <div class="mix-description">
                                            ACM UTSA is the host of RowdyHacks and a student run non-profit at UTSA, dedicated to helping students grow and learn more about technology and industry.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/groups">
                                    <div class="col-sm-3 hidden-xs-down mix cat5 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/acm-w.png');">
                                        </div>
                                        <div class="mix-description">
                                            ACM-W aims to create an engaging academic, professional, and social network for women and minorities in technology. Our purpose is to connect students with leaders and encourage them to pursue career opportunities in computing fields and to mentor for academic and professional success.
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="row" id="silver-sponsors">
                                <a href="http://usaa.com">
                                    <div class="col-sm-3 hidden-xs-down mix cat2 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/usaa.png');">
                                        </div>
                                        <div class="mix-description">
                                            The mission of the association is to facilitate the financial security of its members, associates, and their families through provision of a full range of highly competitive financial products and services; in so doing, USAA seeks to be the provider of choice for the military community.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://chevron.com">
                                    <div class="col-sm-3 hidden-xs-down mix cat2 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/chevron.png');">
                                        </div>
                                        <div class="mix-description">
                                            Chevron is a silver sponsor.
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--
                            <a href="http://geekdom.com/">
                                <div class="col-md-3 mix cat5 no-padding">
                                    <div class="single_mixi_portfolio">
                                        <img src="assets/images/geekdom.png" alt="" />
                                        <div class="mixi_portfolio_overlay">
                                            <div class="overflow_hover_text"> 
                                                <a href=""><i class="lnr lnr-magnifier"></i></a>
                                                <a href=""><i class="lnr lnr-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            -->
                            <div class="gap"></div>
                        </div>
                        <div id="mixcontent-mobile" class="mixcontent" style="overflow:visible;padding:20px;">
                            <div class="row">
                                <a href="http://geekdom.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat0 no-padding">
                                        <div style="background-image:url('assets/images/geekdom.png');">
                                        </div>
                                        <div>
                                            Geekdom is our platinum sponsor.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.afciviliancareers.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat1 no-padding">
                                        <div style="background-image:url('assets/images/usaf.png');">
                                        </div>
                                        <div>
                                            Working shoulder to shoulder, we support and sustain the United States Air Force. Its aircraft. Its facilities. Its infrastructure. Its systems. And all 300,000 active duty Airmen.  We are the civilians who support and sustain the Air Force. At 180,000 strong, we too are a force to be reckoned with.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.coxautoinc.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat1 no-padding">
                                        <div style="background-image:url('assets/images/cox.png');">
                                        </div>
                                        <div>
                                            We go all out. We make success a team sport. We’re the perfect mix of start-up attitude and big company resources. And, being part of a family-run business allows us to treat our team members and clients like they’re just that – family. We are Cox Automotive, and together, we are transforming the way the world buys, owns and sells vehicles.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://usaa.com">
                                    <div class="hidden-sm-up col-xs-12 mix cat2 no-padding">
                                        <div style="background-image:url('assets/images/usaa.png');">
                                        </div>
                                        <div>
                                            The mission of the association is to facilitate the financial security of its members, associates, and their families through provision of a full range of highly competitive financial products and services; in so doing, USAA seeks to be the provider of choice for the military community.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://chevron.com">
                                    <div class="hidden-sm-up col-xs-12 mix cat2 no-padding">
                                        <div style="background-image:url('assets/images/chevron.png');">
                                        </div>
                                        <div>
                                            Chevron is a silver sponsor.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.motiva.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat3 no-padding">
                                        <div style="background-image:url('assets/images/motiva.png');">
                                        </div>
                                        <div>
                                            At Motiva, our success is powered by the collective energy and passion of our 2,300 dedicated US employees. We own and operate North America’s largest refinery, and through a network of 24 distribution terminals, we supply retail outlets with gasoline and diesel under the Shell and 76® brands.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.infosys.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat3 no-padding">
                                        <div style="background-image:url('assets/images/infosys.png');">
                                        </div>
                                        <div>
                                            Infosys is a global leader in technology services & consulting helping clients in more than 50 countries to create & execute digital transformation strategies.
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.army.mil/armymedicine/">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/medcom.png');">
                                        </div>
                                        <div>
                                            US Army Medical Command is very interested in mobile applications that can support prolonged field care in the theater of operation.  Of particular interest is how these how these apps can transmit data and facilitate clinical decision making in remote areas that lack access to significant medical resources.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://accenture.com">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/accenture.png');">
                                        </div>
                                        <div>
                                            Accenture Federal Services, a wholly-owned subsidiary of Accenture, helps U.S. federal agencies build the government of the future. Accenture Federal Services is uniquely positioned to support federal agencies in shattering the status quo, achieving profound efficiencies and relentlessly delivering results. Accenture Federal Services is a long-time and trusted resource for the federal community. Every cabinet level agency in the United States-and 20 of the country's largest federal government agencies-have worked with Accenture Federal Services to achieve outcomes and move toward high performance.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/acm.png');">
                                        </div>
                                        <div>
                                            ACM UTSA is the host of RowdyHacks and a student run non-profit at UTSA, dedicated to helping students grow and learn more about technology and industry.
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/groups">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/acm-w.png');">
                                        </div>
                                        <div>
                                            ACM-W aims to create an engaging academic, professional, and social network for women and minorities in technology. Our purpose is to connect students with leaders and encourage them to pursue career opportunities in computing fields and to mentor for academic and professional success.
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>                     
                </div>
            </div>
        </section> <!-- End of portfolio two Section -->        


        <section id="counter" class="counter">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_counter sections text-center">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="row">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_counter_right">
                                            <i class="lnr lnr-clock"></i>
                                            <h2 class="statistic-counter">24</h2>
                                            <p>Hours</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_counter_right">
                                            <i class="lnr lnr-users"></i>
                                            <h2 class="statistic-counter">100</h2>
                                            <p>Attendees</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_counter_right">
                                            <i class="lnr lnr-heart"></i>
                                            <h2 class="statistic-counter">25</h2>
                                            <p>Teams</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_counter_right">
                                            <i class="lnr lnr-gift"></i>
                                            <h2 class="statistic-counter">2,000</h2>
                                            <p>Total Prizes Value</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="location">
            <div class="container-fluid">
                <div class="row">
                    <div class="sections">
                        <div class="row" style="max-width:100vw;">
                            <div class="col-sm-3 hidden-xs-down">
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                <h2 style="text-align:center;padding:10px 0% 10px 9%;">
                                     Location
                                </h2>
                            </div>
                        </div>
                        <div class="row" style="max-width:100vw;text-align:center;">
                            <div class="col-sm-3 col-xs-12">
                                <img src="assets/images/geekdom.png" style="max-width:100%;margin:20px;" />
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                <p style="text-align:center;padding:10px 0% 10px 9%;">
                                    Geekdom is the platinum sponsor for RowdyHacks 2018 which will be held at Geekdom in downtown San Antonio. Although RowdyHacks has previously been hosted at UTSA, this year it will be held downtown, closer to the heart of San Antonio's technology and start-up communities, making it easier for students and industry professionals to meet and see each other's work.
                                        <br />
                                        <br />
                                        Parking is available on the street and in parking garages downtown. Transportation will be provided for UTSA students to and from the event. Details to be announced.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13900.345065130385!2d-98.493509!3d29.426275!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9584ae946a1e0d61!2sGeekdom!5e0!3m2!1sen!2sus!4v1517372280879" style="width:100vw;height:400px;" frameborder="0" style="position:relative;top:500px;border-style:none;" allowfullscreen></iframe>
        </section>
        

        <section id="volunteers" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="main_mix_content text-center sections">
                        <div class="head_title">
                            <h2 style="color:#efefef;">
                                Meet the Team
                            </h2>
                        </div>
                        <div class="volunteers-container">
                                <a href="https://www.linkedin.com/in/cassidy-matousek/">
                                    <div class="volunteer-card">
                                        <div class="volunteer-card-photo-container">
                                            <img src="assets/images/volunteers/cassidy.jpg" class="volunteer-card-photo" />
                                            <div class="linkedin-container">
                                                <img src="assets/images/linkedin_circle_color-256.png" />
                                            </div>
                                        </div>
                                        <h3 class="volunteer-card-title">
                                            Co-Chair
                                        </h3>
                                        <h4 class="volunteer-card-name">
                                            Cassidy Matousek
                                        </h3>
                                    </div>
                                </a>
                                <a href="https://www.linkedin.com/in/jessicavle/">
                                    <div class="volunteer-card">
                                        <div class="volunteer-card-photo-container">
                                            <img src="assets/images/volunteers/jessica.jpg" class="volunteer-card-photo" />
                                            <div class="linkedin-container">
                                                <img src="assets/images/linkedin_circle_color-256.png" />
                                            </div>
                                        </div>
                                        <h3 class="volunteer-card-title">
                                            Co-Chair
                                        </h3>
                                        <h4 class="volunteer-card-name">
                                            Jessica L&ecirc; 
                                        </h3>
                                    </div>
                                </a>
                                <a href="https://www.linkedin.com/in/julia-vasquez-2b541a126">
                                    <div class="volunteer-card">
                                        <div class="volunteer-card-photo-container">
                                            <img src="assets/images/volunteers/julia_vasquez.jpg" class="volunteer-card-photo" />
                                            <div class="linkedin-container">
                                                <img src="assets/images/linkedin_circle_color-256.png" />
                                            </div>
                                        </div>
                                        <h3 class="volunteer-card-title">
                                            Treasurer
                                        </h3>
                                        <h4 class="volunteer-card-name">
                                            Julia Vasquez 
                                        </h3>
                                    </div>
                                </a>
                                <a href="http://linkedin.com/in/matt-moore-01409579">
                                    <div class="volunteer-card">
                                        <div class="volunteer-card-photo-container">
                                            <img src="assets/images/volunteers/matt_moore.jpg" class="volunteer-card-photo" />
                                            <div class="linkedin-container">
                                                <img src="assets/images/linkedin_circle_color-256.png" />
                                            </div>
                                        </div>
                                        <h3 class="volunteer-card-title">
                                            Marketing
                                        </h3>
                                        <h4 class="volunteer-card-name">
                                            Matt Moore 
                                        </h3>
                                    </div>
                                </a>
                                <a href="https://www.linkedin.com/in/soethanv">
                                    <div class="volunteer-card">
                                        <div class="volunteer-card-photo-container">
                                            <img src="assets/images/volunteers/soe_than.jpg" class="volunteer-card-photo" />
                                            <div class="linkedin-container">
                                                <img src="assets/images/linkedin_circle_color-256.png" />
                                            </div>
                                        </div>
                                        <h3 class="volunteer-card-title">
                                            Workshop Manager
                                        </h3>
                                        <h4 class="volunteer-card-name">
                                            Soe Than<!-- <div class="volunteer-card-name-spacer" data-void-comment="my apologies regarding this cringy workaround">...........</div>-->
                                        </h3>
                                    </div>
                                </a>
                                <a href="https://www.linkedin.com/in/trase-westbrook-01a2b6105">
                                    <div class="volunteer-card">
                                        <div class="volunteer-card-photo-container">
                                            <img src="assets/images/volunteers/trase_westbrook.jpg" class="volunteer-card-photo" />
                                            <div class="linkedin-container">
                                                <img src="assets/images/linkedin_circle_color-256.png" />
                                            </div>
                                        </div>
                                        <h3 class="volunteer-card-title">
                                            Catering Manager
                                        </h3>
                                        <h4 class="volunteer-card-name">
                                            Trase Westbrook
                                        </h3>
                                    </div>
                                </a>
                                <a href="http://www.linkedin.com/in/arhutton">
                                    <div class="volunteer-card">
                                        <div class="volunteer-card-photo-container">
                                            <img src="assets/images/volunteers/andrew_hutton.jpg" class="volunteer-card-photo" />
                                            <div class="linkedin-container">
                                                <img src="assets/images/linkedin_circle_color-256.png" />
                                            </div>
                                        </div>
                                        <h3 class="volunteer-card-title">
                                            Web Developer
                                        </h3>
                                        <h4 class="volunteer-card-name">
                                            Andrew Hutton
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>                     
                </div>
            </div>
        </section>
        <!---->







        <footer id="footer" class="footer">
            <div class="container">
                <div class="main_footer">
                    <div class="row">

                        <div class="col-sm-6 col-xs-12">
                            <div class="copyright_text">
                                <p class=" wow fadeInRight" data-wow-duration="1s">Made <!--with <i class="fa fa-heart"></i>--> by <a href="http://andrewhutton.me">Andrew Hutton</a> for <a href="http://acm-utsa.org">ACM UTSA</a></p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="footer_socail">
                                <a href="https://www.facebook.com/rowdyhacks/" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/RowdyHacks" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="http://rowdyhacks.slack.com" title="Slack"><i class="fa fa-slack"></i></a>
                                <a href="mailto:team@rowdyhacks.org" title="Email"><i class="fa fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



        <!-- START SCROLL TO TOP  -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/jquery.mixitup.min.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>
