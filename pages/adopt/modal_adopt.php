
<div class="modal fade" id="modalEntry" class="modal fade bs-example-modal-md" role="dialog">
    <div class="modal-dialog modal-lg" style="margin-top: 50px;border: 2px dashed #ff9800;" role="document">
        <form method='POST' id='frm_submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalLabel"><i class='flaticon-edit'></i> ADOPTION APPLICATION </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                        <input type="hidden" id="hidden_id" name="input[adoption_id]">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Animal <span class="text-danger">*</span></label>
                                    <select style="pointer-events: none;" class="form-control input-item pet_id" readonly name="input[pet_id]" id="pet_id" required>
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[fullname]" id="fullname" autocomplete="off" placeholder="Full name" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Age <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control input-item" name="input[age]" id="age" autocomplete="off" placeholder="age" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>FB/Twittter/IG <span class="text-danger"></span></label>
                                    <input type="text" class="form-control input-item" name="input[social_media_account]" id="social_media_account" autocomplete="off" placeholder="Social media account">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address <span class="text-danger"></span></label>
                                    <textarea class="form-control input-item" name="input[address]" id="address" autocomplete="off" placeholder="Address" required></textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[contact_num]" id="contact_num" autocomplete="off" placeholder="Contact number" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control input-item" name="input[email_address]" id="email_address" autocomplete="off" placeholder="Email address" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Occupation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[occupation]" id="occupation" autocomplete="off" placeholder="Occupation" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Civil Status <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[civil_status]" id="civil_status" required>
                                        <option value="">Please Select</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>

                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alternate Contact</label>
                                    <input type="text" class="form-control input-item" name="input[alternate_contact]" id="alternate_contact" autocomplete="off" placeholder="Alternate Contact">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Relationship</label>
                                    <input type="text" class="form-control input-item" name="input[relationship]" id="relationship" autocomplete="off" placeholder="Relationship">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control input-item" name="input[guardian_contact_num]" id="guardian_contact_num" autocomplete="off" placeholder="Contact number">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <p style="font-size: 12px;">*If the applicant is a minor, a parent or guardian must be the alternate contact and co-sign the application.</p>
                            </div>
                        </div>
                            

                        <div class="row">
                            <div class="col-sm-12">
                                <hr style="margin-top: 0rem;margin-bottom: 1rem;border-top: 1px solid #ff5722;">
                                <h5>QUESTIONNAIRE</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>1. What prompted you to adopt from PetSave? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q1]" id="a_q1" required>
                                        <option value="">Please Select</option>
                                        <option value="Friends">Friends</option>
                                        <option value="Website">Website</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="Other">Other</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>2. What are you looking to adopt? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q2]" id="a_q2" required>
                                        <option value="">Please Select</option>
                                        <option value="Cat">Cat</option>
                                        <option value="Dog">Dog</option>
                                        <option value="Other">Other</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>3. Have you adopted from PetSave before? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q3]" id="a_q3" autocomplete="off" placeholder="Yes or No" require>
                                    <p style="font-size:12px;">If yes, when?</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>4. Do you know the name of the animal you want to adopt? You may list up to 3 <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q4]" id="a_q4" autocomplete="off">
                                </div>
                            </div>  
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>5. Describe your ideal pet, including its sex, age, appearance, temperament, etc <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q5]" id="a_q5" autocomplete="off">
                                </div>
                            </div> 
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>6. For whom are you adopting a pet? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q6]" id="a_q6" required>
                                        <option value="">Please Select</option>
                                        <option value="For myself">For myself</option>
                                        <option value="For someone else">For someone else (as a gift)</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>7. Are there children (below 18) in the house? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q7]" id="a_q7" autocomplete="off">
                                    <p style="font-size:12px;">If yes, how old are they?</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>8. Do you have other pets? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q8]" id="a_q8" required>
                                        <option value="">Please Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>9. Have you had pets in the past? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q9]" id="a_q9" required>
                                        <option value="">Please Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>10. Who else do you live with? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q10]" id="a_q10" required>
                                        <option value="">Please Select</option>
                                        <option value="Spouse">Spouse</option>
                                        <option value="Parents">Parents</option>
                                        <option value="Roommates">Roommates</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>11. Are any members of your household allergic to animals? If yes, how will it be managed? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q11]" id="a_q11" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>12.	Who will be responsible for feeding, grooming, and generally caring for your pet? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q12]" id="a_q12" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>13.	Who will be financially responsible for your pet’s needs (i.e. food, vet bills, etc.)?   <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q13]" id="a_q13" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>14. Who will look after your pet if you go on vacation or in case of emergency?  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q14]" id="a_q14" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>15. How many hours in an average workday will your pet be left alone? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q15]" id="a_q15" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>16. Does everyone in the family support your decision to adopt a pet? Please explain: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q16]" id="a_q16" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>17.	What steps will you take to familiarize your new pet with his/her new surroundings? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q17]" id="a_q17" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>18.	What type of building do you live in? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q18]" id="a_q18" required>
                                        <option value="">Please Select</option>
                                        <option value="House">House</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Condo">Condo</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>19. Do you rent? If yes, how long have you lived there?  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q19]" id="a_q19" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>20.	What happens to your pet if or when you move? <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-item" name="input[a_q20]" id="a_q20" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>21.	If renting or living in a shared building, can you provide a copy of your building's pet policy? <span class="text-danger">*</span></label>
                                    <select class="form-control input-item" name="input[a_q21]" id="a_q21" required>
                                        <option value="">Please Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-check">
                                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required required>
                                <label class="form-check-label" for="invalidCheck3">
                                    I have read and agree to the <a href="#" onclick="showTC()">Terms and Condition</a>
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_add"  data-dismiss="modal" class="genric-btn primary-border circle arrow">Cancel</button>
                    <button type="submit" id="btn_submit" class="genric-btn success circle"> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
