<?php require_once '../../header.php'; ?>
<div class="col-md-8">
  <div class="col-md-6 mx-auto">
    <h1>Create Minutes of the Meeting</h1>
    <form action="" method="post" class="mt-3">
      <div class="form-group">
        <label for="minutes_title">Title</label>
        <input type="text" name="minutes_title" id="minutes_title" class="form-control" value="Minutes of the meeting - Hospital Website">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="minutes_date">Date</label>
          <input type="text" name="minutes_date" class="form-control" value="March 15, 2019">
        </div>
        <div class="form-group col-md-6">
          <label for="minutes_time">Time</label>
          <input type="text" name="minutes_time" class="form-control" value="8:00 - 8:45">
        </div>
      </div>
      <div class="form-group">
        <label for="agenda_location">Location</label>
        <input type="text" name="agenda_location" class="form-control" value="M100">
      </div>
      <div class="form-group">
        <label for="minutes_members">Present Members (hold <kbd>ctrl</kbd> or <kbd>command ⌘</kbd> key to select multiple members)</label>
        <select multiple class="form-control" name="present_members">
          <option selected>Kento Kanazawa</option>
          <option selected>Jenna Greenberg</option>
          <option selected>Ryan Robinson</option>
          <option>Mark Martin</option>
        </select>
      </div>
      <div class="form-group">
        <label for="minutes_date">Minutes (separate items with a pipe | )</label>
        <textarea name="old_business" rows="8" cols="80" class="form-control"> Minutes 1 | Minutes 2 | Minutes 3  </textarea>
      </div>
      <div class="form-group">
        <label for="minutes_date">Action Items (separate items with a pipe | )</label>
        <textarea name="new_business" rows="8" cols="80" class="form-control"> Action Item 1 | Action Item 2 | Action Item 3</textarea>
      </div>
      <div class="form-group text-md-right">
        <button type="button" name="save_button" class="btn btn-primary">Save</button>
        <button type="button" name="cancel_button" class="btn btn-danger">Cancel</button>
      </div>
    </form>
  </div>
</div>
<?php require_once '../../footer.php'; ?>