<?php
session_start();

include('../includes/connect.php');
include('values.php');

if(!isset($_SESSION['edit'])){
    header('location: dashboard.php');
}
else{ 
    $edit_id = $_SESSION['edit'];
}

$info = mysqli_query($db, "SELECT * FROM blogs WHERE id=$edit_id");
  while($row = mysqli_fetch_array($info)){
    $edit_blog_title = $row['blog_title'];
    $edit_blog_content = $row['blog_content'];
  }

if(isset($_POST['proceed'])){ 
	$blog_title = mysqli_real_escape_string($db, $_POST['blog_title']);
	$blog_content = mysqli_real_escape_string($db, $_POST['blog_content']);

    $query = "UPDATE blogs SET blog_title='$blog_title' WHERE id=$edit_id ";
    mysqli_query($db, $query);
    $query = "UPDATE blogs SET blog_content='$blog_content' WHERE id=$edit_id ";
    mysqli_query($db, $query);
	header('location: manage_blogs.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Admin Dashboard | Blogzz
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
            Edit Blog
        </div>
          <form method="post" action="edit_blog.php" class="admin_form"> 
            <?php include('../includes/success_fail.php'); ?>
             <label>Blog Title</label>
             <input type="text" name="blog_title" value="<?php echo $edit_blog_title; ?>"> 
             <label>Blog Content</label>
             <div class="textarea_holder">
             <textarea id="editor" name="blog_content"><?php echo $edit_blog_content; ?></textarea>
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
                Update Blog
             </button>
         </form>
       </div> 
    </div> <!--main class -->   
</body>
<script src="../js/collapsible.js"></script>
</html>