<?php
session_start();

include('../includes/connect.php');
include('values.php');

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
        <div class="main_container">
            <div>
                <h2>
                    All Blogs
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
                        $info = mysqli_query($db, "SELECT * FROM blogs ORDER BY id DESC "); 
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
        </div>
    </div> <!--main class -->   
</body>
<script src="../js/collapsible.js"></script>
</html>