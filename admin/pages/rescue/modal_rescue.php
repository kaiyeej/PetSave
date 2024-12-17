<form method='POST' id='frm_submit'>
    <div class="modal fade" id="modalEntry" class="modal fade bs-example-modal-md" role="dialog">
        <div class="modal-dialog modal-lg" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h4 id="modalLabel" style="color: #f44336;">
                        <i class='flaticon-edit'></i> Rescue
                    </h4>
                    <button type="button" class="btn btn-success" id="approveButton">
                    <i class="flaticon2-check-mark"></i> Accepted
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <input type="hidden" id="hidden_id" name="input[rescue_id]">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Location</strong><span class="text-danger">*</span></label>
                                    <div>
                                        <textarea class="form-control input-item" name="input[location]" id="location" placeholder="Location"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Description</strong><span class="text-danger">*</span></label>
                                    <div>
                                        <textarea class="form-control input-item" name="input[description]" id="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group div_image">
                                    <label><strong>Image</strong> <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file" id="file_rescue" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><strong>Type</strong><span class="text-danger">*</span></label>
                                    <div>
                                        <select class="form-control select2 input-item" name="input[rescue_type]" id="rescue_type" required>
                                            <option value="">Please Select</option>
                                            <option value="C">Rescue</option>
                                            <option value="R">Reported</option>
                                        </select>    
                                    </div>
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
