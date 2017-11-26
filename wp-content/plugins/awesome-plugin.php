<?php
   /*
   Plugin Name: awesome-plugin
   Plugin URI: https://github.com/rosexw/awesome-plugin
   Description: a plugin to create awesomeness and spread joy
   Version: 1.0
   By: ME
   Author URI: https://rosexw.github.io/
   */

   //https://www.wpbeaverbuilder.com/creating-wordpress-plugin-easier-think/
    add_action( 'the_content', 'my_thank_you_text' );

    function my_thank_you_text ( $content ) {
      return $content .= '<p>Thank you for reading!</p>';
    }

    //https://www.sitepoint.com/wordpress-easy-administration-plugin-1/
    // change administration panel footer
    // function change_footer_admin() {
    // 	echo 'For support, please call 123456 or email <a href="mailto:support@mysite.net">mailto:support@mysite.net</a>';
    // }
    // add_filter('admin_footer_text', 'change_footer_admin');

    //https://blog.idrsolutions.com/2014/06/wordpress-plugin-part-1/
    add_action('admin_menu', 'test_plugin_setup_menu');

    function test_plugin_setup_menu(){
            add_menu_page( 'Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'test_init' );
    }

   function test_init(){
           test_handle_post();
   ?>
           <h1>Hello World!</h1>
           <h2>Upload a File</h2>
           <!-- Form to handle the upload - The enctype value here is very important -->
           <form  method="post" enctype="multipart/form-data">
                   <input type='file' id='test_upload_pdf' name='test_upload_pdf'></input>
                   <?php submit_button('Upload') ?>
           </form>
   <?php
   }

   function test_handle_post(){
           // First check if the file appears on the _FILES array
           if(isset($_FILES['test_upload_pdf'])){
                   $pdf = $_FILES['test_upload_pdf'];

                   // Use the wordpress function to upload
                   // test_upload_pdf corresponds to the position in the $_FILES array
                   // 0 means the content is not associated with any other posts
                   $uploaded=media_handle_upload('test_upload_pdf', 0);
                   // Error checking using WP functions
                   if(is_wp_error($uploaded)){
                           echo "Error uploading file: " . $uploaded->get_error_message();
                   }else{
                           echo "File upload successful!";
                   }
           }
   }

   ?>
?>
