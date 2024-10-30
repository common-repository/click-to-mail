<?php

namespace ctmelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
/**
 *
 * Laamya elementor about page section widget.
 *
 * @since 1.0
 */
class Ctm_Buttons extends Widget_Base
{

    public function get_name()
    {
        return 'ctm-buttons';
    }

    public function get_title()
    {
        return esc_html__('Click to mail buttons', 'click-to-mail');
    }

    public function get_icon()
    {
        return 'eicon-headphones';
    }

    public function get_categories()
    {
        return ['ctm-elements'];
    }

    protected function _register_controls()
    {


        // ----------------------------------------  Click to mail Buttons Settings ------------------------------

        $this->start_controls_section(
            'ctm__general__settings',
            [
                'label' => esc_html__('General settings', 'click-to-mail'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'number',
            [
                'label'     => esc_html__('Number', 'click-to-mail'),
                'description' => esc_html__('Add your contact number including country code. eg: +880123456189', 'click-to-mail'),
                'label_block' => false,
                'type'      => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'click-to-mail'),
                'type'  => Controls_Manager::SELECT,
                'label_block' => false,
                'default' => '1',
                'options' => array(
                    '1'  => esc_html__('Advanced button', 'click-to-mail'),
                    '2'  => esc_html__('Basic button', 'click-to-mail'),
                )

            ]
        );

        $this->add_control(
            'agent__photo',
            [
                'label' => esc_html__('Agent photo', 'click-to-mail'),
                'description' => esc_html__('Add agent photo to show in button.', 'click-to-mail'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => CTM_DIR_URL . 'assets/image/user.webp',
                ],
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->add_control(
            'agent__name',
            [
                'label' => esc_html__('Agent name', 'click-to-mail'),
                'description' => esc_html__('Write agent name to show in button.', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('Robert', 'click-to-mail'),
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->add_control(
            'agent__designation',
            [
                'label' => esc_html__('Agent designation', 'click-to-mail'),
                'description' => esc_html__('Write agent designation to show in button.', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('Sales Support', 'click-to-mail'),
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->add_control(
            'custom__button__label',
            [
                'label' => esc_html__('Button label', 'click-to-mail'),
                'description' => esc_html__('Add custom button label.', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('How can I help you?', 'click-to-mail'),
            ]
        );

        $this->add_control(
            'online__text',
            [
                'label' => esc_html__('Online badget text', 'click-to-mail'),
                'description' => esc_html__('Add custom badget text when user in online.', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('I\'m avaiable', 'click-to-mail'),
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->add_control(
            'offline__text',
            [
                'label' => esc_html__('Offline badget text', 'click-to-mail'),
                'description' => esc_html__('Add custom badget text when user in offline.', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('I\'m offline', 'click-to-mail'),
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->end_controls_section(); // End section top content


        $this->start_controls_section(
            'ctm__availablity__manager',
            [
                'label' => esc_html__('Chat settings', 'click-to-mail'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style' => '1',
                ],
            ]
        );



        $this->add_control(
            'timezone',
            [
                'label' => esc_html__('Timezone', 'click-to-mail'),
                'description' => esc_html__('When using the date and time from the user browser you can transform it to your current timezone (in case your user is in a different timezone)', 'click-to-mail'),
                'type'  => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'default' => '1',
                'options' => array(
                    '1' => esc_html__('Select timezone', 'click-to-mail'),
                    'Africa/Abidjan' => esc_html__('Africa/Abidjan', 'click-to-mail'),
                    'Africa/Accra' => esc_html__('Africa/Accra', 'click-to-mail'),
                    'Africa/Addis_Ababa' => esc_html__('Africa/Addis_Ababa', 'click-to-mail'),
                    'Africa/Algiers' => esc_html__('Africa/Algiers', 'click-to-mail'),
                    'Africa/Asmara' => esc_html__('Africa/Asmara', 'click-to-mail'),
                    'Africa/Asmera' => esc_html__('Africa/Asmera', 'click-to-mail'),
                    'Africa/Bamako' => esc_html__('Africa/Bamako', 'click-to-mail'),
                    'Africa/Bangui' => esc_html__('Africa/Bangui', 'click-to-mail'),
                    'Africa/Banjul' => esc_html__('Africa/Banjul', 'click-to-mail'),
                    'Africa/Bissau' => esc_html__('Africa/Bissau', 'click-to-mail'),
                    'Africa/Blantyre' => esc_html__('Africa/Blantyre', 'click-to-mail'),
                    'Africa/Brazzaville' => esc_html__('Africa/Brazzaville', 'click-to-mail'),
                    'Africa/Bujumbura' => esc_html__('Africa/Bujumbura', 'click-to-mail'),
                    'Africa/Cairo' => esc_html__('Africa/Cairo', 'click-to-mail'),
                    'Africa/Casablanca' => esc_html__('Africa/Casablanca', 'click-to-mail'),
                    'Africa/Ceuta' => esc_html__('Africa/Ceuta', 'click-to-mail'),
                    'Africa/Conakry' => esc_html__('Africa/Conakry', 'click-to-mail'),
                    'Africa/Dakar' => esc_html__('Africa/Dakar', 'click-to-mail'),
                    'Africa/Dar_es_Salaam' => esc_html__('Africa/Dar_es_Salaam', 'click-to-mail'),
                    'Africa/Djibouti' => esc_html__('Africa/Djibouti', 'click-to-mail'),
                    'Africa/Douala' => esc_html__('Africa/Douala', 'click-to-mail'),
                    'Africa/El_Aaiun' => esc_html__('Africa/El_Aaiun', 'click-to-mail'),
                    'Africa/Freetown' => esc_html__('Africa/Freetown', 'click-to-mail'),
                    'Africa/Gaborone' => esc_html__('Africa/Gaborone', 'click-to-mail'),
                    'Africa/Harare' => esc_html__('Africa/Harare', 'click-to-mail'),
                    'Africa/Johannesburg' => esc_html__('Africa/Johannesburg', 'click-to-mail'),
                    'Africa/Juba' => esc_html__('Africa/Juba', 'click-to-mail'),
                    'Africa/Kampala' => esc_html__('Africa/Kampala', 'click-to-mail'),
                    'Africa/Khartoum' => esc_html__('Africa/Khartoum', 'click-to-mail'),
                    'Africa/Kigali' => esc_html__('Africa/Kigali', 'click-to-mail'),
                    'Africa/Kinshasa' => esc_html__('Africa/Kinshasa', 'click-to-mail'),
                    'Africa/Lagos' => esc_html__('Africa/Lagos', 'click-to-mail'),
                    'Africa/Libreville' => esc_html__('Africa/Libreville', 'click-to-mail'),
                    'Africa/Lome' => esc_html__('Africa/Lome', 'click-to-mail'),
                    'Africa/Luanda' => esc_html__('Africa/Luanda', 'click-to-mail'),
                    'Africa/Lubumbashi' => esc_html__('Africa/Lubumbashi', 'click-to-mail'),
                    'Africa/Lusaka' => esc_html__('Africa/Lusaka', 'click-to-mail'),
                    'Africa/Malabo' => esc_html__('Africa/Malabo', 'click-to-mail'),
                    'Africa/Maputo' => esc_html__('Africa/Maputo', 'click-to-mail'),
                    'Africa/Maseru' => esc_html__('Africa/Maseru', 'click-to-mail'),
                    'Africa/Mbabane' => esc_html__('Africa/Mbabane', 'click-to-mail'),
                    'Africa/Mogadishu' => esc_html__('Africa/Mogadishu', 'click-to-mail'),
                    'Africa/Monrovia' => esc_html__('Africa/Monrovia', 'click-to-mail'),
                    'Africa/Nairobi' => esc_html__('Africa/Nairobi', 'click-to-mail'),
                    'Africa/Ndjamena' => esc_html__('Africa/Ndjamena', 'click-to-mail'),
                    'Africa/Niamey' => esc_html__('Africa/Niamey', 'click-to-mail'),
                    'Africa/Nouakchott' => esc_html__('Africa/Nouakchott', 'click-to-mail'),
                    'Africa/Ouagadougou' => esc_html__('Africa/Ouagadougou', 'click-to-mail'),
                    'Africa/Porto-Novo' => esc_html__('Africa/Porto-Novo', 'click-to-mail'),
                    'Africa/Sao_Tome' => esc_html__('Africa/Sao_Tome', 'click-to-mail'),
                    'Africa/Timbuktu' => esc_html__('Africa/Timbuktu', 'click-to-mail'),
                    'Africa/Tripoli' => esc_html__('Africa/Tripoli', 'click-to-mail'),
                    'Africa/Tunis' => esc_html__('Africa/Tunis', 'click-to-mail'),
                    'Africa/Windhoek' => esc_html__('Africa/Windhoek', 'click-to-mail'),
                    'America/Adak' => esc_html__('America/Adak', 'click-to-mail'),
                    'America/Anchorage' => esc_html__('America/Anchorage', 'click-to-mail'),
                    'America/Anguilla' => esc_html__('America/Anguilla', 'click-to-mail'),
                    'America/Antigua' => esc_html__('America/Antigua', 'click-to-mail'),
                    'America/Araguaina' => esc_html__('America/Araguaina', 'click-to-mail'),
                    'America/Argentina/Buenos_Aires' => esc_html__('America/Argentina/Buenos_Aires', 'click-to-mail'),
                    'America/Argentina/Catamarca' => esc_html__('America/Argentina/Catamarca', 'click-to-mail'),
                    'America/Argentina/ComodRivadavia' => esc_html__('America/Argentina/ComodRivadavia', 'click-to-mail'),
                    'America/Argentina/Cordoba' => esc_html__('America/Argentina/Cordoba', 'click-to-mail'),
                    'America/Argentina/Jujuy' => esc_html__('America/Argentina/Jujuy', 'click-to-mail'),
                    'America/Argentina/La_Rioja' => esc_html__('America/Argentina/La_Rioja', 'click-to-mail'),
                    'America/Argentina/Mendoza' => esc_html__('America/Argentina/Mendoza', 'click-to-mail'),
                    'America/Argentina/Rio_Gallegos' => esc_html__('America/Argentina/Rio_Gallegos', 'click-to-mail'),
                    'America/Argentina/Salta' => esc_html__('America/Argentina/Salta', 'click-to-mail'),
                    'America/Argentina/San_Juan' => esc_html__('America/Argentina/San_Juan', 'click-to-mail'),
                    'America/Argentina/San_Luis' => esc_html__('America/Argentina/San_Luis', 'click-to-mail'),
                    'America/Argentina/Tucuman' => esc_html__('America/Argentina/Tucuman', 'click-to-mail'),
                    'America/Argentina/Ushuaia' => esc_html__('America/Argentina/Ushuaia', 'click-to-mail'),
                    'America/Aruba' => esc_html__('America/Aruba', 'click-to-mail'),
                    'America/Asuncion' => esc_html__('America/Asuncion', 'click-to-mail'),
                    'America/Atikokan' => esc_html__('America/Atikokan', 'click-to-mail'),
                    'America/Atka' => esc_html__('America/Atka', 'click-to-mail'),
                    'America/Bahia' => esc_html__('America/Bahia', 'click-to-mail'),
                    'America/Bahia_Banderas' => esc_html__('America/Bahia_Banderas', 'click-to-mail'),
                    'America/Barbados' => esc_html__('America/Barbados', 'click-to-mail'),
                    'America/Belem' => esc_html__('America/Belem', 'click-to-mail'),
                    'America/Belize' => esc_html__('America/Belize', 'click-to-mail'),
                    'America/Blanc-Sablon' => esc_html__('America/Blanc-Sablon', 'click-to-mail'),
                    'America/Boa_Vista' => esc_html__('America/Boa_Vista', 'click-to-mail'),
                    'America/Bogota' => esc_html__('America/Bogota', 'click-to-mail'),
                    'America/Boise' => esc_html__('America/Boise', 'click-to-mail'),
                    'America/Buenos_Aires' => esc_html__('America/Buenos_Aires', 'click-to-mail'),
                    'America/Cambridge_Bay' => esc_html__('America/Cambridge_Bay', 'click-to-mail'),
                    'America/Campo_Grande' => esc_html__('America/Campo_Grande', 'click-to-mail'),
                    'America/Cancun' => esc_html__('America/Cancun', 'click-to-mail'),
                    'America/Caracas' => esc_html__('America/Caracas', 'click-to-mail'),
                    'America/Catamarca' => esc_html__('America/Catamarca', 'click-to-mail'),
                    'America/Cayenne' => esc_html__('America/Cayenne', 'click-to-mail'),
                    'America/Cayman' => esc_html__('America/Cayman', 'click-to-mail'),
                    'America/Chicago' => esc_html__('America/Chicago', 'click-to-mail'),
                    'America/Chihuahua' => esc_html__('America/Chihuahua', 'click-to-mail'),
                    'America/Coral_Harbour' => esc_html__('America/Coral_Harbour', 'click-to-mail'),
                    'America/Cordoba' => esc_html__('America/Cordoba', 'click-to-mail'),
                    'America/Costa_Rica' => esc_html__('America/Costa_Rica', 'click-to-mail'),
                    'America/Creston' => esc_html__('America/Creston', 'click-to-mail'),
                    'America/Cuiaba' => esc_html__('America/Cuiaba', 'click-to-mail'),
                    'America/Curacao' => esc_html__('America/Curacao', 'click-to-mail'),
                    'America/Danmarkshavn' => esc_html__('America/Danmarkshavn', 'click-to-mail'),
                    'America/Dawson' => esc_html__('America/Dawson', 'click-to-mail'),
                    'America/Araguaina' => esc_html__('America/Araguaina', 'click-to-mail'),
                    'America/Denver' => esc_html__('America/Denver', 'click-to-mail'),
                    'America/Araguaina' => esc_html__('America/Araguaina', 'click-to-mail'),
                    'America/Dominica' => esc_html__('America/Dominica', 'click-to-mail'),
                    'America/Edmonton' => esc_html__('America/Edmonton', 'click-to-mail'),
                    'America/Eirunepe' => esc_html__('America/Eirunepe', 'click-to-mail'),
                    'America/El_Salvador' => esc_html__('America/El_Salvador', 'click-to-mail'),
                    'America/Ensenada' => esc_html__('America/Ensenada', 'click-to-mail'),
                    'America/Fort_Nelson' => esc_html__('America/Fort_Nelson', 'click-to-mail'),
                    'America/Fort_Wayne' => esc_html__('America/Fort_Wayne', 'click-to-mail'),
                    'America/Fortaleza' => esc_html__('America/Fortaleza', 'click-to-mail'),
                    'America/Glace_Bay' => esc_html__('America/Glace_Bay', 'click-to-mail'),
                    'America/Godthab' => esc_html__('America/Godthab', 'click-to-mail'),
                    'America/Goose_Bay' => esc_html__('America/Goose_Bay', 'click-to-mail'),
                    'America/Grand_Turk' => esc_html__('America/Grand_Turk', 'click-to-mail'),
                    'America/Grenada' => esc_html__('America/Grenada', 'click-to-mail'),
                    'America/Guadeloupe' => esc_html__('America/Guadeloupe', 'click-to-mail'),
                    'America/Guatemala' => esc_html__('America/Guatemala', 'click-to-mail'),
                    'America/Guayaquil' => esc_html__('America/Guayaquil', 'click-to-mail'),
                    'America/Guyana' => esc_html__('America/Guyana', 'click-to-mail'),
                    'America/Halifax' => esc_html__('America/Halifax', 'click-to-mail'),
                    'America/Havana' => esc_html__('America/Havana', 'click-to-mail'),
                    'America/Hermosillo' => esc_html__('America/Hermosillo', 'click-to-mail'),
                    'America/Indiana/Indianapolis' => esc_html__('Indiana/Indianapolis', 'click-to-mail'),
                    'America/Indiana/Knox' => esc_html__('America/Indiana/Knox', 'click-to-mail'),
                    'America/Indiana/Marengo' => esc_html__('America/Indiana/Marengo', 'click-to-mail'),
                    'America/Indiana/Petersburg' => esc_html__('America/Indiana/Petersburg', 'click-to-mail'),
                    'America/Indiana/Tell_City' => esc_html__('America/Indiana/Tell_City', 'click-to-mail'),
                    'America/Indiana/Vevay' => esc_html__('America/Indiana/Vevay', 'click-to-mail'),
                    'America/Indiana/Vincennes' => esc_html__('America/Indiana/Vincennes', 'click-to-mail'),
                    'America/Indiana/Winamac' => esc_html__('America/Indiana/Winamac', 'click-to-mail'),
                    'America/Indianapolis' => esc_html__('America/Indianapolis', 'click-to-mail'),
                    'America/Inuvik' => esc_html__('America/Inuvik', 'click-to-mail'),
                    'America/Iqaluit' => esc_html__('America/Iqaluit', 'click-to-mail'),
                    'America/Jamaica' => esc_html__('America/Jamaica', 'click-to-mail'),
                    'America/Jujuy' => esc_html__('America/Jujuy', 'click-to-mail'),
                    'America/Juneau' => esc_html__('America/Juneau', 'click-to-mail'),
                    'America/Kentucky/Louisville' => esc_html__('America/Kentucky/Louisville', 'click-to-mail'),
                    'America/Kentucky/Monticello' => esc_html__('America/Kentucky/Monticello', 'click-to-mail'),
                    'America/Knox_IN' => esc_html__('America/Knox_IN', 'click-to-mail'),
                    'America/Kralendijk' => esc_html__('America/Kralendijk', 'click-to-mail'),
                    'America/La_Paz' => esc_html__('America/La_Paz', 'click-to-mail'),
                    'America/Lima' => esc_html__('America/Lima', 'click-to-mail'),
                    'America/Los_Angeles' => esc_html__('America/Los_Angeles', 'click-to-mail'),
                    'America/Louisville' => esc_html__('America/Louisville', 'click-to-mail'),
                    'America/Lower_Princes' => esc_html__('America/Lower_Princes', 'click-to-mail'),
                    'America/Maceio' => esc_html__('America/Maceio', 'click-to-mail'),
                    'America/Managua' => esc_html__('America/Managua', 'click-to-mail'),
                    'America/Manaus' => esc_html__('America/Manaus', 'click-to-mail'),
                    'America/Marigot' => esc_html__('America/Marigot', 'click-to-mail'),
                    'America/Martinique' => esc_html__('America/Martinique', 'click-to-mail'),
                    'America/Matamoros' => esc_html__('America/Matamoros', 'click-to-mail'),
                    'America/Mazatlan' => esc_html__('America/Mazatlan', 'click-to-mail'),
                    'America/Mendoza' => esc_html__('America/Mendoza', 'click-to-mail'),
                    'America/Menominee' => esc_html__('America/Menominee', 'click-to-mail'),
                    'America/Merida' => esc_html__('America/Merida', 'click-to-mail'),
                    'America/Metlakatla' => esc_html__('America/Metlakatla', 'click-to-mail'),
                    'America/Mexico_City' => esc_html__('America/Mexico_City', 'click-to-mail'),
                    'America/Miquelon' => esc_html__('America/Miquelon', 'click-to-mail'),
                    'America/Moncton' => esc_html__('America/Moncton', 'click-to-mail'),
                    'America/Monterrey' => esc_html__('America/Monterrey', 'click-to-mail'),
                    'America/Montevideo' => esc_html__('America/Montevideo', 'click-to-mail'),
                    'America/Montreal' => esc_html__('America/Montreal', 'click-to-mail'),
                    'America/Montserrat' => esc_html__('America/Montserrat', 'click-to-mail'),
                    'America/Nassau' => esc_html__('America/Nassau', 'click-to-mail'),
                    'America/New_York' => esc_html__('America/New_York', 'click-to-mail'),
                    'America/Nipigon' => esc_html__('America/Nipigon', 'click-to-mail'),
                    'America/Nome' => esc_html__('America/Nome', 'click-to-mail'),
                    'America/Noronha' => esc_html__('America/Noronha', 'click-to-mail'),
                    'America/North_Dakota/Beulah' => esc_html__('America/North_Dakota/Beulah', 'click-to-mail'),
                    'America/North_Dakota/Center' => esc_html__('America/North_Dakota/Center', 'click-to-mail'),
                    'America/North_Dakota/New_Salem' => esc_html__('America/North_Dakota/New_Salem', 'click-to-mail'),
                    'America/Ojinaga' => esc_html__('America/Ojinaga', 'click-to-mail'),
                    'America/Panama' => esc_html__('America/Panama', 'click-to-mail'),
                    'America/Pangnirtung' => esc_html__('America/Pangnirtung', 'click-to-mail'),
                    'America/Paramaribo' => esc_html__('America/Paramaribo', 'click-to-mail'),
                    'America/Phoenix' => esc_html__('America/Phoenix', 'click-to-mail'),
                    'America/Port-au-Prince' => esc_html__('America/Port-au-Prince', 'click-to-mail'),
                    'America/Port_of_Spain' => esc_html__('America/Port_of_Spain', 'click-to-mail'),
                    'America/Porto_Acre' => esc_html__('America/Porto_Acre', 'click-to-mail'),
                    'America/Porto_Velho' => esc_html__('America/Porto_Velho', 'click-to-mail'),
                    'America/Puerto_Rico' => esc_html__('America/Puerto_Rico', 'click-to-mail'),
                    'America/Punta_Arenas' => esc_html__('America/Punta_Arenas', 'click-to-mail'),
                    'America/Rainy_River' => esc_html__('America/Rainy_River', 'click-to-mail'),
                    'America/Rankin_Inlet' => esc_html__('America/Rankin_Inlet', 'click-to-mail'),
                    'America/Recife' => esc_html__('America/Recife', 'click-to-mail'),
                    'America/Regina' => esc_html__('America/Regina', 'click-to-mail'),
                    'America/Resolute' => esc_html__('America/Resolute', 'click-to-mail'),
                    'America/Rio_Branco' => esc_html__('America/Rio_Branco', 'click-to-mail'),
                    'America/Rosario' => esc_html__('America/Rosario', 'click-to-mail'),
                    'America/Santa_Isabel' => esc_html__('America/Santa_Isabel', 'click-to-mail'),
                    'America/Santarem' => esc_html__('America/Santarem', 'click-to-mail'),
                    'America/Santiago' => esc_html__('America/Santiago', 'click-to-mail'),
                    'America/Santo_Domingo' => esc_html__('America/Santo_Domingo', 'click-to-mail'),
                    'America/Sao_Paulo' => esc_html__('America/Sao_Paulo', 'click-to-mail'),
                    'America/Scoresbysund' => esc_html__('America/Scoresbysund', 'click-to-mail'),
                    'America/Shiprock' => esc_html__('America/Shiprock', 'click-to-mail'),
                    'America/Sitka' => esc_html__('America/Sitka', 'click-to-mail'),
                    'America/St_Barthelemy' => esc_html__('America/St_Barthelemy', 'click-to-mail'),
                    'America/St_Johns' => esc_html__('America/St_Johns', 'click-to-mail'),
                    'America/St_Kitts' => esc_html__('America/St_Kitts', 'click-to-mail'),
                    'America/St_Lucia' => esc_html__('America/St_Lucia', 'click-to-mail'),
                    'America/St_Thomas' => esc_html__('America/St_Thomas', 'click-to-mail'),
                    'America/St_Vincent' => esc_html__('America/St_Vincent', 'click-to-mail'),
                    'America/Swift_Current' => esc_html__('America/Swift_Current', 'click-to-mail'),
                    'America/Tegucigalpa' => esc_html__('America/Tegucigalpa', 'click-to-mail'),
                    'America/Thule' => esc_html__('America/Thule', 'click-to-mail'),
                    'America/Thunder_Bay' => esc_html__('America/Thunder_Bay', 'click-to-mail'),
                    'America/Tijuana' => esc_html__('America/Tijuana', 'click-to-mail'),
                    'America/Toronto' => esc_html__('America/Toronto', 'click-to-mail'),
                    'America/Tortola' => esc_html__('America/Tortola', 'click-to-mail'),
                    'America/Vancouver' => esc_html__('America/Vancouver', 'click-to-mail'),
                    'America/Virgin' => esc_html__('America/Virgin', 'click-to-mail'),
                    'America/Whitehorse' => esc_html__('America/Whitehorse', 'click-to-mail'),
                    'America/Winnipeg' => esc_html__('America/Winnipeg', 'click-to-mail'),
                    'America/Yakutat' => esc_html__('America/Yakutat', 'click-to-mail'),
                    'America/Yellowknife' => esc_html__('America/Yellowknife', 'click-to-mail'),
                    'Antarctica/Casey' => esc_html__('Antarctica/Casey', 'click-to-mail'),
                    'Antarctica/Davis' => esc_html__('Antarctica/Davis', 'click-to-mail'),
                    'Antarctica/DumontDUrville' => esc_html__('Antarctica/DumontDUrville', 'click-to-mail'),
                    'Antarctica/Macquarie' => esc_html__('Antarctica/Macquarie', 'click-to-mail'),
                    'Antarctica/Mawson' => esc_html__('Antarctica/Mawson', 'click-to-mail'),
                    'Antarctica/McMurdo' => esc_html__('Antarctica/McMurdo', 'click-to-mail'),
                    'Antarctica/Palmer' => esc_html__('Antarctica/Palmer', 'click-to-mail'),
                    'Antarctica/Rothera' => esc_html__('Antarctica/Rothera', 'click-to-mail'),
                    'Antarctica/South_Pole' => esc_html__('Antarctica/South_Pole', 'click-to-mail'),
                    'Antarctica/Syowa' => esc_html__('Antarctica/Syowa', 'click-to-mail'),
                    'Antarctica/Troll' => esc_html__('Antarctica/Troll', 'click-to-mail'),
                    'Antarctica/Vostok' => esc_html__('Antarctica/Vostok', 'click-to-mail'),
                    'Arctic/Longyearbyen' => esc_html__('Arctic/Longyearbyen', 'click-to-mail'),
                    'Asia/Aden' => esc_html__('Asia/Aden', 'click-to-mail'),
                    'Asia/Almaty' => esc_html__('Asia/Almaty', 'click-to-mail'),
                    'Asia/Amman' => esc_html__('Asia/Amman', 'click-to-mail'),
                    'Asia/Anadyr' => esc_html__('Asia/Anadyr', 'click-to-mail'),
                    'Asia/Aqtau' => esc_html__('Asia/Aqtau', 'click-to-mail'),
                    'Asia/Aqtobe' => esc_html__('Asia/Aqtobe', 'click-to-mail'),
                    'Asia/Ashgabat' => esc_html__('Asia/Ashgabat', 'click-to-mail'),
                    'Asia/Ashkhabad' => esc_html__('Asia/Ashkhabad', 'click-to-mail'),
                    'Asia/Atyrau' => esc_html__('Asia/Atyrau', 'click-to-mail'),
                    'Asia/Baghdad' => esc_html__('Asia/Baghdad', 'click-to-mail'),
                    'Asia/Bahrain' => esc_html__('Asia/Bahrain', 'click-to-mail'),
                    'Asia/Baku' => esc_html__('Asia/Baku', 'click-to-mail'),
                    'Asia/Bangkok' => esc_html__('Asia/Bangkok', 'click-to-mail'),
                    'Asia/Barnaul' => esc_html__('Asia/Barnaul', 'click-to-mail'),
                    'Asia/Beirut' => esc_html__('Asia/Beirut', 'click-to-mail'),
                    'Asia/Bishkek' => esc_html__('Asia/Bishkek', 'click-to-mail'),
                    'Asia/Brunei' => esc_html__('Asia/Brunei', 'click-to-mail'),
                    'Asia/Calcutta' => esc_html__('Asia/Calcutta', 'click-to-mail'),
                    'Asia/Chita' => esc_html__('Asia/Chita', 'click-to-mail'),
                    'Asia/Choibalsan' => esc_html__('Asia/Choibalsan', 'click-to-mail'),
                    'Asia/Chongqing' => esc_html__('Asia/Chongqing', 'click-to-mail'),
                    'Asia/Chungking' => esc_html__('Asia/Chungking', 'click-to-mail'),
                    'Asia/Colombo' => esc_html__('Asia/Colombo', 'click-to-mail'),
                    'Asia/Dacca' => esc_html__('Asia/Dacca', 'click-to-mail'),
                    'Asia/Damascus' => esc_html__('Asia/Damascus', 'click-to-mail'),
                    'Asia/Dhaka' => esc_html__('Asia/Dhaka', 'click-to-mail'),
                    'Asia/Dili' => esc_html__('Asia/Dili', 'click-to-mail'),
                    'Asia/Dubai' => esc_html__('Asia/Dubai', 'click-to-mail'),
                    'Asia/Dushanbe' => esc_html__('Asia/Dushanbe', 'click-to-mail'),
                    'Asia/Famagusta' => esc_html__('Asia/Famagusta', 'click-to-mail'),
                    'Asia/Gaza' => esc_html__('Asia/Gaza', 'click-to-mail'),
                    'Asia/Harbin' => esc_html__('Asia/Harbin', 'click-to-mail'),
                    'Asia/Hebron' => esc_html__('Asia/Hebron', 'click-to-mail'),
                    'Asia/Ho_Chi_Minh' => esc_html__('Asia/Ho_Chi_Minh', 'click-to-mail'),
                    'Asia/Hong_Kong' => esc_html__('Asia/Hong_Kong', 'click-to-mail'),
                    'Asia/Hovd' => esc_html__('Asia/Hovd', 'click-to-mail'),
                    'Asia/Irkutsk' => esc_html__('Asia/Irkutsk', 'click-to-mail'),
                    'Asia/Istanbul' => esc_html__('Asia/Istanbul', 'click-to-mail'),
                    'Asia/Jakarta' => esc_html__('Asia/Jakarta', 'click-to-mail'),
                    'Asia/Jayapura' => esc_html__('Asia/Jayapura', 'click-to-mail'),
                    'Asia/Jerusalem' => esc_html__('Asia/Jerusalem', 'click-to-mail'),
                    'Asia/Kabul' => esc_html__('Asia/Kabul', 'click-to-mail'),
                    'Asia/Kamchatka' => esc_html__('Asia/Kamchatka', 'click-to-mail'),
                    'Asia/Karachi' => esc_html__('Asia/Karachi', 'click-to-mail'),
                    'Asia/Kashgar' => esc_html__('Asia/Kashgar', 'click-to-mail'),
                    'Asia/Kathmandu' => esc_html__('Asia/Kathmandu', 'click-to-mail'),
                    'Asia/Katmandu' => esc_html__('Asia/Katmandu', 'click-to-mail'),
                    'Asia/Khandyga' => esc_html__('Asia/Khandyga', 'click-to-mail'),
                    'Asia/Kolkata' => esc_html__('Asia/Kolkata', 'click-to-mail'),
                    'Asia/Krasnoyarsk' => esc_html__('Asia/Krasnoyarsk', 'click-to-mail'),
                    'Asia/Kuala_Lumpur' => esc_html__('Asia/Kuala_Lumpur', 'click-to-mail'),
                    'Asia/Kuching' => esc_html__('Asia/Kuching', 'click-to-mail'),
                    'Asia/Kuwait' => esc_html__('Asia/Kuwait', 'click-to-mail'),
                    'Asia/Macao' => esc_html__('Asia/Macao', 'click-to-mail'),
                    'Asia/Macau' => esc_html__('Asia/Macau', 'click-to-mail'),
                    'Asia/Magadan' => esc_html__('Asia/Magadan', 'click-to-mail'),
                    'Asia/Makassar' => esc_html__('Asia/Makassar', 'click-to-mail'),
                    'Asia/Manila' => esc_html__('Asia/Manila', 'click-to-mail'),
                    'Asia/Muscat' => esc_html__('Asia/Muscat', 'click-to-mail'),
                    'Asia/Nicosia' => esc_html__('Asia/Nicosia', 'click-to-mail'),
                    'Asia/Novokuznetsk' => esc_html__('Asia/Novokuznetsk', 'click-to-mail'),
                    'Asia/Novosibirsk' => esc_html__('Asia/Novosibirsk', 'click-to-mail'),
                    'Asia/Omsk' => esc_html__('Asia/Omsk', 'click-to-mail'),
                    'Asia/Oral' => esc_html__('Asia/Oral', 'click-to-mail'),
                    'Asia/Phnom_Penh' => esc_html__('Asia/Phnom_Penh', 'click-to-mail'),
                    'Asia/Pontianak' => esc_html__('Asia/Pontianak', 'click-to-mail'),
                    'Asia/Pyongyang' => esc_html__('Asia/Pyongyang', 'click-to-mail'),
                    'Asia/Qatar' => esc_html__('Asia/Qatar', 'click-to-mail'),
                    'Asia/Qyzylorda' => esc_html__('Asia/Qyzylorda', 'click-to-mail'),
                    'Asia/Rangoon' => esc_html__('Asia/Rangoon', 'click-to-mail'),
                    'Asia/Riyadh' => esc_html__('Asia/Riyadh', 'click-to-mail'),
                    'Asia/Saigon' => esc_html__('Asia/Saigon', 'click-to-mail'),
                    'Asia/Sakhalin' => esc_html__('Asia/Sakhalin', 'click-to-mail'),
                    'Asia/Samarkand' => esc_html__('Asia/Samarkand', 'click-to-mail'),
                    'Asia/Seoul' => esc_html__('Asia/Seoul', 'click-to-mail'),
                    'Asia/Shanghai' => esc_html__('Asia/Shanghai', 'click-to-mail'),
                    'Asia/Singapore' => esc_html__('Asia/Singapore', 'click-to-mail'),
                    'Asia/Srednekolymsk' => esc_html__('Asia/Srednekolymsk', 'click-to-mail'),
                    'Asia/Taipei' => esc_html__('Asia/Taipei', 'click-to-mail'),
                    'Asia/Tashkent' => esc_html__('Asia/Tashkent', 'click-to-mail'),
                    'Asia/Tbilisi' => esc_html__('Asia/Tbilisi', 'click-to-mail'),
                    'Asia/Tehran' => esc_html__('Asia/Tehran', 'click-to-mail'),
                    'Asia/Tel_Aviv' => esc_html__('Asia/Tel_Aviv', 'click-to-mail'),
                    'Asia/Thimbu' => esc_html__('Asia/Thimbu', 'click-to-mail'),
                    'Asia/Thimphu' => esc_html__('Asia/Thimphu', 'click-to-mail'),
                    'Asia/Tokyo' => esc_html__('Asia/Tokyo', 'click-to-mail'),
                    'Asia/Tomsk' => esc_html__('Asia/Tomsk', 'click-to-mail'),
                    'Asia/Ujung_Pandang' => esc_html__('Asia/Ujung_Pandang', 'click-to-mail'),
                    'Asia/Ulaanbaatar' => esc_html__('Asia/Ulaanbaatar', 'click-to-mail'),
                    'Asia/Ulan_Bator' => esc_html__('Asia/Ulan_Bator', 'click-to-mail'),
                    'Asia/Urumqi' => esc_html__('Asia/Urumqi', 'click-to-mail'),
                    'Asia/Ust-Nera' => esc_html__('Asia/Ust-Nera', 'click-to-mail'),
                    'Asia/Vientiane' => esc_html__('Asia/Vientiane', 'click-to-mail'),
                    'Asia/Vladivostok' => esc_html__('Asia/Vladivostok', 'click-to-mail'),
                    'Asia/Yakutsk' => esc_html__('Asia/Yakutsk', 'click-to-mail'),
                    'Asia/Yangon' => esc_html__('Asia/Yangon', 'click-to-mail'),
                    'Asia/Yekaterinburg' => esc_html__('Asia/Yekaterinburg', 'click-to-mail'),
                    'Asia/Yerevan' => esc_html__('Asia/Yerevan', 'click-to-mail'),
                    'Atlantic/Azores' => esc_html__('Atlantic/Azores', 'click-to-mail'),
                    'Atlantic/Bermuda' => esc_html__('Atlantic/Bermuda', 'click-to-mail'),
                    'Atlantic/Canary' => esc_html__('Atlantic/Canary', 'click-to-mail'),
                    'Atlantic/Cape_Verde' => esc_html__('Atlantic/Cape_Verde', 'click-to-mail'),
                    'Atlantic/Faeroe' => esc_html__('Atlantic/Faeroe', 'click-to-mail'),
                    'Atlantic/Faroe' => esc_html__('Atlantic/Faroe', 'click-to-mail'),
                    'Atlantic/Jan_Mayen' => esc_html__('Atlantic/Jan_Mayen', 'click-to-mail'),
                    'Atlantic/Madeira' => esc_html__('Atlantic/Madeira', 'click-to-mail'),
                    'Atlantic/Reykjavik' => esc_html__('Atlantic/Reykjavik', 'click-to-mail'),
                    'Atlantic/South_Georgia' => esc_html__('Atlantic/South_Georgia', 'click-to-mail'),
                    'Atlantic/St_Helena' => esc_html__('Atlantic/St_Helena', 'click-to-mail'),
                    'Atlantic/Stanley' => esc_html__('Atlantic/Stanley', 'click-to-mail'),
                    'Australia/ACT' => esc_html__('Australia/ACT', 'click-to-mail'),
                    'Australia/Adelaide' => esc_html__('Australia/Adelaide', 'click-to-mail'),
                    'Australia/Brisbane' => esc_html__('Australia/Brisbane', 'click-to-mail'),
                    'Australia/Broken_Hill' => esc_html__('Asia/Broken_Hill', 'click-to-mail'),
                    'Australia/Canberra' => esc_html__('Australia/Canberra', 'click-to-mail'),
                    'Australia/Currie' => esc_html__('Australia/Currie', 'click-to-mail'),
                    'Australia/Darwin' => esc_html__('Australia/Darwin', 'click-to-mail'),
                    'Australia/Eucla' => esc_html__('Australia/Eucla', 'click-to-mail'),
                    'Australia/Hobart' => esc_html__('Australia/Hobart', 'click-to-mail'),
                    'Australia/LHI' => esc_html__('Australia/LHI', 'click-to-mail'),
                    'Australia/Lindeman' => esc_html__('Australia/Lindeman', 'click-to-mail'),
                    'Australia/Lord_Howe' => esc_html__('Australia/Lord_Howe', 'click-to-mail'),
                    'Australia/Melbourne' => esc_html__('Australia/Melbourne', 'click-to-mail'),
                    'Australia/NSW' => esc_html__('Australia/NSW', 'click-to-mail'),
                    'Australia/North' => esc_html__('Australia/North', 'click-to-mail'),
                    'Australia/Perth' => esc_html__('Australia/Perth', 'click-to-mail'),
                    'Australia/Queensland' => esc_html__('Australia/Queensland', 'click-to-mail'),
                    'Australia/South' => esc_html__('Australia/South', 'click-to-mail'),
                    'Australia/Sydney' => esc_html__('Australia/Sydney', 'click-to-mail'),
                    'Australia/Tasmania' => esc_html__('Australia/Tasmania', 'click-to-mail'),
                    'Australia/Victoria' => esc_html__('Australia/Victoria', 'click-to-mail'),
                    'Australia/West' => esc_html__('Australia/West', 'click-to-mail'),
                    'Australia/Yancowinna' => esc_html__('Australia/Yancowinna', 'click-to-mail'),
                    'Brazil/Acre' => esc_html__('Brazil/Acre', 'click-to-mail'),
                    'Brazil/DeNoronha' => esc_html__('Brazil/DeNoronha', 'click-to-mail'),
                    'Brazil/East' => esc_html__('Brazil/East', 'click-to-mail'),
                    'Brazil/West' => esc_html__('Brazil/West', 'click-to-mail'),
                    'CET' => esc_html__('CET', 'click-to-mail'),
                    'CST6CDT' => esc_html__('CST6CDT', 'click-to-mail'),
                    'Canada/Atlantic' => esc_html__('Canada/Atlantic', 'click-to-mail'),
                    'Canada/Central' => esc_html__('Canada/Central', 'click-to-mail'),
                    'Canada/Eastern' => esc_html__('Canada/Eastern', 'click-to-mail'),
                    'Canada/Mountain' => esc_html__('Canada/Mountain', 'click-to-mail'),
                    'Canada/Newfoundland' => esc_html__('Canada/Newfoundland', 'click-to-mail'),
                    'Canada/Pacific' => esc_html__('Canada/Pacific', 'click-to-mail'),
                    'Canada/Saskatchewan' => esc_html__('Canada/Saskatchewan', 'click-to-mail'),
                    'Canada/Yukon' => esc_html__('Canada/Yukon', 'click-to-mail'),
                    'Chile/Continental' => esc_html__('Chile/Continental', 'click-to-mail'),
                    'Chile/EasterIsland' => esc_html__('Chile/EasterIsland', 'click-to-mail'),
                    'Cuba' => esc_html__('Cuba', 'click-to-mail'),
                    'EET' => esc_html__('EET', 'click-to-mail'),
                    'EST' => esc_html__('EST', 'click-to-mail'),
                    'EST5EDT' => esc_html__('EST5EDT', 'click-to-mail'),
                    'Egypt' => esc_html__('Egypt', 'click-to-mail'),
                    'Eire' => esc_html__('Eire', 'click-to-mail'),
                    'Etc/GMT' => esc_html__('Etc/GMT', 'click-to-mail'),
                    'Etc/GMT+0' => esc_html__('Etc/GMT+0', 'click-to-mail'),
                    'Etc/GMT+1' => esc_html__('Etc/GMT+1', 'click-to-mail'),
                    'Etc/GMT+10' => esc_html__('Etc/GMT+10', 'click-to-mail'),
                    'Etc/GMT+11' => esc_html__('Etc/GMT+11', 'click-to-mail'),
                    'Etc/GMT+12' => esc_html__('Etc/GMT+12', 'click-to-mail'),
                    'Etc/GMT+2' => esc_html__('Etc/GMT+2', 'click-to-mail'),
                    'Etc/GMT+3' => esc_html__('Etc/GMT+3', 'click-to-mail'),
                    'Etc/GMT+4' => esc_html__('Etc/GMT+4', 'click-to-mail'),
                    'Etc/GMT+5' => esc_html__('Etc/GMT+5', 'click-to-mail'),
                    'Etc/GMT+6' => esc_html__('Etc/GMT+6', 'click-to-mail'),
                    'Etc/GMT+7' => esc_html__('Etc/GMT+7', 'click-to-mail'),
                    'Etc/GMT+8' => esc_html__('Etc/GMT+8', 'click-to-mail'),
                    'Etc/GMT+9' => esc_html__('Etc/GMT+9', 'click-to-mail'),
                    'Etc/GMT-0' => esc_html__('Etc/GMT-0', 'click-to-mail'),
                    'Etc/GMT-1' => esc_html__('Etc/GMT-1', 'click-to-mail'),
                    'Etc/GMT-10' => esc_html__('Etc/GMT-10', 'click-to-mail'),
                    'Etc/GMT-11' => esc_html__('Etc/GMT-11', 'click-to-mail'),
                    'Etc/GMT-12' => esc_html__('Etc/GMT-12', 'click-to-mail'),
                    'Etc/GMT-13' => esc_html__('Etc/GMT-13', 'click-to-mail'),
                    'Etc/GMT-14' => esc_html__('Etc/GMT-14', 'click-to-mail'),
                    'Etc/GMT-2' => esc_html__('Etc/GMT-2', 'click-to-mail'),
                    'Etc/GMT-3' => esc_html__('Etc/GMT-3', 'click-to-mail'),
                    'Etc/GMT-4' => esc_html__('Etc/GMT-4', 'click-to-mail'),
                    'Etc/GMT-5' => esc_html__('Etc/GMT-5', 'click-to-mail'),
                    'Etc/GMT-6' => esc_html__('Etc/GMT-6', 'click-to-mail'),
                    'Etc/GMT-7' => esc_html__('Etc/GMT-7', 'click-to-mail'),
                    'Etc/GMT-8' => esc_html__('Etc/GMT-8', 'click-to-mail'),
                    'Etc/GMT-9' => esc_html__('Etc/GMT-9', 'click-to-mail'),
                    'Etc/GMT0' => esc_html__('Etc/GMT0', 'click-to-mail'),
                    'Etc/Greenwich' => esc_html__('Etc/Greenwich', 'click-to-mail'),
                    'Etc/UCT' => esc_html__('Etc/UCT', 'click-to-mail'),
                    'Etc/UTC' => esc_html__('Etc/UTC', 'click-to-mail'),
                    'Etc/Universal' => esc_html__('Etc/Universal', 'click-to-mail'),
                    'Etc/Zulu' => esc_html__('Etc/Zulu', 'click-to-mail'),
                    'Europe/Amsterdam' => esc_html__('Europe/Amsterdam', 'click-to-mail'),
                    'Europe/Andorra' => esc_html__('Europe/Andorra', 'click-to-mail'),
                    'Europe/Astrakhan' => esc_html__('Europe/Astrakhan', 'click-to-mail'),
                    'Europe/Athens' => esc_html__('Europe/Athens', 'click-to-mail'),
                    'Europe/Belfast' => esc_html__('Europe/Belfast', 'click-to-mail'),
                    'Europe/Belgrade' => esc_html__('Europe/Belgrade', 'click-to-mail'),
                    'Europe/Berlin' => esc_html__('Europe/Berlin', 'click-to-mail'),
                    'Europe/Bratislava' => esc_html__('Europe/Bratislava', 'click-to-mail'),
                    'Europe/Brussels' => esc_html__('Europe/Brussels', 'click-to-mail'),
                    'Europe/Bucharest' => esc_html__('Europe/Bucharest', 'click-to-mail'),
                    'Europe/Budapest' => esc_html__('Europe/Budapest', 'click-to-mail'),
                    'Europe/Busingen' => esc_html__('Europe/Busingen', 'click-to-mail'),
                    'Europe/Chisinau' => esc_html__('Europe/Chisinau', 'click-to-mail'),
                    'Europe/Copenhagen' => esc_html__('Europe/Copenhagen', 'click-to-mail'),
                    'Europe/Dublin' => esc_html__('Europe/Dublin', 'click-to-mail'),
                    'Europe/Gibraltar' => esc_html__('Europe/Gibraltar', 'click-to-mail'),
                    'Europe/Guernsey' => esc_html__('Europe/Guernsey', 'click-to-mail'),
                    'Europe/Helsinki' => esc_html__('Europe/Helsinki', 'click-to-mail'),
                    'Europe/Isle_of_Man' => esc_html__('Europe/Isle_of_Man', 'click-to-mail'),
                    'Europe/Istanbul' => esc_html__('Europe/Istanbul', 'click-to-mail'),
                    'Europe/Jersey' => esc_html__('Europe/Jersey', 'click-to-mail'),
                    'Europe/Kaliningrad' => esc_html__('Europe/Kaliningrad', 'click-to-mail'),
                    'Europe/Kiev' => esc_html__('Europe/Kiev', 'click-to-mail'),
                    'Europe/Kirov' => esc_html__('Europe/Kirov', 'click-to-mail'),
                    'Europe/Lisbon' => esc_html__('Europe/Lisbon', 'click-to-mail'),
                    'Europe/Ljubljana' => esc_html__('Europe/Ljubljana', 'click-to-mail'),
                    'Europe/London' => esc_html__('Europe/London', 'click-to-mail'),
                    'Europe/Luxembourg' => esc_html__('Europe/Luxembourg', 'click-to-mail'),
                    'Europe/Madrid' => esc_html__('Europe/Madrid', 'click-to-mail'),
                    'Europe/Malta' => esc_html__('Europe/Malta', 'click-to-mail'),
                    'Europe/Mariehamn' => esc_html__('Europe/Mariehamn', 'click-to-mail'),
                    'Europe/Minsk' => esc_html__('Europe/Minsk', 'click-to-mail'),
                    'Europe/Monaco' => esc_html__('Europe/Monaco', 'click-to-mail'),
                    'Europe/Moscow' => esc_html__('Europe/Moscow', 'click-to-mail'),
                    'Europe/Nicosia' => esc_html__('Europe/Nicosia', 'click-to-mail'),
                    'Europe/Oslo' => esc_html__('Europe/Oslo', 'click-to-mail'),
                    'Europe/Paris' => esc_html__('Europe/Paris', 'click-to-mail'),
                    'Europe/Podgorica' => esc_html__('Europe/Podgorica', 'click-to-mail'),
                    'Europe/Prague' => esc_html__('Europe/Prague', 'click-to-mail'),
                    'Europe/Riga' => esc_html__('Europe/Riga', 'click-to-mail'),
                    'Europe/Rome' => esc_html__('Europe/Rome', 'click-to-mail'),
                    'Europe/Samara' => esc_html__('Europe/Samara', 'click-to-mail'),
                    'Europe/San_Marino' => esc_html__('Europe/San_Marino', 'click-to-mail'),
                    'Europe/Sarajevo' => esc_html__('Europe/Sarajevo', 'click-to-mail'),
                    'Europe/Saratov' => esc_html__('Europe/Saratov', 'click-to-mail'),
                    'Europe/Simferopol' => esc_html__('Europe/Simferopol', 'click-to-mail'),
                    'Europe/Skopje' => esc_html__('Europe/Skopje', 'click-to-mail'),
                    'Europe/Sofia' => esc_html__('Europe/Sofia', 'click-to-mail'),
                    'Europe/Stockholm' => esc_html__('Europe/Stockholm', 'click-to-mail'),
                    'Europe/Tallinn' => esc_html__('Europe/Tallinn', 'click-to-mail'),
                    'Europe/Tirane' => esc_html__('Europe/Tirane', 'click-to-mail'),
                    'Europe/Tiraspol' => esc_html__('Europe/Tiraspol', 'click-to-mail'),
                    'Europe/Ulyanovsk' => esc_html__('Europe/Ulyanovsk', 'click-to-mail'),
                    'Europe/Uzhgorod' => esc_html__('Europe/Uzhgorod', 'click-to-mail'),
                    'Europe/Vaduz' => esc_html__('Europe/Vaduz', 'click-to-mail'),
                    'Europe/Vatican' => esc_html__('Europe/Vatican', 'click-to-mail'),
                    'Europe/Vienna' => esc_html__('Europe/Vienna', 'click-to-mail'),
                    'Europe/Vilnius' => esc_html__('Europe/Vilnius', 'click-to-mail'),
                    'Europe/Volgograd' => esc_html__('Europe/Volgograd', 'click-to-mail'),
                    'Europe/Warsaw' => esc_html__('Europe/Warsaw', 'click-to-mail'),
                    'Europe/Zagreb' => esc_html__('Europe/Zagreb', 'click-to-mail'),
                    'Europe/Zaporozhye' => esc_html__('Europe/Zaporozhye', 'click-to-mail'),
                    'Europe/Zurich' => esc_html__('Europe/Zurich', 'click-to-mail'),
                    'GB' => esc_html__('GB', 'click-to-mail'),
                    'GB-Eire' => esc_html__('GB-Eire', 'click-to-mail'),
                    'GMT' => esc_html__('GMT', 'click-to-mail'),
                    'GMT+0' => esc_html__('GMT+0', 'click-to-mail'),
                    'GMT-0' => esc_html__('GMT-0', 'click-to-mail'),
                    'GMT0' => esc_html__('GMT0', 'click-to-mail'),
                    'Greenwich' => esc_html__('Greenwich', 'click-to-mail'),
                    'HST' => esc_html__('HST', 'click-to-mail'),
                    'Hongkong' => esc_html__('Hongkong', 'click-to-mail'),
                    'Iceland' => esc_html__('Iceland', 'click-to-mail'),
                    'Indian/Antananarivo' => esc_html__('Indian/Antananarivo', 'click-to-mail'),
                    'Indian/Chagos' => esc_html__('Indian/Chagos', 'click-to-mail'),
                    'Indian/Christmas' => esc_html__('Indian/Christmas', 'click-to-mail'),
                    'Indian/Cocos' => esc_html__('Indian/Cocos', 'click-to-mail'),
                    'Indian/Comoro' => esc_html__('Indian/Comoro', 'click-to-mail'),
                    'Indian/Kerguelen' => esc_html__('Indian/Kerguelen', 'click-to-mail'),
                    'Indian/Mahe' => esc_html__('Indian/Mahe', 'click-to-mail'),
                    'Indian/Maldives' => esc_html__('Indian/Maldives', 'click-to-mail'),
                    'Indian/Mauritius' => esc_html__('Indian/Mauritius', 'click-to-mail'),
                    'Indian/Mayotte' => esc_html__('Indian/Mayotte', 'click-to-mail'),
                    'Indian/Reunion' => esc_html__('Indian/Reunion', 'click-to-mail'),
                    'Iran' => esc_html__('Iran', 'click-to-mail'),
                    'Israel' => esc_html__('Israel', 'click-to-mail'),
                    'Jamaica' => esc_html__('Jamaica', 'click-to-mail'),
                    'Japan' => esc_html__('Japan', 'click-to-mail'),
                    'Kwajalein' => esc_html__('Kwajalein', 'click-to-mail'),
                    'Libya' => esc_html__('Libya', 'click-to-mail'),
                    'MET' => esc_html__('MET', 'click-to-mail'),
                    'MST' => esc_html__('MST', 'click-to-mail'),
                    'MST7MDT' => esc_html__('MST7MDT', 'click-to-mail'),
                    'Mexico/BajaNorte' => esc_html__('Mexico/BajaNorte', 'click-to-mail'),
                    'Mexico/BajaSur' => esc_html__('Mexico/BajaSur', 'click-to-mail'),
                    'Mexico/General' => esc_html__('Mexico/General', 'click-to-mail'),
                    'NZ' => esc_html__('NZ', 'click-to-mail'),
                    'NZ-CHAT' => esc_html__('NZ-CHAT', 'click-to-mail'),
                    'Navajo' => esc_html__('Navajo', 'click-to-mail'),
                    'PRC' => esc_html__('PRC', 'click-to-mail'),
                    'PST8PDT' => esc_html__('PST8PDT', 'click-to-mail'),
                    'Pacific/Apia' => esc_html__('Pacific/Apia', 'click-to-mail'),
                    'Pacific/Auckland' => esc_html__('Pacific/Auckland', 'click-to-mail'),
                    'Pacific/Bougainville' => esc_html__('Pacific/Bougainville', 'click-to-mail'),
                    'Pacific/Chatham' => esc_html__('Pacific/Chatham', 'click-to-mail'),
                    'Pacific/Chuuk' => esc_html__('Pacific/Chuuk', 'click-to-mail'),
                    'Pacific/Easter' => esc_html__('Pacific/Easter', 'click-to-mail'),
                    'Pacific/Efate' => esc_html__('Pacific/Efate', 'click-to-mail'),
                    'Pacific/Enderbury' => esc_html__('Pacific/Enderbury', 'click-to-mail'),
                    'Pacific/Fakaofo' => esc_html__('Pacific/Fakaofo', 'click-to-mail'),
                    'Pacific/Fiji' => esc_html__('Pacific/Fiji', 'click-to-mail'),
                    'Pacific/Funafuti' => esc_html__('Pacific/Funafuti', 'click-to-mail'),
                    'Pacific/Galapagos' => esc_html__('Pacific/Galapagos', 'click-to-mail'),
                    'Pacific/Gambier' => esc_html__('Pacific/Gambier', 'click-to-mail'),
                    'Pacific/Guadalcanal' => esc_html__('Pacific/Guadalcanal', 'click-to-mail'),
                    'Pacific/Guam' => esc_html__('Pacific/Guam', 'click-to-mail'),
                    'Pacific/Honolulu' => esc_html__('Pacific/Honolulu', 'click-to-mail'),
                    'Pacific/Johnston' => esc_html__('Pacific/Johnston', 'click-to-mail'),
                    'Pacific/Kiritimati' => esc_html__('Pacific/Kiritimati', 'click-to-mail'),
                    'Pacific/Kosrae' => esc_html__('Pacific/Kosrae', 'click-to-mail'),
                    'Pacific/Kwajalein' => esc_html__('Pacific/Kwajalein', 'click-to-mail'),
                    'Pacific/Majuro' => esc_html__('Pacific/Majuro', 'click-to-mail'),
                    'Pacific/Marquesas' => esc_html__('Pacific/Marquesas', 'click-to-mail'),
                    'Pacific/Midway' => esc_html__('Pacific/Midway', 'click-to-mail'),
                    'Pacific/Nauru' => esc_html__('Pacific/Nauru', 'click-to-mail'),
                    'Pacific/Niue' => esc_html__('Pacific/Niue', 'click-to-mail'),
                    'Pacific/Norfolk' => esc_html__('Pacific/Norfolk', 'click-to-mail'),
                    'Pacific/Noumea' => esc_html__('Pacific/Noumea', 'click-to-mail'),
                    'Pacific/Pago_Pago' => esc_html__('Pacific/Pago_Pago', 'click-to-mail'),
                    'Pacific/Palau' => esc_html__('Pacific/Palau', 'click-to-mail'),
                    'Pacific/Pitcairn' => esc_html__('Pacific/Pitcairn', 'click-to-mail'),
                    'Pacific/Pohnpei' => esc_html__('Pacific/Pohnpei', 'click-to-mail'),
                    'Pacific/Ponape' => esc_html__('Pacific/Ponape', 'click-to-mail'),
                    'Pacific/Port_Moresby' => esc_html__('Pacific/Port_Moresby', 'click-to-mail'),
                    'Pacific/Rarotonga' => esc_html__('Pacific/Rarotonga', 'click-to-mail'),
                    'Pacific/Saipan' => esc_html__('Pacific/Saipan', 'click-to-mail'),
                    'Pacific/Samoa' => esc_html__('Pacific/Samoa', 'click-to-mail'),
                    'Pacific/Tahiti' => esc_html__('Pacific/Tahiti', 'click-to-mail'),
                    'Pacific/Tarawa' => esc_html__('Pacific/Tarawa', 'click-to-mail'),
                    'Pacific/Tongatapu' => esc_html__('Pacific/Tongatapu', 'click-to-mail'),
                    'Pacific/Truk' => esc_html__('Pacific/Truk', 'click-to-mail'),
                    'Pacific/Wake' => esc_html__('Pacific/Wake', 'click-to-mail'),
                    'Pacific/Wallis' => esc_html__('Pacific/Wallis', 'click-to-mail'),
                    'Pacific/Yap' => esc_html__('Pacific/Yap', 'click-to-mail'),
                    'Poland' => esc_html__('Poland', 'click-to-mail'),
                    'Portugal' => esc_html__('Portugal', 'click-to-mail'),
                    'ROC' => esc_html__('ROC', 'click-to-mail'),
                    'ROK' => esc_html__('ROK', 'click-to-mail'),
                    'Singapore' => esc_html__('Singapore', 'click-to-mail'),
                    'Turkey' => esc_html__('Turkey', 'click-to-mail'),
                    'UCT' => esc_html__('UCT', 'click-to-mail'),
                    'US/Alaska' => esc_html__('US/Alaska', 'click-to-mail'),
                    'US/Aleutian' => esc_html__('US/Aleutian', 'click-to-mail'),
                    'US/Arizona' => esc_html__('US/Arizona', 'click-to-mail'),
                    'US/Central' => esc_html__('US/Central', 'click-to-mail'),
                    'US/East-Indiana' => esc_html__('US/East-Indiana', 'click-to-mail'),
                    'US/Eastern' => esc_html__('US/Eastern', 'click-to-mail'),
                    'US/Hawaii' => esc_html__('US/Hawaii', 'click-to-mail'),
                    'US/Indiana-Starke' => esc_html__('US/Indiana-Starke', 'click-to-mail'),
                    'US/Michigan' => esc_html__('US/Michigan', 'click-to-mail'),
                    'US/Mountain' => esc_html__('US/Mountain', 'click-to-mail'),
                    'US/Pacific' => esc_html__('US/Pacific', 'click-to-mail'),
                    'US/Pacific-New' => esc_html__('US/Pacific-New', 'click-to-mail'),
                    'US/Samoa' => esc_html__('US/Samoa', 'click-to-mail'),
                    'UTC' => esc_html__('UTC', 'click-to-mail'),
                    'Universal' => esc_html__('Universal', 'click-to-mail'),
                    'W-SU' => esc_html__('W-SU', 'click-to-mail'),
                    'WET' => esc_html__('WET', 'click-to-mail'),
                )
            ]
        );


        // start sunday popover
        $this->add_control(
            'popover-sunday',
            [
                'label' => esc_html__('Sunday', 'ta-chat'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            ]
        );


        $this->start_popover();
        $this->add_control(
            'sunday__start',
            [
                'label' => esc_html__('Start time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '00:00',
                'condition' => [
                    'popover-sunday' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sunday__end',
            [
                'label' => esc_html__('End time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '23:59',
                'condition' => [
                    'popover-sunday' => 'yes',
                ],
            ]
        );

        $this->end_popover();
        // end sunday popover

        // start monday popover
        $this->add_control(
            'popover-monday',
            [
                'label' => esc_html__('Monday', 'ta-chat'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            ]
        );

        $this->start_popover();
        $this->add_control(
            'monday__start',
            [
                'label' => esc_html__('Start time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '00:00',
                'condition' => [
                    'popover-monday' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'monday__end',
            [
                'label' => esc_html__('End time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '23:59',
                'condition' => [
                    'popover-monday' => 'yes',
                ],
            ]
        );

        $this->end_popover();
        // end monday popover

        // start tuesday popover
        $this->add_control(
            'popover-tuesday',
            [
                'label' => esc_html__('Tuesday', 'ta-chat'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            ]
        );

        $this->start_popover();
        $this->add_control(
            'tuesday__start',
            [
                'label' => esc_html__('Start time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '00:00',
                'condition' => [
                    'popover-tuesday' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'tuesday__end',
            [
                'label' => esc_html__('End time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '23:59',
                'condition' => [
                    'popover-tuesday' => 'yes',
                ],
            ]
        );

        $this->end_popover();
        // end tuesday popover

        // start wednesday popover
        $this->add_control(
            'popover-wednesday',
            [
                'label' => esc_html__('Wednesday', 'ta-chat'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            ]
        );

        $this->start_popover();
        $this->add_control(
            'wednesday__start',
            [
                'label' => esc_html__('Start time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '00:00',
                'condition' => [
                    'popover-wednesday' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'wednesday__end',
            [
                'label' => esc_html__('End time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '23:59',
                'condition' => [
                    'popover-wednesday' => 'yes',
                ],
            ]
        );

        $this->end_popover();
        // end wednesday popover

        // start sunday popover
        $this->add_control(
            'popover-thursday',
            [
                'label' => esc_html__('Thursday', 'ta-chat'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            ]
        );

        $this->start_popover();
        $this->add_control(
            'thursday__start',
            [
                'label' => esc_html__('Start time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '00:00',
                'condition' => [
                    'popover-thursday' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'thursday__end',
            [
                'label' => esc_html__('End time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '23:59',
                'condition' => [
                    'popover-thursday' => 'yes',
                ],
            ]
        );

        $this->end_popover();
        // end thursday popover

        // start sunday popover
        $this->add_control(
            'popover-friday',
            [
                'label' => esc_html__('Friday', 'ta-chat'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            ]
        );

        $this->start_popover();
        $this->add_control(
            'friday__start',
            [
                'label' => esc_html__('Start time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '00:00',
                'condition' => [
                    'popover-friday' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'friday__end',
            [
                'label' => esc_html__('End time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '23:59',
                'condition' => [
                    'popover-friday' => 'yes',
                ],
            ]
        );

        $this->end_popover();
        // end friday popover

        $this->add_control(
            'popover-saturday',
            [
                'label' => esc_html__('Saturday', 'ta-chat'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            ]
        );

        $this->start_popover();
        $this->add_control(
            'saturday__start',
            [
                'label' => esc_html__('Start time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '00:00',
                'condition' => [
                    'popover-saturday' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'saturday__end',
            [
                'label' => esc_html__('End time', 'click-to-mail'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => '23:59',
                'condition' => [
                    'popover-saturday' => 'yes',
                ],
            ]
        );
        $this->end_popover();

        $this->end_controls_section(); // End section top content

        $this->start_controls_section(
            'ctm__appearance',
            [
                'label' => esc_html__('Appearance settings', 'click-to-mail'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'visibility',
            [
                'label' => esc_html__('Visibility on', 'click-to-mail'),
                'type'  => Controls_Manager::SELECT2,
                'label_block' => false,
                'default' => 'ctm-show-everywhere',
                'options' => array(
                    'ctm-show-everywhere'  => esc_html__('Everywhere', 'click-to-mail'),
                    'ctm-desktop-only'  => esc_html__('Desktops only', 'click-to-mail'),
                    'ctm-tablet-only'  => esc_html__('Tablets only', 'click-to-mail'),
                    'ctm-mobile-tablet-only'  => esc_html__('Mobile and tablets', 'click-to-mail'),
                    'ctm-mobile-only'  => esc_html__('Mobile only', 'click-to-mail'),
                )

            ]
        );

        $this->add_control(
            'button__sizes',
            [
                'label' => esc_html__('Size', 'click-to-mail'),
                'type'  => Controls_Manager::SELECT,
                'label_block' => false,
                'default' => 'ctm-btn-md',
                'options' => array(
                    'ctm-btn-sm' => esc_html__('Small', 'click-to-mail'),
                    'ctm-btn-md' => esc_html__('Medium', 'click-to-mail'),
                    'ctm-btn-lg' => esc_html__('Large', 'click-to-mail'),
                )
            ]
        );

        $this->add_control(
            'bg__color',
            [
                'label' => esc_html__('Backgound color', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1163FA',
                'selectors' => [
                    '{{WRAPPER}} [class*="ctm-button-"].ctm-btn-bg' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'bg__color__hover',
            [
                'label' => esc_html__('Hover backgound color', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0048cd',
                'selectors' => [
                    '{{WRAPPER}} [class*="ctm-button-"].ctm-btn-bg:hover' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'text__color',
            [
                'label' => esc_html__('Text color', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} [class*="ctm-button-"].ctm-btn-bg' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text__color__hover',
            [
                'label' => esc_html__('Hover text color', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} [class*="ctm-button-"].ctm-btn-bg:hover' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'click-to-mail'),
                'selector' => '{{WRAPPER}} .ctmButtons, {{WRAPPER}} .ctm-button-2',
                'fields_options' => [
                    'border' => [
                        'label' => esc_html__('Border', 'click-to-mail'),
                        'default' => 'solid',
                    ],
                    'width' => [
                        'default' => [
                            'top' => '1',
                            'right' => '1',
                            'bottom' => '1',
                            'left' => '1',
                            'isLinked' => false,
                        ],
                    ],
                    'color' => [
                        'default' => '#1163FA',
                    ],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border__hover',
                'label' => esc_html__('Hover border', 'click-to-mail'),
                'default' => '#0048cd',
                'selector' => '{{WRAPPER}} .ctmButtons:hover, {{WRAPPER}} .ctm-button-2:hover',
                'fields_options' => [
                    'border' => [
                        'label' => esc_html__('Hover border', 'click-to-mail'),
                        'default' => 'solid',
                    ],
                    'width' => [
                        'default' => [
                            'top' => '1',
                            'right' => '1',
                            'bottom' => '1',
                            'left' => '1',
                            'isLinked' => false,
                        ],
                    ],
                    'color' => [
                        'default' => '#0048cd',
                    ],
                ],
            ]
        );

        $this->add_control(
            'button__icon',
            [
                'label' => esc_html__('Change icon', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-solid fa-phone',
                ],
                'condition' => [
                    'style' => '2',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'envelope',
                        'envelope-open',
                        'facebook-messenger',
                    ],
                    'fa-regular' => [
                        'envelope',
                        'envelope-open',
                    ],

                ],
            ]
        );

        $this->add_control(
            'icon__color',
            [
                'label' => esc_html__('Icon color', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1163FA',
                'selectors' => [
                    '{{WRAPPER}} [class*="ctm-button-"].ctm-btn-bg i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'style' => '2',
                ],
            ]
        );

        $this->add_control(
            'icon__color__hover',
            [
                'label' => esc_html__('Icon hover color', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0048cd',
                'selectors' => [
                    '{{WRAPPER}} [class*="ctm-button-"].ctm-btn-bg:hover i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'style' => '2',
                ],
            ]
        );

        $this->add_control(
            'show__icon__bg__color',
            [
                'label' => esc_html__('Want bg in icon?', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'click-to-mail'),
                'label_off' => esc_html__('No', 'click-to-mail'),
                'return_value' => 'ctm-button-3',
                'condition' => [
                    'style' => '2',
                ],
            ]
        );

        $this->add_control(
            'icon__bg__color',
            [
                'label' => esc_html__('Icon bg color', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} [class*="ctm-button-"].ctm-button-3.ctm-btn-bg i' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'style' => '2',
                    'show__icon__bg__color' => 'ctm-button-3',
                ],
            ]
        );

        $this->add_control(
            'icon__bg__color__hover',
            [
                'label' => esc_html__('Icon hover bg color', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} [class*="ctm-button-"].ctm-button-3.ctm-btn-bg:hover i' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'style' => '2',
                    'show__icon__bg__color' => 'ctm-button-3',
                ],
            ]
        );

        $this->add_control(
            'rounded',
            [
                'label' => esc_html__('Rounded?', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'click-to-mail'),
                'label_off' => esc_html__('No', 'click-to-mail'),
                'return_value' => 'ctm-btn-rounded',
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'click-to-mail'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'click-to-mail'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'click-to-mail'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'click-to-mail'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .button-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // End section top content


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        // button settings
        $style = $settings['style'];
        $number =  $settings['number'];
        $timezone =  $settings['timezone'];
        $visibility = $settings['visibility'];
        $icon = $settings['button__icon']['value'];
        $rounded = $settings['rounded'];
        $icon__bg = $settings['show__icon__bg__color'];
        $sizes = $settings['button__sizes'];
        $photo = $settings['agent__photo']['url'];
        $name = $settings['agent__name'];
        $designation = $settings['agent__designation'];
        $labelText = $settings['custom__button__label'];
        $onlineText = $settings['online__text'];
        $offlineText = $settings['offline__text'];
        // availablity

        $sunday = ($settings['sunday__start'] ? $settings['sunday__start'] : "0:00") . "-" . ($settings['sunday__end'] ? $settings['sunday__end'] : "23:59");
        $monday = ($settings['monday__start'] ? $settings['monday__start'] : "0:00") . "-" . ($settings['monday__end'] ? $settings['monday__end'] : "23:59");
        $tuesday = ($settings['tuesday__start'] ? $settings['tuesday__start'] : "0:00") . "-" . ($settings['tuesday__end'] ? $settings['tuesday__end'] : "23:59");
        $wednesday = ($settings['wednesday__start'] ? $settings['wednesday__start'] : "0:00") . "-" . ($settings['wednesday__end'] ? $settings['wednesday__end'] : "23:59");
        $thursday = ($settings['thursday__start'] ? $settings['thursday__start'] : "0:00") . "-" . ($settings['thursday__end'] ? $settings['thursday__end'] : "23:59");
        $friday = ($settings['friday__start'] ? $settings['friday__start'] : "0:00") . "-" . ($settings['friday__end'] ? $settings['friday__end'] : "23:59");
        $saturday = ($settings['saturday__start'] ? $settings['saturday__start'] : "0:00") . "-" . ($settings['saturday__end'] ? $settings['saturday__end'] : "23:59");
        $ctmIcon = $icon ? $icon : "fa-solid fa-phone";

?>
        <?php if ($style == '1') : ?>
            <div class="button-wrapper">

                <button data-number="<?php echo esc_attr($number); ?>" <?php if ($timezone) { ?> data-timezone="<?php esc_attr($timezone); ?>" <?php } ?> class="ctmButtons ctm-button-4 ctm-btn-bg <?php echo esc_attr($visibility); ?> <?php echo esc_attr($rounded); ?> avatar-active <?php echo esc_attr($sizes); ?>" data-btnavailablety='{ "sunday":"<?php echo esc_attr($sunday); ?>", "monday":"<?php echo esc_attr($monday); ?>", "tuesday":"<?php echo esc_attr($tuesday); ?>", "wednesday":"<?php echo esc_attr($wednesday); ?>", "thursday":"<?php echo esc_attr($thursday); ?>", "friday":"<?php echo esc_attr($friday); ?>", "saturday":"<?php echo esc_attr($saturday); ?>" }'>
                    <?php if ($photo) { ?>
                        <img src="<?php echo esc_attr($photo); ?>" />
                    <?php } ?>
                    <div class="info-wrapper">
                        <?php if ($name || $designation) { ?>
                            <p class="info"><?php if ($name) { ?><?php echo esc_html($name); ?><?php } ?> <?php if ($designation) { ?>/ <?php echo esc_html($designation); ?><?php } ?></p>
                        <?php } ?>
                        <?php if ($labelText) { ?>
                            <p class="title"><?php echo esc_html($labelText); ?></p>
                        <?php } ?>
                        <?php if ($onlineText) { ?>
                            <p class="online"><?php echo esc_html($onlineText); ?></p>
                        <?php } ?>
                        <?php if ($offlineText) { ?>
                            <p class="offline"><?php echo esc_html($offlineText); ?></p>
                        <?php } ?>
                    </div>
            </div>
        <?php else : ?>
            <div class="button-wrapper">
                <a href="tel:<?php echo $number; ?>" class="ctm-button-2 <?php echo esc_attr($icon__bg); ?> ctm-btn-bg <?php echo esc_attr($visibility); ?> <?php echo esc_attr($rounded); ?> <?php echo esc_attr($sizes); ?>">
                    <i class="<?php echo $ctmIcon; ?>"></i> <?php if ($labelText) { ?><span><?php echo esc_html($labelText); ?></span><?php } ?>
                </a>
            </div>
        <?php endif; ?>
<?php }
}
