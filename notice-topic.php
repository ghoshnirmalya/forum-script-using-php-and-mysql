<?php include 'components/authentication.php' ?>     
<?php include 'controllers/base/head.php' ?>
<?php
    session_start();
    require '_database/database.php';
    if($_SESSION['user_username']){
?>
<?php include 'controllers/navigation/first-navigation.php' ?>
<?php
    }
    else{
?>
<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
<?php
    }
?>
<?php 
    session_start();
    $current_user = $_SESSION['user_username'];
    $notice_topic_id = mysqli_real_escape_string($database,$_REQUEST['notice_topic_id']);
    $sql = "SELECT * FROM notice_topic where notice_topic_id = '$notice_topic_id'";
    $result = mysqli_query($database,$sql);
    $rws = mysqli_fetch_array($result);
                    
    $temp_user_username = $rws['notice_topic_created_by'];
    $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
    $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
    $rws_search_username = mysqli_fetch_array($result_search_username);
?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1><?php echo $rws['notice_topic_name'];?></h1>
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive notice-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                            </div>
                            <div class="col-md-11 column">
                                <div class="topic-user-name">
                                    <i class="fa fa-user"></i> <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>
                                </div>
                                <hr>
                                <div class="topic-body">
                                    <i class="fa fa-book"></i> <?php echo $rws['notice_topic_body'];?>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
