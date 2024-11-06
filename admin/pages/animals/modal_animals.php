<form method='POST' id='frm_submit'>
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="margin-top: 10px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel"><span class='fa fa-pen'></span> Add Entry</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hidden_id" name="input[pet_id]">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><strong>Name</strong><span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control input-item" name="input[pet_name]" id="pet_name" placeholder="Pet Name" maxlength="50" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><strong>Description</strong><span class="text-danger">*</span></label>
                                <div>
                                    <textarea class="form-control input-item" name="input[pet_description]" id="pet_description" placeholder="Pet Description" maxlength="250"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Date of Birth</strong><span class="text-danger">*</span></label>
                                <div>
                                    <input type="date" class="form-control input-item" name="input[pet_dob]" id="pet_dob"required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Type</strong><span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control input-item" autocomplete="off" name="input[pet_type]" id="pet_type" placeholder="Pet Type" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Breed</strong><span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control input-item" autocomplete="off" name="input[pet_breed]" id="pet_breed" placeholder="Pet Breed" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Identifier</strong></label>
                                <div>
                                    <input type="text" class="form-control input-item" name="input[pet_identifier]" id="pet_identifier" autocomplete="off" placeholder="Pet Identifier">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group" id="div_image">
                                <label><strong>Image</strong> <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="file" id="if_pet_image" required>
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