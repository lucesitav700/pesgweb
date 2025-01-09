<?php

$file_name_ok = '';


add_action('wp_ajax_dcms_ajax_add_file', 'dcms_upload_file');
add_action('wp_ajax_nopriv_dcms_ajax_add_file', 'dcms_upload_file');

// Process upload file

/************************************************************************************ */
/**                  		FUNCTION :  dcms_upload_file()                            */
/**                                                                                   */
/************************************************************************************ */
function dcms_upload_file(){
    $res = [];
    GLOBAL $global_id_munber;
    validate_nonce('ajax-nonce-upload');
    // Output: 36e5e490f14b031e 
    $num_rand= substr(md5(time()), 0, 16);
   
    $global_id_munber = $num_rand;

    if( isset($_FILES['file']) ) {

        $count = count($_FILES['file']['name']);
        global $wp_filesystem;
        WP_Filesystem();

        // GET FORM DATA in Script.js
        $rand_id_user = $global_id_munber;//$_POST['rand_id_user'];
      
        $name_other = date("Y").date("m"). date("d").'-'.date("H").date("i").date("s");
 
        for ($i = 0; $i < $count; $i++) {

            $name_file = $_FILES['file']['name'][$i];
            $tmp_name = $_FILES['file']['tmp_name'][$i];

            $extension = pathinfo( $_FILES['file']['name'][$i], PATHINFO_EXTENSION);
    
            $name_file_no_extension = pathinfo($name_file, PATHINFO_FILENAME);

            $new_name_file = sprintf($name_file_no_extension."_%s.%s", $name_other, $extension);

            validate_extension_file($name_file);

            $content_directory = $wp_filesystem->wp_content_dir() . 'uploads/attachments/upload-files-temp_'.$rand_id_user.'/';

            $wp_filesystem->mkdir( $content_directory );
          
            if( move_uploaded_file( $tmp_name, $content_directory . $new_name_file ) ) {
                $res = [
                    'status' => 1,
                    'rand_id_user_mm'=> $rand_id_user,
                   /* 'message' => "ID session-->".$id_session."<-------The files was added successfully.--->content_directory->".
                    "$content_directory"."<---new name file---->".$new_name_file."<input type='hidden' id='rand_id_user' name='rand_id_user' value='".$rand_id_user."--->1111111'>´"*/
                    'message' => 'The files was added successfully.'
                ];
               
            }
        }

    } else {
        $res = [
            'status' => 0,
            'message' => "There is an error uploading the files"
        ];
    }
   
    echo json_encode($res);
    
    //echo wpforms_encode($res);
    wp_die();
    
}

/************************************************************************************ */
/**                  		FUNCTION :  validate_nonce()                              */
/**                         PARAMS:  ($nonce_name)                                    */
/************************************************************************************ */
// Nonce validation
function validate_nonce( $nonce_name ){
    if ( ! wp_verify_nonce( $_POST['nonce'], $nonce_name ) ) {
        $res = [
            'status' => 0,
            'message' => '✋ Error nonce validation!!'
        ];
        echo json_encode($res);
        wp_die();
    }
}

/************************************************************************************ */
/**                  		FUNCTION :  validate_extension_file()                     */
/**                         PARAMS:  ($name_file)                                     */
/************************************************************************************ */
function validate_extension_file( $name_file ){

    $path_parts = pathinfo($name_file);
    $ext = $path_parts['extension'];
    //$allow_extensions = ['png','jpg','pdf'];//docx
    $allow_extensions = ['pdf','docx','png','jpg'];

    if ( ! in_array($ext, $allow_extensions) ) {
        
          $res = [
              'status' => 0,
              'message' => "The file extension is not allowed"
          ];
          echo json_encode($res);
          wp_die();
    }else{
        
        
    }
}
