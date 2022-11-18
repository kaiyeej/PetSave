
<?php
  $Profile = new Profile();
?>
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
  <div class="container ">
        <!--begin::Row-->
    <div class="row">
      <div class="col-lg-12">
        <!--begin::Example-->
        <!--begin::Card-->
        <div class="card card-custom">
          <div class="card-body">
            <h4 class="card-title" style="color: #009688;">Shelter information</h4>
              <form method='POST' id='frm_shelter' class="profile">
                <div class="row">
                  <div class="form-group col-sm-12">
                    <label for="exampleInputUsername1">Shelter Name</label>
                    <input type="text" autocomplete="off" class="form-control input-item" id="shelter_name" name="input[shelter_name]" placeholder="Shelter name" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="exampleInputUsername1">Address</label>
                    <textarea type="text" autocomplete="off" class="form-control input-item" id="shelter_address" name="input[shelter_address]" placeholder="Address" required></textarea>
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="exampleInputUsername1">Contact #</label>
                    <input type="text" autocomplete="off" class="form-control input-item" id="shelter_contact_number" name="input[shelter_contact_number]" placeholder="Contact number" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="exampleInputUsername1">Email</label>
                    <input type="email" autocomplete="off" class="form-control input-item" id="shelter_email" name="input[shelter_email]" placeholder="Email Address" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="exampleInputUsername1">Remarks</label>
                    <textarea type="text" autocomplete="off" class="form-control input-item" id="shelter_remarks" name="input[shelter_remarks]" placeholder="Shelter Remarks" style="height: 100px;" required></textarea>
                  </div>
                  <div class="form-group col-sm-12" style="padding-top: 30px">
                    <button type="submit" style="float: right;" id="btn_submit" class="btn btn-success me-2">Update</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
        <!--end::Card-->
      </div>
    </div>
        <!--end::Row-->
  </div>
  <!--end::Container-->
</div>

<script type="text/javascript">
  getShelter();
  function getShelter(id) {
      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=Shelters&q=view",
        data: {
        },
        success: function(data) {
          var jsonParse = JSON.parse(data);
          const json = jsonParse.data;

          $("#hidden_id").val(id);

          $('.input-item').map(function() {
            //console.log(this.id);
            const id_name = this.id;
            this.value = json[id_name];
          });

        }
      });
    }

    $("#frm_shelter").submit(function(e) {
      e.preventDefault();

      $("#btn_submit").prop('disabled', true);
      $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

      $.ajax({
        type: "POST",
        url: "controllers/sql.php?c=Shelters&q=edit",
        data: $("#frm_shelter").serialize(),
        success: function(data) {
          var json = JSON.parse(data);
          if (json.data == 1) {
            success_update();
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