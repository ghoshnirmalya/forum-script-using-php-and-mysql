<br>
<h3>Post Your Comment</h3>
<form action="components/forum-topic-reply.php?forum_topic_id=<?php echo $rws['forum_topic_id'];?>" method="post" enctype="multipart/form-data" id="UploadForm">
    <div class="form-group">
        <label for="forum-topic-reply-body">Topic Body</label>
        <textarea id="forum-topic-reply-body" rows="4" class="form-control" placeholder="Body of the Topic" name="forum_topic_reply_body" required></textarea>
    </div>
    <hr>
    <label for="forum-topic-attachment">Attachment</label>
    <input name="BackgroundImageFile" type="file" id="uploadBackgroundFile" class="btn btn-default" name="forum-topic-attachment"/>
    <hr>
    <button type="submit" class="btn btn-primary" name="submit_button" id="submit_button">Submit</button>
</form>