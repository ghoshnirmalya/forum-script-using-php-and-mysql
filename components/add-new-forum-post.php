<?php
    ini_set("display_errors",1);
    session_start();
    $user_username=$_SESSION['user_username'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require '../_database/database.php'; 
        $forum_topic_name=$_REQUEST['forum_topic_name'];
        $forum_topic_body=$_REQUEST['forum_topic_body'];
        $forum_topic_semester = implode(',', $_REQUEST['forum_topic_semester']);
        
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
        
        $sql="INSERT INTO forum_topic(forum_topic_name, forum_topic_body, forum_topic_time, forum_topic_created_by, forum_topic_semester, forum_topic_image) VALUES ('$forum_topic_name', '$forum_topic_body', CURRENT_TIMESTAMP, '$user_username' ,'$forum_topic_semester', '$BackgroundNewImageName')";
        mysqli_query($database,$sql)or die(mysqli_error($database));
        header("location:../forum-topic.php?forum_topic_id=".mysqli_insert_id($database)."&request=add-new-forum-post&status=success");
    }    
?>



        
