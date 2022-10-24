<form method='POST' id='frm_submit' class="courses">
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon-edit'></i> Add Entry</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hidden_id" name="input[subject_id]">
                    <div class="form-group">
						<label>Subject Name <span class="text-danger">*</span></label>
						<input type="text" class="form-control input-item" name="input[subject_name]" id="subject_name" autocomplete="off" placeholder="Subject name" required>
					</div>
                    <div class="form-group">
						<label>Teacher <span class="text-danger">*</span></label>
						<select class="form-control form-control-sm select2" name="input[user_id]" id="user_id" required></select>
					</div>
                    <div class="form-group">
						<label>Course <span class="text-danger">*</span></label>
						<select class="form-control form-control-sm select2" name="input[course_id]" id="course_id" required></select>
					</div>
                    <div class="form-group">
						<label>School Year <span class="text-danger">*</span></label>
						<select class="form-control form-control-sm select2" name="input[sy_id]" id="sy_id" required></select>
					</div>
                    <div class="form-group">
						<label>Description</label>
						<textarea class="form-control input-item" name="input[subject_desc]" id="subject_desc" autocomplete="off" placeholder="Subject Description"></textarea>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    <button type="submit" class="btn btn-primary font-weight-bold"><i class="flaticon2-check-mark"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>