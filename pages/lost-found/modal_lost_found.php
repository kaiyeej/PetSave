
<div class="modal fade" id="modalEntry" class="modal fade bs-example-modal-md" role="dialog">
    <div class="modal-dialog modal-lg" style="margin-top: 50px;border: 2px dashed #ff9800;" role="document">
        <form method='POST' id='frm_submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"  style="color: #f44336;"><i class='flaticon-edit'></i> Lost and Found Animals </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Lost or Found <span class="text-danger">*</span></label>
                                <select class="form-control input-item" name="input[if_type]" id="if_type" required>
                                    <option value="">Please Select</option>
                                    <option value="Lost">Lost</option>
                                    <option value="Found">Found</option>

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[if_animal_name]" id="if_animal_name" autocomplete="off" placeholder="Animal name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description  <span class="text-danger">*</span></label>
                                    <textarea class="form-control input-item" name="input[if_animal_desc]" id="if_animal_desc" autocomplete="off" placeholder="Animal Description" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Last location  <span class="text-danger">*</span></label>
                                    <textarea class="form-control input-item" name="input[if_last_location_found]" id="if_last_location_found" autocomplete="off" placeholder="Last location found" required></textarea>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea class="form-control input-item" name="input[if_other_remarks]" id="if_other_remarks" autocomplete="off" placeholder="Other Remarks"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control input-item" name="file" id="if_animal_image" autocomplete="off" placeholder="Animal name" required>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_add"  data-dismiss="modal" class="genric-btn primary-border circle arrow">Cancel</button>
                    <button type="submit" id="btn_submit" class="genric-btn success circle"> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>