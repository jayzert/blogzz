<?php
//Connect to the database
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Minute | About Us
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/jconnect.ico">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>
	<?php include('mobile_navbar.php'); ?>
	<div class="web_container">
		<?php include('navbar.php'); ?>
	</div>
	<div class="slider">
	    <div class="web_container">
	        <div class="slider_content">
	            <div class="slider_text_section">
		            <div class="slider_text_large">
			            Who are we?
		            </div>
		            <div class="slider_text_small">
			            Minute Inc provides Artificial Intelligence based software development services. Our services range from some simple robotic solutions to more advanced mathematical solutions. Our products involve all the latest tachnologies like integration with some popular Artificial Intelligence platforms like Open AI's ChatGPT among other solutions.
		            </div>
	            </div>
            </div>
        </div>
    </div>

	
    <div class="footer_section">
	    <?php include('footer.php'); ?>
    </div>
</body>
</html>