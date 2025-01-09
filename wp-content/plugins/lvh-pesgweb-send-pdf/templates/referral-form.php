<?php
include_once BASE_DIR . '/templates/ajax-referral-form.php';
//ob_start();

?>

<main class="container">
        <div class="alert alert-success" id="success_submitt">Referral submitted successfully</div>
        <div class="alert alert-danger" id="error_submitt">Please complete Submitter data</div>
         <p class="api-error"></p>
           <!--   <form  id="form-upload" class="px-form" action="" enctype="multipart/form-data" method="post">
         <form name="referralform" id="referralform" class="px-form" action="" method="post">
           <form action="" enctype="multipart/form-data" method="post" id="form-upload">-->
           <form name="referralform" id="referralform" class="px-form" action="" method="post">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Submitter
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ">
                                <!-- #########  Submitter ########### -->
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input required type="text" class="form-control" name="company_name" id="company_name"  placeholder="Company Name *" size="20" >
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input required type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name *">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input required type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name *">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with33 pb-3">
                                        <input required type="tel" class="form-control" name="main_phone" id="main_phone" placeholder="Main Phone *">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="ext" id="ext" placeholder="Ext.">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input required type="email" class="form-control" name="email_address" id="email_address" placeholder="email *">
                                    </div>
                                </div>
                                <!-- <div class="col-auto">
                                    <button type="submit" id="submitter_button" class="mb-3 custom-btn">continue</button>
                                </div> -->
        
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Claimant
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <!-- #########  Claimant ########### -->
                                <div class="form-group pb-3">
                                    <label>Request:</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_pt" id="request_pt" value="pt">PT</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_ot" id="request_ot" value="ot">OT</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_wh" id="request_wh" value="wh">WH</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_fce" id="request_fce" value="fce">FCE</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_aqua" id="request_aqua" value="aqua">AQUA</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_vestibular" id="request_vestibular" value="vestibular">VESTIBULAR</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_transport" id="request_transport" value="transport">TRANSPORT</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_mri" id="request_mri" value="mri">MRI</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_arth" id="request_arth" value="arth">ARTH</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_ct" id="request_ct" value="ct">CT</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_xr" id="request_xr" value="xr">XR</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_us" id="request_us" value="us">US</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_emg" id="request_emg" value="emg">EMG</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_nuc_med" id="request_nuc_med" value="nuc.med.">NUC.MED.</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="request_dme" id="request_dme" value="dme">DME</label>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input required type="text" class="form-control" name="claimant_first_name" id="claimant_first_name" placeholder="First Name">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input required type="text" class="form-control" name="claimant_last_name" id="claimant_last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="row align-Bottom">
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="claimant_claimant_number" id="claimant_claimant_number" placeholder="Claimant Number">
                                    </div>
                                    <div class="with33 pb-3">
                                        <label style="display:inline">Date of Injury </label>
                                        <input required type="date" class="form-control"  name="claimant_date_of_injury" id="claimant_date_of_injury" >
                                    </div>
                                    
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="claimant_icd_code" id="claimant_icd_code" placeholder="ICD Code">
                                    </div>
                                </div>
                                <div class="pb-3">
                                    <input type="text" class="form-control" name="claimant_describe" id="claimant_describe" placeholder="Describe Injury">
                                </div>
                                <div class="form-group">
                                    <label>Working?</label>
                                    <label class="checkbox-inline">
                                        <input name="working" type="radio" name="claimant_working_yes" id="claimant_working_yes" value="1">
                                        Yes
                                    </label>
                                    <label class="checkbox-inline">
                                        <input name="working" type="radio" name="claimant_working_no" id="claimant_working_no" value="0">
                                        No
                                    </label>
                                    <input type="text" class="form-control with50"  name="claimant_occupation" id="claimant_occupation" 
                                        placeholder="Occupation">
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label><input required type="date" class="form-control"
                                                name="claimant_date_of_birth" id="claimant_date_of_birth" >
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="form-group ">
                                            <label>Gender</label>
                                            <div class="flex">
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="claimant_gender_male" value="1">Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender"  id="claimant_gender_female" value="0">Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="with25 pb-3">
                                        <input required type="text" class="form-control" name="claimant_home_phone" id="claimant_home_phone" placeholder="Home Phone">
                                    </div>
                                    <div class="with25 pb-3">
                                        <input type="text" class="form-control" name="claimant_cell_phone" id="claimant_cell_phone" placeholder="Cell Phone">
                                    </div>
                                    <div class="with25 pb-3">
                                        <input type="text" class="form-control" name="claimant_work_phone" id="claimant_work_phone" placeholder="Work Phone">
                                    </div>
                                    <div class="with25 pb-3">
                                        <input type="text" class="form-control" name="claimant_ext" id="claimant_ext" placeholder="Ext.">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with25 pb-3">
                                        <input type="text" class="form-control" name="claimant_alternate_phone" id="claimant_alternate_phone" placeholder="Alternate Phone">
                                    </div>
                                    <div class="with25 pb-3">
                                        <input type="text" class="form-control" name="claimant_alt_phone_description" id="claimant_alt_phone_description" placeholder="Alt. Phone Description">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input type="emial" class="form-control" name="claimant_email_adress" id="claimant_email_adress" placeholder="Email Adress">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input required type="text" class="form-control" name="claimant_address_1" id="claimant_address_1" placeholder="Address 1">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="claimant_address_2" id="claimant_address_2" placeholder="Address 2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with33 pb-3">
                                        <input required type="text" class="form-control" name="claimant_city" id="claimant_city" placeholder="City">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input required type="text" class="form-control" name="claimant_state" id="claimant_state" placeholder="State">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input required type="text" class="form-control" name="claimant_zip" id="claimant_zip" placeholder="Zip">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="claimant_preferred_language" id="claimant_preferred_language" placeholder="Preferred Language">
                                    </div>
        
                                </div>
                                <!-- <div class="col-auto">
                                    <button type="submit" id="claimant_button" class="mb-3 custom-btn">continue</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Employee
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="employee_company" id="employee_company" placeholder="Company">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="employee_phone_number" id="employee_phone_number" placeholder="Phone number">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="employee_contact" id="employee_contact" placeholder="Contact">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="employee_address1" id="employee_address1" placeholder="Address 1">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="employee_address2" id="employee_address2" placeholder="Address 2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="employee_city" id="employee_city" placeholder="City">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="employee_state" id="employee_state" placeholder="State">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="employee_zip" id="employee_zip" placeholder="Zip">
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="width50">
                                        <label>If PT - Schedule during work
                                            hours?</label>
                                        <label class="checkbox-inline"><input name="employee_working_hours" id="employee_working_hours_yes" type="radio" value="1">
                                            Yes</label>
                                        <label class="checkbox-inline"><input name="employee_working_hours" id="employee_working_hours_no" type="radio" value="0">
                                            No</label>
                                    </div>
                                    <div class="row pb-3 pt-1">
                                        <div class="with33 ">
                                            <label style="display:inline">What hours does patient work?</label>
                                            <input type="text" class="form-control" name="date_of_injury" name="employee_date_of_injury" id="employee_date_of_injury" required>
                                        </div>
                                    </div>
                                </div>
        
                                <!-- <div class="col-auto">
                                    <button type="submit" id="employee__button" class="mb-3 custom-btn">continue</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
        
                    <!-- ####### Referring Doctor ######## -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                Referring Doctor
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
        
        
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input required type="text" class="form-control" name="ref_doctor_first_name" id="ref_doctor_first_name" placeholder="First Name">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input required type="text" class="form-control" name="ref_doctor_last_name" id="ref_doctor_last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_practice_name" id="ref_doctor_practice_name" placeholder="Practice Name">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_phone_number" id="ref_doctor_phone_number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_email_adress" id="ref_doctor_email_adress" placeholder="Email Adress">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_fax" id="ref_doctor_fax" placeholder="Fax">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_adress_1" id="ref_doctor_adress_1" placeholder="Adress 1">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_adress_2" id="ref_doctor_adress_2" placeholder="Adress 2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_city" id="ref_doctor_city" placeholder="City">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_state" id="ref_doctor_state" placeholder="State">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_zip" id="ref_doctor_zip" placeholder="Zip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Did patient have surgery?</label>
                                    <label class="checkbox-inline">
                                        <input name="patient_have_surgery_1" type="radio" id="ref_doctor_patient_have_surgery_1_yes" value="1">
                                        Yes
                                    </label>
                                    <label class="checkbox-inline">
                                        <input name="patient_have_surgery_1" type="radio" id="ref_doctor_patient_have_surgery_1_no" value="0">
                                        No
                                    </label>
                                    <div class="with33 pb-3 pt-2">
                                        <label style="display:inline">Surgery Date: </label>
                                        <input type="date" class="form-control"  name="ref_doctor_surgery_date" id="ref_doctor_surgery_date" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with50 pb-3 mt-3">
                                        <input type="text" class="form-control" name="ref_doctor_dx" id="ref_doctor_dx" placeholder="DX">
                                    </div>
                                    <div class="with50 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_body_parts" id="ref_doctor_body_parts" placeholder="Body Parts">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_auth_visits" id="ref_doctor_auth_visits" placeholder="# Auth visits">
                                    </div>
                                    <div class="with33 pb-3">
                                        <input type="text" class="form-control" name="ref_doctor_freq_duration" id="ref_doctor_freq_duration" placeholder="Freq/Duration.">
                                    </div>
                                    <div class="form-group">
                                        <label>Script:</label>
                                        <label class="checkbox-inline">
                                            <input name="script" type="radio" id="ref_doctor_script_yes" value="1">
                                            Yes
                                        </label>
                                        <label class="checkbox-inline">
                                            <input name="script" type="radio"  id="ref_doctor_script_no" value="0">
                                            No
                                        </label>
                                    </div>
                                    <div class="with33 pb-3 pt-2">
                                        <label style="display:inline">Follow-up MD: </label>
                                        <input type="date" class="form-control"  name="ref_doctor_follow_up_md" id="ref_doctor_follow_up_md" required="">
                                    </div>
                                </div>
        
                                <!-- <div class="col-auto mt-3">
                                    <button id="ref_doctor_Button" type="submit" class="mb-3 custom-btn">continue</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
        
                    <!-- ######## Attachments ####### -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                Attachments
                            </button>       
                        </h2>
                        <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">                        
                               <div> <?php //echo $rand_id_user; ?></div>

                                    <div><?php echo do_shortcode('[dcms_upload_file rand_id_user="rand_id_user"]'); ?>

                                </div>
                                <!-- <div class="col-auto pt-3">
                                    <button type="submit" class="mb-3 custom-btn" id="btnSendfile" >continue</button>
                                    
                                </div> -->
                                
                            </div>
                        </div>
                    </div>
        
                    <!-- ####### Special Instructions ######## -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingsix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                Special Instructions
                            </button>
                        </h2>
                        <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-group">
                                    <textarea class="form-control" name="special_instructions" id="special_instructions" placeholder="Special Instructions" rows="5"></textarea>
                                                </div>
                                     <!-- here-->
                                <div class="col-auto pt-3">
                                    <button type="submit" name="wp-submit" id="wp-submit"  class="mb-3 custom-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form> 
        
           <div><?//php echo $rand_id_user; ?></div>
                                  <!--[n_total color=’red’ size=’25px’]-->
                                    
            <div class="spinner-border text-info" role="status" id="cargando">
            <span class="visually-hidden">Loadging...</span>
            </div>
            </main>

 <?php 
   //$html_code = ob_get_contents();
   // ob_end_clean();
 ?>   