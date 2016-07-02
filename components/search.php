<?php
    require '../_database/database.php';
    session_start();
    if($_POST){
        $q=$_POST['searchword'];
        $sql_res=mysqli_query($database,"select * from forum_topic where forum_topic_name like '%$query%' order by forum_topic_time LIMIT 5");
        //$result=  mysql_query($sql_res) or die(mysql_errno());
        $trws= mysqli_num_rows($sql_res);
        if($trws>0){
            while($row=mysqli_fetch_array($sql_res)){
            $fname=$row['forum_topic_name'];
            $forum_topic_id=$row['forum_topic_id'];
            $re_fname='<b>'.$q.'</b>';
            $final_fname = str_ireplace($q, $re_fname, $fname);
?>  
<a href="./forum-topic.php?forum_topic_id=<?php echo $forum_topic_id; ?>">    
    <div class="display_box" align="left">
        <i class="fa fa-book"></i>
<?php echo $final_fname; ?> 
    </div>    
</a>
<?php
            }
        }
        else{
?>        
<div class="display_box" align="left">    
<?php echo "No results to show"; ?>
</div>
<?php   
        }
    }
    else{
    }
?>