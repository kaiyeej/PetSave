<form method='POST' id='frm_submit' class="users">
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel"><span class='fa fa-pen'></span> Add Entry</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hidden_id" name="input[user_id]">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label><strong>Fullname</strong></label>
                                <input type="text" class="form-control input-item" name="input[user_fullname]" id="user_fullname" placeholder="User fullname" maxlength="100" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><strong>Category</strong></label>
                                <div>
                                <select class="form-control input-item" name="input[user_category]" id="user_category" required>
                                    <option value="">&mdash; Please Select &mdash;</option>
                                    <option value="A">Admin</option>
                                    <option value="U">User</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><strong>Contact #</strong></label>
                                <div>
                                <input type="text" class="form-control input-item" name="input[user_contact_num]" autocomplete="off" id="user_contact_num" placeholder="user_contact_num" maxlength=15 required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><strong>Username</strong></label>
                                <div>
                                <input type="text" class="form-control input-item" name="input[username]" autocomplete="off" id="username" placeholder="Username" maxlength=15 required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="div_password" class="form-group">
                                <label><strong>Password</strong></label>
                                <div>
                                <input type="password" class="form-control input-item" name="input[password]" autocomplete="off" id="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
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