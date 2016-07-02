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
    $forum_topic_id = mysqli_real_escape_string($database,$_REQUEST['forum_topic_id']);
    $sql = "SELECT * FROM forum_topic where forum_topic_id = '$forum_topic_id'";
    $result = mysqli_query($database,$sql);
    $rws = mysqli_fetch_array($result);
                    
    $temp_user_username = $rws['forum_topic_created_by'];
    $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
    $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
    $rws_search_username = mysqli_fetch_array($result_search_username);
?>

        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1><?php echo $rws['forum_topic_name'];?></h1>
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                            </div>
                            <div class="col-md-11 column">
                                <div class="topic-user-name">
                                    <i class="fa fa-user"></i> <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>
                                </div>
                                <hr>
                                <div class="topic-body">
                                    <i class="fa fa-question-circle"></i> <?php echo $rws['forum_topic_body'];?>
                                </div>
                                <div class="forum-attachment">
                                    <?php
                                        if($rws['forum_topic_image']){
                                    ?>
                                    <hr>
                                    <div class="col-md-3 column">
                                        <img src="userfiles/uploads/<?php echo $rws['forum_topic_image'];?>"  class="img-responsive thumbnail">
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

<?php 
    $sql_reply = "SELECT * FROM forum_topic_reply where forum_topic_reply_topic_id = '$forum_topic_id'";
    $result_reply = mysqli_query($database,$sql_reply);
    $rws_reply_count = mysqli_num_rows($result_reply);
    while($rws_reply = mysqli_fetch_array($result_reply)){
        
        $temp_user_username_reply = $rws_reply['forum_topic_reply_created_by'];
        $sql_search_username_reply = "SELECT * FROM user WHERE user_username = '$temp_user_username_reply'";
        $result_search_username_reply = mysqli_query($database,$sql_search_username_reply);
        $rws_search_username_reply = mysqli_fetch_array($result_search_username_reply);
?>

<?php
        if($rws_reply_count > 0){
?>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src="userfiles/avatars/<?php echo $rws_search_username_reply['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username_reply_reply['user_firstname'];?> <?php echo $rws_search_username_reply['user_lastname'];?>">
                            </div>
                            <div class="col-md-11 column">
                                <div class="topic-user-name">
                                    <i class="fa fa-user"></i> <?php echo $rws_search_username_reply['user_firstname'];?> <?php echo $rws_search_username_reply['user_lastname'];?>
                                </div>
                                <hr>
                                <div class="topic-body">
                                    <i class="fa fa-question-circle"></i> <?php echo $rws_reply['forum_topic_reply_body'];?>
                                </div>
                                <div class="forum-attachment">
                                    <?php
                                        if($rws_reply['forum_topic_reply_image']){
                                    ?>
                                    <hr>
                                    <div class="col-md-3 column">
                                        <img src="userfiles/uploads/<?php echo $rws_reply['forum_topic_reply_image'];?>"  class="img-responsive thumbnail">
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
<?php    
        }
    }
?>                  
<?php
    session_start();
    require '_database/database.php';
    if($_SESSION['user_username']){
?>
                    <br>
                    <div class="container">
                        <div class="row clearfix">
<?php include 'controllers/form/forum-topic-reply-form.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    else{
?>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <h3 class="text-center">You need to <a href="login.php">Log In</a> or <a href="register.php">Register</a> to post comments.</h3>
                            </div>
                        </div>
                    </div>
<?php
    }
?>

