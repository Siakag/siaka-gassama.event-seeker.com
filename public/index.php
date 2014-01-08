<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie11 lt-ie10 lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie11 lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]> <html class="lt-ie11 lt-ie10 ie9"> <![endif]-->
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Seeker - Find Local Events</title>
    <meta name='description' content="Find out what's happening near you with Event Seeker. On vacation? Staycation? No problem, Event Seeker has you covered">
    <meta name='keywords' content="events, event seeker, local events, vacation events, things to do, events in">
    <link rel="shortcut icon" href="css/favicon.ico" type="image/x-icon">
    <link rel="icon" href="css/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" />
    <script type='text/javascript' src='js/modernizr.js'></script>
  </head>
  <body>
    <div id="mainWrapper">
      <div id="content">
<?php
  $inc = isset($_SESSION['username']) ? 'includes/loggedIn.php' : 'includes/loginForm.php';
  include $inc;
?>
      </div>
    </div>
    <!-- scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>