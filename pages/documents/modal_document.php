<form method='POST' id='frm_submit' class="courses">
    <div class="modal fade" id="modalEntry" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon-edit'></i> Add Entry</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="hidden_id" name="input[doc_id]">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-item" name="input[doc_name]" id="doc_name" autocomplete="off" placeholder="Document name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Doc Type <span class="text-danger">*</span></label>
                                <select class="form-control select2 input-item" name="input[doc_type_id]" id="doc_type_id" required></select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="div_doc" class="form-group">
                                <label>File <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="doc_file" name="file">
                            </div>
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-outline checkbox-success">
                                    <input type="checkbox" checked id="checkbox_convert" name="Checkboxes15"/>
                                    <span></span>
                                    Convert file to text
                                </label>
                            </div><br>
                        </div>
                        <div class="col-lg-12">
                        </div>
                        <div class="col-lg-12">
                            <div id="div_loading"></div>

                            <div class="form-group">
                                <textarea class="summernote form-control input-item" name="input[doc_converted_text]" id="doc_converted_text" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    <button type="submit" id="btn_add" class="btn btn-primary font-weight-bold"><i class="flaticon2-check-mark"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

<script  type="text/javascript">
    
    var doc_file = document.getElementById('doc_file');
    doc_file.addEventListener('change', recognizeText);

    var checkbox_convert = document.getElementById('checkbox_convert');
    checkbox_convert.addEventListener('change', recognizeText);

    async function recognizeText({ target: { files }  }) {
        if($("#checkbox_convert").prop("checked")){
            $("#btn_add").prop("disabled",true);
            $("#div_loading").html("<h4 style='color: #607d8b;'><center><span class='fa fa-spin fa-spinner'></span> Please wait </center></h4><br>");

            Tesseract.recognize(files[0]).then(function(result) {
                $('#doc_converted_text').summernote('code', result.text);
                $("#btn_add").prop("disabled",false);
                $("#div_loading").html("");
            });
        }else{
            $("#div_loading").html("");
            $('#doc_converted_text').summernote('code','');
        }
    }
    
</script>