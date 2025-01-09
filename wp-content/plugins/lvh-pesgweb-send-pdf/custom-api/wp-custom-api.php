<?php
/************************************************************************************************************************ */
/************************************************************************************************************************ */
/**                                         REST API - in Wordpress  (REMOTE GET)                                         */
/*********************************************0-0************************************************************************ */
/************************************************************************************************************************ */

/********************************************************************************************************************************** */
/**                                                         SAVE DATA IN SERVER               					        		*/
/**                                                API REST - AND ADD FUNCTIONS - IN SERVER                  			     		*/
/********************************************************************************************************************************** */

/************************************************************************************* */
/**      REGISTER REST ROUTE - REST API - Get Data EndPoint - IN SERVER                */
/**				Api Call From Client - (/wp-json/save/data_in_server)              */
/**               Create new endpoint to provide data.                                 */
/************************************************************************************* */

add_action( 'rest_api_init', 'register_route_save_data_in_server' );

function register_route_save_data_in_server() {

	register_rest_route( 'saved/', 'data_in_server', array(
        'methods'  => 'GET',
        'callback' => 'save_data_in_server',
    ));
}

/************************************************************************************ */
/**               CALLBACK FUNCTION - IN SERVER - (save_data_bookmark_in_server)      */
/**                         FROM REST API: (/wp-json/save/bookmark_in_server)                                 */
/**                         REST Endpoint information.                                */
/************************************************************************************ */
function save_data_in_server($args){
	$params = $args->get_params();

	$auth_headers = null;

	try
	{

		if(empty($params['company_name']))
		{
			//$auth_headers = $args->get_headers('authorization');
		}
		
	}
	catch (Exception $e)
	{
		return new WP_REST_Response(
			array(
				'success'    => false,
				'statusCode' => 403,
				'code'       => 'save_data_bookmark_error',
				'message'    => $e->getMessage(),
				'data'       => [],
			),
			200
		);
	}
	
    $result = save_in_server($params, $auth_headers);
	return $result;
}

/************************************************************************************ */
/**                FUNCTION SAVE IN SERVER AND SEND EMAIL - SERVER                    */
/**                        	 save_in_server                                           */
/**                          PARAMS: AXAJ PARAMS                                      */
/************************************************************************************ */
function save_in_server($params, $auth_headers=null){
    
    $response= wp_json_encode( $params);
	$rand_id_user = $params['rand_id_user'];
    $rand_id_user_temp = $params['rand_id_user_temp'];

/******************************************************** */
/**			CALL FUNCTION :--> WRITE PDF FUNCTION		  */
/******************************************************** */
    writePdf($params,$rand_id_user);

/******************************************************** */
/**		CALL FUNCTION : --> SEND DATA INFO TO EMAIL		  */
/******************************************************** */
    sendMail( $rand_id_user,$rand_id_user_temp,$params );

	return  $response;
}


/************************************************************************************ */
/**                  FUNCTION SEND MAIL FROM - SERVER                                 */
/**                         sendMail                                                  */
/**                         PARAMS: RANDOM ID CURRENT USER                            */
/************************************************************************************ */
function sendMail($rand_id_user, $rand_id_user_temp, $params){

   	//PATH FILE PDF WRITED
    $pdf_file = WP_CONTENT_DIR . '/uploads/send_pdf/new_web_claim_'.$rand_id_user.'.pdf'; //Ruta del archivo
    	
	//PATH DIRECTORY FROM ATTACHMENT
	$dir = WP_CONTENT_DIR . '/uploads/attachments/upload-files-temp_'.$rand_id_user_temp.'/';

    //ARRAY FILES IN ATTACHMENT
	$files = scandir($dir);
	$array_attachment_file = getFilesToAttachment($pdf_file, $files, $dir);

    //DATA FOR SEND EMAIL
    $to = "claims@pesgweb.com,hanley@hanseninfotech.com";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $subject = 'PESG Web Claim';
    $message = getMessageHTML_dataForm($params); //'<h2>New web claim</h2>';


	//CALL FUNCTION WP MAIL FOR SEND PDF WRITED AND ATTACHMENT FILES BY USER
    wp_mail( $to, $subject, $message , $headers, $array_attachment_file);
    
 
}

/************************************************************************************ */
/**                  		FUNCTION GET FILE TO ATTACHMENT                           */
/**                         PARAMS: RANDOM ID CURRENT USER                            */
/************************************************************************************ */
function getFilesToAttachment($pdf_file, $attachment_files, $path_dir){
  
	$array_files = array();
	array_push($array_files, $pdf_file);    
    unset($attachment_files[0]);
    unset($attachment_files[1]);


    if ($attachment_files) {
        $ok_files = array_values($attachment_files);
        foreach ($ok_files as &$file_item) {
            $file_i = $path_dir.$file_item;
            array_push($array_files, $file_i);
            
        }
    }

	return $array_files;
}

/************************************************************************************ */
/**                  		FUNCTION WRITE MESSAGE HTML                               */
/**                         PARAMS: PARAMS -  AJAX                            */
/************************************************************************************ */
function getMessageHTML_dataForm($params){

/******************************CONTENT SECCTION SUBMITTER******************************** */

/**********************************DATA FROM FORM********************* */
   $company_name = strtoupper( utf8_decode( $params['company_name'] ) );
   $first_name = strtoupper( utf8_decode( $params['first_name'] ) );
   $last_name = strtoupper( utf8_decode( $params['last_name'] ) );
   $main_phone = strtoupper( utf8_decode( $params['main_phone'] ) );
   $ext = strtoupper( utf8_decode( $params['ext'] ) );
   $fax = strtoupper( utf8_decode( $params['fax'] ) );
   $email_address = strtoupper( utf8_decode( $params['email_address'] ) );


/******************************CONTENT SECCTION CLAIMANT******************************** */

/**********************************DATA FROM FORM********************* */

	$claimant_request = strtoupper( utf8_decode( $params['claimant_request'] ) );
	$claimant_first_name = strtoupper( utf8_decode( $params['claimant_first_name'] ) );
	$claimant_last_name = strtoupper( utf8_decode( $params['claimant_last_name'] ) );
	$claimant_claimant_number = strtoupper( utf8_decode( $params['claimant_claimant_number'] ) );
	$claimant_date_of_injury = strtoupper( utf8_decode( $params['claimant_date_of_injury'] ) );
	$claimant_icd_code = strtoupper( utf8_decode( $params['claimant_icd_code'] ) );
	$claimant_describe = strtoupper( utf8_decode( $params['claimant_describe'] ) );
	$claimant_working = strtoupper( utf8_decode( $params['claimant_working'] ) );
	$claimant_occupation = strtoupper( utf8_decode( $params['claimant_occupation'] ) );
	$claimant_date_of_birth = strtoupper( utf8_decode( $params['claimant_date_of_birth'] ) );
	$claimant_gender = strtoupper( utf8_decode( $params['claimant_gender'] ) );
	$claimant_home_phone = strtoupper( utf8_decode( $params['claimant_home_phone'] ) );
	$claimant_cell_phone = strtoupper( utf8_decode( $params['claimant_cell_phone'] ) );
	$claimant_work_phone = strtoupper( utf8_decode( $params['claimant_work_phone'] ) );
	$claimant_ext =strtoupper( utf8_decode( $params['claimant_ext'] ) );
	$claimant_alternate_phone = strtoupper( utf8_decode( $params['claimant_alternate_phone'] ) );
	$claimant_alt_phone_description = strtoupper( utf8_decode( $params['claimant_alt_phone_description'] ) );
	$claimant_email_adress = strtoupper( utf8_decode( $params['claimant_email_adress'] ) );
	$claimant_address_1 = strtoupper( utf8_decode( $params['claimant_address_1'] ) );
	$claimant_address_2 = strtoupper( utf8_decode( $params['claimant_address_2'] ) );
	$claimant_city = strtoupper( utf8_decode( $params['claimant_city'] ) );
	$claimant_state = strtoupper( utf8_decode( $params['claimant_state'] ) );
	$claimant_zip = strtoupper( utf8_decode( $params['claimant_zip'] ) );
	$claimant_preferred_language = strtoupper( utf8_decode( $params['claimant_preferred_language'] ) );


/******************************CONTENT SECCTION EMPLOYE******************************** */

/**********************************DATA FROM FORM********************* */
    
    $employee_company = strtoupper( utf8_decode( $params['employee_company'] ) );
    $employee_phone_number = strtoupper( utf8_decode( $params['employee_phone_number'] ) );
    $employee_contact = strtoupper( utf8_decode( $params['employee_contact'] ) );
    $employee_address1 = strtoupper( utf8_decode( $params['employee_address1'] ) );
    $employee_address2 = strtoupper( utf8_decode( $params['employee_address2'] ) );
    $employee_city = strtoupper( utf8_decode( $params['employee_city'] ) );
    $employee_state = strtoupper( utf8_decode( $params['employee_state'] ) );
    $employee_zip = strtoupper( utf8_decode( $params['employee_zip'] ) );
    $employee_working_hours = strtoupper( utf8_decode( $params['employee_working_hours'] ) );
    $employee_date_of_injury = strtoupper( utf8_decode( $params['employee_date_of_injury'] ) );

/******************************CONTENT SECCTION REFERRING DOCTOR******************************** */

/**********************************DATA FROM FORM********************* */

    $ref_doctor_first_name = strtoupper( utf8_decode( $params['ref_doctor_first_name'] ) );
    $ref_doctor_last_name = strtoupper( utf8_decode( $params['ref_doctor_last_name'] ) );
    $ref_doctor_practice_name = strtoupper( utf8_decode( $params['ref_doctor_practice_name'] ) );
    $ref_doctor_phone_number = strtoupper( utf8_decode( $params['ref_doctor_phone_number'] ) );
    $ref_doctor_email_adress = strtoupper( utf8_decode( $params['ref_doctor_email_adress'] ) );
    $ref_doctor_fax = strtoupper( utf8_decode( $params['ref_doctor_fax'] ) );
    $ref_doctor_adress_1 = strtoupper( utf8_decode( $params['ref_doctor_adress_1'] ) );
    $ref_doctor_adress_2 = strtoupper( utf8_decode( $params['ref_doctor_adress_2'] ) );
    $ref_doctor_city = strtoupper( utf8_decode( $params['ref_doctor_city'] ) );
    $ref_doctor_state = strtoupper( utf8_decode( $params['ref_doctor_state'] ) );
    $ref_doctor_zip = strtoupper( utf8_decode( $params['ref_doctor_zip'] ) );
    $ref_doctor_patient_have_surgery_1 = strtoupper( utf8_decode( $params['ref_doctor_patient_have_surgery_1'] ) );
    $ref_doctor_surgery_date = strtoupper( utf8_decode( $params['ref_doctor_surgery_date'] ) );
    $ref_doctor_dx = strtoupper( utf8_decode( $params['ref_doctor_dx'] ) );
    $ref_doctor_body_parts = strtoupper( utf8_decode( $params['ref_doctor_body_parts'] ) );
    $ref_doctor_auth_visits = strtoupper( utf8_decode( $params['ref_doctor_auth_visits'] ) );
    $ref_doctor_freq_duration = strtoupper( utf8_decode( $params['ref_doctor_freq_duration'] ) );
    $ref_doctor_script = strtoupper( utf8_decode( $params['ref_doctor_script'] ) );
    $ref_doctor_follow_up_md = strtoupper( utf8_decode( $params['ref_doctor_follow_up_md'] ) );


/******************************CONTENT SECCTION SPECIAL INSTRUCTIONS******************************** */

/**********************************DATA FROM FORM********************* */
	$special_instructions = strtoupper( utf8_decode( $params['special_instructions'] ) );


/************************************************************************************************** */

	$html_data = '
		
	<body>
   
    <h2 style="color:rgb(23, 17, 17); font-size:2.5rem; margin-left:10%; font-weight: bold;">Referral</h2>
    <!-- Submitter Data: -->
    <h3 style="color:rgb(23, 17, 17); font-size:2rem; margin-left:10%; font-weight: bold;">Submitter</h3><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Company Name: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase; line-height: 0.7rem;">'.$company_name .'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">First Name: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase; line-height: 0.7rem;">'.$first_name.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Last Name: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase; line-height: 0.7rem;">'.$last_name.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Main Phone: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase; line-height: 0.7rem;">'.$main_phone.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Ext: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$ext.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Fax: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$fax.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Email Address: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$email_address.'</span></span><br/><br/><br/>
   
    <!-- Claimant Data: -->
    <h3 style="color:rgb(23, 17, 17); font-size:2rem; margin-left:10%; font-weight: bold;">Claimant</h3><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Request: <span style="color:black; font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$claimant_request.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">First Name: <span style="color:black; font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$claimant_first_name.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Last Name: <span style="color:black; font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$claimant_last_name.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Claim Number: <span style="font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$claimant_claimant_number.'</span><br/>
	<span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Date of Injury: <span style="font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$claimant_date_of_injury.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">ICD Code: <span style="color:black; font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$claimant_icd_code.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 1.5rem;">Describe Injury: <span style="color:black; font-weight: Normal; font-size: 1.3rem; line-height: 1.5rem; text-transform:uppercase">'.$claimant_describe.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Working: <span style="color:black; font-weight: Normal; font-size: 1.3rem;  line-height: 0.7rem; text-transform:uppercase">'.$claimant_working.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Occupation: <span style=" color:black; font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$claimant_occupation.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Date of Birth: <span style="color:black; font-weight: Normal; font-size: 1.3rem;  line-height: 0.7rem; text-transform:uppercase">'.$claimant_date_of_birth.'</span><br/>
	<span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Gender: <span style="color:black; font-weight: Normal; font-size: 1.3rem;  line-height: 0.7rem; text-transform:uppercase">'.$claimant_gender.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Home Phone: <span style="color:rgb(52, 51, 51) !important; font-weight: 300; font-size: 1.3rem;  line-height: 0.7rem;text-transform:uppercase">'.$claimant_home_phone.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">Cell Phone: <span style=" color:black; font-weight: Normal; font-size: 1.3rem; line-height: 0.7rem; text-transform:uppercase">'.$claimant_cell_phone.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">Work Phone: <span style="color:black; font-weight: Normal; font-size: 1.3rem;  line-height: 0.7rem; text-transform:uppercase">'.$claimant_work_phone.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">Ext.: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_ext.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">Alternate Phone: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_alternate_phone.'</span><br/>
	<span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">Alt. Phone Description: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_alt_phone_description.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%;  line-height: 0.7rem;">Email Address: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_email_adress.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;;">Address 1: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_address_1.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">Address 2: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_address_2.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">City: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_city.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">State: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_state.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">Zip: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_zip.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;; ">Preferred Language: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$claimant_preferred_language.'</span><br/><br/><br/>
   
    <!-- Employer Data: -->
    <h3 style="color:rgb(23, 17, 17); font-size:2rem; margin-left:10%; font-weight: bold;">Employer</h3><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%;  line-height: 0.7rem;">Company: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_company.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%;  line-height: 0.7rem;">Phone Number: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_phone_number.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Contact: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_contact.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Address 1: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_address1.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%;  line-height: 0.7rem;">Address 2: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_address2.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">City: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'. $employee_city.'</span><br/>
	<span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">State: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_state.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%;  line-height: 0.7rem;">Zip: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_zip.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">PT - Schedule during work hours?: <span style=" color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_working_hours.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">What hours does patient work?: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$employee_date_of_injury.'</span><br/><br/><br/>
   
    <!-- Referring Doctor Data: -->
    <h3 style="color:rgb(23, 17, 17); font-size:2rem; margin-left:10%; font-weight: bold;">Referring Doctor</h3><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem;">First Name: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_first_name.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%;  line-height: 0.7rem;">Last Name: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_last_name.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Practice Name: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_practice_name.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%;  line-height: 0.7rem;">Phone Number: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_phone_number.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Email Address: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_email_adress.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Fax: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_fax.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Address 1: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_adress_1.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Address 2: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_adress_2.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">City: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_city.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">State: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_state.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Zip: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_zip.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Did patient have surgery?: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_patient_have_surgery_1.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Surgery Date: <span style="color:black; font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_surgery_date.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">DX: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_dx.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Body Parts: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_body_parts.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; "># of Auth visits: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_auth_visits.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Freq/Duration: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_freq_duration.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%;  line-height: 0.7rem;">Script: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_script.'</span><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 0.7rem; ">Follow-up MD: <span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$ref_doctor_follow_up_md.'</span><br/><br/><br/>
   
    <!-- Special Instructions Data: -->
    <h3 style="color:rgb(23, 17, 17); font-size:2rem; margin-left:10%; font-weight: bold;">Special Instructions</h3><br/>
    <span style="color:black; font-size: 1.3rem; font-weight:bold; margin-left:10%; line-height: 2.5rem;"><span style="color:black;  font-weight: Normal; font-size: 1.3rem; text-transform:uppercase">'.$special_instructions.'</span><br/>
    <br>

</body>
';

	return $html_data;
}