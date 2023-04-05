<?php
//Connect to the database
include('../includes/connect.php');

$results = "Not Found";

if(isset($_GET['display'])){
	$display = $_GET['display'];
	$info = mysqli_query($db, "SELECT * FROM blogs WHERE id=$display "); 
	 while($row = mysqli_fetch_array($info)){
	 	$blog_title = $row['blog_title'];
	 	$blog_summary = $row['blog_summary'];
	 	$blog_cover = $row['blog_cover'];
	 	$blog_content = $row['blog_content'];
	 	$blog_date = $row['date_added'];
	 }
	 $results = "Found";
}

if($results == "Not Found"){
	header('location: blogs.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Minute | Read
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
			            Read Blog
		            </div>
	            </div>
            </div>
        </div>
    </div>

    <div class="read_blog_section">
		<div class="web_container">
			<div class="read_blog">
				<div class="read_blog_blog">
					<div class="read_blog_heading">
						<?php echo $blog_title; ?>
					</div>
					<div class="read_blog_date">
						<?php echo $blog_date; ?>
					</div>
					<div class="read_blog_image_holder">
						<img class="read_blog_image" src="../images/blogs/<?php echo $blog_cover; ?>">
					</div>
					<div class="read_blog_summary">
						<?php echo $blog_summary; ?>
					</div>
					<div class="read_blog_content">
						<?php echo $blog_content; ?>
					</div>
				</div>
				<div class="read_blog_ads">
				</div>
			</div>
		</div>
	</div>
	
    <div class="footer_section">
	    <?php include('footer.php'); ?>
    </div>
</body>
</html>