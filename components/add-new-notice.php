<?php
    ini_set("display_errors",1);
    session_start();
    $user_username=$_SESSION['user_username'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require '../_database/database.php'; 
        $notice_topic_name=$_REQUEST['notice_topic_name'];
        $notice_topic_body=$_REQUEST['notice_topic_body'];
        $notice_topic_semester = implode(',', $_REQUEST['notice_topic_semester']);
        $sql="INSERT INTO notice_topic(notice_topic_name, notice_topic_body, notice_topic_time, notice_topic_created_by, notice_topic_semester) VALUES ('$notice_topic_name', '$notice_topic_body', CURRENT_TIMESTAMP, '$user_username' ,'$notice_topic_semester')";
        mysqli_query($database,$sql)or die(mysqli_error($database));
        header("location:../notice-topic.php?notice_topic_id=".mysqli_insert_id($database)."&request=add-new-notice-post&status=success");
    }    
?>