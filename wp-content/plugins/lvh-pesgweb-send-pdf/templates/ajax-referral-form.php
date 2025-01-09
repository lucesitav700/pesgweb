<?php
//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
 
//header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
//header("Refresh:0");
$siteUrl = site_url();
global $post;
$post_slug = $post->post_name;

?>

<script>
  var id_user_ok = 'inicio';
jQuery('#submitter_button').click(function () {
    var company_name = jQuery('#company_name').val();
    var first_name = jQuery('#first_name').val();
    var last_name = jQuery('#last_name').val();
    var main_phone = jQuery('#main_phone').val();
    var email_address = jQuery('#email_address').val();
   

    const array = [
        company_name,
        first_name,
        last_name,
        main_phone,
        email_address
    ]
    const emptyItems = array.some((item) => item === '')

    if (!emptyItems) {
        $("#collapseTwo").collapse("show");
    } 

});

jQuery('#claimant_button').click(function () {
    var claimant_first_name = jQuery('#claimant_first_name').val();
    var claimant_last_name = jQuery('#claimant_last_name').val();
    var claimant_date_of_birth = jQuery('#claimant_date_of_birth').val();
    var claimant_home_phone = jQuery('#claimant_home_phone').val();
    var claimant_address_1 = jQuery('#claimant_address_1').val();
    var claimant_city = jQuery('#claimant_city').val();
    var claimant_state = jQuery('#claimant_state').val();
    var claimant_zip = jQuery('#claimant_zip').val();

    const array = [
        claimant_first_name,
        claimant_last_name,
        claimant_date_of_birth,
        claimant_home_phone,
        claimant_address_1,
        claimant_city,
        claimant_state,
        claimant_zip,
    ]
    const emptyItems = array.some((item) => item === '')

    if (!emptyItems) {
        $("#collapseThree").collapse("show");
    } 

});

jQuery('#employee__button').click(function () {
    var employee_date_of_injury = jQuery('#employee_date_of_injury').val();

    const array = [
        employee_date_of_injury,
    ]
    const emptyItems = array.some((item) => item === '')

    if (!emptyItems) {
        $("#collapsefour").collapse("show");
    } 
});

jQuery('#ref_doctor_Button').click(function () {
    var ref_doctor_first_name = jQuery('#ref_doctor_first_name').val();
    var ref_doctor_last_name = jQuery('#ref_doctor_last_name').val();
    var ref_doctor_surgery_date = jQuery('#ref_doctor_surgery_date').val();
    var ref_doctor_follow_up_md = jQuery('#ref_doctor_follow_up_md').val();

    const array = [
        ref_doctor_first_name,
        ref_doctor_last_name,
        ref_doctor_surgery_date,
        ref_doctor_follow_up_md
    ]
    const emptyItems = array.some((item) => item === '')

    if (!emptyItems) {
        $("#collapsefive").collapse("show");
    } 
});
jQuery('#btnSendfile').click(function () {
    $("#collapsesix").collapse("show");
});


    jQuery(document).ready(function() {
              
        var username = "";
        jQuery('#wp-submit').click(function() {

            //Start code added by Eleizer

            /* Validate Inputs requieremets */
                var company_name = jQuery('#company_name').val();
                var first_name = jQuery('#first_name').val();
                var last_name = jQuery('#last_name').val();
                var main_phone = jQuery('#main_phone').val();
                var email_address = jQuery('#email_address').val();
                
                
                const array = [
                    company_name,
                    first_name ,
                    last_name,
                    main_phone,
                    email_address
                ]
                const emptyItems = array.some((item) => item === '')
                
                if(emptyItems){
                    document.getElementById("error_submitt").style.display = 'block';
                    return;
                } 
                document.getElementById("error_submitt").style.display = 'none';
             /* End Validate Inputs requieremets*/

             // End code added by Eleizer


            console.log("Calling button with is =  #wp-submit:=>>");

            jQuery("#referralform").validate({
                submitHandler: function(form) {
                    
                    /***********************Array for Submitted******************************** */
                    var submitterData = {};
                   
                    // Add random id current User
                    let date = new Date();
                    let formattedDate = `${date.getFullYear()}${(date.getMonth() + 1).toString().padStart(2, '0')}${date.getDate().toString().padStart(2, '0')}`; // Ymd
                    let formattedTime = `${date.getHours().toString().padStart(2, '0')}${date.getMinutes().toString().padStart(2, '0')}${date.getSeconds().toString().padStart(2, '0')}`; // Hms
                    let randomString = Math.random().toString(36).substr(2, 4);

                    var id_generate =`${formattedDate}-${formattedTime}_${randomString}`; 
                    submitterData.rand_id_user = `${formattedDate}-${formattedTime}_${randomString}`; 
                    id_user_ok = id_generate;
                                           
                    /**************Directory name TEMMMM*********** */
                    var rand_id_user_mm = jQuery('#rand_id_user_mm').val();

                    submitterData.rand_id_user_temp = rand_id_user_mm;
                    /******************************************************** */
                    /**                  Submiter                             */
                    /******************************************************** */

                    //GET DATA FORM 
                    var company_name = jQuery('#company_name').val();
                    var first_name = jQuery('#first_name').val();
                    var last_name = jQuery('#last_name').val();
                    var main_phone = jQuery('#main_phone').val();
                    var ext = jQuery('#ext').val();
                    var fax = jQuery('#fax').val();
                    var email_address = jQuery('#email_address').val();

                    // ADD IN SUBMITTER DATA
                    submitterData.company_name = company_name;
                    submitterData.first_name = first_name;
                    submitterData.last_name = last_name;
                    submitterData.main_phone = main_phone;
                    submitterData.ext = ext;
                    submitterData.fax = fax;
                    submitterData.email_address = email_address;

                    /******************************************************** */
                    /**                  Claimant                             */
                    /******************************************************** */
                    
                    //GET DATA FORM 
                    var claimant_request = getRequestSelectedOptions();
                    var claimant_first_name = jQuery('#claimant_first_name').val();
                    var claimant_last_name = jQuery('#claimant_last_name').val();
                    var claimant_claimant_number = jQuery('#claimant_claimant_number').val();
                    var claimant_date_of_injury = jQuery('#claimant_date_of_injury').val();
                    var claimant_icd_code = jQuery('#claimant_icd_code').val();
                    var claimant_describe = jQuery('#claimant_describe').val();
                    var claimant_working = getWorkingYesNo();
                    var claimant_occupation = jQuery('#claimant_occupation').val();
                    var claimant_date_of_birth = jQuery('#claimant_date_of_birth').val();
                    var claimant_gender = getGenderMaleFemale();
                    var claimant_home_phone = jQuery('#claimant_home_phone').val();
                    var claimant_cell_phone = jQuery('#claimant_cell_phone').val();
                    var claimant_work_phone = jQuery('#claimant_work_phone').val();
                    var claimant_ext = jQuery('#claimant_ext').val();
                    var claimant_alternate_phone = jQuery('#claimant_alternate_phone').val();
                    var claimant_alt_phone_description = jQuery('#claimant_alt_phone_description').val();
                    var claimant_email_adress = jQuery('#claimant_email_adress').val();
                    var claimant_address_1 = jQuery('#claimant_address_1').val();
                    var claimant_address_2 = jQuery('#claimant_address_2').val();
                    var claimant_city = jQuery('#claimant_city').val();
                    var claimant_state = jQuery('#claimant_state').val();
                    var claimant_zip = jQuery('#claimant_zip').val();
                    var claimant_preferred_language = jQuery('#claimant_preferred_language').val();
                  
                    // ADD IN SUBMITTER DATA
                    submitterData.claimant_request = claimant_request;
                    submitterData.claimant_first_name = claimant_first_name ;
                    submitterData.claimant_last_name = claimant_last_name;
                    submitterData.claimant_claimant_number = claimant_claimant_number
                    submitterData.claimant_date_of_injury = claimant_date_of_injury;
                    submitterData.claimant_icd_code = claimant_icd_code;
                    submitterData.claimant_describe = claimant_describe;
                    submitterData.claimant_working = getWorkingYesNo();
                    submitterData.claimant_occupation = claimant_occupation;
                    submitterData.claimant_date_of_birth = claimant_date_of_birth;
                    submitterData.claimant_gender = getGenderMaleFemale();
                    submitterData.claimant_home_phone = claimant_home_phone;
                    submitterData.claimant_cell_phone = claimant_cell_phone;
                    submitterData.claimant_work_phone = claimant_work_phone;
                    submitterData.claimant_ext = claimant_ext;
                    submitterData.claimant_alternate_phone = claimant_alternate_phone;
                    submitterData.claimant_alt_phone_description = claimant_alt_phone_description;
                    submitterData.claimant_email_adress = claimant_email_adress;
                    submitterData.claimant_address_1 = claimant_address_1;
                    submitterData.claimant_address_2 = claimant_address_2;
                    submitterData.claimant_city = claimant_city;
                    submitterData.claimant_state = claimant_state;
                    submitterData.claimant_zip = claimant_zip;
                    submitterData.claimant_preferred_language = claimant_preferred_language;

                    /******************************************************** */
                    /**                  Employee                             */
                    /******************************************************** */
                    
                    //GET DATA FORM 
                    var employee_company = jQuery('#employee_company').val();
                    var employee_phone_number = jQuery('#employee_phone_number').val();
                    var employee_contact = jQuery('#employee_contact').val();
                    var employee_address1 = jQuery('#employee_address1').val();
                    var employee_address2 = jQuery('#employee_address2').val();
                    var employee_city = jQuery('#employee_city').val();
                    var employee_state = jQuery('#employee_state').val();
                    var employee_zip = jQuery('#employee_zip').val();
                    var employee_working_hours = getWorkingHours();
                    var employee_date_of_injury = jQuery('#employee_date_of_injury').val();

                    // ADD IN SUBMITTER DATA
                    submitterData.employee_company = employee_company;
                    submitterData.employee_phone_number = employee_phone_number;
                    submitterData.employee_contact = employee_contact;
                    submitterData.employee_address1 = employee_address1;
                    submitterData.employee_address2 = employee_address2;
                    submitterData.employee_city = employee_city;
                    submitterData.employee_state = employee_state;
                    submitterData.employee_zip = employee_zip;
                    submitterData.employee_working_hours = getWorkingHours();
                    submitterData.employee_date_of_injury = employee_date_of_injury;

                    /******************************************************** */
                    /**                  Referring Doctor                             */
                    /******************************************************** */
                    
                    //GET DATA FORM 
                    var ref_doctor_first_name = jQuery('#ref_doctor_first_name').val();
                    var ref_doctor_last_name = jQuery('#ref_doctor_last_name').val();
                    var ref_doctor_practice_name = jQuery('#ref_doctor_practice_name').val();
                    var ref_doctor_phone_number = jQuery('#ref_doctor_phone_number').val();
                    var ref_doctor_email_adress = jQuery('#ref_doctor_email_adress').val();
                    var ref_doctor_fax = jQuery('#ref_doctor_fax').val();
                    var ref_doctor_adress_1 = jQuery('#ref_doctor_adress_1').val();
                    var ref_doctor_adress_2 = jQuery('#ref_doctor_adress_2').val();
                    var ref_doctor_city = jQuery('#ref_doctor_city').val();
                    var ref_doctor_state = jQuery('#ref_doctor_state').val();
                    var ref_doctor_zip = jQuery('#ref_doctor_zip').val();
                    var ref_doctor_patient_have_surgery_1 = getRefDoctorPatientHaveSurgery_1();//jQuery('#').val();
                    var ref_doctor_surgery_date = jQuery('#ref_doctor_surgery_date').val();
                    var ref_doctor_dx = jQuery('#ref_doctor_dx').val();
                    var ref_doctor_body_parts = jQuery('#ref_doctor_body_parts').val();
                    var ref_doctor_auth_visits = jQuery('#ref_doctor_auth_visits').val();
                    var ref_doctor_freq_duration = jQuery('#ref_doctor_freq_duration').val();
                    var ref_doctor_script = getRefDoctorScript();
                    var ref_doctor_follow_up_md = jQuery('#ref_doctor_follow_up_md').val();
                    
                    // ADD IN SUBMITTER DATA
                    submitterData.ref_doctor_first_name = ref_doctor_first_name;
                    submitterData.ref_doctor_last_name = ref_doctor_last_name;
                    submitterData.ref_doctor_practice_name = ref_doctor_practice_name;
                    submitterData.ref_doctor_phone_number = ref_doctor_phone_number;
                    submitterData.ref_doctor_email_adress = ref_doctor_email_adress;
                    submitterData.ref_doctor_fax = ref_doctor_fax;
                    submitterData.ref_doctor_adress_1 = ref_doctor_adress_1;
                    submitterData.ref_doctor_adress_2 = ref_doctor_adress_2;
                    submitterData.ref_doctor_city = ref_doctor_city;
                    submitterData.ref_doctor_state = ref_doctor_state;
                    submitterData.ref_doctor_zip = ref_doctor_zip;
                    submitterData.ref_doctor_patient_have_surgery_1 = getRefDoctorPatientHaveSurgery_1();
                    submitterData.ref_doctor_surgery_date = ref_doctor_surgery_date;
                    submitterData.ref_doctor_dx = ref_doctor_dx;
                    submitterData.ref_doctor_body_parts = ref_doctor_body_parts;
                    submitterData.ref_doctor_auth_visits = ref_doctor_auth_visits;
                    submitterData.ref_doctor_freq_duration = ref_doctor_freq_duration;
                    submitterData.ref_doctor_script = getRefDoctorScript();
                    submitterData.ref_doctor_follow_up_md = ref_doctor_follow_up_md;


                    /******************************************************** */
                    /**                 Special Instructions                     */
                    /******************************************************** */

                    //GET DATA FORM 
                    var special_instructions = jQuery('#special_instructions').val();
                    
                    // ADD IN SUBMITTER DATA
                    submitterData.special_instructions = special_instructions;


                    /******************************************************** */
                    /**                      Attachment                       */
                    /******************************************************** */

                    //GET DATA FORM 
                    var attachments_file = jQuery('#attachments_file').val();                 


                   // var id_number_temp = 


 /***********************************************END WRITE PDF******************************************************** */

                    console.log(submitterData);

                    var apiUrl = '<?= $siteUrl ?>/wp-json/saved/data_in_server';
                    var queryString = jQuery.param(submitterData);

                     //console.log();
                    /************************************************************************************** */
                    /**                                  AJAX                                               */
                    /** CALL API: (/wp-json/saved/data_in_server) BY AJAX                                   */
                    /**                                                                                     */
                    /************************************************************************************** */
                    jQuery.ajax({
                        url: apiUrl,
                        method: "GET",
                        data: submitterData

                    }).done(function(response) {

                        //response = JSON.parse(response);
                        //console.log("Response:-->");
                        //console.log(response);
                        document.getElementById("success_submitt").style.display = 'block';
                        jQuery('#referralform').trigger("reset"); 
                        jQuery('.api-error').html('').hide();

                    }).fail(function(xhr, status, error) {

                        console.log(xhr, status, error);
                        var response = xhr.responseText;
                        var errorMessage = "Something went wrong. Please try again!";
                        jQuery('.api-error').html(errorMessage).show();

                    });
/************************************ */
                }
            });
/************************************ */
        });
    });

/************************************************************************************ */
/**                  		FUNCTION :  getRequestSelectedOptions()                   */
/**                         Element: Checkbox                                         */
/************************************************************************************ */
    function getRequestSelectedOptions() {

        var request_pt = jQuery('#request_pt').val();
        var request_ot = jQuery('#request_ot').val();
        var request_wh = jQuery('#request_wh').val();
        var request_fce = jQuery('#request_fce').val(); //request_aqua
        var request_aqua = jQuery('#request_aqua').val();
        var request_vestibular = jQuery('#request_vestibular').val();
        var request_transport = jQuery('#request_transport').val();
        var request_mri = jQuery('#request_mri').val();
        var request_arth = jQuery('#request_arth').val();
        var request_ct = jQuery('#request_ct').val();
        var request_xr = jQuery('#request_xr').val();
        var request_us = jQuery('#request_us').val();
        var request_emg = jQuery('#request_emg').val();
        var request_nuc_med = jQuery('#request_nuc_med').val();
        var request_dme = jQuery('#request_dme').val();

        var selected_options = '';

        
        if(document.getElementById('request_pt').checked) { selected_options += request_pt + ', '; }
        if(document.getElementById('request_ot').checked) { selected_options += request_ot + ', '; }
        if(document.getElementById('request_wh').checked) { selected_options += request_wh + ', '; }
        if(document.getElementById('request_fce').checked) { selected_options += request_fce + ', '; }
        if(document.getElementById('request_aqua').checked) { selected_options += request_aqua + ', '; }
        if(document.getElementById('request_vestibular').checked) { selected_options += request_vestibular + ', '; }
        if(document.getElementById('request_transport').checked) { selected_options += request_transport + ', '; }
        if(document.getElementById('request_mri').checked) { selected_options += request_mri + ', '; }
        if(document.getElementById('request_arth').checked) { selected_options += request_arth + ', '; }
        if(document.getElementById('request_ct').checked) { selected_options += request_ct + ', '; }
        if(document.getElementById('request_xr').checked) { selected_options += request_xr + ', '; }
        if(document.getElementById('request_us').checked) { selected_options += request_us + ', '; }
        if(document.getElementById('request_emg').checked) { selected_options += request_emg + ', '; }
        if(document.getElementById('request_nuc_med').checked) { selected_options += request_nuc_med + ', '; }
        if(document.getElementById('request_dme').checked) { selected_options += request_dme + ', '; }

        let  selected_options_ok =  selected_options.substring(0, selected_options.length - 2);
        return selected_options_ok;
    }

/************************************************************************************ */
/**                  		FUNCTION :  getWorkingYesNo()                             */
/**                         ELEMENT: Radio Button                                     */
/************************************************************************************ */
    function getWorkingYesNo(){

        var yes = jQuery('#claimant_working_yes').val();
        var no = jQuery('#claimant_working_no').val();
        var working ='';
        if(document.getElementById('claimant_working_yes').checked) { working = 'yes'; }
        if(document.getElementById('claimant_working_no').checked) { working = 'no'; }

        return working;
    }

/************************************************************************************ */
/**                  		FUNCTION :  getGenderMaleFemale()                         */
/**                         ELEMENT: Radio Button                                     */
/************************************************************************************ */
    function getGenderMaleFemale(){

        var female = jQuery('#claimant_gender_female').val();
        var male = jQuery('#claimant_gender_male').val();
        var gender = '';
        if(document.getElementById('claimant_gender_male').checked) { gender = 'Male'; }
        if(document.getElementById('claimant_gender_female').checked) { gender = 'Female'; }

        return gender;
    }

/************************************************************************************ */
/**                  		FUNCTION :  getWorkingHours()                             */
/**                         ELEMENT: Radio Button                                     */
/************************************************************************************ */
    function getWorkingHours(){
        var yes = jQuery('#employee_working_hours_yes').val();
        var no = jQuery('#employee_working_hours_no').val();
        var working ='';
        if(document.getElementById('employee_working_hours_yes').checked) { working = 'yes'; }
        if(document.getElementById('employee_working_hours_no').checked) { working = 'no'; }

        return working;
    }

/************************************************************************************ */
/**                  		FUNCTION :  getRefDoctorPatientHaveSurgery_1()            */
/**                         ELEMENT: Radio Button                                     */
/************************************************************************************ */
    function getRefDoctorPatientHaveSurgery_1(){

        var yes = jQuery('#ref_doctor_patient_have_surgery_1_yes').val();
        var no = jQuery('#ref_doctor_patient_have_surgery_1_no').val();
        var surgery ='';
        if(document.getElementById('ref_doctor_patient_have_surgery_1_yes').checked) { surgery = 'yes'; }
        if(document.getElementById('ref_doctor_patient_have_surgery_1_no').checked) { surgery = 'no'; }

        return surgery;
   
    }

/************************************************************************************ */
/**                  		FUNCTION :  getRefDoctorScript()                          */
/**                         ELEMENT: Radio Button                                     */
/************************************************************************************ */
    function getRefDoctorScript(){

        var yes = jQuery('#ref_doctor_script_yes').val();
        var no = jQuery('#ref_doctor_script_no').val();
        var script ='';
        if(document.getElementById('ref_doctor_script_yes').checked) { script = 'yes'; }
        if(document.getElementById('ref_doctor_script_no').checked) { script = 'no'; }

        return script;
    }


</script>