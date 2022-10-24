<form method='POST' id='frm_recipients' class="recipients">
    <div class="modal fade" id="modalRecipients" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon2-user-1'></i> Recipients</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="hidden_doc_id" name="input[doc_id]">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Recipients <span class="text-danger">*</span></label>
                                <select class="form-control select2 input-item"  multiple="multiple" name="input[user_id]" id="user_id" required></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    <button type="button" onclick="addRecipient()" id="btn_add_recipient" class="btn btn-primary font-weight-bold"><i class="flaticon2-check-mark"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>