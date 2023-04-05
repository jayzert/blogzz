<?php
//Connect to the database
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Blogz | A one minute solution
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
			            For all the latest blogs
			            <br>
			            We get you covered
		            </div>
		            <div class="slider_text_small">
			            Minute ensures that you get the best out of the modern technology. There is more your business can benefit from embracing Artificial Intelligence.
		            </div>
		            <a href="#">
		                <button class="theme_button">
			                Learn More
		                </button>
		            </a>
	            </div>
            </div>
        </div>
    </div>

    <div class="blog_section">
    	<div class="web_container">
    		<div class="blogs">
    			<?php
	            $info = mysqli_query($db, "SELECT * FROM blogs ORDER BY id DESC LIMIT 3"); 
	            while($row = mysqli_fetch_array($info)){ 
	            ?>
    			<div class="blog">
    				<div class="blog_image" style="background-image: url(../images/blogs/<?php echo $row['blog_cover']; ?>)">
    				</div>
    				<div class="blog_heading">
    					<?php echo $row['blog_title']; ?>
    				</div>
    				<div class="blog_summary">
    					<?php echo $row['blog_summary']; ?>
    				</div>
    				<div class="btn_holder">
			            <a href="read.php?display=<?php echo $row['id']; ?>">
		                    <button class="blog_button">
			                    Read More
		                    </button>
		                </a>
	                </div>
    			</div>
    			<?php 
    			  }
    			?>
    		</div>
    	</div>
    </div>

	<div class="footer_section">
	    <?php include('footer.php'); ?>
	</div>
</body>
</html>