<?php
session_start();

include('../includes/connect.php');
include('values.php');

if(isset($_POST['proceed'])){ 
	$blog_title = mysqli_real_escape_string($db, $_POST['blog_title']);
	$blog_content = mysqli_real_escape_string($db, $_POST['blog_content']);
	
	// Get image name
    $blog_cover = time() . '.jpg';
 
    // image file directory
    $folder_name = "../images/blogs/";
    $target = $folder_name .basename($blog_cover);
	
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	$query = "INSERT INTO blogs(blog_title, blog_cover, blog_content)
	VALUES ( '$blog_title', '$blog_cover', '$blog_content')";
	mysqli_query($db, $query);
	$_SESSION['succeed'] = "Blog added successfully!";
	header('location: dashboard.php');
	}
	else{
      $_SESSION['fail'] = "Failed to add blog";
    }    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Admin Dashboard | Webx
    </title>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/favicon/jconnect.ico">
    <link rel="stylesheet" type="text/css" href="../css/cms.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>  
    <div class="sidebar">
        <?php include('sidebar_content.php'); ?>
    </div>
    <div class="main">  
        <div class="form_holder">  
        <div class="form_heading">
            Add Blog
        </div>
          <form method="post" action="add_blog.php" class="admin_form" enctype="multipart/form-data"> 
            <?php include('../includes/success_fail.php'); ?>
             <label>Blog Title</label>
             <input type="text" name="blog_title"> 
             <label>Blog Cover</label> 
             <input type="file" name="image" required> 
             <label>Blog Content</label>
             <div class="textarea_holder">
             <textarea id="editor" name="blog_content">Blog Content</textarea>
                <script src="../ckeditor5/ckeditor.js"></script>
                <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
               </div>
             <button type="submit" name="proceed"> 
                Add Blog
             </button>
         </form>
       </div> 
    </div> <!--main class -->   
</body>
<script src="../js/collapsible.js"></script>
</html>