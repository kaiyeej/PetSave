<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider slider_bg_1 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="slider_text">
                        <h3><span>PetSave</span></h3>
                        <p>Our mission is to rescue dogs and cats that have been abandoned, abused, or neglected throughout the Philippines and to make sure that each animal is given "Life with a New Leash"</p>
                        <a href="about-us" class="boxed-btn4">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dog_thumb d-none d-lg-block">
            <img src="img/banner/stray_dogs.png" style="max-width: 75%;" alt="">
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- pet_care_area_start  -->
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
                        <h3><span>You're making a difference in the life of an animal in need.</h3>
                        <p></p>
                        <a href="about-us" class="boxed-btn3">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pet_care_area_end  -->

<div class="contact_anipat anipat_bg_1" style="display: none;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact_text text-center">
                    <div class="section_title text-center">
                        <h3>Why go with PetSave?</h3>
                        <p style="margin-bottom: 15px;font-size: 20px;"> An innovative online community that connects animal lovers with the Philippines' animal shelters supports the nation's animal shelters, safe animal adoption, and pet rescue.</p>
                        <p style="margin-bottom: 15px;font-size: 20px;">Animals can now find their FUR-EVER home on a new digital platform</p>
                    </div>
                    <div class="contact_btn d-flex align-items-center justify-content-center">
                        <a onclick="registerNow()"  data-toggle="modal" data-backdrop="false" data-target="#" href="#modalEntry" class="boxed-btn4">Register Your Shelter Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'modal_register.php'; ?>
<!-- adapt_area_start  -->
<div class="adapt_area">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="adapt_help">
                    <div class="section_title">
                        <h3><span>We need your</span>
                            help Adopt Us</h3>
                        <p>Start the process of finding a loving home for a homeless animal by adopting a pet. There are many dogs and cats out for adoption across the country, and they are eager to find their forever homes and families. Use our convenient pet adoption tool to look for cats and dogs that are available from shelters in your area.</p>
                        <a href="about-us" class="boxed-btn3">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="adapt_about">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="single_adapt text-center">
                                <img src="img/adapt_icon/1.png" alt="">
                                <div class="adapt_content">
                                    <h3 class="summary-label" id="total_animals_label"></h3>
                                    <p>Animals Available</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_adapt text-center">
                                <img src="img/adapt_icon/3.png" alt="">
                                <div class="adapt_content">
                                    <h3><span class="summary-label" id="total_lost_found_label"></span>+</h3>
                                    <p>Lost and Found</p>
                                </div>
                            </div>
                            <div class="single_adapt text-center">
                                <img src="img/adapt_icon/2.png" alt="">
                                <div class="adapt_content">
                                    <h3><span class="summary-label" id="total_adopted_label"></h3>
                                    <p>Adopted animals</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- adapt_area_end  -->
<script type="text/javascript">
    $(document).ready(function() {
        getSummary();
    });

    function getSummary() {
      $.ajax({
        url: "admin/controllers/sql.php?c=Homepage&q=view",
        success: function(data) {
            var jsonParse = JSON.parse(data);
            const json = jsonParse.data;

            $('.summary-label').map(function() {
                const id_name = this.id;
                const new_id = id_name.replace('_label', '');
                this.innerHTML = json[new_id];
            });
        }
      });
    }

    function registerNow(){
        $("#modalEntry").prependTo("body");
        $("#frm_submit").removeClass("required");
    }

    $("#frm_submit").submit(function(e) {
      e.preventDefault();
      $("#btn_submit").prop('disabled', true);
      $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

      $.ajax({
        type: "POST",
        url: "admin/controllers/sql.php?c=Shelters&q=add",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          var json = JSON.parse(data);
            if (json.data > 0) {
                $("#modalEntry").modal('hide');
                success_add();
            } else if (json.data == -2) {
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