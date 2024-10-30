<?php
/*
 *  Plugin Name:    Click to mail
 *  Plugin URI:     http://wpchatplugins.com/
 *  Description:    Can easily create Bubble & buttons for sending email in any WordPress site. Gutenberg, Elementor and shortcodes supported. 
 *  Author:         ThemeAtelier
 *  Author URI:     http://themeatelier.net/
 *  Requirements:   PHP 7.0 or above, WordPress 4.0 or above.
 *  Version:       1.2.1
 * Text Domain:  click-to-mail
 * Domain Path:  /languages
 */

// Block Direct access
if (!defined('ABSPATH')) {
    die('You should not access this file directly!.');
}

// Define Constants for direct access alert message.
if (!defined('CTM_ALERT_MSG'))
    define('CTM_ALERT_MSG', esc_html__('You should not access this file directly.!', 'click-to-mail'));

// Click to mail version

if (!defined('CLICK_TO_MAIL_VERSION'))
    define('CLICK_TO_MAIL_VERSION', '1.2.0');

// Define constants for plugin directory path.
if (!defined('CTM_DIR_PATH'))
    define('CTM_DIR_PATH', plugin_dir_path(__FILE__));


// Define constants for view directory path.
if (!defined('CTM_VIEW_DIR_PATH'))
    define('CTM_VIEW_DIR_PATH', CTM_DIR_PATH . 'view/');

// Define constants for elementor widget directory path.
if (!defined('CTM_EW_DIR_PATH'))
    define('CTM_EW_DIR_PATH', CTM_VIEW_DIR_PATH . 'elementor-widgets/');


// Define constants for plugin directory path.
if (!defined('CTM_DIR_URL'))
    define('CTM_DIR_URL', plugin_dir_url(__FILE__));

// load text domain from plugin folder
function ctm_load_textdomain()
{
    load_plugin_textdomain('', false, dirname(__FILE__) . "/languages");
}
add_action("plugins_loaded", 'ctm_load_textdomain');

// Plugin settings in plugin list
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'ctm_settings_link');
function ctm_settings_link(array $links)
{
    $url = get_admin_url() . "admin.php?page=ctm";
    $settings_link = '<a href="' . esc_url($url) . '">' . esc_html__('Settings', 'greet') . '</a>';
    $links[] = $settings_link;
    return $links;
}

// Pro version link
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'click_to_mail_pro_link');
function click_to_mail_pro_link(array $links)
{
    $url = "https://1.envato.market/MXZzrn";
    $settings_link = '<a style="color: #1163FA; font-weight: 700;" href="' . esc_url($url) . '">' . esc_html__('Go Pro!', 'click-to-mail') . '</a>';
    $links[] = $settings_link;
    return $links;
}

// Register block
function create_block_click_to_mail_init()
{
    register_block_type_from_metadata(CTM_VIEW_DIR_PATH . 'blocks/');
}
add_action('init', 'create_block_click_to_mail_init');


// Register block category 

function click_to_mail_chat_plugin_block_categories($categories)
{
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'click-to-mail-block',
                'title' => __('Click to mail block', 'click-to-mail'),
            ],
        ]
    );
}
add_action('block_categories', 'click_to_mail_chat_plugin_block_categories', 10, 2);


// Script enqueue class include
require_once CTM_DIR_PATH . 'inc/class-enqueue.php';

// View Shortcodes
require_once CTM_DIR_PATH . '/view/elementor-widgets/elementor-widget.php';
require_once CTM_DIR_PATH . 'view/shortcodes/custom-shortcode.php';

// buttons functions
require_once CTM_DIR_PATH . 'inc/functions.php';
// Button template class
require_once CTM_DIR_PATH . 'inc/class-custom-buttons-templates.php';

// single chat bubble template
require_once CTM_DIR_PATH . '/view/chat-bubbles/chat-bubbles.php';

// include framework for admin panel
require_once CTM_DIR_PATH . 'admin/codestar-framework.php';
require_once CTM_DIR_PATH . 'inc/ctm-plugin-options.php';


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function click_to_mail_appsero_init()
{

    if (!class_exists('ClickToMailAppSero\Insights')) {
        require_once CTM_DIR_PATH . 'admin/appsero/Client.php';
    }
    $client = new ClickToMailAppSero\Client('a38e7ef2-19a6-4a2f-ae61-1b93324f9104', 'Click To Email', __FILE__);
    // Active insights
    $client->insights()->init();
}

click_to_mail_appsero_init();
