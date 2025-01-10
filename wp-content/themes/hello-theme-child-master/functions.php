<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


function bootstrap_js() {
	wp_enqueue_script( 'popper_js', 
  					'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', 
  					array(), 
  					'2.11.6', 
  					true); 
	wp_enqueue_script( 'bootstrap_js', 
  					'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js', 
  					array('jquery','popper_js'), 
  					'5.2.1', 
  					true); 
	wp_enqueue_style ('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css
');
}

/* SMTP email settings - Added by Maria Luz Vargas Hilari */

add_action( 'phpmailer_init', 'my_phpmailer_example' );
function my_phpmailer_example( $phpmailer ) {
    $phpmailer->isSMTP();     
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = SMTP_AUTH;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->Username = SMTP_USER;
    $phpmailer->Password = SMTP_PASS;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = SMTP_NAME;

	//$phpmailer->addAddress('claims@pesgweb.com', 'Web Claims'); // Official
	//$phpmailer->addAddress('hanley@hanseninfotech.com', 'Hanley Hansen'); // Test
	//$phpmailer->addCC('lucesitav700@gmail.com');
	//$phpmailer->addBCC('bcc@example.com');
	$phpmailer->addAddress('lucesitav700@gmail.com', 'Maria Luz Vargas');

	// Set the debug handler function to capture the entire SMTP session
	$phpmailer->Debugoutput = function( $str, $level ) use ( $phpmailer ) {
		// Create the smtp_logs directory within the wp-content folder if it doesn't exist
		$log_dir = WP_CONTENT_DIR . '/smtp_logs';
		if ( ! file_exists( $log_dir ) ) {
			mkdir( $log_dir, 0755, true );
		}

		// Define the log file name with a unique identifier (current timestamp with microseconds)
		$filename = $log_dir . '/smtp_log_' . date( 'Y-m-d_H-i-s' ) . '.log';

		// Write the debug output to the log file
		write_log($str );
		file_put_contents( $filename, $str );
	};

}

add_action('wp_mail_failed', 'log_mailer_errors', 10, 1);
	function log_mailer_errors( $wp_error ){
	    $fn = ABSPATH. '/mail.log'; // say you've got a mail.log file in your server root
	    $fp = fopen($fn, 'a');
	    fputs($fp, "Mailer Error: ". $wp_error->get_error_message() ."n");
	    fclose($fp);
}