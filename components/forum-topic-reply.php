<?php
    ini_set("display_errors",1);
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require '../_database/database.php';
        $forum_topic_id = mysqli_real_escape_string($database,$_REQUEST['forum_topic_id']);
        $forum_topic_id_temp = $forum_topic_id;
        $user_username=$_SESSION['user_username'];
        $forum_topic_reply_body=$_REQUEST['forum_topic_reply_body'];
        
        $Destination = '../userfiles/uploads';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= '';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        
        $sql="INSERT INTO forum_topic_reply(forum_topic_reply_created_by, forum_topic_reply_topic_id, forum_topic_reply_body, forum_topic_reply_time, forum_topic_reply_image) VALUES ('$user_username', '$forum_topic_id', '$forum_topic_reply_body', CURRENT_TIMESTAMP, '$BackgroundNewImageName')";
        mysqli_query($database,$sql)or die(mysqli_error($database));
        header("location:../forum-topic.php?forum_topic_id=".$forum_topic_id."request=add-new-forum-post&status=success");
    }    
?>