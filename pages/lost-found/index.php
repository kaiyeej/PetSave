<div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>Lost and Found</h3>
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
                    <img src="img/about/pet_lost.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-6">
                <div class="pet_info">
                    <div class="section_title">
                        <h3><span>Would you like to </span>
                        report a lost/found pet?</h3>
                        <p>Using PetSave, users can find their missing pet or a pet that appears to be missing its owner.</p>
                        <a data-toggle="modal" data-backdrop="false"  onclick="reportNow()" data-target="#" href="#modalEntry" class="boxed-btn3">Report now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service_area" style="padding-top:106px;">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-7 col-md-10">
                <div class="section_title text-center mb-95">
                    <h3>Lost and Found</h3>
                    <p>Pet disappearance reports break our hearts, and we understand how frantic you are to find a missing member of your family. PetSave can assist those who might come across a lost pet in contacting the owner by posting a notice on our site.</p>
                </div>
            </div>
        </div>
        <div  id="canvas_lost_found" class="row justify-content-center">
            
        </div>
    </div>
</div>

<?php require_once 'modal_lost_found.php'; ?>
<script type="text/javascript">
    function reportNow(){
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
        url: "admin/controllers/sql.php?c=LostAndFound&q=" + q,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          
          var json = JSON.parse(data);
          if (json.data > 0) {
                $("#modalEntry").modal('hide');
                success_add();
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
        $.ajax({
            type: 'POST',
            url:  "admin/controllers/sql.php?c=LostAndFound&q=show",
            data:{

            },
            success: function(data) {
                var json = JSON.parse(data);
                var arr_count = json.data.length;
                var i = 0;
                if(arr_count <= 0){
                    $("#canvas_lost_found").html('<div class="col-md-12">' +'<center> No data available</center>' +'</div>');
                }else{
                    while (i < arr_count) {

                        if(json.data[i].if_type == "L"){
                            var t_color = "#ff5722;";
                        }else{
                            var t_color = "green;";
                        }

                        if(json.data[i].status == "R"){
                            var r_status = "";
                        }else{
                            var r_status = "display:none;";
                        }
                        
                        $("#canvas_lost_found").append(
                            '<div class="col-lg-4 col-md-6">'+
                                '<div class="single_service">'+
                                   '<div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">'+
                                        '<div class="service_icon">'+
                                            '<img style="max-width: 300px;max-height: 220px;" src="admin/assets/lost_found/' + json.data[i].if_animal_image + '" alt="">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="service_content text-center">'+
                                        '<h3>Name: ' + json.data[i].if_animal_name + '</h3>'+
                                        '<p style="font-weight: bold;color: '+t_color+' ">' + json.data[i].type + '</p>'+
                                        '<p style="text-align: left;">Description: ' + json.data[i].if_animal_desc + '</p>'+
                                        '<p style="text-align: left;">Last location: ' + json.data[i].if_last_location_found + '</p>'+
                                        '<p style="text-align: left;">Other remarks: ' + json.data[i].if_other_remarks + '</p>'+
                                        '<p style="text-align: left;">Date Reported: ' + json.data[i].reported_date + '</p>'+
                                    '</div>'+
                                    '<span class="badge badge-success" style="background-color: #28a745;padding: 10px;width: 100%;'+r_status+'">RESOLVED</span>'+
                               '</div>'+
                            '</div>');
                        i++;
                    }
                }

            }
        });
    }

    getAnimals();
</script>