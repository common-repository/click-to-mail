<?php

/**
 * 
 * @package    Click to mail Wp plugin
 * @version    1.0
 * @author     ThemeAtelier
 * @Websites: https://themeatelier.net/
 *
 */

add_shortcode('ctm', 'ctm_custom_buttons_shortcode');
function ctm_custom_buttons_shortcode($atts)
{
  $atts = shortcode_atts(array(
    'style' => '1',
    'photo' => CTM_DIR_URL . 'assets/image/user.webp',
    'name' => esc_html__('Robert', 'click-to-mail'),
    'designation' => esc_html__('Sales Support', 'click-to-mail'),
    'label' => esc_html__('How can I help you?', 'click-to-mail'),
    'online' => esc_html__('I\'m avaiable', 'click-to-mail'),
    'offline'  => esc_html__('I\'m offline', 'click-to-mail'),
    'number' => esc_html__('008801813381520', 'click-to-mail'),
    'visibility' => 'ctm-show-everywhere',
    'sizes' => 'ctm-btn-md',
    'rounded' => 'ctm-btn-rounded',
    'sunday' => esc_html__('00:00-23:59', 'click-to-mail'),
    'monday' => esc_html__('00:00-23:59', 'click-to-mail'),
    'tuesday' => esc_html__('00:00-23:59', 'click-to-mail'),
    'wednesday' => esc_html__('00:00-23:59', 'click-to-mail'),
    'thursday' => esc_html__('00:00-23:59', 'click-to-mail'),
    'friday' => esc_html__('00:00-23:59', 'click-to-mail'),
    'saturday' => esc_html__('00:00-23:59', 'click-to-mail'),
  ), $atts);

  ob_start();

  ctm_buttons_template_init($atts);

  return ob_get_clean();
}
