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
        <h1 class="text-center">Latest Notices</h1>
<?php 
    session_start();
    $current_user = $_SESSION['user_username'];
    $sql = "SELECT * FROM notice_topic ORDER BY notice_topic_time DESC";
    $result = mysqli_query($database,$sql);
    while($rws = mysqli_fetch_array($result)){
                    
        $temp_user_username = $rws['notice_topic_created_by'];
        $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
        $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
        $rws_search_username = mysqli_fetch_array($result_search_username);
?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1><a href="notice-topic.php?notice_topic_id=<?php echo $rws['notice_topic_id'];?>"><i class="fa fa-link"></i> <?php echo $rws['notice_topic_name'];?></a></h1>
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive notice-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                            </div>
                            <div class="col-md-11 column">
                                <i class="fa fa-user"></i> <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>
                                <hr>
                                <i class="fa fa-book"></i> <?php echo $rws['notice_topic_body'];?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>
        <h1 class="text-center">Latest Forum Topics</h1>
<?php 
    session_start();
    $current_user = $_SESSION['user_username'];
    $sql = "SELECT * FROM forum_topic ORDER BY forum_topic_time DESC";
    $result = mysqli_query($database,$sql);
    while($rws = mysqli_fetch_array($result)){
                    
        $temp_user_username = $rws['forum_topic_created_by'];
        $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
        $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
        $rws_search_username = mysqli_fetch_array($result_search_username);
?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1><a href="forum-topic.php?forum_topic_id=<?php echo $rws['forum_topic_id'];?>"><i class="fa fa-link"></i> <?php echo $rws['forum_topic_name'];?></a></h1>
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                            </div>
                            <div class="col-md-11 column">
                                <i class="fa fa-user"></i> <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>
                                <hr>
                                <i class="fa fa-book"></i> <?php echo $rws['forum_topic_body'];?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?> 