<form method='POST' id='frm_submit'>
    <div class="modal fade" id="modalEntry" class="modal fade bs-example-modal-md" role="dialog">
        <div class="modal-dialog modal-lg" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel" style="color: #f44336;"><i class='flaticon-edit'></i> Rescue </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">

                            <!-- START PETS -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><strong>Name</strong><span class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" class="form-control input-item" name="input[pet_name]" id="pet_name" placeholder="Pet Name" maxlength="50" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="div_image">
                                    <label><strong>Image</strong> <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file" required>
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
                                        <input type="date" class="form-control input-item" name="input[pet_dob]" id="pet_dob" required>
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

                            <!-- END PETS -->

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Description </strong></label>
                                    <textarea class="form-control input-item" name="input[description]" id="description" autocomplete="off" placeholder="Description" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Location </strong></label>
                                    <textare required class="form-control input-item" name="input[location]" id="location" autocomplete="off" placeholder="Last location found" required></textarea>
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