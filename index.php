<!-- THIS EXPERIMENT WAS BUILT BY SWARM - swarmnyc dot com -- use as you will, no guarantees, but do provide a link back. --> 

<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('functions.php');
/* Get user access tokens out of the session. */

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status'])) {
    $status = $_POST['status'];
    $postStatus = $connection->post('statuses/update',array('status' => $status));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	  <?php include_once('head.php') ?>
	  
      <!-- 1. AUTOMATICALLY REFRESH PAGE EVERY X SECONDS -->
	  <meta http-equiv="refresh" content="300" />    
    
	  <!-- TWITTER PULL SCRIPT GOES HERE TO EDIT WHAT ACCOUNT TWEETS PULL FROM EDIT "pullme.php'-->
	  <?php include_once('pullme.php') ?>
	  
	  <style type="text/css">
        .stage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            min-width: 900px;
            height: 40%;
            overflow: hidden;
        }
        .far-clouds {
            background: transparent url(img/far-clouds.png) 305px 102px repeat-x; z-index: -1;
        }
        .near-clouds {
            background: transparent url(img/near-clouds.png) 305px 162px repeat-x; z-index: -1;
        }
	</style>
	  
	<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
    <script src="js/jquery.spritely-0.6.js" type="text/javascript"></script>
	  
	   <script type="text/javascript">
            $(document).ready(function() {
                $('#far-clouds').pan({fps: 30, speed: 0.7, dir: 'left', depth: 30});
                $('#near-clouds').pan({fps: 30, speed: 1, dir: 'left', depth: 70});
                
                window.actions = {
                    speedyClouds: function(){
                        $('#far-clouds').spSpeed(12);
                        $('#near-clouds').spSpeed(20);
                    },
                    runningClouds: function(){
                        $('#far-clouds').spSpeed(8);
                        $('#near-clouds').spSpeed(12);
                    },
                    walkingClouds: function(){
                        $('#far-clouds').spSpeed(3);
                        $('#near-clouds').spSpeed(5);
                    },
                    lazyClouds: function(){
                        $('#far-clouds').spSpeed(0.7);
                        $('#near-clouds').spSpeed(1);
                    },
                    stop: function(){
                        $('#far-clouds, #near-clouds').spStop();
                    },
                    start: function(){
                        $('#far-clouds, #near-clouds').spStart();
                    },
                    toggle: function(){
                        $('#far-clouds, #near-clouds').spToggle();
                    },
                    left: function(){
                        $('#far-clouds, #near-clouds').spChangeDir('left');                    
                    },
                    right: function(){
                        $('#far-clouds, #near-clouds').spChangeDir('right');                    
                    }
                };
            });    
    </script>
		  
  </head>
  
<body id="#">
    <div class="container"> 
      
       <!-- START MAIN CTA AREA -->
	  <div class="contain-main">
	  	<div class="logo" id="idxLogo">
		  	<a href="http://swarmnyc.com"><img src="img/logo.jpg" alt="SWARM NYC" id="SWARMNYC" width="300px;"></a><br>
		  	<span class="logo-desc pinkish">Tweet anonymously from <a class="whitey" href="http://twitter.com/SWARMsecret" target="_blank">@SWARMsecret</a> to anyone you want to.<br> </span>
		</div>
    
		<div class="wrapitup">
			<div class="spacer"></div>
    
	  	<!-- BEGIN TWEET FORM -->
  			<div class="clearfix" id="thankPageTweetForm">
  				<textarea maxlength="140" name="status" rows="3" placeholder="Tweet anonymously at anyone from @SWARMsecret. - i.e. Hey @WhiteHouse, we want free ice cream for everyone!!!" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tweet anonymously at anyone from @SWARMsecret. - i.e. Hey @WhiteHouse, we want free ice cream for everyone!!!'"></textarea>
  				<button type="submit" class="btn btn-default pull-right righton" id="thankPageTweetSubmit">TWEET</button>	
  			</div>
  
		<!-- BEGIN TWEETS -->
			<div class="spacer"></div>
			<div class="half-spacer"></div>
			
			<div id="refresh">
				<div id="tweets"></div>
			</div>
      </div>
	  </div>
	  
	<div id="far-clouds" class="far-clouds stage"></div>
    <div id="near-clouds" class="near-clouds stage"></div>

    <!-- START FOOTER -->
	<div class="footer">
		<div class="swarm">Made by <a class="whitey" href="http://swarmnyc.com" target="_blank">SWARM</a> | See other <a class="whitey" href="http://swarmnyc.com/experiments">Experiments</a> | Or grab the code at <a class="whitey" href="http://github.com/swarmnyc">GitHub</a> | <a class="whitey" href="tos.html" target="_blank">Terms of Service </a>
		</div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>   
    
    <!-- THIS SCRIPT INSERST ANY ADDITIONAL TEXT YOU MAY WANT IN YOUR TWEET, CHANGE WHAT YOU WANT IN THE STATUS FIELD WITHIN kickback.php-->
    <?php include_once('kickback.php') ?>
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43683040-8', 'auto');
  ga('send', 'pageview');

</script>

    
  </body>
</html>
