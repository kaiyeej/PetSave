<div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>Animals</h3>
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
                    <h3>Animal Rescued</h3>
                </div>
            </div>
        </div>
        <div  id="canvas_animals" class="row justify-content-center">
            
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

    function getAnimals() {
        var q = "availableAnimals";
        $.ajax({
            type: 'POST',
            url:  "admin/controllers/sql.php?c=Animals&q=" + q,
            data:{

            },
            success: function(data) {
                var json = JSON.parse(data);
                var arr_count = json.data.length;
                var i = 0;
                if(arr_count <= 0){
                    $("#canvas_animals").html('<div class="col-md-12">' +'<center> No data available</center>' +'</div>');
                }else{
                    while (i < arr_count) {
                        console.log(json.data[i]);
                        $("#canvas_animals").append(
                            '<div class="col-lg-4 col-md-6">'+
                                '<div class="single_service">'+
                                   '<div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">'+
                                        '<div class="service_icon">'+
                                            '<img style="max-width: 300px;max-height: 220px;" src="admin/assets/file/' + json.data[i].animal_image + '" alt="">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="service_content text-center">'+
                                        '<h3>' + json.data[i].animal_name + '</h3>'+
                                        '<p>' + json.data[i].animal_description + '</p>'+
                                    '</div>'+
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