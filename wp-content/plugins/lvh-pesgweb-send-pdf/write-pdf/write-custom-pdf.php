<?php
/************************************************************************************ */
/**                             CUSTOM CLASS FDF                                      */
/**                                                                                   */
/**                         ADD FUNCTION: HEADER AND FOOTER                           */
/************************************************************************************ */
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        //$this->Cell(30,10,'Title',1,0,'C');
        $this->Cell(0,10,'',0,0,'C');
        // Salto de línea
        $this->Ln(12);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

/********************************************************************************************************************************** */
/**                                                                                                          			     		*/
/**                                FUNCTION:-> WRITE PDF                   				                        	        		*/
/**                                                                                                          			     		*/
/********************************************************************************************************************************** */
function writePdf($params, $rand){

    // CLASS PDF EXTENDED FPDF
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('PORTRAIT','LETTER');
  
    $pdf->AddFont('DejaVuSerif','','DejaVuSerif.php');
    $pdf->AddFont('DejaVuSerif-Bold', '', 'DejaVuSerif-Bold.php');
    
    /************************Title****************************** */
    //$pdf->SetMargins(20, 10);
    $pdf->SetLeftMargin(20);
    $pdf->SetRightMargin(10);
    $pdf->SetFont('DejaVuSerif-Bold', '', 24 );
    $title_ref = 'Referral';
    $pdf->Cell(0, 10, $title_ref, 0, 1);
    $pdf->Ln(5);

/************************************************************************************ */
/**                                                                                   */
/**                                     SUBMITTER                                     */
/**                                                                                   */
/************************************************************************************ */

/*         Sub Title SUBMITTER                    */

    $pdf->SetFont('DejaVuSerif-Bold','',18 );
    $title = 'Submitter';
    $pdf->Cell(0, 10, utf8_decode($title), 0, 1);
    $pdf->Ln(3);

/******************************CONTENT SECCTION SUBMITTER******************************** */

   /**********************************DATA FROM FORM********************* */
   $company_name = strtoupper( utf8_decode( $params['company_name'] ) );
   $first_name = strtoupper( utf8_decode( $params['first_name'] ) );
   $last_name = strtoupper( utf8_decode( $params['last_name'] ) );
   $main_phone = strtoupper( utf8_decode( $params['main_phone'] ) );
   $ext = strtoupper( utf8_decode( $params['ext'] ) );
   $fax = strtoupper( utf8_decode( $params['fax'] ) );
   $email_address = strtoupper( utf8_decode( $params['email_address'] ) );

   /************************************LABELS*************************** */
   $company_name_label = utf8_decode('Company Name:');
   $first_name_label = utf8_decode('First Name:');
   $last_name_label = utf8_decode('Last Name:');
   $main_phone_label = utf8_decode('Main Phone:');
   $ext_label = utf8_decode('Ext.:');
   $fax_label = utf8_decode('Fax:');
   $email_address_label = utf8_decode('Email Address');
   
   /*************************WRITE IN THE PDF**************************** */
   //Company Name
   $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
   $pdf->Cell(40, 10, $company_name_label, 0, 0);

   $pdf->SetFont('DejaVuSerif' , '', 12);
   $pdf->Cell(20, 10, $company_name, 0, 0);
   $pdf->Ln(5);

   //First Name
   $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
   $pdf->Cell(40, 10, $first_name_label, 0, 0);

   $pdf->SetFont('DejaVuSerif' , '', 12);
   $pdf->Cell(20, 10, $first_name, 0, 0);
   $pdf->Ln(5);

   //Last Name:
   $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
   $pdf->Cell(40, 10, $last_name_label, 0, 0);

   $pdf->SetFont('DejaVuSerif' , '', 12);
   $pdf->Cell(20, 10, $last_name, 0, 0);
   $pdf->Ln(5);

   //Main Phone:
   $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
   $pdf->Cell(40, 10, $main_phone_label, 0, 0);

   $pdf->SetFont('DejaVuSerif' , '', 12);
   $pdf->Cell(20, 10, $main_phone, 0, 0);
   $pdf->Ln(5);

   //Ext
   $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
   $pdf->Cell(40, 10, $ext_label, 0, 0);

   $pdf->SetFont('DejaVuSerif' , '', 12);
   $pdf->Cell(20, 10, $ext, 0, 0);
   $pdf->Ln(5);

   //Fax
   $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
   $pdf->Cell(40, 10, $fax_label, 0, 0);

   $pdf->SetFont('DejaVuSerif' , '', 12);
   $pdf->Cell(20, 10, $fax, 0, 0);
   $pdf->Ln(5);

   //Fax
   $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
   $pdf->Cell(40, 10, $email_address_label, 0, 0);

   $pdf->SetFont('DejaVuSerif' , '', 12);
   $pdf->Cell(20, 10, $email_address, 0, 0);
   $pdf->Ln(10);

/************************************************************************************ */
/**                                                                                   */
/**                                     CLAIMANT                                      */
/**                                                                                   */
/************************************************************************************ */

/*         Sub Title CLAIMANT                    */

$pdf->SetFont('DejaVuSerif-Bold','',18 );
$title_claimant = 'Claimant';
$pdf->Cell(0, 10, utf8_decode($title_claimant), 0, 1);
$pdf->Ln(3);

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






/************************************LABELS*************************** */
$claimant_request_label = utf8_decode('Request:');
$claimant_first_name_label = utf8_decode('First Name:');
$claimant_last_name_label = utf8_decode('Last Name:');
$claimant_claimant_number_label = utf8_decode('Claim Number:');
$claimant_date_of_injury_label = utf8_decode('Date of Injury:');
$claimant_icd_code_label = utf8_decode('ICD Code');
$claimant_describe_label = utf8_decode('Describe Injury:');
$claimant_working_label = utf8_decode('Working:');
$claimant_occupation_label = utf8_decode('Occupation:');
$claimant_date_of_birth_label = utf8_decode('Date of Birth:');
$claimant_gender_label = utf8_decode('Gender:');
$claimant_home_phone_label = utf8_decode('Home Phone:');
$claimant_cell_phone_label = utf8_decode('Cell Phone:');
$claimant_work_phone_label = utf8_decode('Work Phone:');
$claimant_ext_label = utf8_decode('Ext.:');
$claimant_alternate_phone_label = utf8_decode('Alternate Phone:');
$claimant_alt_phone_description_label = utf8_decode('Alt. Phone Description:');
$claimant_email_adress_label = utf8_decode('Email Address:');
$claimant_address_1_label = utf8_decode('Address 1:');
$claimant_address_2_label = utf8_decode('Address 2:');
$claimant_city_label = utf8_decode('City:');
$claimant_state_label = utf8_decode('State:');
$claimant_zip_label = utf8_decode('Zip:');
$claimant_preferred_language_label = utf8_decode('Preferred Language:');



/*************************WRITE IN THE PDF**************************** */
    //Request
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_request_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    //$pdf->Cell(20, 10, $claimant_request, 0, 0);
    $pdf->Write(10, $claimant_request);
    $pdf->Ln(5);

    //First Name
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_first_name_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_first_name, 0, 0);
    $pdf->Ln(5);

    //Last Name:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_last_name_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_last_name, 0, 0);
    $pdf->Ln(5);
    
    //Claim Number:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_claimant_number_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_claimant_number, 0, 0);
    $pdf->Ln(5);

    //Date of Injury:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_date_of_injury_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_date_of_injury, 0, 0);
    $pdf->Ln(5);

    //ICD Code:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_icd_code_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_icd_code, 0, 0);
    $pdf->Ln(5);

    //Describe Injury:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_describe_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    //$pdf->Cell(20, 10, $claimant_describe, 0, 0);
    //$pdf->Write(10, $claimant_describe);
    //$pdf->SetXY(6, 130);
    
    $h=5; // default height of each MultiCell
    $w=150;// Width of each MultiCell
    $y=$pdf->GetY(); // Getting Y or vertical position
    $x=$pdf->GetX(); // Getting X or horizontal position
    $pdf->SetXY($x,$y+3);
    //$pdf->MultiCell($w,$h,$claimant_describe.'X='.round($x).',Y='.round($y),0,'L',false);
    $pdf->MultiCell($w, $h, $claimant_describe, 0, 'L', false);
    $pdf->Ln(0);

    //Working:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_working_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_working, 0, 0);
    $pdf->Ln(5);

    //Occupation:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_occupation_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_occupation, 0, 0);
    $pdf->Ln(5);

    //Date of Birth:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_date_of_birth_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_date_of_birth, 0, 0);
    $pdf->Ln(5);

    //Gender:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_gender_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_gender, 0, 0);
    $pdf->Ln(5);

    //Home Phone:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_home_phone_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_home_phone, 0, 0);
    $pdf->Ln(5);

    //Cell Phone:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_cell_phone_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_cell_phone, 0, 0);
    $pdf->Ln(5);

    //Work Phone:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_work_phone_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_work_phone, 0, 0);
    $pdf->Ln(5);

    //Ext.:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_ext_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_ext, 0, 0);
    $pdf->Ln(5);

    //Alternate Phone:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_alternate_phone_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_alternate_phone, 0, 0);
    $pdf->Ln(5);

    //Alt. Phone Description:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(55, 10, $claimant_alt_phone_description_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_alt_phone_description, 0, 0);
    $pdf->Ln(5);

    //Email Address:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_email_adress_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_email_adress, 0, 0);
    $pdf->Ln(5);

    //Address 1:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_address_1_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_address_1, 0, 0);
    $pdf->Ln(5);

    //Address 2:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_address_2_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_address_2, 0, 0);
    $pdf->Ln(5);

    //City:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_city_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_city, 0, 0);
    $pdf->Ln(5);

    //State:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_state_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_state, 0, 0);
    $pdf->Ln(5);

    //Zip:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(40, 10, $claimant_zip_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_zip, 0, 0);
    $pdf->Ln(5);

    //Preferred Language:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(50, 10, $claimant_preferred_language_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $pdf->Cell(20, 10, $claimant_preferred_language, 0, 0);
    $pdf->Ln(10);

/************************************************************************************ */
/**                                                                                   */
/**                                     EMPLOYEE                                     */
/**                                                                                   */
/************************************************************************************ */

/*         Sub Title  EMPLOYEE                  */

    $pdf->SetFont('DejaVuSerif-Bold','',18 );
    $title = 'Employee';
    $pdf->Cell(0, 10, utf8_decode($title), 0, 1);
    $pdf->Ln(3);

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

    /************************************LABELS*************************** */
 
    $employee_company_label = utf8_decode('Company:');
    $employee_phone_number_label = utf8_decode('Phone Number:');
    $employee_contact_label = utf8_decode('Contact:');
    $employee_address1_label = utf8_decode('Address 1:');
    $employee_address2_label = utf8_decode('Address 2:');
    $employee_city_label = utf8_decode('City:');
    $employee_state_label = utf8_decode('State:');
    $employee_zip_label = utf8_decode('Zip:');
    $employee_working_hours_label = utf8_decode('PT - Schedule during work hours?');
    $employee_date_of_injury_label = utf8_decode('What hours does patient work?');

    /*************************WRITE IN THE PDF**************************** */
    //Company
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $employee_company_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_company, 0, 0);
    $pdf->Ln(5);

    //Phone Number:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $employee_phone_number_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_phone_number, 0, 0);
    $pdf->Ln(5);

    //Contact
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $employee_contact_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_contact, 0, 0);
    $pdf->Ln(5);

    //Address 1
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $employee_address1_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_address1, 0, 0);
    $pdf->Ln(5);

    //Address 2
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $employee_address2_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_address2, 0, 0);
    $pdf->Ln(5);

    //City
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $employee_city_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_city, 0, 0);
    $pdf->Ln(5);
    
    //State
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $employee_state_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_state, 0, 0);
    $pdf->Ln(5);

    //Zip
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $employee_zip_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_zip, 0, 0);
    $pdf->Ln(5);

    //PT - Schedule during work hours?
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(83, 10, $employee_working_hours_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_working_hours, 0, 0);
    $pdf->Ln(5);

    //What hours does patient work?
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(83, 10, $employee_date_of_injury_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $employee_date_of_injury, 0, 0);
    $pdf->Ln(10);

/************************************************************************************ */
/**                                                                                   */
/**                                     REFERRING DOCTOR                                     */
/**                                                                                   */
/************************************************************************************ */

    /*         Sub Title  REFERRING DOCTOR                  */

    $pdf->SetFont('DejaVuSerif-Bold','',18 );
    $title = 'Referring Doctor';
    $pdf->Cell(0, 10, utf8_decode($title), 0, 1);
    $pdf->Ln(5);

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

    /************************************LABELS*************************** */

    $ref_doctor_first_name_label = utf8_decode('First Name:');
    $ref_doctor_last_name_label = utf8_decode('Last Name:');
    $ref_doctor_practice_name_label = utf8_decode('Practice Name:');
    $ref_doctor_phone_number_label = utf8_decode('Phone Number:');
    $ref_doctor_email_adress_label = utf8_decode('Email Address:');
    $ref_doctor_fax_label = utf8_decode('Fax:');
    $ref_doctor_adress_1_label = utf8_decode('Address 1:');
    $ref_doctor_adress_2_label = utf8_decode('Address 2:');
    $ref_doctor_city_label = utf8_decode('City:');
    $ref_doctor_state_label = utf8_decode('State');
    $ref_doctor_zip_label = utf8_decode('Zip:');
    $ref_doctor_patient_have_surgery_1_label = utf8_decode('Did patient have surgery?');
    $ref_doctor_surgery_date_label = utf8_decode('Surgery Date:');
    $ref_doctor_dx_label = utf8_decode('DX:');
    $ref_doctor_body_parts_label = utf8_decode('Body Parts:');
    $ref_doctor_auth_visits_label = utf8_decode('# of Auth visits:');
    $ref_doctor_freq_duration_label = utf8_decode('Freq/Duration:');
    $ref_doctor_script_label = utf8_decode('Script:');
    $ref_doctor_follow_up_md_label = utf8_decode('Follow-up MD:');


    /*************************WRITE IN THE PDF**************************** */
    //First Name: 
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_first_name_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_first_name, 0, 0);
    $pdf->Ln(5);

    //Last Name:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_last_name_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_last_name, 0, 0);
    $pdf->Ln(5);

    //Practice Name:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_practice_name_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_practice_name, 0, 0);
    $pdf->Ln(5);

    //Phone Number:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_phone_number_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_phone_number, 0, 0);
    $pdf->Ln(5);

    //Email Address:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_email_adress_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_email_adress, 0, 0);
    $pdf->Ln(5);

    //Fax:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_fax_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_fax, 0, 0);
    $pdf->Ln(5);

    //Address 1:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_adress_1_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_adress_1, 0, 0);
    $pdf->Ln(5);

    //Address 2:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_adress_2_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_adress_2, 0, 0);
    $pdf->Ln(5);

    //City
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_city_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_city, 0, 0);
    $pdf->Ln(5);

    //State:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_state_label, 0, 0);

    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_state, 0, 0);
    $pdf->Ln(5);

    //Zip:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_zip_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_zip, 0, 0);
    $pdf->Ln(5);
    
    //Did patient have surgery?
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(65, 10, $ref_doctor_patient_have_surgery_1_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_patient_have_surgery_1, 0, 0);
    $pdf->Ln(5);
    
    //Surgery Date:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_surgery_date_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_surgery_date, 0, 0);
    $pdf->Ln(5);
    
    //DX
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_dx_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_dx, 0, 0);
    $pdf->Ln(5);
    
    //Body Parts:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_body_parts_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_body_parts, 0, 0);
    $pdf->Ln(5);
    
    //# of Auth visits:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_auth_visits_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_auth_visits, 0, 0);
    $pdf->Ln(5);
    
    //Freq/Duration:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_freq_duration_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_freq_duration, 0, 0);
    $pdf->Ln(5);
    
    //Script: 
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_script_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_script, 0, 0);
    $pdf->Ln(5);
    
    //Follow-up MD:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12 );
    $pdf->Cell(40, 10, $ref_doctor_follow_up_md_label, 0, 0);
    
    $pdf->SetFont('DejaVuSerif' , '', 12);
    $pdf->Cell(20, 10, $ref_doctor_follow_up_md, 0, 0);
    $pdf->Ln(10);
    
        
/************************************************************************************ */
/**                                                                                   */
/**                                     SPECIAL INSTRUCTIONS                                     */
/**                                                                                   */
/************************************************************************************ */

/*         Sub Title SPECIAL INSTRUCTIONS                    */

$pdf->SetFont('DejaVuSerif-Bold','',18 );
$title = 'Special Instructions';
$pdf->Cell(0, 10, utf8_decode($title), 0, 1);
$pdf->Ln(3);

/******************************CONTENT SECCTION SPECIAL INSTRUCTIONS******************************** */

/**********************************DATA FROM FORM********************* */
$special_instructions = strtoupper( utf8_decode( $params['special_instructions'] ) );

/************************************LABELS*************************** */
$special_instructions_label = utf8_decode('Special Instructions: ');

/*************************WRITE IN THE PDF**************************** */

    //Special Instructions:
    $pdf->SetFont('DejaVuSerif-Bold', '', 12);
    $pdf->Cell(50, 10, $special_instructions_label, 0, 0);

    $pdf->SetFont('DejaVuSerif', '', 12);
    $h=5; // default height of each MultiCell
    $w=140;// Width of each MultiCell
    $y=$pdf->GetY(); // Getting Y or vertical position
    $x=$pdf->GetX(); // Getting X or horizontal position
    $pdf->SetXY($x,$y+3);
    //$pdf->MultiCell($w,$h,$claimant_describe.'X='.round($x).',Y='.round($y),0,'L',false);
    $pdf->MultiCell($w, $h, $special_instructions, 0, 'L', false);
    $pdf->Ln(0);

/******************************************************************************************** */   
 
// Save archive.pdf in dir server   
$pdf->Output('wp-content/uploads/send_pdf/new_web_claim_'.$rand.'.pdf','F');


}


