<div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>Our Shelters</h3>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="service_area"  style="padding-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="section_title text-center mb-95">
                <p style="font-size: 20px;">Currently, local shelters and rescue organizations are working hard to care for animals in need, but you can aid. <br />Participate in a Mission that will change your life. Give the rescued the heaven they deserve.</p>
                </div>
            </div>
        </div>
        <div  id="canvas_shelters" class="row justify-content-center">
            
        </div>
    </div>
    
</div>

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

    function getShelters() {
        var q = "getShelters";
        $.ajax({
            type: 'POST',
            url:  "admin/controllers/sql.php?c=Shelters&q=" + q,
            data:{

            },
            success: function(data) {
                var json = JSON.parse(data);
                var arr_count = json.data.length;
                var i = 0;
                if(arr_count <= 0){
                    $("#canvas_shelters").html('<div class="col-md-12">' +'<center> No data available</center>' +'</div>');
                }else{
                    while (i < arr_count) {
                        console.log(json.data[i]);
                        $("#canvas_shelters").append(
                            '<div class="col-lg-12">'+
                                '<div class="section-top-border">'+
                                    '<h3 class="mb-30" style="margin-bottom: 0px;color: #ff5722;">' + json.data[i].shelter_name + '</h3>'+
                                    '<p><i class="ti-location-pin"> '+ json.data[i].shelter_address +'</i></p>'+
                                    '<div class="row">'+
                                        '<div class="col-lg-12">'+
                                            '<blockquote class="generic-blockquote" style="border-left: 2px solid #bf360c;">'
                                                 + json.data[i].shelter_remarks + 
                                            '</blockquote>'+
                                            '<a href="./shelter-details?id='+ json.data[i].shelter_id +'" class="genric-btn success circle">View more</a>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                        i++;
                    }
                }

            }
        });
    }
    getShelters();
</script>