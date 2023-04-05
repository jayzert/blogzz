<?php
//Connect to the database
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Blogz | Contact Us
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/jconnect.ico">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/contact.css">
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
			            Contact Us
		            </div>
		            <div class="slider_text_small">
			            Fill in the Form below and we can talk about how best we can implement our Robotic solutions into your systems.
		            </div>
	            </div>
            </div>
        </div>
    </div>
    <div class="web_container">
        <?php include('contact_form.php'); ?>
    </div>	
    <div class="footer_section">
	    <?php include('footer.php'); ?>
    </div>
</body>
</html>