<form action="components/add-new-forum-post.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <div class="form-group">
        <label for="forum-topic-name">Topic Name</label>
        <input type="text" class="form-control" id="forum-topic-name" name="forum_topic_name" placeholder="Enter Topic Name" required>
    </div>
    <div class="form-group">
        <label for="forum-topic-body">Topic Body</label>
        <textarea id="forum-topic-body" rows="9" class="form-control" placeholder="Body of the Topic" name="forum_topic_body" required></textarea>
    </div>
    <div class="form-group">
        <label for="forum-topic-semester">Intended for Semester(s)</label>
        <br>
        <label class="checkbox-inline" for="semester-inline-checkbox1"><input type="checkbox" id="semester-inline-checkbox1" name="forum_topic_semester[]" value="1"> One </label>
        <label class="checkbox-inline" for="semester-inline-checkbox2"><input type="checkbox" id="semester-inline-checkbox2" name="forum_topic_semester[]" value="2"> Two </label>
        <label class="checkbox-inline" for="semester-inline-checkbox3"><input type="checkbox" id="semester-inline-checkbox3" name="forum_topic_semester[]" value="3"> Three </label>
        <label class="checkbox-inline" for="semester-inline-checkbox4"><input type="checkbox" id="semester-inline-checkbox4" name="forum_topic_semester[]" value="4"> Four </label>
        <label class="checkbox-inline" for="semester-inline-checkbox5"><input type="checkbox" id="semester-inline-checkbox5" name="forum_topic_semester[]" value="5"> Five </label>
        <label class="checkbox-inline" for="semester-inline-checkbox6"><input type="checkbox" id="semester-inline-checkbox6" name="forum_topic_semester[]" value="6"> Six </label>
        <label class="checkbox-inline" for="semester-inline-checkbox7"><input type="checkbox" id="semester-inline-checkbox7" name="forum_topic_semester[]" value="7"> Seven </label>
        <label class="checkbox-inline" for="semester-inline-checkbox8"><input type="checkbox" id="semester-inline-checkbox8" name="forum_topic_semester[]" value="8"> Eight </label>
    </div>
    <hr>
    <label for="forum-topic-attachment">Attachment</label>
    <input name="BackgroundImageFile" type="file" id="uploadBackgroundFile" class="btn btn-default" name="forum-topic-attachment"/>  
    <hr>
    <button type="submit" class="btn btn-primary" name="submit_button" id="submit_button">Submit</button>
</form>