<?php include 'components/authentication.php' ?>     
<?php include 'controllers/base/head.php' ?>
<?php
    session_start();
    require '_database/database.php';
    if($_SESSION['user_username']){
?>
<?php include 'controllers/navigation/first-navigation.php' ?>
<?php
        if($_SESSION['user_username'] == "admin"){      
?>
<div class="container top">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <a class="btn btn-default" href="add-new-notice-post.php">Add New Post</a>
        </div>
    </div>
</div>
<?php
        }
    }
    else{
?>
<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
<?php
    }
?>
<?php include 'controllers/table/notice-table.php' ?>