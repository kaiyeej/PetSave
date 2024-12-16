<form method='POST' id='frm_submit'>
    <div class="modal fade" id="modalEntry" class="modal fade bs-example-modal-md" role="dialog">
        <div class="modal-dialog modal-lg" style="margin-top: 50px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon-edit'></i> ADOPTION APPLICATION </h4>
                    <button type="button" id="btn_approve" class="btn btn-light-success font-weight-bold" onclick="approveNow()" data-dismiss="modal"><i class="flaticon2-check-mark"></i> Approve</button>
                </div>
                <div class="modal-body" id="div_adopt">
                    <div class="container-fluid">
                        <div class="row">
                            <input type="hidden" id="hidden_id" name="input[adoption_id]">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pet <span class="text-danger">*</span></label>
                                    <select class="form-control input-item select2" readonly name="input[pet_id]" id="pet_id" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>DATE OF APPLICATION <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control input-item" name="input[application_date]" id="application_date" autocomplete="off" placeholder="Document name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <p style="font-size: 12px;">In an effort to help the process go smoothly, please be as detailed as possible with your responses. Thank you!</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr style="margin-top: 0rem;margin-bottom: 1rem;border-top: 1px solid #ff5722;">
                                <h5>PERSONAL INFO</h5>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Complete Name <span class="text-danger">*</span></label>
                                    <select class="form-control input-item select2" readonly name="input[user_id]" id="user_id" required>
                                    </select>
                                    <!-- <input type="text" class="form-control input-item" name="input[fullname]" id="fullname" autocomplete="off" placeholder="Full name" required> -->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Occupation/Source of Income: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[user_occupation]" id="user_occupation" autocomplete="off" placeholder="age" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact #: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[user_contact_num]" id="user_contact_num" autocomplete="off" placeholder="Contact number" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Home Address: <span class="text-danger"></span></label>
                                    <textarea class="form-control input-item" name="input[user_home_address]" id="user_home_address" autocomplete="off" placeholder="Home Address" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email Address: <span class="text-danger"></span></label>
                                    <input type="email" class="form-control input-item" name="input[user_email]" id="user_email" autocomplete="off" placeholder="User email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>FB/Twittter/IG <span class="text-danger"></span></label>
                                    <input type="text" class="form-control input-item" name="input[user_social_media]" id="user_social_media" autocomplete="off" placeholder="Social media account">
                                </div>
                            </div>
<!-- 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[contact_num]" id="contact_num" autocomplete="off" placeholder="Contact number" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control input-item" name="input[email_adderess]" id="email_adderess" autocomplete="off" placeholder="Email address">
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Spouse / Significant Other: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[user_spouse]" id="user_spouse" autocomplete="off" placeholder="Spouse" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Civil Status <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[user_civil_status]" id="user_civil_status" required>
                                        <option value="">Please Select</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>

                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <hr style="margin-top: 0rem;margin-bottom: 1rem;border-top: 1px solid #ff5722;">
                                <h5>About Your Household</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Who will be responsible for the pet's care (the primary caretaker)? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q1]" id="a_q1" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Do you have children at home? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q2]" id="a_q2" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Has anyone in your household experienced allergies or asthma? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q3]" id="a_q3" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>What kind of home do you live in?<span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q4]" id="a_q4" required>
                                        <option value="House">House</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Studio">Studio</option>
                                        <option value="Condo">Condo</option>
                                        <option value="Townhouse">Townhouse</option>
                                        <option value="Duplex">Duplex</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Do you rent or own your home? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q5]" id="a_q5" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Do you have any of the following? (Check all that apply) <span class="text-danger">*</span></label>
                                    <select class="form-control select2 input-item" multiple="" name="input[a_q6]" id="a_q6" required>
                                        <option value="Patio">Patio</option>
                                        <option value="Balcony">Balcony</option>
                                        <option value="Pet Door">Pet Door</option>
                                        <option value="Screened Windows">Screened Windows</option>
                                        <option value="Screened Doors">Screened Doors</option>
                                        <option value="Backyard">Backyard</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Why are you looking to adopt a pet? Check all that apply. <span class="text-danger">*</span></label>
                                    <select class="form-control select2 input-item" multiple="" name="input[a_q7]" id="a_q7" required>
                                        <!-- <option value="">Please Select</option> -->
                                        <option value="Companion">Companion</option>
                                        <option value="As a gift">As a gift</option>
                                        <option value="Pet door">Pet door</option>
                                        <option value="Replace lost/deceased pet">Replace lost/deceased pet</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Why are you looking to adopt a pet?<span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q8]" id="a_q8" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Are you prepared to care for this pet for 15-20 years? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q9]" id="a_q9" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <hr style="margin-top: 0rem;margin-bottom: 1rem;border-top: 1px solid #ff5722;">
                                <h5>Pet Care</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>How many hours a day will your pet be left alone? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q10]" id="a_q10" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Where will your new pet be left when alone? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q11]" id="a_q11" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Is this your first pet? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q12]" id="a_q12" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Do you currently have any other pets? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q13]" id="a_q13" required>
                                        <option value="">Please Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Do you plan to declaw your new cat? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q14]" id="a_q14" required>
                                        <option value="">Please Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="Unsure">Unsure</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Do you plan to spay/neuter your pet? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q15]" id="a_q15" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="Unsure">Unsure</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Is there a pet behavior that would not be acceptable to you? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q16]" id="a_q16" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Adopted From:</label>
                                    <select class="form-control input-item" name="input[adopted_from]" id="adopted_from" required>
                                        <option value="Yes">BACH Project PH</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <hr style="margin-top: 0rem;margin-bottom: 1rem;border-top: 1px solid #ff5722;">
                                <h5>Current Veterinarian</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Complete Name:</label>
                                    <input type="text" class="form-control input-item" name="input[veterinarian_name]" id="veterinarian_name" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact No.:</label>
                                    <input type="text" class="form-control input-item" name="input[veterinarian_number]" id="veterinarian_number" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Clinic Name:</label>
                                    <input type="text" class="form-control input-item" name="input[veterinarian_clinic]" id="veterinarian_clinic" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" class="form-control input-item" name="input[veterinarian_address]" id="veterinarian_address" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_close" class="btn btn-light-danger font-weight-bold" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    <button type="submit" id="btn_submit" class="btn btn-primary font-weight-bold"><i class="flaticon2-check-mark"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>