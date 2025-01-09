<?php
namespace LvhPesgwebSendPdf;

/**
 * Plugin Name:       Pesgweb Send Pdf
 * Plugin URI:        https://www.lucesitav700.com/
 * Description:       Pesgweb Send Pdf.
 * Version:           1.0
 * Author:            Maria Luz Vargas Hilari
 * License:           GPL v1 or later
 */

use Exception;

use WP_REST_Response;


/************************************************************************************ */
/**                      BASE: ADD FILES ON CUSTOM TASKS                              */
/************************************************************************************ */
define('BASE_DIR', __DIR__); 

include_once BASE_DIR . '/fpdf184/fpdf.php';
include_once BASE_DIR . '/custom-api/wp-custom-api.php';
include_once BASE_DIR . '/write-pdf/write-custom-pdf.php';
GLOBAL $global_id_munber;

/************************************************************************************ */
/**                      ADD CLASS  : LvhPesgwebSendPdf_Plugin                        */
/************************************************************************************ */

if (!class_exists('LvhPesgwebSendPdf_Plugin')) {

    class LvhPesgwebSendPdf_Plugin
    {
        public $table_name = 'pesgweb_sso_settings';

        public function __construct()
        {
            add_shortcode('LvhPesgwebSendPdf', array($this, 'form_referral_shortcode'));
         
            // CSS and JS for Admin
           // add_action('admin_head', [$this, 'admin_js_css']);           

            
        }

        /************************************************************************************ */
        /**                  		FUNCTION :  form_referral_shortcode()                     */
        /**                              Add scripts and style                                */
        /************************************************************************************ */
         /* Form Referral On Shortcode */
        public function form_referral_shortcode()
        {
          
            // Register styles-css
            wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css', '', array(), null, true);
            wp_enqueue_style('pesgweb-sso-style', plugin_dir_url(__FILE__) . 'css/style.css', false, '1.0');
 
            // Register scripts-js
            wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js', '', array(), null, true);
            wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', '', array(), null, true);
            wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js', '', array(), null, true);
            wp_enqueue_script('jquery-validation', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js', '', array(), null, true);

            // Register custom script - js
            wp_enqueue_script('custom-lvh-script', plugin_dir_url(__FILE__) . 'js/script.js', '', array(), null, true);
 
             include __DIR__ . '/templates/referral-form.php';
        }

    }

    new LvhPesgwebSendPdf_Plugin();
}

