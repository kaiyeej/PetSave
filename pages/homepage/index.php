<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider slider_bg_1 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="slider_text">
                        <h3><span>BACH Project PH</span></h3>
                        <h4>Be Their Lifeline – Help Us Feed, Rescue, and Rehabilitate Stray Animals.</h4>
                        <p>BACH Project PH Inc. is a registered all-volunteer nonprofit based in Bacolod City, Philippines, dedicated to rescuing stray animals from suffering and neglect. Without government support, we tirelessly work to feed, rescue, and rehabilitate abandoned dogs and cats.</p>
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
                    <img src="img/bach-logo.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-6">
                <div class="pet_info">
                    <div class="section_title">
                        <h4><span>BACH Project PH is grounded in the belief that all animals deserve to be treated with compassion, respect, and care, ensuring their well-being in a safe and non-judgmental environment.</h4>
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
                        <a onclick="registerNow()" data-toggle="modal" data-backdrop="false" data-target="#" href="#modalEntry" class="boxed-btn4">Register Your Shelter Account</a>
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
                        <h3><span>Save a life,</span>
                        adopt a dog</h3>
                        <p>TO ALL dog lovers who are not lucky to have one or still have room for yet another pup, perhaps adoption would not be such a bad idea. There is no better time like the present if you are thinking about adopting a dog. Adopting one can be a very rewarding experience, plus in this case, you will be saving a life.</p>
                        <a href="about-us" class="boxed-btn3">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="adapt_about">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="single_adapt text-center">
                                <img src="img/adapt_icon/1.png" alt="">
                                <div class="adapt_content">
                                    <h3 class="summary-label" id="total_animals_label"></h3>
                                    <p>Rescued animals</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_adapt text-center">
                                <img src="img/adapt_icon/3.png" alt="">
                                <div class="adapt_content">
                                    <h3><span class="summary-label" id="total_lost_found_label"></span>+</h3>
                                    <p>Rehabilitation</p>
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
<div class="service_area" style="padding-top:106px;">
    <div class="container">
    <img src="img/banner.jpg" alt="Help Banner" style="max-width: 1200px;">
    </div>
</div>
<!-- adapt_area_end  -->
<script type="text/javascript">
    $(document).ready(function() {
        getSummary();
        getAnimals();
    });

    function getAnimals() {
        $.ajax({
            type: 'POST',
            url: "admin/controllers/sql.php?c=Homepage&q=rescueAll",
            data: {

            },
            success: function(data) {
                var json = JSON.parse(data);
                var arr_count = json.data.length;
                var i = 0;
                if (arr_count <= 0) {
                    $("#canvas_rescued").html('<div class="col-md-12">' + '<center> No data available</center>' + '</div>');
                } else {
                    while (i < arr_count) {

                        if (json.data[i].if_type == "L") {
                            var t_color = "#ff5722;";
                        } else {
                            var t_color = "green;";
                        }

                        if (json.data[i].shelter_id != 0) {
                            var r_status = "";
                        } else {
                            var r_status = "display:none;";
                        }

                        $("#canvas_rescued").append(
                            '<div class="col-lg-4 col-md-6">' +
                            '<div class="single_service">' +
                            '<div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">' +
                            '<div class="service_icon">' +
                            '<img style="max-width: 300px;max-height: 220px;" src="admin/assets/lost_found/' + json.data[i].img_file + '" alt="">' +
                            '</div>' +
                            '</div>' +
                            '<div class="service_content text-center" style="padding-top: 50px;">' +
                            '<p style="text-align: left;">Description: ' + json.data[i].description + '</p>' +
                            '<p style="text-align: left;">Location: ' + json.data[i].location + '</p>' +
                            '<p style="text-align: left;">Date Reported: ' + json.data[i].date_added + '</p>' +
                            '</div>' +
                            '<span class="badge badge-success" style="background-color: #28a745;padding: 10px;width: 100%;' + r_status + '">RESOLVED (' + json.data[i].shelter + ')</span>' +
                            '</div>' +
                            '</div>');
                        i++;
                    }
                }

            }
        });
    }

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

    function registerNow() {
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