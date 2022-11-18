<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
      <!--begin::Education-->
      <div class="d-flex flex-column flex-md-row">
        <!--begin::Aside-->
        <div class="flex-md-row-auto w-md-275px w-xl-325px">
          <!--begin::Nav Panel Widget 3-->
          <div class="card card-custom gutter-b">
            <!--begin::Body-->
            <div class="card-body">
              <!--begin::Wrapper-->
              <div class="d-flex justify-content-between flex-column h-100">
                <!--begin::Container-->
                <div class="h-100">
                  <!--begin::Header-->
                  <div class="d-flex flex-column flex-center">
                    <!--begin::Title-->
                    <a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1" id="span_fullname"></a>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <div class="font-weight-bold text-dark-50 font-size-sm pb-7"><span id="span_shelter_name"></span></div>
                    <!--end::Text-->
                  </div>
                  <!--end::Header-->

                </div>
              </div>
              <!--end::Wrapper-->
            </div>
            <!--end::Body-->
          </div>
          <!--end::Nav Panel Widget 3-->

          <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Post</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
              </h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Container-->
              <div id="canvas_own_post" style="overflow: hidden;overflow: auto;max-height: 500px;">
                    
              </div>
              <!--end::Container-->
            </div>
                <!--end::Body-->
          </div>
        </div>
        <!--end::Aside-->

        <!--begin::Content-->
        <div class="flex-md-row-fluid ml-md-6 ml-lg-8">
          <div class="row">
            <div class="col-xxl-6">
              <!--begin::Forms Widget 2-->
              <div class="card card-custom gutter-b">
                <!--begin::Body-->
                <div class="card-body">
                  <!--begin::Top-->
                  <div class="d-flex align-items-center">
                      <!--begin::Symbol-->
                      <div class="symbol symbol-40 symbol-light-success mr-5">
                          <span class="symbol-label">
                            <i class="flaticon-user" style="font-size: 2.25rem;"></i>
                          </span>
                      </div>
                      <!--end::Symbol-->

                      <!--begin::Description-->
                      <span class="text-muted font-weight-bold font-size-lg">What’s on your mind, <span id="span_username"></span>?</span>
                      <!--end::Description-->
                  </div>
                  <!--end::Top-->

                  <!--begin::Form-->
                  <form id="frm_post" class="pt-10 ql-quil ql-quil-plain">
                      <!--begin::Editor-->
                      <div class="form-group mb-6">
                          <input type="text" class="form-control border-0 form-control-solid pl-6 min-h-50px font-size-lg font-weight-bolder" autocomplete="off" name="input[post_title]" placeholder="Title" required>
                      </div>
                      <div id="kt_forms_widget_2_editor" class="ql-container ql-snow">
                          <textarea class="form-control border-0 form-control-solid pl-6 font-size-lg font-weight-bolder min-h-130px" autocomplete="off" rows="4" placeholder="Content here" id="kt_forms_widget_7_input"  name="input[post_content]" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 130px;" required></textarea>
                      </div>
                      <!--end::Editor-->

                      <div class="border-top my-5"></div>

                      <!--begin::Toolbar-->
                      <div id="kt_forms_widget_2_editor_toolbar" class="ql-toolbar d-flex align-items-center justify-content-between ql-snow">
                          <div class="mr-2">
                          </div>
                          <div class="mr-2">
                              <button type="submit" id="btn_submit" class="btn btn-icon btn-sm btn-hover-icon-primary">
                                  <i class="flaticon2-paper-plane"></i>
                              </button>
                          </div>
                      </div>
                  </form>
                  <!--end::Form-->
              </div>
                <!--end::Body-->
              </div>
              <!--end::Forms Widget 2-->

              <!--begin::Forms Widget 3-->
              <div id="canvas_other_post">
              </div>
              <!--end::Forms Widget 3-->

            </div>
          </div>
        </div>
        <!--end::Content-->
      </div>
      <!--end::Education-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
<?php include "modal_post.php"; ?>
<script type="text/javascript">
  <?php
  echo "var user_profile = " . $user_profile . ";\n";
  echo "var shelter_profile = " . $shelter_profile . ";\n";
  ?>
  $("#span_fullname").html(user_profile.user_fullname);
  $("#span_shelter_name").html(shelter_profile.shelter_name);
  $("#span_username").html(user_profile.username);

  $("#frm_post").submit(function(e) {
    e.preventDefault();

    $("#btn_submit").prop('disabled', true);
    $("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span>");

    $.ajax({
      type: "POST",
      url: "controllers/sql.php?c=" + route_settings.class_name + "&q=add",
      data: $("#frm_post").serialize(),
      success: function(data) {
        var json = JSON.parse(data);
        if (json.data == 1) {
          swal({
              title: "Success!",
              text: "Successfully added post!",
              type: "success"
          },function(isConfirm){
            window.location.reload();
          });
        } else if (json.data == 2) {
          entry_already_exists();
        } else {
          failed_query(json);
        }

        $("#btn_submit").prop('disabled', false);
        $("#btn_submit").html("<span class='flaticon2-paper-plane'></span>");
      }
    });
  });

  $("#frm_update_post").submit(function(e) {
    e.preventDefault();

    $("#btn_update").prop('disabled', true);

    $.ajax({
      type: "POST",
      url: "controllers/sql.php?c=" + route_settings.class_name + "&q=edit",
      data: $("#frm_update_post").serialize(),
      success: function(data) {
        var json = JSON.parse(data);
        if (json.data == 1) {
          success_update();
          $("#modalEntry").modal("hide");
          getOwnPost();
        } else if (json.data == 2) {
          entry_already_exists();
        } else {
          failed_query(json);
        }

        $("#btn_update").prop('disabled', false);
      }
    });
  });

  function getOwnPost(){
    $("#canvas_own_post").html("");
    $.ajax({
        type: 'POST',
        url:  "controllers/sql.php?c=Post&q=getOwnPost",
        data: {
          
        },
        success: function(data) {
            console.log(data);
            var json = JSON.parse(data);
            var arr_count = json.data.length;
            var i = 0;
            while (i < arr_count) {

                    $("#canvas_own_post").append('<div class="d-flex align-items-center mb-8">'+
                        '<div class="d-flex flex-column">'+
                            '<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">'+json.data[i].post_title+'</a>'+
                            '<span class="text-muted font-weight-bold font-size-sm pb-4">'+
                                ''+json.data[i].post_content+'<br>'+
                                ''+json.data[i].post_date+''+
                            '</span>'+
                            '<div><button type="button" onclick="getEntryDetails('+json.data[i].post_id+')" class="btn btn-warning font-weight-bolder font-size-sm py-2">Update</button></div>'+
                        '</div>'+
                        '</div>');
                i++;
            }

            if(arr_count <= 0){
                $("#canvas_own_post").html('<div class="col-xl-12"><div class="card card-custom gutter-b card-stretch"><div class="card-header border-0"><div class="card-body"><h6 style="color: #9e9e9e;">No subject found.</h6></div></div></div></div>');
            }

        }
    });
  }

  function getOtherPost(){
    $("#canvas_other_post").html("");
    $.ajax({
        type: 'POST',
        url:  "controllers/sql.php?c=Post&q=getOtherPost",
        data: {
          
        },
        success: function(data) {
            console.log(data);
            var json = JSON.parse(data);
            var arr_count = json.data.length;
            var i = 0;
            while (i < arr_count) {
                $("#canvas_other_post").append(
                '<div class="card card-custom gutter-b" style="margin-bottom: 10px;">'+
                  '<div class="card-body">'+
                    '<div class="d-flex align-items-center">'+
                      '<div class="symbol symbol-40 symbol-light-danger mr-5">'+
                            '<span class="symbol-label">'+
                              '<i class="flaticon2-user" style="font-size: 2.25rem;"></i>'+
                            '</span>'+
                          '</div>'+
                          '<div class="d-flex flex-column flex-grow-1">'+
                            '<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">'+json.data[i].fullname+'</a>'+
                            '<span class="text-muted font-weight-bold">'+json.data[i].fullname+' | '+json.data[i].post_date+
                          '</div>'+
                        '</div>'+
                        '<div class="pt-5">'+
                          '<p class="text-dark-75 font-size-lg font-weight-bold  mb-2">'+json.data[i].post_title+'</p>'+
                          '<p class="text-dark-75 font-size-lg font-weight-normal  mb-2">'+json.data[i].post_content+'</p>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<div class="separator separator-solid mt-2 mb-4"></div>');
                i++;
            }

            if(arr_count <= 0){
                $("#canvas_own_post").html('<div class="col-xl-12"><div class="card card-custom gutter-b card-stretch"><div class="card-header border-0"><div class="card-body"><h6 style="color: #9e9e9e;">No subject found.</h6></div></div></div></div>');
            }

        }
    });
  }

  getOtherPost();
  getOwnPost();
</script>