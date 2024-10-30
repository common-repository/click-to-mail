<?php

add_action('wp_footer', 'ctm_chat_popup');

function ctm_chat_popup()
{
  $options = get_option('ctm-opt');
  $optAvailablity = $options['opt-availablity'];
  $sunday_from = $optAvailablity ? $optAvailablity['availablity-sunday']['from'] : '00:00';
  $sunday_to = $optAvailablity ? $optAvailablity['availablity-sunday']['to'] : '23:59';

  $monday_from = $optAvailablity ? $optAvailablity['availablity-monday']['from'] : '00:00';
  $monday_to = $optAvailablity ? $optAvailablity['availablity-monday']['to'] : '23:59';

  $tuesday_from = $optAvailablity ? $optAvailablity['availablity-tuesday']['from'] : '00:00';
  $tuesday_to = $optAvailablity ? $optAvailablity['availablity-tuesday']['to'] : '23:59';

  $wednesday_from = $optAvailablity ? $optAvailablity['availablity-wednesday']['from'] : '00:00';
  $wednesday_to = $optAvailablity ? $optAvailablity['availablity-wednesday']['to'] : '23:59';

  $thursday_from = $optAvailablity ? $optAvailablity['availablity-thursday']['from'] : '00:00';
  $thursday_to = $optAvailablity ? $optAvailablity['availablity-thursday']['to'] : '23:59';
  $friday_from = $optAvailablity ? $optAvailablity['availablity-friday']['from'] : '00:00';
  $friday_to = $optAvailablity ? $optAvailablity['availablity-friday']['to'] : '23:59';
  $saturday_from = $optAvailablity ? $optAvailablity['availablity-saturday']['from'] : '00:00';
  $saturday_to = $optAvailablity ? $optAvailablity['availablity-saturday']['to'] : '23:59';
  $sunday = ($sunday_from ? $sunday_from : "0:00") . "-" . ($sunday_to ? $sunday_to : "23:59");
  $monday = ($monday_from ? $monday_from : "0:00") . "-" . ($monday_to ? $monday_to : "23:59");
  $tuesday = ($tuesday_from ? $tuesday_from : "0:00") . "-" . ($tuesday_to ? $tuesday_to : "23:59");
  $wednesday = ($wednesday_from ? $wednesday_from : "0:00") . "-" . ($wednesday_to ? $wednesday_to : "23:59");
  $thursday = ($thursday_from ? $thursday_from : "0:00") . "-" . ($thursday_to ? $thursday_to : "23:59");
  $friday = ($friday_from ? $friday_from : "0:00") . "-" . ($friday_to ? $friday_to : "23:59");
  $saturday = ($saturday_from ? $saturday_from : "0:00") . "-" . ($saturday_to ? $saturday_to : "23:59");
  $random = rand(1, 13);
  $bubbleType = null;
  $buttonLabel = $options['bubble-text'];
  if ($options['opt-button-style'] === '1') {
    $bubbleType = '<button class="ctm-bubble circle-bubble circle-animation-' . esc_attr($options['circle-animation']) . ' ">
      <span class="open-icon"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
      <span class="close-icon"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
    </button>';
  } elseif ($options['opt-button-style'] === '2') {
    $bubbleType = '<button class="bubble ctm-btn-bg">
      <div class="bubble__icon bubble-animation' . esc_attr($options['circle-animation']) . '">
      <span class="bubble__icon--open"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
      <span class="bubble__icon--close"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
      </div>' . esc_attr($buttonLabel) . '</button>';
  } elseif ($options['opt-button-style'] === '3') {
    $bubbleType = '<button class=" bubble">
      <div class="bubble__icon bubble-animation' . esc_attr($options['circle-animation']) . '">
      <span class="bubble__icon--open"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
      <span class="bubble__icon--close"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
      </div>' . esc_attr($buttonLabel) . '</button>';
  } elseif ($options['opt-button-style'] === '4') {
    $bubbleType = '<button class="bubble ctm-btn-rounded ctm-btn-bg">
    <div class="bubble__icon bubble-animation' . esc_attr($options['circle-animation']) . '">
    <span class="bubble__icon--open"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
    <span class="bubble__icon--close"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
    </div>' . esc_attr($buttonLabel) . '</button>';
  } elseif ($options['opt-button-style'] === '5') {
    $bubbleType = '<button class="bubble ctm-btn-rounded">
  <div class="bubble__icon bubble-animation' . esc_attr($options['circle-animation']) . '">
  <span class="bubble__icon--open"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
  </div>' . esc_attr($buttonLabel) . '</button>';
  } elseif ($options['opt-button-style'] === '6') {
    $bubbleType = '<button class="bubble ctm-btn-bg bubble-transparent">
  <div class="bubble__icon bubble-animation' . esc_attr($options['circle-animation']) . '">
  <span class="bubble__icon--open"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
  </div>' . esc_attr($buttonLabel) . '</button>';
  } elseif ($options['opt-button-style'] === '7') {
    $bubbleType = '<button class="ctm-bubble bubble  bubble-transparent">
  <div class="bubble__icon bubble-animation' . esc_attr($options['circle-animation']) . '">
  <span class="bubble__icon--open"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
  </div>' . esc_attr($buttonLabel) . '</button>';
  } elseif ($options['opt-button-style'] === '8') {
    $bubbleType = '<button class="ctm-bubble bubble ctm-btn-bg ctm-btn-rounded bubble-transparent">
  <div class="bubble__icon bubble-animation' . esc_attr($options['circle-animation']) . '">
  <span class="bubble__icon--open"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
  </div>' . esc_attr($buttonLabel) . '</button>';
  } elseif ($options['opt-button-style'] === '9') {
    $bubbleType = '<button class="ctm-bubble bubble ctm-btn-rounded bubble-transparent">
  <div class="bubble__icon bubble-animation' . esc_attr($options['circle-animation']) . '">
  <span class="bubble__icon--open"><i class="' . esc_html($options['circle-button-icon']) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html($options['circle-button-close']) . '"></i></span>
  </div>' . esc_attr($buttonLabel) . '</button>';
  }
?>


  <div class="ctm ctm-<?php if (isset($options['bubble-visibility'])) {
                        echo esc_attr($options['bubble-visibility']);
                      }; ?>-only <?php if ($options['autoshow-popup']) : ?>ctm-show<?php endif; ?> <?php if ($options['bubble-style'] === 'dark') : ?>dark-mode <?php elseif ($options['bubble-style'] === 'night') : ?> night-mode<?php endif; ?> <?php if ($options['bubble-position'] === 'left') { ?>ctm-left<?php } ?>">
    <?php echo $bubbleType; ?>
    <div class="ctm__popup animation<?php if ($options['select-animation'] === 'random') : ?><?php echo $random ?><?php else : ?><?php echo esc_attr($options['select-animation']); ?><?php endif; ?> chat-availability" data-ctmNumber="<?php echo esc_attr($options['opt-email']); ?>" <?php if ($options['select-timezone']) { ?> data-timezone="<?php echo esc_attr($options['select-timezone']); ?>" <?php } ?> data-availability='{ "sunday":"<?php echo esc_attr($sunday); ?>", "monday":"<?php echo esc_attr($monday); ?>", "tuesday":"<?php echo esc_attr($tuesday); ?>", "wednesday":"<?php echo esc_attr($wednesday); ?>", "thursday":"<?php echo esc_attr($thursday); ?>", "friday":"<?php echo esc_attr($friday); ?>", "saturday":"<?php echo esc_attr($saturday); ?>" }'>


      <div class="ctm__popup--header <?php if ($options['header-content-position'] === 'center') { ?>header-center<?php } ?>">

        <div class="image">
          <img src="<?php echo esc_attr($options['agent-photo']['url']); ?>" />
        </div>
        <div class="info">
          <h4 class="info__name"><?php echo esc_html($options['agent-name']); ?></h4>

          <p class="info__title"><?php echo esc_html($options['agent-subtitle']); ?></p>
        </div>
      </div>
      <div class="ctm__popup--content">

        <?php if ($options['opt-layout-type'] === 'form') : ?>
          <div class="user-text">
            <input id="subject" type="text" placeholder="Subject" />
            <textarea id="message" rows="5" placeholder="Message"></textarea>
          </div>
        <?php else : ?>
          <div class="current-time"></div>
          <div class="sms">
            <div class="sms__user">
              <img src="<?php echo esc_attr($options['agent-photo']['url']); ?>" />
            </div>
            <div class="sms__text">
              <p>
                <?php echo esc_html($options['agent-message']); ?>
              </p>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($options['opt-layout-type'] === 'form') : ?>
          <button class="ctm__send-message">
            <i class="<?php echo esc_html($options['before-chat-icon']); ?>"></i><?php echo esc_html($options['chat-button-text']); ?> <a class="mailtoui" href="mailto:<?php echo esc_html($options['opt-email']); ?>?subject=subjectText&cc=<?php echo esc_html($options['opt-cc-email']); ?>&bcc=<?php echo esc_html($options['opt-bcc-email']); ?>&body=bodyText"></a>
          </button>
        <?php else : ?>
          <button class="ctm__send-message">
            <i class="<?php echo esc_html($options['before-chat-icon']); ?>"></i><?php echo esc_html($options['chat-button-text']); ?>
            <a class="mailtoui" href="mailto:<?php echo esc_html($options['opt-email']); ?>?subject=<?php echo esc_html($options['opt-subject']); ?>&cc=<?php echo esc_html($options['opt-cc-email']); ?>&bcc=<?php echo esc_html($options['opt-bcc-email']); ?>&body=<?php echo esc_html($options['opt-bodytext']); ?>">
            </a>
          </button>
        <?php endif; ?>
        <span class="wcp-branding">Powered by <a target="_blank" href="https://wpchatplugins.com/"><strong>WpChatPlugins</strong></a></span>

      </div>
    </div>
  </div>

<?php
}
?>