<form method='POST' id='frm_update_post'>
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel"><span class='fa fa-pen'></span> Update Post</h4>
                </div>
                <div class="modal-body">
                    <input class="input-item" type="text" id="hidden_id" name="input[post_id]">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label><strong>Title</strong><span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control input-item" name="input[post_title]" id="post_title" placeholder="Title" maxlength="50" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label><strong>Content</strong><span class="text-danger">*</span></label>
                            <div>
                                <textarea class="form-control input-item" name="input[post_content]" id="post_content" placeholder="Post Content" style="height:100px;"></textarea>
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
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>