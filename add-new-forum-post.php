<?php include 'components/authentication.php' ?>     
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?>

<div class="container top">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">New Notice</h3>
        </div>
        <div class="panel-body">
            <?php include 'controllers/form/add-new-forum-post-form.php' ?>
        </div>
    </div>
</div>
