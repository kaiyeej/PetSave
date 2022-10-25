<div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>Adopt now</h3>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="pet_care_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <div class="pet_thumb">
                    <img src="img/about/pet_care.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-6">
                <div class="pet_info">
                    <div class="section_title">
                        <h3><span>We need your</span>
                            help Adopt Us</h3>
                        <p>All animals at PetSave are all looking for their Forever Homes right now!</p>
                        <a data-toggle="modal" data-backdrop="false" data-target="#modalEntry" href="#modalEntry" class="boxed-btn3">Adopt now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="whole-wrap">
	<div class="container box_1170">
        <div class="section-top-border">
            <h3 class="mb-30">Available animals</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-defination" style="border: 1px dashed orange;padding: 15px;">
                        <h4 class="mb-20">Name</h4>
                        <p>Description</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'modal_adopt.php'; ?>
<script type="text/javascript">
    function adoptNow(){
        $("#modalEntry").prependTo("body");
        $("#frm_submit").removeClass("required");
    }

    $("#frm_submit").submit(function(e) {
      e.preventDefault();
      $("#btn_submit").prop('disabled', true);
      $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

      var hidden_id = $("#hidden_id").val();
      var q = hidden_id > 0 ? "edit" : "add";
      $.ajax({
        type: "POST",
        url: "admin/controllers/sql.php?c=Adopt&q=" + q,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          
          var json = JSON.parse(data);
          if (json.data > 0) {
                $("#modalEntry").modal('hide');
                success_add_adopt();
            } else if (json.data == 2) {
                entry_already_exists();
            } else {
                failed_query(json);
            }
          $("#btn_submit").prop('disabled', false);
          $("#btn_submit").html("<span class='fa fa-check-circle'></span> Submit");
        }
      });
    });
</script>