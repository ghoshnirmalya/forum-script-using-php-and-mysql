<?php include 'components/authentication.php' ?> 
<?php include 'components/session-check-profile.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?> 
<?php include 'controllers/base/style.php' ?>
<?php 
    if($_GET["follow"]=="same"){
        $dialogue="Your can't follow yourself! ";
    }
?>
    <script>
        $.growl("<?php echo $dialogue; ?> ", {
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            }								
        });
    </script>
<?php 
    session_start();
    $current_user = $_SESSION['user_username'];
    $user_username = mysqli_real_escape_string($database,$_REQUEST['user_username']);
    $profile_username=$rws['user_username'];
?>
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<div class="profile">
	<div class="row clearfix">
		<!-- <div class="col-md-12 column"> -->
            <div>
                <center>
                    <img src="userfiles/avatars/<?php echo $rws['user_avatar'];?>" class="img-responsive profile-avatar">
                    <br>
                    <div class="btn-group">
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $url ?> &t=<?php echo $rws['user_firstname'];?> <?php echo $rws['user_lastname'];?> " alt="Share this profile on Facebook" title="Share on Facebook" target="_blank" ><button type="button" class="btn btn-default"><i class="fa fa-facebook"></i></button></a>
                        <a href="http://twitter.com/share?text=<?php echo $rws['user_firstname'];?> <?php echo $rws['user_lastname'];?>&url=<?php echo $url ?>" alt="Tweet This Post" title="Tweet about the profile" target="_blank"><button type="button" class="btn btn-default"><i class="fa fa-twitter"></i></button></a>
                        <a href="https://plusone.google.com/_/+1/confirm?hl=en-US&url=<?php echo $url ?>" alt="Share this profile on Google+" title="Share on Google+" target="_blank" ><button type="button" class="btn btn-default"><i class="fa fa-google-plus"></i></button></a>
                    </div>
                </center>
                <h1 class="text-center profile-text profile-name"><?php echo $rws['user_firstname'];?> <?php echo $rws['user_lastname'];?></h1>
                <h2 class="text-center profile-text profile-profession"><?php echo $rws['user_profession'];?></h2>
                <div class="panel-group white" id="panel-profile">
                    <div class="panel panel-default white">
                        <div class="panel-heading white">
                            <center>
                                <a class="panel-title" data-toggle="collapse" data-parent="#panel-profile" href="#panel-element-info">Details</a>
                            </center>
                        </div>
                        <div id="panel-element-info" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="col-md-6 column">
                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Basic</p>
                                    <hr>
<?php
    if ($rws['user_shortbio']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Bio</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['user_shortbio'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['user_address']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Location</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['user_address'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['user_email']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-envelope"></i> Email</p>
                                    </div>
                                    <div class="col-md-8">                                    
                                        <p><?php echo $rws['user_email'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['user_country']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Country</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['user_country'];?></p>
                                    </div>
<?php } ?>
                                </div>
                                <div class="col-md-6 column">
                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Personal</p>
                                    <hr>
<?php
    if ($rws['user_gender']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-user"></i> Gender</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['user_gender'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['user_dob']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-calendar"></i> Date of Birth</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['user_dob'];?></p>
                                    </div>
<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<!-- </div> -->
	</div>
</div>