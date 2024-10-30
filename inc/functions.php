<?php
 /**
  * 
  * @package    Click to mail - WordPress plugin
  * @version    1.0
  * @author     ThemeAtelier
  * @Websites: https://themeatelier.net/
  *
  */
  if( ! defined( 'ABSPATH' ) ) {
    die( CTM_ALERT_MSG );
  }

/**
 * Click to mail buttons init
 *
 *
 */

function ctm_buttons_template_init( $args ) {
  $buttonObj = new Ctm_Buttons_Template( $args );

    if( !empty( $args['style'] ) ) {

    // Style Switch
    switch ( $args['style'] ) {
        case '1':
            $buttonObj->ctn_button_s1();
            break;
        case '2':
            $buttonObj->ctm_button_s2();
            break;
        default:
            $buttonObj->ctm_button_s1();
            break;
    }
  }
}

