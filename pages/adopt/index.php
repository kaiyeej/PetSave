<style>
#canvas_animals .animal-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    height: 100%; /* Ensure full height for flex layout */
}

.animal-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.img-container {
    height: 220px; /* Fixed height for consistent card size */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    background-color: #f5f5f5; /* Background to fill empty space if needed */
}

.img-container img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Display the entire image without cropping */
    object-position: center;
}

.card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1; /* Allows the card body to expand */
    text-align: center;
}

.card-title {
    font-size: 1.1em;
    margin-bottom: 10px;
    font-weight: bold;
}

.card-text {
    font-size: 0.9em;
    color: #555;
    flex-grow: 1; /* Allow text section to expand */
}

.btn {
    margin-top: 15px;
}


</style>
<div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <!-- <h3>Adopt now</h3> -->
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="pet_care_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="pet_thumb">
                    <img src="img/adopt.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service_area">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-7 col-md-10">
                <div class="section_title text-center mb-95">
                    <h3>Available Animals</h3>
                </div>
            </div>
        </div>
        <div  id="canvas_animals" class="row justify-content-center">
            
        </div>
    </div>
</div>
<?php require_once 'modal_adopt.php'; ?>
<script type="text/javascript">
    function showTC(){
        window.open("terms-condition");
    }

    function adoptNow(id){
        $("#modalEntry").prependTo("body");
        $("#frm_submit").removeClass("required");
        $("#pet_id").val(id);
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

    function getAnimals() {
    var q = "availableAnimals";
    $.ajax({
        type: 'POST',
        url:  "admin/controllers/sql.php?c=Pets&q=" + q,
        data: {},
        success: function(data) {
            var json = JSON.parse(data);
            var arr_count = json.data.length;
            var i = 0;
            if(arr_count <= 0){
                $("#canvas_animals").html('<div class="col-md-12"><center>No data available</center></div>');
            }else{
                $("#canvas_animals").html(''); // Clear existing content
                while (i < arr_count) {
                    const pet = json.data[i];
                    $("#canvas_animals").append(
                        `<div class="col-lg-4 col-md-6 mb-4">
                            <div class="card animal-card shadow-sm border-0">
                                <div class="card-img-top img-container">
                                    <img src="admin/assets/file/${pet.pet_image}" class="img-fluid rounded-top" alt="${pet.pet_name}">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-1">${pet.pet_name}</h5>
                                    <p class="card-text text-muted">${pet.pet_description}</p>
                                    <button style="display:none;" onclick="adoptNow(${pet.pet_id})" class="btn btn-info btn-sm">Adopt Now</button>
                                </div>
                            </div>
                        </div>`
                    );
                    i++;
                }
            }
        }
    });
}

    getAnimals();
    getSelectOption('Pets', 'pet_id', 'pet_name', "pet_status='P' OR pet_status='R'");

    
    function getSelectOption(class_name, primary_id, label, param = '', attributes = [], pre_value='', pre_label = 'Please Select') {
      $.ajax({
        type: "POST",
        url: "admin/controllers/sql.php?c=" + class_name + "&q=show2",
        data: {
          input: {
            param: param
          }
        },
        success: function(data) {
          var json = JSON.parse(data);
          $("." + primary_id).html("<option value='" + pre_value + "'> &mdash; " + pre_label + " &mdash; </option>");
          for (list_index = 0; list_index < json.data.length; list_index++) {
            const list = json.data[list_index];
            var data_attributes = {};
            data_attributes['value'] = list[primary_id];
            for (var attr_index in attributes) {
              const attr = attributes[attr_index];
              data_attributes[attr] = list[attr];
            }
            $('.' + primary_id).append($("<option></option>").attr(data_attributes).text(list[label]));
          }
        }
      });
    }
</script>