<form method='POST' id='frm_submit'>
    <div class="modal fade" id="modalEntry" class="modal fade bs-example-modal-md" role="dialog">
        <div class="modal-dialog" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel" style="color: #f44336;"><i class='flaticon-edit'></i> Rehab </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" id="hidden_id" name="input[rehab_id]">
                                <div class="form-group">
                                    <label>Pet Name <span class="text-danger">*</span></label>
                                    <select class="form-control select2 input-item" name="input[pet_id]" id="pet_id" required>
                                        <option value="">Please Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control input-item" name="input[rehab_desc]" id="rehab_desc" autocomplete="off" placeholder="Description" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Confinement Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control input-item" name="input[date_started]" id="date_started" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>