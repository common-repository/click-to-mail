<?php

/**
 * 
 * @package    Click to mail - WordPress plugin
 * @version    1.0
 * @author     ThemeAtelier
 * @Websites: https://themeatelier.net/
 *
 */
if (!defined('ABSPATH')) {
	die(CTM_ALERT_MSG);
}

if (!class_exists('Ctm_Enqueue')) {
	class Ctm_Enqueue
	{
		public function __construct($args = array())
		{
			add_action('wp_enqueue_scripts', array($this, 'frontend_enqueue_scripts'));
		}
		// Front-End enqueue scripts
		public function frontend_enqueue_scripts()
		{
			wp_enqueue_style('fontawesome', CTM_DIR_URL . 'assets/css/all.min.css', array(), '1.0', false);
			wp_enqueue_style('ctm-main', CTM_DIR_URL . 'assets/css/ctm-main.css', array(), '1.0', false);
			$options = get_option('ctm-opt');
			if ($options['bubble-style'] === 'dark' || $options['bubble-style'] === 'night') {
				wp_enqueue_style('custom-style', CTM_DIR_URL . 'assets/css/mailto-ui-custom.css');
			}
			/********************
				Js Enqueue
			 ********************/
			wp_enqueue_script('moment', array('jquery'), '1.0', true);
			wp_enqueue_script('moment-timezone', CTM_DIR_URL . 'assets/js/moment-timezone-with-data.min.js', array('jquery'), '1.0', true);
			wp_enqueue_script('ctm-main', CTM_DIR_URL . 'assets/js/ctm-main.js', array('jquery'), '1.0', true);
			wp_enqueue_script('mailto-ui', CTM_DIR_URL . 'assets/js/mailto-ui.min.js', array('jquery'), '1.0', true);
			$mailtoui_strings = array(
				'heading' => __('Compose new email with', 'click-to-mail'),
				'gmail' => __('Gmail in browser', 'click-to-mail'),
				'outlook' => __('Outlook in browser', 'click-to-mail'),
				'yahoo' => __('Yahoo in browser', 'click-to-mail'),
				'default' => __('Default email app', 'click-to-mail'),
				'copy' => __('Copy', 'click-to-mail'),
				'copied' => __('Copied!', 'click-to-mail')
			);

			wp_localize_script('mailto-ui', 'mailtoui_strings', $mailtoui_strings);
		}
	}

	$obj = new Ctm_Enqueue();
}
