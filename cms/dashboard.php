<?php
session_start();

include('../includes/connect.php');
include('values.php');

if(isset($_GET['add_blog'])){
    header('location: add_blog.php');
}
if(isset($_GET['manage_blogs'])){
    header('location: manage_blogs.php');
}
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $query = "DELETE FROM blogs WHERE id=$delete_id ";
    mysqli_query($db, $query);
    header('location: dashboard.php');
}
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $_SESSION['edit'] = $edit_id;
    header('location: edit_blog.php');
}

if(isset($_GET['logout'])){
    unset($_SESSION['admin']);
    $_SESSION['mild'] = "You are now logged out";
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Admin Dashboard | Blogzz
	</title>
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
        <div class="main_container"> 
                <br>
                <div class="stats_summaries">
                    <div class="stats_summary">
                        <div class="stats_summary_top" id="first_top">
                            <div class="stats_summary_top_left">
                                <i class="fa fa-users fa-3x"></i>
                            </div>
                            <div class="stats_summary_top_right">
                                <div class="stats_summary_top_right_big_text">
                                    <?php echo $users; ?>
                                </div>
                                <div>
                                    Users
                                </div>
                            </div>
                        </div>
                        <div class="stats_summary_bottom">
                            <a href="#">
                                All Users
                            </a>
                        </div>
                    </div>
                    <div class="stats_summary" id="second_summary">
                        <div class="stats_summary_top" id="second_top">
                            <div class="stats_summary_top_left">
                                <i class="fa fa-globe fa-3x"></i>
                            </div>
                            <div class="stats_summary_top_right">
                                <div class="stats_summary_top_right_big_text">
                                    <?php echo $new_blogs; ?>
                                </div>
                                <div>
                                    New Blogs
                                </div>
                            </div>
                        </div>
                        <div class="stats_summary_bottom">
                            <a href="#">
                              All Blogs
                            </a>
                        </div>
                    </div>
                    <div class="stats_summary">
                        <div class="stats_summary_top" id="third_top">
                            <div class="stats_summary_top_left">
                                <i class="fa fa-newspaper-o fa-3x"></i>
                            </div>
                            <div class="stats_summary_top_right">
                                <div class="stats_summary_top_right_big_text">
                                    <?php echo $blogs; ?>
                                </div>
                                <div>
                                    Blogs
                                </div>
                            </div>
                        </div>
                        <div class="stats_summary_bottom">
                            <a href="#">
                                All Blogs
                            </a>
                        </div>
                    </div>
                </div>
                <h2>
                    Latest Blogs
                </h2>
                <table>
                    <tr>
                        <th>
                            Title
                        </th>
                        <th>
                            Date Added
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    <?php
                        $info = mysqli_query($db, "SELECT * FROM blogs ORDER BY id DESC LIMIT 5 "); 
                        while($row = mysqli_fetch_array($info)){ 
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['blog_title']; ?>
                        </td>
                        <td>
                            <?php echo $row['date_added']; ?>
                        </td>
                        <td>
                            <a href="dashboard.php?edit=<?php echo $row['id']; ?>">
                                <button class="blue_button">
                                    Edit
                                </button>
                            </a>
                            <a href="dashboard.php?delete=<?php echo $row['id']; ?>">
                                <button class="red_button">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php 
                        } 
                    ?>
                </table>
            </div>
    </div> <!--main class -->   
</body>
<script src="../js/collapsible.js"></script>
</html>
