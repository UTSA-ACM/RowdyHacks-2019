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
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,900" rel="stylesheet">

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
                                                <li><a href="#about">About</a></li>
                                                <!--<li><a href="#schedule">Schedule</a></li>-->
                                                <li><a href="#faq">FAQ</a></li>
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
            </div>
            <div style="height:100%; z-index:3;">
                <div class="home">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class=" text-center">
                                    <div class="">
                                        <div class="main_home">
                                            <h1><div class="main_home_title" style="font-family:'YellowTail';font-size:120%">RowdyHacks</div><br />2019</h1>
                                            <p class="subtitle">April 13 - 14</p>
                                            <p class="subtitle"><a href="https://goo.gl/maps/EY2sgzD3KMn" target="_blank" style="color:inherit;">UTSA Downtown</a></p>
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




        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="main_about_area sections"> 
                        <div class="col-sm-6">
                            <div class="signle_about_left">
                                <h2>About</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single_about_right">
                                <div class="single_about">
                                    <div class="single_about_icon">
                                    </div>
                                    <div class="single_about_content" style="padding:10px;">
                                        <h3 style="display:inline;font-family:'Raleway';font-size:36px;margin:20px 5px;">
                                            RowdyHacks
                                        </h3>
                                        <br />
                                        <br />
                                        <div style="height:250px;">
                                            <p id="about-1">
                                                RowdyHacks is a 24-hour competitive programming event in which, teams of students work together to “hack” a website, app, or tool. Whether you have never written a line of code or you are a seasoned programmer, RowdyHacks is for everyone! Use RowdyHacks to your advantage to learn and gain valuable skills, increase your network, boost your resume and have fun.
                                            </p>
                                            <p id="about-2" style="display:none;">
                                                RowdyHacks started in 2016 as a small, student-led hackathon sponsored by the Association of Computing Machinery at UTSA. Thanks to contributions from the Department of Computer Science at UTSA, the event has continued to grow bigger in size. This year RowdyHacks is expanding, as we welcome students from other San Antonio Universities and go to Downtown San Antonio.
                                            </p>
                                            <p id="about-3" style="display:none;">
                                                RowdyHacks 2019 is going to be our best event yet! We are switching things up this year, and there’s a lot to look forward to. Hosted at UTSA's downtown campus in Downtown San Antonio, we are excited to bring you plenty of workshops, great music and food, t-shirts, and of course, fantastic prizes!
                                            </p>
                                        </div>
                                        <div class="about-bullet-container">
                                            <div class="about-bullet active-bullet" id="ab1">
                                                •
                                            </div>
                                            <div class="about-bullet" id="ab2">
                                                •
                                            </div>
                                            <div class="about-bullet" id="ab3">
                                                •
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

        <!--
        <section id="schedule" class="schedule">
            <div class="container-fluid">
                <div class="row">
                    <div class="main_schedule_area sections">
                        <h2 style="text-align:center;color:#efefef;">
                            Schedule
                        </h2>
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-5 col-xs-12 schedule-container">
                                <ul>
                                    <li class="schedule-item">
                                        <h3>
                                            Saturday
                                            <div class="schedule-time">
                                                Apr. 7
                                            </div>
                                        </h3>
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            10:00am
                                        </div>
                                        Check In Opens
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            12:00pm
                                        </div>
                                        Opening Ceremony
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            1:30pm
                                        </div>
                                        Hacking Begins
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            2:00pm - 5:00pm
                                        </div>
                                        Workshops
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            6:00pm
                                        </div>
                                        Dinner
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            7:00pm - 9:00pm
                                        </div>
                                        Workshops
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-5 col-xs-12 schedule-container">
                                <ul>
                                    <li class="schedule-item">
                                        <h3>
                                            Sunday
                                            <div class="schedule-time">
                                                Apr. 8
                                            </div>
                                        </h3>
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            12:00am
                                        </div>
                                        Midnight Snack
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            8:00am
                                        </div>
                                        Breakfast
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            10:30am
                                        </div>
                                        Project Submissions
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            11:00am
                                        </div>
                                        Demos and Judging
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            1:00pm
                                        </div>
                                        Lunch
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            2:00pm
                                        </div>
                                        Closing Ceremonies
                                    </li>
                                    <li class="schedule-item">
                                        <div class="schedule-time">
                                            3:00pm
                                        </div>
                                        Goodbye!
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        -->
        
        <!--
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
        -->

        <section id="faq" class="faq">
            <div class="container">
                <div class="row">
                    <div class="main_faq sections">
                        <div style="color:#fefefe;">
                            <h2 style="text-align:center;">
                                FAQ
                            </h2>
                            <div class="row" style="overflow-y:hidden;">
                                <div class="col-sm-12" style="overflow-x:visible;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="faq-item">
                                                <h3>
                                                    What if I don’t know how to code?
                                                </h3>
                                                That’s okay! RowdyHacks will have plenty of mentors and peers to help you learn. You don’t have to be an experienced coder to attend, and RowdyHacks is a great way to get into technology!
                                            </div>
                                            <div class="faq-item">
                                                <h3>
                                                    How big are the teams?
                                                </h3>
                                                Teams can be formed of up to 4 students. The more brain power, the better! You can register with your friends, but many teams are formed at the event.
                                            </div>
                                            <!--
                                            <div class="faq-item">
                                                <h3>
                                                    How can I get to RowdyHacks?
                                                </h3>
                                                Transportation will be provided for UTSA students from the Main 1604 Campus to Geekdom. Students from other universities will need to provide their own transportation. Check out the Location tab for more information.
                                            </div>
                                            -->
                                            <div class="faq-item">
                                                <h3>
                                                    What should my project be?
                                                </h3>
                                                Anything! You can make a new social media website, a simple weather app, a sentiment analysis tool for tweets...anything your wildest imagination can create. Your team can come prepared with an idea, or come up with one on the spot. Here are some ideas to get you started: <a href="https://goo.gl/h7LEMr">https://goo.gl/h7LEMr</a>
                                            </div>
                                            <!--
                                            <div class="faq-item">
                                                <h3>
                                                    Who can attend?
                                                </h3>
                                                In the past, RowdyHacks has only been open to UTSA students. This year we’re excited to announce that we’ll be opening registration to other San Antonio area universities! If you’re a college student in the San Antonio area, you’re eligible to attend RowdyHacks 2019.
                                            </div>
                                            -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="faq-item">
                                                <h3>
                                                    Where will RowdyHacks take place?
                                                </h3>
                                                We will be hosting this year's RowdyHacks at the UTSA Downtown Campus, in downtown San Antonio.
                                            </div>
                                            <!--
                                            <div class="faq-item">
                                                <h3>
                                                    Who is allowed to register?
                                                </h3>
                                                Due to limited spacing/seatings at Geekdom, we are only accepting undergraduate college stuents. We hope in the future we can expand our event to Masters/PhD students.
                                            </div>
                                            -->
                                            <div class="faq-item">
                                                <h3>
                                                    How much does it cost?
                                                </h3>
                                                RowdyHacks is absolutely free, thanks to our awesome sponsors. You don’t have to worry about a thing -- we’ll provide the food, t-shirts, snacks and prizes!
                                            </div>
                                            <div class="faq-item">
                                                <h3>
                                                    What should I bring?
                                                </h3>
                                                Any hardware you plan on using for your project -- your laptop, charger, portable mouse, phone, raspberry pi, VR headset, robots, etc. You might also want to bring a change of clothes and toiletries.
                                            </div>
                                            <!--
                                            <div id="response-container" class="faq-item">
                                                <h3 id="response-title" style="margin: 5px 0px 0px 0px;">
                                                    Have another question? Ask here.
                                                </h3>
                                                <div id="response">
                                                    <div class="response-answer-container">
                                                        <div class="response-item response-answer">
                                                            You can ask here, or feel free to reach out to the RowdyHacks Team at <a href="mailto:team@rowdyhacks.org">team@rowdyhacks.org</a>. We’d be happy to help!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="response-form-container">
                                                    <form id="response-form">
                                                        <input type="text" id="response-input"><input type="button" id="response-send" value="Send" />
                                                    </form>
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="sponsors" class="portfolio">
            <div class="container">
                <div class="row" style="overflow:visible;">
                    <div class="main_mix_content text-center sections" style="overflow:visible;">
                        <div class="head_title">
                            <h2>Past Sponsors</h2>
                        </div>
                        <!--
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
                        -->

                        <div id="mixcontent-desktop" class="mixcontent" style="overflow:visible;text-align:center;padding:0px 40px;">
                            <div class="row">
                                <a href="https://geekdom.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat0 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/geekdom.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.afciviliancareers.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat1 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/usaf.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.coxautoinc.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat1 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/cox.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://usaa.com">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/usaa.png');">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="row">
                                <a href="http://chevron.com">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/chevron.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.motiva.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat3 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/motiva.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.infosys.com/">
                                    <div class="col-sm-3 hidden-xs-down mix cat3 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/infosys.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.army.mil/armymedicine/">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/medcom.png');">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="row">
                                <a href="http://developer.amazon.com/alexa">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/alexa.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://promoter.io">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/promoter.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://youthcodejam.org">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/sa-code-jam.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://accenture.com">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/accenture.png');">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="row">
                                <a href="http://cs.utsa.edu">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/cs-department.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/acm.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/groups">
                                    <div class="col-sm-3 hidden-xs-down mix no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/acm-w.png');">
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
                                    </div>
                                </a>
                                <a href="http://accenture.com">
                                    <div class="col-sm-3 hidden-xs-down mix cat5 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/accenture.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/">
                                    <div class="col-sm-3 hidden-xs-down mix cat5 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/acm.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/groups">
                                    <div class="col-sm-3 hidden-xs-down mix cat5 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/acm-w.png');">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="row" id="silver-sponsors">
                                <a href="http://usaa.com">
                                    <div class="col-sm-3 hidden-xs-down mix cat2 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/usaa.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://chevron.com">
                                    <div class="col-sm-3 hidden-xs-down mix cat2 no-padding">
                                        <div class="mix-logo" style="background-image:url('assets/images/chevron.png');">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="gap"></div>
                        </div>
                        <div id="mixcontent-mobile" class="mixcontent" style="overflow:visible;padding:20px;">
                            <div class="row">
                                <a href="http://geekdom.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat0 no-padding">
                                        <div style="background-image:url('assets/images/geekdom.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.afciviliancareers.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat1 no-padding">
                                        <div style="background-image:url('assets/images/usaf.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.coxautoinc.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat1 no-padding">
                                        <div style="background-image:url('assets/images/cox.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://usaa.com">
                                    <div class="hidden-sm-up col-xs-12 mix cat2 no-padding">
                                        <div style="background-image:url('assets/images/usaa.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://chevron.com">
                                    <div class="hidden-sm-up col-xs-12 mix cat2 no-padding">
                                        <div style="background-image:url('assets/images/chevron.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.motiva.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat3 no-padding">
                                        <div style="background-image:url('assets/images/motiva.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.infosys.com/">
                                    <div class="col-xs-12 hidden-sm-up mix cat3 no-padding">
                                        <div style="background-image:url('assets/images/infosys.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="https://www.army.mil/armymedicine/">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/medcom.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://accenture.com">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/accenture.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://developer.amazon.com/alexa">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/alexa.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://promoter.io">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/promoter.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://cs.utsa.edu">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/cs-department.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://youthcodejam.org">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/sa-code-jam.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/acm.png');">
                                        </div>
                                    </div>
                                </a>
                                <a href="http://acm-utsa.org/groups">
                                    <div class="col-xs-12 hidden-sm-up mix cat5 no-padding">
                                        <div style="background-image:url('assets/images/acm-w.png');">
                                        </div>
                                    </div>
                                </a>
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
                            <div class="col-sm-3 col-xs-12" style="vertical-align:middle">
                                <!--<img src="assets/images/geekdom.png" style="max-width:100%;margin:20px;" />-->
                                <div style="margin:0px 20px;font-family:'Roboto';">
                                    <div style="font-weight:900;color:#f15a22;font-size:56px;font-family:inherit;">
                                        UTSA
                                    </div>
                                    <div style="font-weight:300;color:#ffffff;font-size:42px;font-family:inherit;">
                                        Downtown
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                <p style="text-align:center;padding:10px 0% 10px 9%;">
                                    RowdyHacks is organized by Roadrunners from UTSA and will be held at UTSA's downtown campus. The downtown campus is closer to the heart of San Antonio's technology and start-up communities, making it easier for students and industry professionals to meet and see each other's work.
                                        <br />
                                        <br />
                                        Parking is available at the downtown campus and in nearby garages. Transportation may be provided for UTSA students to and from the event. Details to be announced.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13900.689239443771!2d-98.5027382!3d29.4237599!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x10615c0ae363c720!2sUTSA+Downtown+Campus!5e0!3m2!1sen!2sus!4v1542558003344" style="width:100vw;height:400px;" frameborder="0" style="position:relative;top:500px;border-style:none;" allowfullscreen></iframe>
        </section>
        
        <!--
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
                                            Soe Than
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
        -->






        <footer id="footer" class="footer">
            <div class="container">
                <div class="main_footer">
                    <div class="row">

                        <div class="col-sm-6 col-xs-12">
                            <div class="copyright_text">
                                <p class=" wow fadeInRight" data-wow-duration="1s">Made by <a href="http://andrewhutton.me">Andrew Hutton</a> for <a href="http://acm-utsa.org">ACM UTSA</a></p>
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
