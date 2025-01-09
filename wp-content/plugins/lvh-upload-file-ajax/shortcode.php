<?php
//GLOBAL $global_id_munber;
/************************************************************************************ */
/**                                    ADD SHORTCODE                                  */
/**                                                                                   */
/************************************************************************************ */

add_action( 'init', 'dcms_form_shortcode' );

function dcms_form_shortcode(){
	add_shortcode('dcms_upload_file', 'dcms_show_upload_file_form');
}

/************************************************************************************ */
/**                    SHORTCODE :  dcms_show_upload_file_form()                      */
/**                                                                                   */
/************************************************************************************ */
function dcms_show_upload_file_form( $atts , $content ){ 
   // GLOBAL $global_id_munber;

    $atts = shortcode_atts ( array (
        'rand_id_user' => '1020105'
        ), $atts );
    
    //  $rand_id_user = $_SESSION['in_user_name'];//$global_id_munber;//$atts['rand_id_user'];
   
    dcms_enqueue_scripts();
    ob_start();
    //  echo '<input type="hidden" id="rand_id_user_iiii" name="rand_id_user_iiii" value="'.$rand_id_user.'">';
    ?>
    <section class="form-container">
        <form action="" enctype="multipart/form-data" method="post" id="form-upload">
            <div>
        <!--    <span>Selecciona algún archivo: </span>-->
                <input multiple type="file" id="file" class="form-control" name="upload-file"/>
            </div>
        <!-- <input type="submit" id="submit" value="Enviar archivo" />-->
          
            <input type="hidden" id="rand_id_user_mm" name="rand_id_user_mm">
        </form>

        <div class="alert alert-info" id="message"></div>
        
        <div  id="status"></div>
    </section>
    <?php
    $html_code = ob_get_contents();
    ob_end_clean();

    return $html_code;
}
