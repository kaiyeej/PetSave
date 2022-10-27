<form method='POST' id='frm_submit'>
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="margin-top: 10px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel"><span class='fa fa-pen'></span> Add Entry</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hidden_id" name="input[animal_id]">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><strong>Name</strong></label>
                                <div>
                                    <input type="text" class="form-control input-item" name="input[animal_name]" id="animal_name" placeholder="Animal Name" maxlength="50" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><strong>Description</strong></label>
                                <div>
                                    <textarea class="form-control input-item" name="input[animal_description]" id="animal_description" placeholder="Animal Description" maxlength="250"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Date of Birth</strong></label>
                                <div>
                                    <input type="date" class="form-control input-item" name="input[animal_dob]" id="animal_dob"required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Type</strong></label>
                                <div>
                                    <input type="text" class="form-control input-item" autocomplete="off" name="input[animal_type]" id="animal_type" placeholder="Animal Type" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Breed</strong></label>
                                <div>
                                    <input type="text" class="form-control input-item" autocomplete="off" name="input[animal_breed]" id="animal_breed" placeholder="Animal Breed" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Weight</strong></label>
                                <div>
                                    <input type="number" step="0.01" class="form-control input-item" name="input[animal_weight]" id="animal_weight" placeholder="Animal Weight" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Color</strong></label>
                                <div>
                                    <input type="text" class="form-control input-item" name="input[animal_color]" id="animal_color" placeholder="Animal Color" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><strong>Identifier</strong></label>
                                <div>
                                    <input type="text" class="form-control input-item" name="input[animal_identifier]" id="animal_identifier" autocomplete="off" placeholder="Animal Identifier">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control input-item" name="file" id="if_animal_image" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
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