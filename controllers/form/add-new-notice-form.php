<form action="components/add-new-notice.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <div class="form-group">
        <label for="notice-topic-name">Topic Name</label>
        <input type="text" class="form-control" id="notice-topic-name" name="notice_topic_name" placeholder="Enter Topic Name" required>
    </div>
    <div class="form-group">
        <label for="notice-topic-body">Topic Body</label>
        <textarea id="notice-topic-body" rows="9" class="form-control" placeholder="Body of the Topic" name="notice_topic_body" required></textarea>
    </div>
    <div class="form-group">
        <label for="notice-topic-semester">Intended for Semester(s)</label>
        <br>
        <label class="checkbox-inline" for="semester-inline-checkbox1"><input type="checkbox" id="semester-inline-checkbox1" name="notice_topic_semester[]" value="1"> One </label>
        <label class="checkbox-inline" for="semester-inline-checkbox2"><input type="checkbox" id="semester-inline-checkbox2" name="notice_topic_semester[]" value="2"> Two </label>
        <label class="checkbox-inline" for="semester-inline-checkbox3"><input type="checkbox" id="semester-inline-checkbox3" name="notice_topic_semester[]" value="3"> Three </label>
        <label class="checkbox-inline" for="semester-inline-checkbox4"><input type="checkbox" id="semester-inline-checkbox4" name="notice_topic_semester[]" value="4"> Four </label>
        <label class="checkbox-inline" for="semester-inline-checkbox5"><input type="checkbox" id="semester-inline-checkbox5" name="notice_topic_semester[]" value="5"> Five </label>
        <label class="checkbox-inline" for="semester-inline-checkbox6"><input type="checkbox" id="semester-inline-checkbox6" name="notice_topic_semester[]" value="6"> Six </label>
        <label class="checkbox-inline" for="semester-inline-checkbox7"><input type="checkbox" id="semester-inline-checkbox7" name="notice_topic_semester[]" value="7"> Seven </label>
        <label class="checkbox-inline" for="semester-inline-checkbox8"><input type="checkbox" id="semester-inline-checkbox8" name="notice_topic_semester[]" value="8"> Eight </label>
    </div>
    <hr>
    <button type="submit" class="btn btn-default" name="submit_button" id="submit_button">Submit</button>
</form>