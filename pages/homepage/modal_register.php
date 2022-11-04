
<div class="modal fade" id="modalEntry" class="modal fade bs-example-modal-md" role="dialog">
    <div class="modal-dialog" style="margin-top: 50px;border: 2px dashed #ff9800;" role="document">
        <form method='POST' id='frm_submit'>    
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"  style="color: #f44336;"><i class='flaticon-edit'></i> REGISTER SHELTER </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[shelter_name]" id="shelter_name" autocomplete="off" placeholder="Shelter name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact #<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[shelter_contact_number]" id="shelter_contact_number" autocomplete="off" placeholder="Contact number" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control input-item" name="input[shelter_email]" id="shelter_email" autocomplete="off" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address  <span class="text-danger">*</span></label>
                                    <textarea class="form-control input-item" name="input[shelter_address]" id="shelter_address" autocomplete="off" placeholder="Shelter Address" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea class="form-control input-item" name="input[shelter_remarks]" id="shelter_remarks" autocomplete="off" placeholder="Remarks"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12"><hr style="border-top: 1px solid #ff5722;"></div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[user_fullname]" id="user_fullname" autocomplete="off" placeholder="User full name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact # <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[user_contact_num]" id="user_contact_num" autocomplete="off" placeholder="User contact #" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[username]" id="username" autocomplete="off" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Desired Password <span class="text-danger">*</span></label>
                                    <input type="password" placeholder="Password" class="form-control input-item" name="input[password]" id="password" required>
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