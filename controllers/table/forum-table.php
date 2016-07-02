
    <div class="container">
<?php
        for($semester_id=1;$semester_id<=8;$semester_id++){
            $sql = "SELECT * FROM forum_topic where forum_topic_semester LIKE '%$semester_id%' ORDER BY forum_topic_time";
            $result = mysqli_query($database,$sql);
            $rws_count = mysqli_num_rows($result);
?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Semester <?php echo $semester_id; ?></h3>
                    </div>
<?php
                if($rws_count == 0){          
?>
                    <h4 class="text-center">No Topics Yet</h4>
                </div>
<?php
                }
                else{          
?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Topic Name</th>
                                <th>Opened By</th>
                            </tr>
                        </thead>
<?php                   
                    while($rws = mysqli_fetch_array($result)){
                        $temp_user_username = $rws['forum_topic_created_by'];
                        $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
                        $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
                        $rws_search_username = mysqli_fetch_array($result_search_username);
?>
                        <tbody>
                            <tr>
                                <th scope="row"><a href="forum-topic.php?forum_topic_id=<?php echo $rws['forum_topic_id'];?>"><?php echo $rws['forum_topic_id'];?></a></th>
                                <td><a href="forum-topic.php?forum_topic_id=<?php echo $rws['forum_topic_id'];?>"><?php echo $rws['forum_topic_name'];?></a></td>
                                <td><?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?></td>
                            </tr>
                        </tbody>
<?php   
                    }
?>
                    </table>           
                </div>
<?php
                }
        }
?>
    </div>
