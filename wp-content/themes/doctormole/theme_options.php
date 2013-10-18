<?php
function doctormole_get_default_options()
{
    $options = array('logo' => '');

    return $options;
}


function doctormole_options_init()
{
    $doctormole_options = get_option('theme_doctormole_options');

    // Are our options saved in the DB?
    if (FALSE === $doctormole_options) {
        // If not, we'll save our default options
        $doctormole_options = doctormole_get_default_options();
        add_option('theme_doctormole_options', $doctormole_options);
    }

    // In other case we don't need to update the DB
}

// Initialize Theme options
add_action('after_setup_theme', 'doctormole_options_init');


// Add "doctormole Options" link to the "Appearance" menu
function doctormole_menu_options()
{
    //add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);
    add_theme_page('doctormole Options', 'doctormole Options', 'edit_theme_options', 'doctormole-settings', 'doctormole_admin_options_page');
}

// Load the Admin Options page
add_action('admin_menu', 'doctormole_menu_options');

function doctormole_admin_options_page()
{
    global $wpdb;
    if($wpdb) {
        $attachment_query = "SELECT ID,guid FROM " . $wpdb->posts . " WHERE post_name LIKE 'doctormole%'";
        $attachments = $wpdb->get_results( $attachment_query, ARRAY_A );
        if($error = $wpdb->show_errors()) echo $error;
    }

    $id = "doctormole_upload"; // this will be the name of form field. Image url(s) will be submitted in $_POST using this key. So if $id == “img1” then $_POST[“img1”] will have all the image urls

    $svalue = ""; // this will be initial value of the above form field. Image urls.

    $multiple = TRUE; // allow multiple files upload

    $width = NULL; // If you want to automatically resize all uploaded images then provide width here (in pixels)

    $height = NULL; // If you want to automatically resize all uploaded images then provide height here (in pixels)
    ?>
    <!-- 'wrap','submit','icon32','button-primary' and 'button-secondary' are classes
    for a good WP Admin Panel viewing and are predefined by WP CSS -->
    <div class="wrap">

        <div id="icon-themes" class="icon32"><br/></div>

        <h2><?php _e('doctormole Options', 'doctormole'); ?></h2>

        <!-- If we have any error by submiting the form, they will appear here -->
        <?php settings_errors('doctormole-settings-errors'); ?>
        <form id="form-<?php echo $id; ?>" action="" method="post" enctype="multipart/form-data">
            <label>Upload Images</label>
            <input type="hidden" name="<?php echo $id; ?>" id="<?php echo $id; ?>" value="<?php echo $svalue; ?>"/>

            <div class="plupload-upload-uic hide-if-no-js <?php if ($multiple): ?>plupload-upload-uic-multiple<?php endif; ?>" id="<?php echo $id; ?>plupload-upload-ui">
                <input id="<?php echo $id; ?>plupload-browse-button" type="button" value="<?php esc_attr_e('Select Files'); ?>" class="button"/>
                <span class="ajaxnonceplu" id="ajaxnonceplu<?php echo wp_create_nonce($id . 'pluploadan'); ?>"></span>
                <span class="ajaxnonceplu" id="nonce" value="<?php echo wp_create_nonce($id); ?>""></span>
                <?php if ($width && $height): ?>
                    <span class="plupload-resize"></span>
                    <span class="plupload-width" id="plupload-width<?php echo $width; ?>"></span>
                    <span class="plupload-height" id="plupload-height<?php echo $height; ?>"></span>
                <?php endif; ?>
                <div class="filelist"></div>
            </div>
            <?php if($attachments): ?>
            <div class="plupload-thumbs <?php if ($multiple): ?>plupload-thumbs-multiple<?php endif; ?>" id="<?php echo $id; ?>plupload-thumbs">
                <input type="hidden" value="<?php echo admin_url('admin-ajax.php')  ; ?>" id="admin_url">
                <?php foreach($attachments as $k=>$row): ?>
                <div id="thumbdoctormole_upload<?php echo $k; ?>" class="thumb">
                    <img alt="" src="<?php echo $row['guid']; ?>">
                    <div class="thumbi">
                        <a class="delete_thumbs" href="#" id="<?php echo $row['ID']; ?>">Remove</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="clear"></div>
        </form>
    </div>
<?php
}

function g_plupload_action()
{
    // check ajax noonce
    $imgid = $_POST["imgid"];
    check_ajax_referer($imgid . 'pluploadan');
    // handle file upload
    $status = wp_handle_upload($_FILES[$imgid . 'async-upload'], array('test_form' => TRUE,
                                                                       'action'    => 'plupload_action'));

    //save as attachment
    $img_name = $_FILES[$imgid . 'async-upload']['name'];
    $attachment_arr = array('guid' => $status['url'],
                             'post_mime_type' => $status['type'],
                             'post_title' => 'doctormole_screenshot_'.$img_name,
                             'post_content' => '',
                             'post_status' => 'inherit');
    wp_insert_attachment($attachment_arr);

    // send the uploaded file url in response
    echo $status['url'];
    exit;
}

add_action('wp_ajax_plupload_action', "g_plupload_action");


function delete_attachment( $post ) {
    $msg = 'Screenshot has been deleted!';
    if( $post = wp_delete_attachment( $_POST['att_id'], true )) {
        $uploadpath = wp_upload_dir();
        $file = 'doctormole_screenshot_' . $post['post_name'];
        path_join($uploadpath['basedir'], $file);
        echo $msg;
    }
    die();
}
add_action( 'wp_ajax_delete_attachment', 'delete_attachment' );

/********************* JAVASCRIPT ******************************/
function doctormole_options_enqueue_scripts()
{
    wp_register_script('doctormole-upload', get_template_directory_uri() . '/js/doctormole-upload.js', array('jquery',
                                                                                                             'media-upload',
                                                                                                             'thickbox'));

    if ('appearance_page_doctormole-settings' == get_current_screen()->id) {
        wp_enqueue_script('plupload-all');

        wp_register_script('myplupload', get_template_directory_uri() . '/js/doctormole-upload.js', array('jquery'));
        wp_enqueue_script('myplupload');

        wp_register_style('myplupload', get_template_directory_uri() . '/css/doctormole-upload.css');
        wp_enqueue_style('myplupload');
    }
}

add_action('admin_enqueue_scripts', 'doctormole_options_enqueue_scripts');

function plupload_admin_head()
{
// place js config array for plupload
    $plupload_init = array('runtimes'            => 'html5,silverlight,flash,html4',
                           'browse_button'       => 'plupload-browse-button', // will be adjusted per uploader
                           'container'           => 'plupload-upload-ui', // will be adjusted per uploader
                           'drop_element'        => 'drag-drop-area', // will be adjusted per uploader
                           'file_data_name'      => 'async-upload', // will be adjusted per uploader
                           'multiple_queues'     => TRUE,
                           'max_file_size'       => wp_max_upload_size() . 'b',
                           'url'                 => admin_url('admin-ajax.php'),
                           'flash_swf_url'       => includes_url('js/plupload/plupload.flash.swf'),
                           'silverlight_xap_url' => includes_url('js/plupload/plupload.silverlight.xap'),
                           'filters'             => array(array('title' => __('Allowed Files'), 'extensions' => '*')),
                           'multipart'           => TRUE,
                           'urlstream_upload'    => TRUE,
                           'multi_selection'     => FALSE, // will be added per uploader
        // additional post data to send to our ajax hook
                           'multipart_params'    => array('_ajax_nonce' => "", // will be added per uploader
                                                          'action'      => 'plupload_action', // the ajax action name
                                                          'imgid'       => 0 // will be added per uploader
                           ));
    ?>
    <script type="text/javascript">
        var base_plupload_config =<?php echo json_encode($plupload_init); ?>;
    </script>
<?php
}

add_action("admin_head", "plupload_admin_head");

function doctormole_options_settings_init()
{
    register_setting('theme_doctormole_options', 'theme_doctormole_options', 'doctormole_options_validate');

    // Add a form section for the Logo
    add_settings_section('doctormole_settings_header', __('Screenshot Options', 'doctormole'), 'doctormole_settings_header_text', 'doctormole');

    // Add Logo uploader
    add_settings_field('doctormole_setting_logo', __('Screenshot', 'doctormole'), 'doctormole_setting_logo', 'doctormole', 'doctormole_settings_header');

    // Add Current Image Preview
    add_settings_field('doctormole_setting_logo_preview', __('Screenshot Preview', 'doctormole'), 'doctormole_setting_logo_preview', 'doctormole', 'doctormole_settings_header');
}

add_action('admin_init', 'doctormole_options_settings_init');

function doctormole_setting_logo_preview()
{
    $doctormole_options = get_option('theme_doctormole_options');  ?>
    <div id="upload_logo_preview" style="min-height: 100px;">
        <img style="max-width:100%;" src="<?php echo esc_url($doctormole_options['logo']); ?>"/>
    </div>
<?php
}

function doctormole_settings_header_text()
{
    ?>
    <p><?php _e('Upload screenshots for Dotormole Theme.', 'doctormole'); ?></p>
<?php
}

function doctormole_setting_logo()
{
    $doctormole_options = get_option('theme_doctormole_options');
    ?>
    <input type="hidden" id="logo_url" name="theme_doctormole_options[logo]" value="<?php echo esc_url($doctormole_options['logo']); ?>"/>
    <input id="upload_logo_button" type="button" class="button" value="<?php _e('Upload Logo', 'doctormole'); ?>"/>
    <?php if ('' != $doctormole_options['logo']): ?>
    <input id="delete_logo_button" name="theme_doctormole_options[delete_logo]" type="submit" class="button" value="<?php _e('Delete Logo', 'doctormole'); ?>"/>
<?php endif; ?>
    <span class="description"><?php _e('Upload an image for the banner.', 'doctormole'); ?></span>
<?php
}
