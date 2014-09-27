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
		  
  </head>
  
  <body id="thankPageBody">
     <div class="container"> 
      
       <!-- START MAIN CTA AREA -->
	  <div class="contain-main">
	  	<div class="logo" id="idxLogo">
		  	<a href="http://swarmnyc.com"><img src="img/logo.jpg" alt="SWARM NYC" id="SWARMNYC" width="300px;"></a><br>
		  	<span class="logo-desc pinkish">Tweet anonymously from <a class="whitey" href="http://twitter.com/swarmbot5000" target="_blank">@swarmbot5000</a> to anyone you want to with this fun web app.<br> </span>
		</div>
    
		<div class="wrapitup">
			<div class="spacer"></div>
    
	  	<!-- BEGIN TWEET FORM -->
  			<div class="clearfix" id="thankPageTweetForm">
  				<textarea maxlength="140" name="status" rows="3" placeholder="Tweet at anyone from @SwarmBOT5000 i.e.  We @WhiteHouse want free ice cream for everyone!!! via @swarmnyc"></textarea>
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

    <!-- START FOOTER -->
	<div class="footer">
		<div class="swarm">Made by <a class="whitey" href="http://swarmnyc.com" target="_blank">SWARM</a> | Grab the code at <a class="whitey" href="http://github.com/swarmnyc">GitHub</a>. 
		</div>
    </div>

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
