<?php include 'components/authentication.php' ?>   
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?> 
<?php
    if($_POST){
        $query=$_POST['search-form'];
        $sql=mysqli_query($database,"select * from forum_topic where forum_topic_name like '%$query%' order by forum_topic_time");
        $number=mysqli_num_rows($sql);
    }
?>
                            <div id="content">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="panel panel-default" style="margin: 20px 0px;">
                                          <div class="panel-heading">                                 
<?php 
    if($number > 1){ 
?>
        <h3 class="panel-title"><?php echo $number; ?> Results for "<?php echo $query; ?>"</h3>
<?php     
    }
    else{
?>
         <h3 class="panel-title"><?php echo $number; ?> Result for "<?php echo $query; ?>"</h3>                                 
<?php     
    }
?>
    
                                          </div>
                                          <div class="panel-body">
                                              <div class="row">
                                                  <div class="container">
                                                      <div class="row clearfix">
                                                          <div class="col-md-12 column">
                                                              <div class="row clearfix">
<?php
    if($_POST){
        $query=$_POST['search-form'];
        $sql=mysqli_query($database,"select * from forum_topic where forum_topic_name like '%$query%' order by forum_topic_time");
        if( mysqli_num_rows($sql) > 0) {
            while($rws = mysqli_fetch_array($sql)){
?>
                <div class="panel-body">
                    <h1><a href="forum-topic.php?forum_topic_id=<?php echo $rws['forum_topic_id'];?>"><i class="fa fa-link"></i> <?php echo $rws['forum_topic_name'];?></a></h1>
                </div>
<?php 
            } 
        }
        else{
?>
                                                                                <center>
                                                                                    <h1>No Results to show</h1>
                                                                                </center>
<?php      
        }
    }                                                              
?>                                                                
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>                                        
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>