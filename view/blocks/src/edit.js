import {
    AlignmentToolbar,
    BlockControls,
    InspectorControls,
    MediaUpload,
    RichText,
    useBlockProps,
} from '@wordpress/block-editor';
import {
    Button,
    ComboboxControl,
    PanelBody,
    ToggleControl,
} from '@wordpress/components';
import { useState } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import classnames from 'classnames';
import './editor.scss';
const agentImage = require( './images/user.jpg' );

const { SelectControl, TextControl } = wp.components;

const timezones = [
	{
		value: 'Africa/Abidjan',
		label: __( 'Africa/Abidjan', 'click-to-mail' ),
	},
	{
		value: 'Africa/Accra',
		label: __( 'Africa/Accra', 'click-to-mail' ),
	},
	{
		value: 'Africa/Addis_Ababa',
		label: __( 'Africa/Addis_Ababa', 'click-to-mail' ),
	},
	{
		value: 'Africa/Algiers',
		label: __( 'Africa/Algiers', 'click-to-mail' ),
	},
	{
		value: 'Africa/Asmara',
		label: __( 'Africa/Asmara', 'click-to-mail' ),
	},
	{
		value: 'Africa/Asmera',
		label: __( 'Africa/Asmera', 'click-to-mail' ),
	},
	{
		value: 'Africa/Bamako',
		label: __( 'Africa/Bamako', 'click-to-mail' ),
	},
	{
		value: 'Africa/Bangui',
		label: __( 'Africa/Bangui', 'click-to-mail' ),
	},
	{
		value: 'Africa/Banjul',
		label: __( 'Africa/Banjul', 'click-to-mail' ),
	},
	{
		value: 'Africa/Bissau',
		label: __( 'Africa/Bissau', 'click-to-mail' ),
	},
	{
		value: 'Africa/Blantyre',
		label: __( 'Africa/Blantyre', 'click-to-mail' ),
	},
	{
		value: 'Africa/Brazzaville',
		label: __( 'Africa/Brazzaville', 'click-to-mail' ),
	},
	{
		value: 'Africa/Bujumbura',
		label: __( 'Africa/Bujumbura', 'click-to-mail' ),
	},
	{
		value: 'Africa/Cairo',
		label: __( 'Africa/Cairo', 'click-to-mail' ),
	},
	{
		value: 'Africa/Casablanca',
		label: __( 'Africa/Casablanca', 'click-to-mail' ),
	},
	{
		value: 'Africa/Ceuta',
		label: __( 'Africa/Ceuta', 'click-to-mail' ),
	},
	{
		value: 'Africa/Conakry',
		label: __( 'Africa/Conakry', 'click-to-mail' ),
	},
	{
		value: 'Africa/Dakar',
		label: __( 'Africa/Dakar', 'click-to-mail' ),
	},
	{
		value: 'Africa/Dar_es_Salaam',
		label: __( 'Africa/Dar_es_Salaam', 'click-to-mail' ),
	},
	{
		value: 'Africa/Djibouti',
		label: __( 'Africa/Djibouti', 'click-to-mail' ),
	},
	{
		value: 'Africa/Douala',
		label: __( 'Africa/Douala', 'click-to-mail' ),
	},
	{
		value: 'Africa/El_Aaiun',
		label: __( 'Africa/El_Aaiun', 'click-to-mail' ),
	},
	{
		value: 'Africa/Freetown',
		label: __( 'Africa/Freetown', 'click-to-mail' ),
	},
	{
		value: 'Africa/Gaborone',
		label: __( 'Africa/Gaborone', 'click-to-mail' ),
	},
	{
		value: 'Africa/Harare',
		label: __( 'Africa/Harare', 'click-to-mail' ),
	},
	{
		value: 'Africa/Johannesburg',
		label: __( 'Africa/Johannesburg', 'click-to-mail' ),
	},
	{
		value: 'Africa/Juba',
		label: __( 'Africa/Juba', 'click-to-mail' ),
	},
	{
		value: 'Africa/Kampala',
		label: __( 'Africa/Kampala', 'click-to-mail' ),
	},
	{
		value: 'Africa/Khartoum',
		label: __( 'Africa/Khartoum', 'click-to-mail' ),
	},
	{
		value: 'Africa/Kigali',
		label: __( 'Africa/Kigali', 'click-to-mail' ),
	},
	{
		value: 'Africa/Kinshasa',
		label: __( 'Africa/Kinshasa', 'click-to-mail' ),
	},
	{
		value: 'Africa/Lagos',
		label: __( 'Africa/Lagos', 'click-to-mail' ),
	},
	{
		value: 'Africa/Libreville',
		label: __( 'Africa/Libreville', 'click-to-mail' ),
	},
	{
		value: 'Africa/Lome',
		label: __( 'Africa/Lome', 'click-to-mail' ),
	},
	{
		value: 'Africa/Luanda',
		label: __( 'Africa/Luanda', 'click-to-mail' ),
	},
	{
		value: 'Africa/Lubumbashi',
		label: __( 'Africa/Lubumbashi', 'click-to-mail' ),
	},
	{
		value: 'Africa/Lusaka',
		label: __( 'Africa/Lusaka', 'click-to-mail' ),
	},
	{
		value: 'Africa/Malabo',
		label: __( 'Africa/Malabo', 'click-to-mail' ),
	},
	{
		value: 'Africa/Maputo',
		label: __( 'Africa/Maputo', 'click-to-mail' ),
	},
	{
		value: 'Africa/Maseru',
		label: __( 'Africa/Maseru', 'click-to-mail' ),
	},
	{
		value: 'Africa/Mbabane',
		label: __( 'Africa/Mbabane', 'click-to-mail' ),
	},
	{
		value: 'Africa/Mogadishu',
		label: __( 'Africa/Mogadishu', 'click-to-mail' ),
	},
	{
		value: 'Africa/Monrovia',
		label: __( 'Africa/Monrovia', 'click-to-mail' ),
	},
	{
		value: 'Africa/Nairobi',
		label: __( 'Africa/Nairobi', 'click-to-mail' ),
	},
	{
		value: 'Africa/Ndjamena',
		label: __( 'Africa/Ndjamena', 'click-to-mail' ),
	},
	{
		value: 'Africa/Niamey',
		label: __( 'Africa/Niamey', 'click-to-mail' ),
	},
	{
		value: 'Africa/Nouakchott',
		label: __( 'Africa/Nouakchott', 'click-to-mail' ),
	},
	{
		value: 'Africa/Ouagadougou',
		label: __( 'Africa/Ouagadougou', 'click-to-mail' ),
	},
	{
		value: 'Africa/Porto-Novo',
		label: __( 'Africa/Porto-Novo', 'click-to-mail' ),
	},
	{
		value: 'Africa/Sao_Tome',
		label: __( 'Africa/Sao_Tome', 'click-to-mail' ),
	},
	{
		value: 'Africa/Timbuktu',
		label: __( 'Africa/Timbuktu', 'click-to-mail' ),
	},
	{
		value: 'Africa/Tripoli',
		label: __( 'Africa/Tripoli', 'click-to-mail' ),
	},
	{
		value: 'Africa/Tunis',
		label: __( 'Africa/Tunis', 'click-to-mail' ),
	},
	{
		value: 'Africa/Windhoek',
		label: __( 'Africa/Windhoek', 'click-to-mail' ),
	},
	{
		value: 'America/Adak',
		label: __( 'America/Adak', 'click-to-mail' ),
	},
	{
		value: 'America/Anchorage',
		label: __( 'America/Anchorage', 'click-to-mail' ),
	},
	{
		value: 'America/Anguilla',
		label: __( 'America/Anguilla', 'click-to-mail' ),
	},
	{
		value: 'America/Antigua',
		label: __( 'America/Antigua', 'click-to-mail' ),
	},
	{
		value: 'America/Araguaina',
		label: __( 'America/Araguaina', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Buenos_Aires',
		label: __( 'America/Argentina/Buenos_Aires', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Catamarca',
		label: __( 'America/Argentina/Catamarca', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/ComodRivadavia',
		label: __( 'America/Argentina/ComodRivadavia', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Cordoba',
		label: __( 'America/Argentina/Cordoba', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Jujuy',
		label: __( 'America/Argentina/Jujuy', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/La_Rioja',
		label: __( 'America/Argentina/La_Rioja', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Mendoza',
		label: __( 'America/Argentina/Mendoza', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Rio_Gallegos',
		label: __( 'America/Argentina/Rio_Gallegos', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Salta',
		label: __( 'America/Argentina/Salta', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/San_Juan',
		label: __( 'America/Argentina/San_Juan', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/San_Luis',
		label: __( 'America/Argentina/San_Luis', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Tucuman',
		label: __( 'America/Argentina/Tucuman', 'click-to-mail' ),
	},
	{
		value: 'America/Argentina/Ushuaia',
		label: __( 'America/Argentina/Ushuaia', 'click-to-mail' ),
	},
	{
		value: 'America/Aruba',
		label: __( 'America/Aruba', 'click-to-mail' ),
	},
	{
		value: 'America/Asuncion',
		label: __( 'America/Asuncion', 'click-to-mail' ),
	},
	{
		value: 'America/Atikokan',
		label: __( 'America/Atikokan', 'click-to-mail' ),
	},
	{
		value: 'America/Atka',
		label: __( 'America/Atka', 'click-to-mail' ),
	},
	{
		value: 'America/Bahia',
		label: __( 'America/Bahia', 'click-to-mail' ),
	},
	{
		value: 'America/Bahia_Banderas',
		label: __( 'America/Bahia_Banderas', 'click-to-mail' ),
	},
	{
		value: 'America/Barbados',
		label: __( 'America/Barbados', 'click-to-mail' ),
	},
	{
		value: 'America/Belem',
		label: __( 'America/Belem', 'click-to-mail' ),
	},
	{
		value: 'America/Belize',
		label: __( 'America/Belize', 'click-to-mail' ),
	},
	{
		value: 'America/Blanc-Sablon',
		label: __( 'America/Blanc-Sablon', 'click-to-mail' ),
	},
	{
		value: 'America/Boa_Vista',
		label: __( 'America/Boa_Vista', 'click-to-mail' ),
	},
	{
		value: 'America/Bogota',
		label: __( 'America/Bogota', 'click-to-mail' ),
	},
	{
		value: 'America/Boise',
		label: __( 'America/Boise', 'click-to-mail' ),
	},
	{
		value: 'America/Buenos_Aires',
		label: __( 'America/Buenos_Aires', 'click-to-mail' ),
	},
	{
		value: 'America/Cambridge_Bay',
		label: __( 'America/Cambridge_Bay', 'click-to-mail' ),
	},
	{
		value: 'America/Campo_Grande',
		label: __( 'America/Campo_Grande', 'click-to-mail' ),
	},
	{
		value: 'America/Cancun',
		label: __( 'America/Cancun', 'click-to-mail' ),
	},
	{
		value: 'America/Caracas',
		label: __( 'America/Caracas', 'click-to-mail' ),
	},
	{
		value: 'America/Catamarca',
		label: __( 'America/Catamarca', 'click-to-mail' ),
	},
	{
		value: 'America/Cayenne',
		label: __( 'America/Cayenne', 'click-to-mail' ),
	},
	{
		value: 'America/Cayman',
		label: __( 'America/Cayman', 'click-to-mail' ),
	},
	{
		value: 'America/Chicago',
		label: __( 'America/Chicago', 'click-to-mail' ),
	},
	{
		value: 'America/Chihuahua',
		label: __( 'America/Chihuahua', 'click-to-mail' ),
	},
	{
		value: 'America/Coral_Harbour',
		label: __( 'America/Coral_Harbour', 'click-to-mail' ),
	},
	{
		value: 'America/Cordoba',
		label: __( 'America/Cordoba', 'click-to-mail' ),
	},
	{
		value: 'America/Costa_Rica',
		label: __( 'America/Costa_Rica', 'click-to-mail' ),
	},
	{
		value: 'America/Creston',
		label: __( 'America/Creston', 'click-to-mail' ),
	},
	{
		value: 'America/Cuiaba',
		label: __( 'America/Cuiaba', 'click-to-mail' ),
	},
	{
		value: 'America/Curacao',
		label: __( 'America/Curacao', 'click-to-mail' ),
	},
	{
		value: 'America/Danmarkshavn',
		label: __( 'America/Danmarkshavn', 'click-to-mail' ),
	},
	{
		value: 'America/Dawson',
		label: __( 'America/Dawson', 'click-to-mail' ),
	},
	{
		value: 'America/Dawson_Creek',
		label: __( 'America/Dawson_Creek', 'click-to-mail' ),
	},
	{
		value: 'America/Denver',
		label: __( 'America/Denver', 'click-to-mail' ),
	},
	{
		value: 'America/Detroit',
		label: __( 'America/Detroit', 'click-to-mail' ),
	},
	{
		value: 'America/Dominica',
		label: __( 'America/Dominica', 'click-to-mail' ),
	},
	{
		value: 'America/Edmonton',
		label: __( 'America/Edmonton', 'click-to-mail' ),
	},
	{
		value: 'America/Eirunepe',
		label: __( 'America/Eirunepe', 'click-to-mail' ),
	},
	{
		value: 'America/El_Salvador',
		label: __( 'America/El_Salvador', 'click-to-mail' ),
	},
	{
		value: 'America/Ensenada',
		label: __( 'America/Ensenada', 'click-to-mail' ),
	},
	{
		value: 'America/Fort_Nelson',
		label: __( 'America/Fort_Nelson', 'click-to-mail' ),
	},
	{
		value: 'America/Fort_Wayne',
		label: __( 'America/Fort_Wayne', 'click-to-mail' ),
	},
	{
		value: 'America/Fortaleza',
		label: __( 'America/Fortaleza', 'click-to-mail' ),
	},
	{
		value: 'America/Glace_Bay',
		label: __( 'America/Glace_Bay', 'click-to-mail' ),
	},
	{
		value: 'America/Godthab',
		label: __( 'America/Godthab', 'click-to-mail' ),
	},
	{
		value: 'America/Goose_Bay',
		label: __( 'America/Goose_Bay', 'click-to-mail' ),
	},
	{
		value: 'America/Grand_Turk',
		label: __( 'America/Grand_Turk', 'click-to-mail' ),
	},
	{
		value: 'America/Grenada',
		label: __( 'America/Grenada', 'click-to-mail' ),
	},
	{
		value: 'America/Guadeloupe',
		label: __( 'America/Guadeloupe', 'click-to-mail' ),
	},
	{
		value: 'America/Guatemala',
		label: __( 'America/Guatemala', 'click-to-mail' ),
	},
	{
		value: 'America/Guayaquil',
		label: __( 'America/Guayaquil', 'click-to-mail' ),
	},
	{
		value: 'America/Guyana',
		label: __( 'America/Guyana', 'click-to-mail' ),
	},
	{
		value: 'America/Halifax',
		label: __( 'America/Halifax', 'click-to-mail' ),
	},
	{
		value: 'America/Havana',
		label: __( 'America/Havana', 'click-to-mail' ),
	},
	{
		value: 'America/Hermosillo',
		label: __( 'America/Hermosillo', 'click-to-mail' ),
	},
	{
		value: 'America/Indiana/Indianapolis',
		label: __( 'America/Indiana/Indianapolis', 'click-to-mail' ),
	},
	{
		value: 'America/Indiana/Knox',
		label: __( 'America/Indiana/Knox', 'click-to-mail' ),
	},
	{
		value: 'America/Indiana/Marengo',
		label: __( 'America/Indiana/Marengo', 'click-to-mail' ),
	},
	{
		value: 'America/Indiana/Petersburg',
		label: __( 'America/Indiana/Petersburg', 'click-to-mail' ),
	},
	{
		value: 'America/Indiana/Tell_City',
		label: __( 'America/Indiana/Tell_City', 'click-to-mail' ),
	},
	{
		value: 'America/Indiana/Vevay',
		label: __( 'America/Indiana/Vevay', 'click-to-mail' ),
	},
	{
		value: 'America/Indiana/Vincennes',
		label: __( 'America/Indiana/Vincennes', 'click-to-mail' ),
	},
	{
		value: 'America/Indiana/Winamac',
		label: __( 'America/Indiana/Winamac', 'click-to-mail' ),
	},
	{
		value: 'America/Indianapolis',
		label: __( 'America/Indianapolis', 'click-to-mail' ),
	},
	{
		value: 'America/Inuvik',
		label: __( 'America/Inuvik', 'click-to-mail' ),
	},
	{
		value: 'America/Iqaluit',
		label: __( 'America/Iqaluit', 'click-to-mail' ),
	},
	{
		value: 'America/Jamaica',
		label: __( 'America/Jamaica', 'click-to-mail' ),
	},
	{
		value: 'America/Jujuy',
		label: __( 'America/Jujuy', 'click-to-mail' ),
	},
	{
		value: 'America/Juneau',
		label: __( 'America/Juneau', 'click-to-mail' ),
	},
	{
		value: 'America/Kentucky/Louisville',
		label: __( 'America/Kentucky/Louisville', 'click-to-mail' ),
	},
	{
		value: 'America/Kentucky/Monticello',
		label: __( 'America/Kentucky/Monticello', 'click-to-mail' ),
	},
	{
		value: 'America/Knox_IN',
		label: __( 'America/Knox_IN', 'click-to-mail' ),
	},
	{
		value: 'America/Kralendijk',
		label: __( 'America/Kralendijk', 'click-to-mail' ),
	},
	{
		value: 'America/La_Paz',
		label: __( 'America/La_Paz', 'click-to-mail' ),
	},
	{
		value: 'America/Lima',
		label: __( 'America/Lima', 'click-to-mail' ),
	},
	{
		value: 'America/Los_Angeles',
		label: __( 'America/Los_Angeles', 'click-to-mail' ),
	},
	{
		value: 'America/Louisville',
		label: __( 'America/Louisville', 'click-to-mail' ),
	},
	{
		value: 'America/Lower_Princes',
		label: __( 'America/Lower_Princes', 'click-to-mail' ),
	},
	{
		value: 'America/Maceio',
		label: __( 'America/Maceio', 'click-to-mail' ),
	},
	{
		value: 'America/Managua',
		label: __( 'America/Managua', 'click-to-mail' ),
	},
	{
		value: 'America/Manaus',
		label: __( 'America/Manaus', 'click-to-mail' ),
	},
	{
		value: 'America/Marigot',
		label: __( 'America/Marigot', 'click-to-mail' ),
	},
	{
		value: 'America/Martinique',
		label: __( 'America/Martinique', 'click-to-mail' ),
	},
	{
		value: 'America/Matamoros',
		label: __( 'America/Matamoros', 'click-to-mail' ),
	},
	{
		value: 'America/Mazatlan',
		label: __( 'America/Mazatlan', 'click-to-mail' ),
	},
	{
		value: 'America/Mendoza',
		label: __( 'America/Mendoza', 'click-to-mail' ),
	},
	{
		value: 'America/Menominee',
		label: __( 'America/Menominee', 'click-to-mail' ),
	},
	{
		value: 'America/Merida',
		label: __( 'America/Merida', 'click-to-mail' ),
	},
	{
		value: 'America/Metlakatla',
		label: __( 'America/Metlakatla', 'click-to-mail' ),
	},
	{
		value: 'America/Mexico_City',
		label: __( 'America/Mexico_City', 'click-to-mail' ),
	},
	{
		value: 'America/Miquelon',
		label: __( 'America/Miquelon', 'click-to-mail' ),
	},
	{
		value: 'America/Moncton',
		label: __( 'America/Moncton', 'click-to-mail' ),
	},
	{
		value: 'America/Monterrey',
		label: __( 'America/Monterrey', 'click-to-mail' ),
	},
	{
		value: 'America/Montevideo',
		label: __( 'America/Montevideo', 'click-to-mail' ),
	},
	{
		value: 'America/Montreal',
		label: __( 'America/Montreal', 'click-to-mail' ),
	},
	{
		value: 'America/Montserrat',
		label: __( 'America/Montserrat', 'click-to-mail' ),
	},
	{
		value: 'America/Nassau',
		label: __( 'America/Nassau', 'click-to-mail' ),
	},
	{
		value: 'America/New_York',
		label: __( 'America/New_York', 'click-to-mail' ),
	},
	{
		value: 'America/Nipigon',
		label: __( 'America/Nipigon', 'click-to-mail' ),
	},
	{
		value: 'America/Nome',
		label: __( 'America/Nome', 'click-to-mail' ),
	},
	{
		value: 'America/Noronha',
		label: __( 'America/Noronha', 'click-to-mail' ),
	},
	{
		value: 'America/North_Dakota/Beulah',
		label: __( 'America/North_Dakota/Beulah', 'click-to-mail' ),
	},
	{
		value: 'America/North_Dakota/Center',
		label: __( 'America/North_Dakota/Center', 'click-to-mail' ),
	},
	{
		value: 'America/North_Dakota/New_Salem',
		label: __( 'America/North_Dakota/New_Salem', 'click-to-mail' ),
	},
	{
		value: 'America/Ojinaga',
		label: __( 'America/Ojinaga', 'click-to-mail' ),
	},
	{
		value: 'America/Panama',
		label: __( 'America/Panama', 'click-to-mail' ),
	},
	{
		value: 'America/Pangnirtung',
		label: __( 'America/Pangnirtung', 'click-to-mail' ),
	},
	{
		value: 'America/Paramaribo',
		label: __( 'America/Paramaribo', 'click-to-mail' ),
	},
	{
		value: 'America/Phoenix',
		label: __( 'America/Phoenix', 'click-to-mail' ),
	},
	{
		value: 'America/Port-au-Prince',
		label: __( 'America/Port-au-Prince', 'click-to-mail' ),
	},
	{
		value: 'America/Port_of_Spain',
		label: __( 'America/Port_of_Spain', 'click-to-mail' ),
	},
	{
		value: 'America/Porto_Acre',
		label: __( 'America/Porto_Acre', 'click-to-mail' ),
	},
	{
		value: 'America/Porto_Velho',
		label: __( 'America/Porto_Velho', 'click-to-mail' ),
	},
	{
		value: 'America/Puerto_Rico',
		label: __( 'America/Puerto_Rico', 'click-to-mail' ),
	},
	{
		value: 'America/Punta_Arenas',
		label: __( 'America/Punta_Arenas', 'click-to-mail' ),
	},
	{
		value: 'America/Rainy_River',
		label: __( 'America/Rainy_River', 'click-to-mail' ),
	},
	{
		value: 'America/Rankin_Inlet',
		label: __( 'America/Rankin_Inlet', 'click-to-mail' ),
	},
	{
		value: 'America/Recife',
		label: __( 'America/Recife', 'click-to-mail' ),
	},
	{
		value: 'America/Regina',
		label: __( 'America/Regina', 'click-to-mail' ),
	},
	{
		value: 'America/Resolute',
		label: __( 'America/Resolute', 'click-to-mail' ),
	},
	{
		value: 'America/Rio_Branco',
		label: __( 'America/Rio_Branco', 'click-to-mail' ),
	},
	{
		value: 'America/Rosario',
		label: __( 'America/Rosario', 'click-to-mail' ),
	},
	{
		value: 'America/Santa_Isabel',
		label: __( 'America/Santa_Isabel', 'click-to-mail' ),
	},
	{
		value: 'America/Santarem',
		label: __( 'America/Santarem', 'click-to-mail' ),
	},
	{
		value: 'America/Santiago',
		label: __( 'America/Santiago', 'click-to-mail' ),
	},
	{
		value: 'America/Santo_Domingo',
		label: __( 'America/Santo_Domingo', 'click-to-mail' ),
	},
	{
		value: 'America/Sao_Paulo',
		label: __( 'America/Sao_Paulo', 'click-to-mail' ),
	},
	{
		value: 'America/Scoresbysund',
		label: __( 'America/Scoresbysund', 'click-to-mail' ),
	},
	{
		value: 'America/Shiprock',
		label: __( 'America/Shiprock', 'click-to-mail' ),
	},
	{
		value: 'America/Sitka',
		label: __( 'America/Sitka', 'click-to-mail' ),
	},
	{
		value: 'America/St_Barthelemy',
		label: __( 'America/St_Barthelemy', 'click-to-mail' ),
	},
	{
		value: 'America/St_Johns',
		label: __( 'America/St_Johns', 'click-to-mail' ),
	},
	{
		value: 'America/St_Kitts',
		label: __( 'America/St_Kitts', 'click-to-mail' ),
	},
	{
		value: 'America/St_Lucia',
		label: __( 'America/St_Lucia', 'click-to-mail' ),
	},
	{
		value: 'America/St_Thomas',
		label: __( 'America/St_Thomas', 'click-to-mail' ),
	},
	{
		value: 'America/St_Vincent',
		label: __( 'America/St_Vincent', 'click-to-mail' ),
	},
	{
		value: 'America/Swift_Current',
		label: __( 'America/Swift_Current', 'click-to-mail' ),
	},
	{
		value: 'America/Tegucigalpa',
		label: __( 'America/Tegucigalpa', 'click-to-mail' ),
	},
	{
		value: 'America/Thule',
		label: __( 'America/Thule', 'click-to-mail' ),
	},
	{
		value: 'America/Thunder_Bay',
		label: __( 'America/Thunder_Bay', 'click-to-mail' ),
	},
	{
		value: 'America/Tijuana',
		label: __( 'America/Tijuana', 'click-to-mail' ),
	},
	{
		value: 'America/Toronto',
		label: __( 'America/Toronto', 'click-to-mail' ),
	},
	{
		value: 'America/Tortola',
		label: __( 'America/Tortola', 'click-to-mail' ),
	},
	{
		value: 'America/Vancouver',
		label: __( 'America/Vancouver', 'click-to-mail' ),
	},
	{
		value: 'America/Virgin',
		label: __( 'America/Virgin', 'click-to-mail' ),
	},
	{
		value: 'America/Whitehorse',
		label: __( 'America/Whitehorse', 'click-to-mail' ),
	},
	{
		value: 'America/Winnipeg',
		label: __( 'America/Winnipeg', 'click-to-mail' ),
	},
	{
		value: 'America/Yakutat',
		label: __( 'America/Yakutat', 'click-to-mail' ),
	},
	{
		value: 'America/Yellowknife',
		label: __( 'America/Yellowknife', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Casey',
		label: __( 'Antarctica/Casey', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Davis',
		label: __( 'Antarctica/Davis', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/DumontDUrville',
		label: __( 'Antarctica/DumontDUrville', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Macquarie',
		label: __( 'Antarctica/Macquarie', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Mawson',
		label: __( 'Antarctica/Mawson', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/McMurdo',
		label: __( 'Antarctica/McMurdo', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Palmer',
		label: __( 'Antarctica/Palmer', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Rothera',
		label: __( 'Antarctica/Rothera', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/South_Pole',
		label: __( 'Antarctica/South_Pole', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Syowa',
		label: __( 'Antarctica/Syowa', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Troll',
		label: __( 'Antarctica/Troll', 'click-to-mail' ),
	},
	{
		value: 'Antarctica/Vostok',
		label: __( 'Antarctica/Vostok', 'click-to-mail' ),
	},
	{
		value: 'Arctic/Longyearbyen',
		label: __( 'Arctic/Longyearbyen', 'click-to-mail' ),
	},
	{
		value: 'Asia/Aden',
		label: __( 'Asia/Aden', 'click-to-mail' ),
	},
	{
		value: 'Asia/Almaty',
		label: __( 'Asia/Almaty', 'click-to-mail' ),
	},
	{
		value: 'Asia/Amman',
		label: __( 'Asia/Amman', 'click-to-mail' ),
	},
	{
		value: 'Asia/Anadyr',
		label: __( 'Asia/Anadyr', 'click-to-mail' ),
	},
	{
		value: 'Asia/Aqtau',
		label: __( 'Asia/Aqtau', 'click-to-mail' ),
	},
	{
		value: 'Asia/Aqtobe',
		label: __( 'Asia/Aqtobe', 'click-to-mail' ),
	},
	{
		value: 'Asia/Ashgabat',
		label: __( 'Asia/Ashgabat', 'click-to-mail' ),
	},
	{
		value: 'Asia/Ashkhabad',
		label: __( 'Asia/Ashkhabad', 'click-to-mail' ),
	},
	{
		value: 'Asia/Atyrau',
		label: __( 'Asia/Atyrau', 'click-to-mail' ),
	},
	{
		value: 'Asia/Baghdad',
		label: __( 'Asia/Baghdad', 'click-to-mail' ),
	},
	{
		value: 'Asia/Bahrain',
		label: __( 'Asia/Bahrain', 'click-to-mail' ),
	},
	{
		value: 'Asia/Baku',
		label: __( 'Asia/Baku', 'click-to-mail' ),
	},
	{
		value: 'Asia/Bangkok',
		label: __( 'Asia/Bangkok', 'click-to-mail' ),
	},
	{
		value: 'Asia/Barnaul',
		label: __( 'Asia/Barnaul', 'click-to-mail' ),
	},
	{
		value: 'Asia/Beirut',
		label: __( 'Asia/Beirut', 'click-to-mail' ),
	},
	{
		value: 'Asia/Bishkek',
		label: __( 'Asia/Bishkek', 'click-to-mail' ),
	},
	{
		value: 'Asia/Brunei',
		label: __( 'Asia/Brunei', 'click-to-mail' ),
	},
	{
		value: 'Asia/Calcutta',
		label: __( 'Asia/Calcutta', 'click-to-mail' ),
	},
	{
		value: 'Asia/Chita',
		label: __( 'Asia/Chita', 'click-to-mail' ),
	},
	{
		value: 'Asia/Choibalsan',
		label: __( 'Asia/Choibalsan', 'click-to-mail' ),
	},
	{
		value: 'Asia/Chongqing',
		label: __( 'Asia/Chongqing', 'click-to-mail' ),
	},
	{
		value: 'Asia/Chungking',
		label: __( 'Asia/Chungking', 'click-to-mail' ),
	},
	{
		value: 'Asia/Colombo',
		label: __( 'Asia/Colombo', 'click-to-mail' ),
	},
	{
		value: 'Asia/Dacca',
		label: __( 'Asia/Dacca', 'click-to-mail' ),
	},
	{
		value: 'Asia/Damascus',
		label: __( 'Asia/Damascus', 'click-to-mail' ),
	},
	{
		value: 'Asia/Dhaka',
		label: __( 'Asia/Dhaka', 'click-to-mail' ),
	},
	{
		value: 'Asia/Dili',
		label: __( 'Asia/Dili', 'click-to-mail' ),
	},
	{
		value: 'Asia/Dubai',
		label: __( 'Asia/Dubai', 'click-to-mail' ),
	},
	{
		value: 'Asia/Dushanbe',
		label: __( 'Asia/Dushanbe', 'click-to-mail' ),
	},
	{
		value: 'Asia/Famagusta',
		label: __( 'Asia/Famagusta', 'click-to-mail' ),
	},
	{
		value: 'Asia/Gaza',
		label: __( 'Asia/Gaza', 'click-to-mail' ),
	},
	{
		value: 'Asia/Harbin',
		label: __( 'Asia/Harbin', 'click-to-mail' ),
	},
	{
		value: 'Asia/Hebron',
		label: __( 'Asia/Hebron', 'click-to-mail' ),
	},
	{
		value: 'Asia/Ho_Chi_Minh',
		label: __( 'Asia/Ho_Chi_Minh', 'click-to-mail' ),
	},
	{
		value: 'Asia/Hong_Kong',
		label: __( 'Asia/Hong_Kong', 'click-to-mail' ),
	},
	{
		value: 'Asia/Hovd',
		label: __( 'Asia/Hovd', 'click-to-mail' ),
	},
	{
		value: 'Asia/Irkutsk',
		label: __( 'Asia/Irkutsk', 'click-to-mail' ),
	},
	{
		value: 'Asia/Istanbul',
		label: __( 'Asia/Istanbul', 'click-to-mail' ),
	},
	{
		value: 'Asia/Jakarta',
		label: __( 'Asia/Jakarta', 'click-to-mail' ),
	},
	{
		value: 'Asia/Jayapura',
		label: __( 'Asia/Jayapura', 'click-to-mail' ),
	},
	{
		value: 'Asia/Jerusalem',
		label: __( 'Asia/Jerusalem', 'click-to-mail' ),
	},
	{
		value: 'Asia/Kabul',
		label: __( 'Asia/Kabul', 'click-to-mail' ),
	},
	{
		value: 'Asia/Kamchatka',
		label: __( 'Asia/Kamchatka', 'click-to-mail' ),
	},
	{
		value: 'Asia/Karachi',
		label: __( 'Asia/Karachi', 'click-to-mail' ),
	},
	{
		value: 'Asia/Kashgar',
		label: __( 'Asia/Kashgar', 'click-to-mail' ),
	},
	{
		value: 'Asia/Kathmandu',
		label: __( 'Asia/Kathmandu', 'click-to-mail' ),
	},
	{
		value: 'Asia/Katmandu',
		label: __( 'Asia/Katmandu', 'click-to-mail' ),
	},
	{
		value: 'Asia/Khandyga',
		label: __( 'Asia/Khandyga', 'click-to-mail' ),
	},
	{
		value: 'Asia/Kolkata',
		label: __( 'Asia/Kolkata', 'click-to-mail' ),
	},
	{
		value: 'Asia/Krasnoyarsk',
		label: __( 'Asia/Krasnoyarsk', 'click-to-mail' ),
	},
	{
		value: 'Asia/Kuala_Lumpur',
		label: __( 'Asia/Kuala_Lumpur', 'click-to-mail' ),
	},
	{
		value: 'Asia/Kuching',
		label: __( 'Asia/Kuching', 'click-to-mail' ),
	},
	{
		value: 'Asia/Kuwait',
		label: __( 'Asia/Kuwait', 'click-to-mail' ),
	},
	{
		value: 'Asia/Macao',
		label: __( 'Asia/Macao', 'click-to-mail' ),
	},
	{
		value: 'Asia/Macau',
		label: __( 'Asia/Macau', 'click-to-mail' ),
	},
	{
		value: 'Asia/Magadan',
		label: __( 'Asia/Magadan', 'click-to-mail' ),
	},
	{
		value: 'Asia/Makassar',
		label: __( 'Asia/Makassar', 'click-to-mail' ),
	},
	{
		value: 'Asia/Manila',
		label: __( 'Asia/Manila', 'click-to-mail' ),
	},
	{
		value: 'Asia/Muscat',
		label: __( 'Asia/Muscat', 'click-to-mail' ),
	},
	{
		value: 'Asia/Nicosia',
		label: __( 'Asia/Nicosia', 'click-to-mail' ),
	},
	{
		value: 'Asia/Novokuznetsk',
		label: __( 'Asia/Novokuznetsk', 'click-to-mail' ),
	},
	{
		value: 'Asia/Novosibirsk',
		label: __( 'Asia/Novosibirsk', 'click-to-mail' ),
	},
	{
		value: 'Asia/Omsk',
		label: __( 'Asia/Omsk', 'click-to-mail' ),
	},
	{
		value: 'Asia/Oral',
		label: __( 'Asia/Oral', 'click-to-mail' ),
	},
	{
		value: 'Asia/Phnom_Penh',
		label: __( 'Asia/Phnom_Penh', 'click-to-mail' ),
	},
	{
		value: 'Asia/Pontianak',
		label: __( 'Asia/Pontianak', 'click-to-mail' ),
	},
	{
		value: 'Asia/Pyongyang',
		label: __( 'Asia/Pyongyang', 'click-to-mail' ),
	},
	{
		value: 'Asia/Qatar',
		label: __( 'Asia/Qatar', 'click-to-mail' ),
	},
	{
		value: 'Asia/Qyzylorda',
		label: __( 'Asia/Qyzylorda', 'click-to-mail' ),
	},
	{
		value: 'Asia/Rangoon',
		label: __( 'Asia/Rangoon', 'click-to-mail' ),
	},
	{
		value: 'Asia/Riyadh',
		label: __( 'Asia/Riyadh', 'click-to-mail' ),
	},
	{
		value: 'Asia/Saigon',
		label: __( 'Asia/Saigon', 'click-to-mail' ),
	},
	{
		value: 'Asia/Sakhalin',
		label: __( 'Asia/Sakhalin', 'click-to-mail' ),
	},
	{
		value: 'Asia/Samarkand',
		label: __( 'Asia/Samarkand', 'click-to-mail' ),
	},
	{
		value: 'Asia/Seoul',
		label: __( 'Asia/Seoul', 'click-to-mail' ),
	},
	{
		value: 'Asia/Shanghai',
		label: __( 'Asia/Shanghai', 'click-to-mail' ),
	},
	{
		value: 'Asia/Singapore',
		label: __( 'Asia/Singapore', 'click-to-mail' ),
	},
	{
		value: 'Asia/Srednekolymsk',
		label: __( 'Asia/Srednekolymsk', 'click-to-mail' ),
	},
	{
		value: 'Asia/Taipei',
		label: __( 'Asia/Taipei', 'click-to-mail' ),
	},
	{
		value: 'Asia/Tashkent',
		label: __( 'Asia/Tashkent', 'click-to-mail' ),
	},
	{
		value: 'Asia/Tbilisi',
		label: __( 'Asia/Tbilisi', 'click-to-mail' ),
	},
	{
		value: 'Asia/Tehran',
		label: __( 'Asia/Tehran', 'click-to-mail' ),
	},
	{
		value: 'Asia/Tel_Aviv',
		label: __( 'Asia/Tel_Aviv', 'click-to-mail' ),
	},
	{
		value: 'Asia/Thimbu',
		label: __( 'Asia/Thimbu', 'click-to-mail' ),
	},
	{
		value: 'Asia/Thimphu',
		label: __( 'Asia/Thimphu', 'click-to-mail' ),
	},
	{
		value: 'Asia/Tokyo',
		label: __( 'Asia/Tokyo', 'click-to-mail' ),
	},
	{
		value: 'Asia/Tomsk',
		label: __( 'Asia/Tomsk', 'click-to-mail' ),
	},
	{
		value: 'Asia/Ujung_Pandang',
		label: __( 'Asia/Ujung_Pandang', 'click-to-mail' ),
	},
	{
		value: 'Asia/Ulaanbaatar',
		label: __( 'Asia/Ulaanbaatar', 'click-to-mail' ),
	},
	{
		value: 'Asia/Ulan_Bator',
		label: __( 'Asia/Ulan_Bator', 'click-to-mail' ),
	},
	{
		value: 'Asia/Urumqi',
		label: __( 'Asia/Urumqi', 'click-to-mail' ),
	},
	{
		value: 'Asia/Ust-Nera',
		label: __( 'Asia/Ust-Nera', 'click-to-mail' ),
	},
	{
		value: 'Asia/Vientiane',
		label: __( 'Asia/Vientiane', 'click-to-mail' ),
	},
	{
		value: 'Asia/Vladivostok',
		label: __( 'Asia/Vladivostok', 'click-to-mail' ),
	},
	{
		value: 'Asia/Yakutsk',
		label: __( 'Asia/Yakutsk', 'click-to-mail' ),
	},
	{
		value: 'Asia/Yangon',
		label: __( 'Asia/Yangon', 'click-to-mail' ),
	},
	{
		value: 'Asia/Yekaterinburg',
		label: __( 'Asia/Yekaterinburg', 'click-to-mail' ),
	},
	{
		value: 'Asia/Yerevan',
		label: __( 'Asia/Yerevan', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Azores',
		label: __( 'Atlantic/Azores', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Bermuda',
		label: __( 'Atlantic/Bermuda', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Canary',
		label: __( 'Atlantic/Canary', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Cape_Verde',
		label: __( 'Atlantic/Cape_Verde', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Faeroe',
		label: __( 'Atlantic/Faeroe', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Faroe',
		label: __( 'Atlantic/Faroe', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Jan_Mayen',
		label: __( 'Atlantic/Jan_Mayen', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Madeira',
		label: __( 'Atlantic/Madeira', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Reykjavik',
		label: __( 'Atlantic/Reykjavik', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/South_Georgia',
		label: __( 'Atlantic/South_Georgia', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/St_Helena',
		label: __( 'Atlantic/St_Helena', 'click-to-mail' ),
	},
	{
		value: 'Atlantic/Stanley',
		label: __( 'Atlantic/Stanley', 'click-to-mail' ),
	},
	{
		value: 'Australia/ACT',
		label: __( 'Australia/ACT', 'click-to-mail' ),
	},
	{
		value: 'Australia/Adelaide',
		label: __( 'Australia/Adelaide', 'click-to-mail' ),
	},
	{
		value: 'Australia/Brisbane',
		label: __( 'Australia/Brisbane', 'click-to-mail' ),
	},
	{
		value: 'Australia/Broken_Hill',
		label: __( 'Australia/Broken_Hill', 'click-to-mail' ),
	},
	{
		value: 'Australia/Canberra',
		label: __( 'Australia/Canberra', 'click-to-mail' ),
	},
	{
		value: 'Australia/Currie',
		label: __( 'Australia/Currie', 'click-to-mail' ),
	},
	{
		value: 'Australia/Darwin',
		label: __( 'Australia/Darwin', 'click-to-mail' ),
	},
	{
		value: 'Australia/Eucla',
		label: __( 'Australia/Eucla', 'click-to-mail' ),
	},
	{
		value: 'Australia/Hobart',
		label: __( 'Australia/Hobart', 'click-to-mail' ),
	},
	{
		value: 'Australia/LHI',
		label: __( 'Australia/LHI', 'click-to-mail' ),
	},
	{
		value: 'Australia/Lindeman',
		label: __( 'Australia/Lindeman', 'click-to-mail' ),
	},
	{
		value: 'Australia/Lord_Howe',
		label: __( 'Australia/Lord_Howe', 'click-to-mail' ),
	},
	{
		value: 'Australia/Melbourne',
		label: __( 'Australia/Melbourne', 'click-to-mail' ),
	},
	{
		value: 'Australia/NSW',
		label: __( 'Australia/NSW', 'click-to-mail' ),
	},
	{
		value: 'Australia/North',
		label: __( 'Australia/North', 'click-to-mail' ),
	},
	{
		value: 'Australia/Perth',
		label: __( 'Australia/Perth', 'click-to-mail' ),
	},
	{
		value: 'Australia/Queensland',
		label: __( 'Australia/Queensland', 'click-to-mail' ),
	},
	{
		value: 'Australia/South',
		label: __( 'Australia/South', 'click-to-mail' ),
	},
	{
		value: 'Australia/Sydney',
		label: __( 'Australia/Sydney', 'click-to-mail' ),
	},
	{
		value: 'Australia/Tasmania',
		label: __( 'Australia/Tasmania', 'click-to-mail' ),
	},
	{
		value: 'Australia/Victoria',
		label: __( 'Australia/Victoria', 'click-to-mail' ),
	},
	{
		value: 'Australia/West',
		label: __( 'Australia/West', 'click-to-mail' ),
	},
	{
		value: 'Australia/Yancowinna',
		label: __( 'Australia/Yancowinna', 'click-to-mail' ),
	},
	{
		value: 'Brazil/Acre',
		label: __( 'Brazil/Acre', 'click-to-mail' ),
	},
	{
		value: 'Brazil/DeNoronha',
		label: __( 'Brazil/DeNoronha', 'click-to-mail' ),
	},
	{
		value: 'Brazil/East',
		label: __( 'Brazil/East', 'click-to-mail' ),
	},
	{
		value: 'Brazil/West',
		label: __( 'Brazil/West', 'click-to-mail' ),
	},
	{
		value: 'CET',
		label: __( 'CET', 'click-to-mail' ),
	},
	{
		value: 'CST6CDT',
		label: __( 'CST6CDT', 'click-to-mail' ),
	},
	{
		value: 'Canada/Atlantic',
		label: __( 'Canada/Atlantic', 'click-to-mail' ),
	},
	{
		value: 'Canada/Central',
		label: __( 'Canada/Central', 'click-to-mail' ),
	},
	{
		value: 'Canada/Eastern',
		label: __( 'Canada/Eastern', 'click-to-mail' ),
	},
	{
		value: 'Canada/Mountain',
		label: __( 'Canada/Mountain', 'click-to-mail' ),
	},
	{
		value: 'Canada/Newfoundland',
		label: __( 'Canada/Newfoundland', 'click-to-mail' ),
	},
	{
		value: 'Canada/Pacific',
		label: __( 'Canada/Pacific', 'click-to-mail' ),
	},
	{
		value: 'Canada/Saskatchewan',
		label: __( 'Canada/Saskatchewan', 'click-to-mail' ),
	},
	{
		value: 'Canada/Yukon',
		label: __( 'Canada/Yukon', 'click-to-mail' ),
	},
	{
		value: 'Chile/Continental',
		label: __( 'Chile/Continental', 'click-to-mail' ),
	},
	{
		value: 'Chile/EasterIsland',
		label: __( 'Chile/EasterIsland', 'click-to-mail' ),
	},
	{
		value: 'Cuba',
		label: __( 'Cuba', 'click-to-mail' ),
	},
	{
		value: 'EET',
		label: __( 'EET', 'click-to-mail' ),
	},
	{
		value: 'EST',
		label: __( 'EST', 'click-to-mail' ),
	},
	{
		value: 'EST5EDT',
		label: __( 'EST5EDT', 'click-to-mail' ),
	},
	{
		value: 'Egypt',
		label: __( 'Egypt', 'click-to-mail' ),
	},
	{
		value: 'Eire',
		label: __( 'Eire', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT',
		label: __( 'Etc/GMT', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+0',
		label: __( 'Etc/GMT+0', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+1',
		label: __( 'Etc/GMT+1', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+10',
		label: __( 'Etc/GMT+10', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+11',
		label: __( 'Etc/GMT+11', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+12',
		label: __( 'Etc/GMT+12', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+2',
		label: __( 'Etc/GMT+2', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+3',
		label: __( 'Etc/GMT+3', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+4',
		label: __( 'Etc/GMT+4', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+5',
		label: __( 'Etc/GMT+5', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+6',
		label: __( 'Etc/GMT+6', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+7',
		label: __( 'Etc/GMT+7', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+8',
		label: __( 'Etc/GMT+8', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT+9',
		label: __( 'Etc/GMT+9', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-0',
		label: __( 'Etc/GMT-0', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-1',
		label: __( 'Etc/GMT-1', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-10',
		label: __( 'Etc/GMT-10', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-11',
		label: __( 'Etc/GMT-11', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-12',
		label: __( 'Etc/GMT-12', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-13',
		label: __( 'Etc/GMT-13', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-14',
		label: __( 'Etc/GMT-14', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-2',
		label: __( 'Etc/GMT-2', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-3',
		label: __( 'Etc/GMT-3', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-4',
		label: __( 'Etc/GMT-4', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-5',
		label: __( 'Etc/GMT-5', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-6',
		label: __( 'Etc/GMT-6', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-7',
		label: __( 'Etc/GMT-7', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-8',
		label: __( 'Etc/GMT-8', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT-9',
		label: __( 'Etc/GMT-9', 'click-to-mail' ),
	},
	{
		value: 'Etc/GMT0',
		label: __( 'Etc/GMT0', 'click-to-mail' ),
	},
	{
		value: 'Etc/Greenwich',
		label: __( 'Etc/Greenwich', 'click-to-mail' ),
	},
	{
		value: 'Etc/UCT',
		label: __( 'Etc/UCT', 'click-to-mail' ),
	},
	{
		value: 'Etc/UTC',
		label: __( 'Etc/UTC', 'click-to-mail' ),
	},
	{
		value: 'Etc/Universal',
		label: __( 'Etc/Universal', 'click-to-mail' ),
	},
	{
		value: 'Etc/Zulu',
		label: __( 'Etc/Zulu', 'click-to-mail' ),
	},
	{
		value: 'Europe/Amsterdam',
		label: __( 'Europe/Amsterdam', 'click-to-mail' ),
	},
	{
		value: 'Europe/Andorra',
		label: __( 'Europe/Andorra', 'click-to-mail' ),
	},
	{
		value: 'Europe/Astrakhan',
		label: __( 'Europe/Astrakhan', 'click-to-mail' ),
	},
	{
		value: 'Europe/Athens',
		label: __( 'Europe/Athens', 'click-to-mail' ),
	},
	{
		value: 'Europe/Belfast',
		label: __( 'Europe/Belfast', 'click-to-mail' ),
	},
	{
		value: 'Europe/Belgrade',
		label: __( 'Europe/Belgrade', 'click-to-mail' ),
	},
	{
		value: 'Europe/Berlin',
		label: __( 'Europe/Berlin', 'click-to-mail' ),
	},
	{
		value: 'Europe/Bratislava',
		label: __( 'Europe/Bratislava', 'click-to-mail' ),
	},
	{
		value: 'Europe/Brussels',
		label: __( 'Europe/Brussels', 'click-to-mail' ),
	},
	{
		value: 'Europe/Bucharest',
		label: __( 'Europe/Bucharest', 'click-to-mail' ),
	},
	{
		value: 'Europe/Budapest',
		label: __( 'Europe/Budapest', 'click-to-mail' ),
	},
	{
		value: 'Europe/Busingen',
		label: __( 'Europe/Busingen', 'click-to-mail' ),
	},
	{
		value: 'Europe/Chisinau',
		label: __( 'Europe/Chisinau', 'click-to-mail' ),
	},
	{
		value: 'Europe/Copenhagen',
		label: __( 'Europe/Copenhagen', 'click-to-mail' ),
	},
	{
		value: 'Europe/Dublin',
		label: __( 'Europe/Dublin', 'click-to-mail' ),
	},
	{
		value: 'Europe/Gibraltar',
		label: __( 'Europe/Gibraltar', 'click-to-mail' ),
	},
	{
		value: 'Europe/Guernsey',
		label: __( 'Europe/Guernsey', 'click-to-mail' ),
	},
	{
		value: 'Europe/Helsinki',
		label: __( 'Europe/Helsinki', 'click-to-mail' ),
	},
	{
		value: 'Europe/Isle_of_Man',
		label: __( 'Europe/Isle_of_Man', 'click-to-mail' ),
	},
	{
		value: 'Europe/Istanbul',
		label: __( 'Europe/Istanbul', 'click-to-mail' ),
	},
	{
		value: 'Europe/Jersey',
		label: __( 'Europe/Jersey', 'click-to-mail' ),
	},
	{
		value: 'Europe/Kaliningrad',
		label: __( 'Europe/Kaliningrad', 'click-to-mail' ),
	},
	{
		value: 'Europe/Kiev',
		label: __( 'Europe/Kiev', 'click-to-mail' ),
	},
	{
		value: 'Europe/Kirov',
		label: __( 'Europe/Kirov', 'click-to-mail' ),
	},
	{
		value: 'Europe/Lisbon',
		label: __( 'Europe/Lisbon', 'click-to-mail' ),
	},
	{
		value: 'Europe/Ljubljana',
		label: __( 'Europe/Ljubljana', 'click-to-mail' ),
	},
	{
		value: 'Europe/London',
		label: __( 'Europe/London', 'click-to-mail' ),
	},
	{
		value: 'Europe/Luxembourg',
		label: __( 'Europe/Luxembourg', 'click-to-mail' ),
	},
	{
		value: 'Europe/Madrid',
		label: __( 'Europe/Madrid', 'click-to-mail' ),
	},
	{
		value: 'Europe/Malta',
		label: __( 'Europe/Malta', 'click-to-mail' ),
	},
	{
		value: 'Europe/Mariehamn',
		label: __( 'Europe/Mariehamn', 'click-to-mail' ),
	},
	{
		value: 'Europe/Minsk',
		label: __( 'Europe/Minsk', 'click-to-mail' ),
	},
	{
		value: 'Europe/Monaco',
		label: __( 'Europe/Monaco', 'click-to-mail' ),
	},
	{
		value: 'Europe/Moscow',
		label: __( 'Europe/Moscow', 'click-to-mail' ),
	},
	{
		value: 'Europe/Nicosia',
		label: __( 'Europe/Nicosia', 'click-to-mail' ),
	},
	{
		value: 'Europe/Oslo',
		label: __( 'Europe/Oslo', 'click-to-mail' ),
	},
	{
		value: 'Europe/Paris',
		label: __( 'Europe/Paris', 'click-to-mail' ),
	},
	{
		value: 'Europe/Podgorica',
		label: __( 'Europe/Podgorica', 'click-to-mail' ),
	},
	{
		value: 'Europe/Prague',
		label: __( 'Europe/Prague', 'click-to-mail' ),
	},
	{
		value: 'Europe/Riga',
		label: __( 'Europe/Riga', 'click-to-mail' ),
	},
	{
		value: 'Europe/Rome',
		label: __( 'Europe/Rome', 'click-to-mail' ),
	},
	{
		value: 'Europe/Samara',
		label: __( 'Europe/Samara', 'click-to-mail' ),
	},
	{
		value: 'Europe/San_Marino',
		label: __( 'Europe/San_Marino', 'click-to-mail' ),
	},
	{
		value: 'Europe/Sarajevo',
		label: __( 'Europe/Sarajevo', 'click-to-mail' ),
	},
	{
		value: 'Europe/Saratov',
		label: __( 'Europe/Saratov', 'click-to-mail' ),
	},
	{
		value: 'Europe/Simferopol',
		label: __( 'Europe/Simferopol', 'click-to-mail' ),
	},
	{
		value: 'Europe/Skopje',
		label: __( 'Europe/Skopje', 'click-to-mail' ),
	},
	{
		value: 'Europe/Sofia',
		label: __( 'Europe/Sofia', 'click-to-mail' ),
	},
	{
		value: 'Europe/Stockholm',
		label: __( 'Europe/Stockholm', 'click-to-mail' ),
	},
	{
		value: 'Europe/Tallinn',
		label: __( 'Europe/Tallinn', 'click-to-mail' ),
	},
	{
		value: 'Europe/Tirane',
		label: __( 'Europe/Tirane', 'click-to-mail' ),
	},
	{
		value: 'Europe/Tiraspol',
		label: __( 'Europe/Tiraspol', 'click-to-mail' ),
	},
	{
		value: 'Europe/Ulyanovsk',
		label: __( 'Europe/Ulyanovsk', 'click-to-mail' ),
	},
	{
		value: 'Europe/Uzhgorod',
		label: __( 'Europe/Uzhgorod', 'click-to-mail' ),
	},
	{
		value: 'Europe/Vaduz',
		label: __( 'Europe/Vaduz', 'click-to-mail' ),
	},
	{
		value: 'Europe/Vatican',
		label: __( 'Europe/Vatican', 'click-to-mail' ),
	},
	{
		value: 'Europe/Vienna',
		label: __( 'Europe/Vienna', 'click-to-mail' ),
	},
	{
		value: 'Europe/Vilnius',
		label: __( 'Europe/Vilnius', 'click-to-mail' ),
	},
	{
		value: 'Europe/Volgograd',
		label: __( 'Europe/Volgograd', 'click-to-mail' ),
	},
	{
		value: 'Europe/Warsaw',
		label: __( 'Europe/Warsaw', 'click-to-mail' ),
	},
	{
		value: 'Europe/Zagreb',
		label: __( 'Europe/Zagreb', 'click-to-mail' ),
	},
	{
		value: 'Europe/Zaporozhye',
		label: __( 'Europe/Zaporozhye', 'click-to-mail' ),
	},
	{
		value: 'Europe/Zurich',
		label: __( 'Europe/Zurich', 'click-to-mail' ),
	},
	{
		value: 'GB',
		label: __( 'GB', 'click-to-mail' ),
	},
	{
		value: 'GB-Eire',
		label: __( 'GB-Eire', 'click-to-mail' ),
	},
	{
		value: 'GMT',
		label: __( 'GMT', 'click-to-mail' ),
	},
	{
		value: 'GMT+0',
		label: __( 'GMT+0', 'click-to-mail' ),
	},
	{
		value: 'GMT-0',
		label: __( 'GMT-0', 'click-to-mail' ),
	},
	{
		value: 'GMT0',
		label: __( 'GMT0', 'click-to-mail' ),
	},
	{
		value: 'Greenwich',
		label: __( 'Greenwich', 'click-to-mail' ),
	},
	{
		value: 'HST',
		label: __( 'HST', 'click-to-mail' ),
	},
	{
		value: 'Hongkong',
		label: __( 'Hongkong', 'click-to-mail' ),
	},
	{
		value: 'Iceland',
		label: __( 'Iceland', 'click-to-mail' ),
	},
	{
		value: 'Indian/Antananarivo',
		label: __( 'Indian/Antananarivo', 'click-to-mail' ),
	},
	{
		value: 'Indian/Chagos',
		label: __( 'Indian/Chagos', 'click-to-mail' ),
	},
	{
		value: 'Indian/Christmas',
		label: __( 'Indian/Christmas', 'click-to-mail' ),
	},
	{
		value: 'Indian/Cocos',
		label: __( 'Indian/Cocos', 'click-to-mail' ),
	},
	{
		value: 'Indian/Comoro',
		label: __( 'Indian/Comoro', 'click-to-mail' ),
	},
	{
		value: 'Indian/Kerguelen',
		label: __( 'Indian/Kerguelen', 'click-to-mail' ),
	},
	{
		value: 'Indian/Mahe',
		label: __( 'Indian/Mahe', 'click-to-mail' ),
	},
	{
		value: 'Indian/Maldives',
		label: __( 'Indian/Maldives', 'click-to-mail' ),
	},
	{
		value: 'Indian/Mauritius',
		label: __( 'Indian/Mauritius', 'click-to-mail' ),
	},
	{
		value: 'Indian/Mayotte',
		label: __( 'Indian/Mayotte', 'click-to-mail' ),
	},
	{
		value: 'Indian/Reunion',
		label: __( 'Indian/Reunion', 'click-to-mail' ),
	},
	{
		value: 'Iran',
		label: __( 'Iran', 'click-to-mail' ),
	},
	{
		value: 'Israel',
		label: __( 'Israel', 'click-to-mail' ),
	},
	{
		value: 'Jamaica',
		label: __( 'Jamaica', 'click-to-mail' ),
	},
	{
		value: 'Japan',
		label: __( 'Japan', 'click-to-mail' ),
	},
	{
		value: 'Kwajalein',
		label: __( 'Kwajalein', 'click-to-mail' ),
	},
	{
		value: 'Libya',
		label: __( 'Libya', 'click-to-mail' ),
	},
	{
		value: 'MET',
		label: __( 'MET', 'click-to-mail' ),
	},
	{
		value: 'MST',
		label: __( 'MST', 'click-to-mail' ),
	},
	{
		value: 'MST7MDT',
		label: __( 'MST7MDT', 'click-to-mail' ),
	},
	{
		value: 'Mexico/BajaNorte',
		label: __( 'Mexico/BajaNorte', 'click-to-mail' ),
	},
	{
		value: 'Mexico/BajaSur',
		label: __( 'Mexico/BajaSur', 'click-to-mail' ),
	},
	{
		value: 'Mexico/General',
		label: __( 'Mexico/General', 'click-to-mail' ),
	},
	{
		value: 'NZ',
		label: __( 'NZ', 'click-to-mail' ),
	},
	{
		value: 'NZ-CHAT',
		label: __( 'NZ-CHAT', 'click-to-mail' ),
	},
	{
		value: 'Navajo',
		label: __( 'Navajo', 'click-to-mail' ),
	},
	{
		value: 'PRC',
		label: __( 'PRC', 'click-to-mail' ),
	},
	{
		value: 'PST8PDT',
		label: __( 'PST8PDT', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Apia',
		label: __( 'Pacific/Apia', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Auckland',
		label: __( 'Pacific/Auckland', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Bougainville',
		label: __( 'Pacific/Bougainville', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Chatham',
		label: __( 'Pacific/Chatham', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Chuuk',
		label: __( 'Pacific/Chuuk', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Easter',
		label: __( 'Pacific/Easter', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Efate',
		label: __( 'Pacific/Efate', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Enderbury',
		label: __( 'Pacific/Enderbury', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Fakaofo',
		label: __( 'Pacific/Fakaofo', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Fiji',
		label: __( 'Pacific/Fiji', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Funafuti',
		label: __( 'Pacific/Funafuti', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Galapagos',
		label: __( 'Pacific/Galapagos', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Gambier',
		label: __( 'Pacific/Gambier', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Guadalcanal',
		label: __( 'Pacific/Guadalcanal', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Guam',
		label: __( 'Pacific/Guam', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Honolulu',
		label: __( 'Pacific/Honolulu', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Johnston',
		label: __( 'Pacific/Johnston', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Kiritimati',
		label: __( 'Pacific/Kiritimati', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Kosrae',
		label: __( 'Pacific/Kosrae', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Kwajalein',
		label: __( 'Pacific/Kwajalein', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Majuro',
		label: __( 'Pacific/Majuro', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Marquesas',
		label: __( 'Pacific/Marquesas', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Midway',
		label: __( 'Pacific/Midway', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Nauru',
		label: __( 'Pacific/Nauru', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Niue',
		label: __( 'Pacific/Niue', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Norfolk',
		label: __( 'Pacific/Norfolk', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Noumea',
		label: __( 'Pacific/Noumea', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Pago_Pago',
		label: __( 'Pacific/Pago_Pago', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Palau',
		label: __( 'Pacific/Palau', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Pitcairn',
		label: __( 'Pacific/Pitcairn', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Pohnpei',
		label: __( 'Pacific/Pohnpei', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Ponape',
		label: __( 'Pacific/Ponape', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Port_Moresby',
		label: __( 'Pacific/Port_Moresby', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Rarotonga',
		label: __( 'Pacific/Rarotonga', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Saipan',
		label: __( 'Pacific/Saipan', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Samoa',
		label: __( 'Pacific/Samoa', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Tahiti',
		label: __( 'Pacific/Tahiti', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Tarawa',
		label: __( 'Pacific/Tarawa', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Tongatapu',
		label: __( 'Pacific/Tongatapu', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Truk',
		label: __( 'Pacific/Truk', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Wake',
		label: __( 'Pacific/Wake', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Wallis',
		label: __( 'Pacific/Wallis', 'click-to-mail' ),
	},
	{
		value: 'Pacific/Yap',
		label: __( 'Pacific/Yap', 'click-to-mail' ),
	},
	{
		value: 'Poland',
		label: __( 'Poland', 'click-to-mail' ),
	},
	{
		value: 'Portugal',
		label: __( 'Portugal', 'click-to-mail' ),
	},
	{
		value: 'ROC',
		label: __( 'ROC', 'click-to-mail' ),
	},
	{
		value: 'ROK',
		label: __( 'ROK', 'click-to-mail' ),
	},
	{
		value: 'Singapore',
		label: __( 'Singapore', 'click-to-mail' ),
	},
	{
		value: 'Turkey',
		label: __( 'Turkey', 'click-to-mail' ),
	},
	{
		value: 'UCT',
		label: __( 'UCT', 'click-to-mail' ),
	},
	{
		value: 'US/Alaska',
		label: __( 'US/Alaska', 'click-to-mail' ),
	},
	{
		value: 'US/Aleutian',
		label: __( 'US/Aleutian', 'click-to-mail' ),
	},
	{
		value: 'US/Arizona',
		label: __( 'US/Arizona', 'click-to-mail' ),
	},
	{
		value: 'US/Central',
		label: __( 'US/Central', 'click-to-mail' ),
	},
	{
		value: 'US/East-Indiana',
		label: __( 'US/East-Indiana', 'click-to-mail' ),
	},
	{
		value: 'US/Eastern',
		label: __( 'US/Eastern', 'click-to-mail' ),
	},
	{
		value: 'US/Hawaii',
		label: __( 'US/Hawaii', 'click-to-mail' ),
	},
	{
		value: 'US/Indiana-Starke',
		label: __( 'US/Indiana-Starke', 'click-to-mail' ),
	},
	{
		value: 'US/Michigan',
		label: __( 'US/Michigan', 'click-to-mail' ),
	},
	{
		value: 'US/Mountain',
		label: __( 'US/Mountain', 'click-to-mail' ),
	},
	{
		value: 'US/Pacific',
		label: __( 'US/Pacific', 'click-to-mail' ),
	},
	{
		value: 'US/Pacific-New',
		label: __( 'US/Pacific-New', 'click-to-mail' ),
	},
	{
		value: 'US/Samoa',
		label: __( 'US/Samoa', 'click-to-mail' ),
	},
	{
		value: 'UTC',
		label: __( 'UTC', 'click-to-mail' ),
	},
	{
		value: 'Universal',
		label: __( 'Universal', 'click-to-mail' ),
	},
	{
		value: 'W-SU',
		label: __( 'W-SU', 'click-to-mail' ),
	},
	{
		value: 'WET',
		label: __( 'WET', 'click-to-mail' ),
	},
	{
		value: 'Zulu',
		label: __( 'Zulu', 'click-to-mail' ),
	},
];

export default function Edit( props ) {
	const { attributes, setAttributes } = props;

	const {
		buttonSize,
		buttonType,
		borderRadius,
		text,
		info,
		title,
		online,
		offline,
		textAlignment,
		iconTarget,
		visibility,
		emailInput,
		ccEmailInput,
		bccEmailInput,
		subject,
		bodyText,
		imageUrl,
		timeZone,
		mondayStart,
		mondayEnd,
		tuesdayStart,
		tuesdayEnd,
		wednesdayStart,
		wednesdayEnd,
		thursdayStart,
		thursdayEnd,
		fridayStart,
		fridayEnd,
		saturdayStart,
		saturdayEnd,
		sundayStart,
		sundayEnd,
	} = attributes;

	const [ filteredOptions, setFilteredOptions ] = useState( timezones );

	function onInputChange( value ) {
		setFilteredOptions(
			timezones.filter( ( timezone ) =>
				timezone.label.toLowerCase().includes( value.toLowerCase() )
			)
		);
	}

	function onFontSizeChange( value ) {
		setAttributes( { timeZone: value } );
	}
	const onSelectImage = ( image ) => {
		setAttributes( {
			imageUrl: image.url,
		} );
	};
	const onChangeAlignment = ( newAlignment ) => {
		setAttributes( { textAlignment: newAlignment } );
	};
	const onChangeText = ( newText ) => {
		setAttributes( { text: newText } );
	};
	const advancedBtnInfo = ( newInfo ) => {
		setAttributes( { info: newInfo } );
	};
	const advancedBtnTitle = ( newTitle ) => {
		setAttributes( { title: newTitle } );
	};
	const advancedBtnOnlineBadge = ( newOnline ) => {
		setAttributes( { online: newOnline } );
	};
	const onIconTarget = ( onIconTargets ) => {
		setAttributes( { iconTarget: onIconTargets } );
	};

	const textClasses = classnames( `mcButtons-align-${ textAlignment }` );

	const basicBtn = classnames( `ctm-button-4 ctm-btn-bg mailtoui` );
	const classes = classnames( `mcButtons ctm-button-4 ctm-btn-bg mailtoui` );

	const buttonSizeOptions = [
		{ value: 'size-small', label: __( 'Small', 'click-to-mail' ) },
		{ value: 'size-medium', label: __( 'Medium', 'click-to-mail' ) },
		{ value: 'size-large', label: __( 'Large', 'click-to-mail' ) },
	];
	const buttonTypeOptions = [
		{ value: 'basic-button', label: __( 'Basic Button', 'click-to-mail' ) },
		{
			value: 'advance-button',
			label: __( 'Advance Button', 'click-to-mail' ),
		},
	];
	const borderRadiusOptions = [
		{
			value: 'border-squared',
			label: __( 'Border Squared', 'click-to-mail' ),
		},
		{
			value: 'border-rounded',
			label: __( 'Border Rounded', 'click-to-mail' ),
		},
	];
	const visibilityOn = [
		{ value: '', label: __( 'Everywhere', 'click-to-mail' ) },
		{
			value: 'ctm-desktop-only',
			label: __( 'Desktop only', 'click-to-mail' ),
		},
		{
			value: 'ctm-tablet-only',
			label: __( 'Tablets only', 'click-to-mail' ),
		},
		{
			value: 'ctm-mobile-tablet-only',
			label: __( 'Mobile and tablets', 'click-to-mail' ),
		},
		{
			value: 'ctm-mobile-only',
			label: __( 'Mobile only', 'click-to-mail' ),
		},
	];

	return (
		<>
			<InspectorControls>
				<PanelBody>
					<SelectControl
						label={ __( 'Button Type', 'click-to-mail' ) }
						value={ buttonType }
						options={ buttonTypeOptions.map(
							( { value, label } ) => ( {
								value,
								label,
							} )
						) }
						onChange={ ( newButton ) => {
							setAttributes( { buttonType: newButton } );
						} }
					/>
				</PanelBody>
			</InspectorControls>
			{ buttonType === 'basic-button' ? (
				<>
					<InspectorControls>
						<PanelBody
							title={ __( 'General Settings', 'click-to-mail' ) }
							initialOpen={ false }
						>
							<TextControl
								label={ __( 'Button Text', 'click-to-mail' ) }
								value={ text }
								onChange={ ( val ) =>
									setAttributes( { text: val } )
								}
							/>
							<TextControl
								label={ __( 'Email Address', 'click-to-mail' ) }
								value={ emailInput }
								onChange={ ( val ) =>
									setAttributes( { emailInput: val } )
								}
								help={ __( 'Add your email', 'click-to-mail' ) }
							/>
							<TextControl
								label={ __( 'CC Email Address', 'click-to-mail' ) }
								value={ ccEmailInput }
								onChange={ ( val ) =>
									setAttributes( { ccEmailInput: val } )
								}
								help={ __( 'Add your cc email', 'click-to-mail' ) }
							/>
							<TextControl
								label={ __( 'BCC Email Address', 'click-to-mail' ) }
								value={ bccEmailInput }
								onChange={ ( val ) =>
									setAttributes( { bccEmailInput: val } )
								}
								help={ __( 'Add your bcc email', 'click-to-mail' ) }
							/>
							<TextControl
								label={ __( 'Subject', 'click-to-mail' ) }
								value={ subject }
								onChange={ ( val ) =>
									setAttributes( { subject: val } )
								}
								help={ __( 'Add your subject', 'click-to-mail' ) }
							/>
							<TextControl
								label={ __( 'Body Text', 'click-to-mail' ) }
								value={ bodyText }
								onChange={ ( val ) =>
									setAttributes( { bodyText: val } )
								}
								help={ __( 'Add your body text', 'click-to-mail' ) }
							/>
						</PanelBody>
						<PanelBody
							title={ __( 'Button Style', 'click-to-mail' ) }
							initialOpen={ false }
						>
							<SelectControl
								label={ __( 'Button Size', 'click-to-mail' ) }
								value={ buttonSize }
								options={ buttonSizeOptions.map(
									( { value, label } ) => ( {
										value,
										label,
									} )
								) }
								onChange={ ( newSize ) => {
									setAttributes( { buttonSize: newSize } );
								} }
							/>
							<SelectControl
								label={ __( 'Border Radius', 'click-to-mail' ) }
								value={ borderRadius }
								options={ borderRadiusOptions.map(
									( { value, label } ) => ( {
										value,
										label,
									} )
								) }
								onChange={ ( newSize ) => {
									setAttributes( { borderRadius: newSize } );
								} }
							/>
							<SelectControl
								label={ __( 'Visibility on', 'click-to-mail' ) }
								value={ visibility }
								options={ visibilityOn.map(
									( { value, label } ) => ( {
										value,
										label,
									} )
								) }
								onChange={ ( newSize ) => {
									setAttributes( { visibility: newSize } );
								} }
							/>
						</PanelBody>
						<PanelBody
							title={ __( 'Icon', 'click-to-mail' ) }
							initialOpen={ false }
						>
							<ToggleControl
								label={ __( 'Add Icon', 'click-to-mail' ) }
								checked={ iconTarget }
								onChange={ onIconTarget }
							/>
						</PanelBody>
					</InspectorControls>
					<BlockControls>
						<AlignmentToolbar
							value={ textAlignment }
							onChange={ onChangeAlignment }
						/>
					</BlockControls>
					<div
						className={ `button-wrapper ctm-editor ${ textClasses }` }
					>
						<a
							{ ...useBlockProps( {
								className: `${ basicBtn } ${ buttonSize } ${ borderRadius } ${ visibility }`,
							} ) }
						>
							{ iconTarget && (
								<span className="dashicons dashicons-email"></span>
							) }
							<RichText
								onChange={ onChangeText }
								value={ text }
								placeholder={ __(
									'How can I help you?',
									'click-to-mail'
								) }
								tagName="span"
								allowedFormats={ [] }
							/>
						</a>
					</div>
				</>
			) : (
				<>
					<InspectorControls>
						<PanelBody
							title={ __( 'General Settings', 'click-to-mail' ) }
							initialOpen={ false }
						>
							<TextControl
								label={ __( 'Email Address', 'click-to-mail' ) }
								value={ emailInput }
								onChange={ ( val ) =>
									setAttributes( { emailInput: val } )
								}
								help={ __( 'Add your email', 'click-to-mail' ) }
							/>
							<TextControl
								label={ __( 'CC Email Address', 'click-to-mail' ) }
								value={ ccEmailInput }
								onChange={ ( val ) =>
									setAttributes( { ccEmailInput: val } )
								}
								help={ __( 'Add your cc email', 'click-to-mail' ) }
							/>
							<TextControl
								label={ __( 'BCC Email Address', 'click-to-mail' ) }
								value={ bccEmailInput }
								onChange={ ( val ) =>
									setAttributes( { bccEmailInput: val } )
								}
								help={ __( 'Add your bcc email', 'click-to-mail' ) }
							/>
							<TextControl
								label={ __( 'Subject', 'click-to-mail' ) }
								value={ subject }
								onChange={ ( val ) =>
									setAttributes( { subject: val } )
								}
								help={ __( 'Add your subject', 'click-to-mail' ) }
							/>
							<TextControl
								label={ __( 'Body Text', 'click-to-mail' ) }
								value={ bodyText }
								onChange={ ( val ) =>
									setAttributes( { bodyText: val } )
								}
								help={ __( 'Add your body text', 'click-to-mail' ) }
							/>
							<MediaUpload
								label={ __( 'Agent Image', 'click-to-mail' ) }
								onSelect={ onSelectImage }
								allowedTypes={ [ 'image' ] }
								render={ ( { open } ) => (
									<Button
										onClick={ open }
										style={ {
											marginBottom: '20px',
											fontSize: '16px',
										} }
									>
										<span
											style={ { marginRight: '5px' } }
											className="dashicons dashicons-cloud-upload"
										></span>{ ' ' }
										Agent photo
									</Button>
								) }
							/>
							<TextControl
								label={ __( 'Agent Info', 'click-to-mail' ) }
								value={ info }
								onChange={ ( val ) =>
									setAttributes( { info: val } )
								}
								help={ __(
									'Write agent name & agent title',
									'click-to-mail'
								) }
							/>
							<TextControl
								label={ __( 'Button Label', 'click-to-mail' ) }
								value={ title }
								onChange={ ( val ) =>
									setAttributes( { title: val } )
								}
								help={ __(
									'Add custom button label',
									'click-to-mail'
								) }
							/>
							<TextControl
								label={ __( 'Online Badge Text', 'click-to-mail' ) }
								value={ online }
								onChange={ ( val ) =>
									setAttributes( { online: val } )
								}
								help={ __(
									'Add custom badget text when user in online.',
									'click-to-mail'
								) }
							/>
							<TextControl
								label={ __( 'Offline Badge Text', 'click-to-mail' ) }
								value={ offline }
								onChange={ ( val ) =>
									setAttributes( { offline: val } )
								}
								help={ __(
									'Add custom badget text when user in offline.',
									'click-to-mail'
								) }
							/>
						</PanelBody>
						<PanelBody
							title={ __( 'Chat Settings', 'click-to-mail' ) }
							initialOpen={ false }
						>
							<ComboboxControl
								label={ __( 'Timezone', 'click-to-mail' ) }
								value={ timeZone }
								options={ filteredOptions }
								onChange={ onFontSizeChange }
								onInputChange={ onInputChange }
								help={ __(
									'When using the date and time from the user browser you can transform it to your current timezone (in case your user is in a different timezone)',
									'click-to-mail'
								) }
							/>
							<PanelBody
								title={ __( 'Monthday', 'click-to-mail' ) }
								initialOpen={ false }
							>
								<TextControl
									label={ __( 'Start Time', 'click-to-mail' ) }
									value={ mondayStart }
									onChange={ ( val ) =>
										setAttributes( { mondayStart: val } )
									}
									placeholder={ __( '00:00', 'click-to-mail' ) }
								/>
								<TextControl
									label={ __( 'End Time', 'click-to-mail' ) }
									value={ mondayEnd }
									onChange={ ( val ) =>
										setAttributes( { mondayEnd: val } )
									}
									placeholder={ __( '24:00', 'click-to-mail' ) }
								/>
							</PanelBody>
							<PanelBody
								title={ __( 'Tuesday', 'click-to-mail' ) }
								initialOpen={ false }
							>
								<TextControl
									label={ __( 'Start Time', 'click-to-mail' ) }
									value={ tuesdayStart }
									onChange={ ( val ) =>
										setAttributes( { tuesdayStart: val } )
									}
									placeholder={ __( '00:00', 'click-to-mail' ) }
								/>
								<TextControl
									label={ __( 'End Time', 'click-to-mail' ) }
									value={ tuesdayEnd }
									onChange={ ( val ) =>
										setAttributes( { tuesdayEnd: val } )
									}
									placeholder={ __( '24:00', 'click-to-mail' ) }
								/>
							</PanelBody>
							<PanelBody
								title={ __( 'Wednesday', 'click-to-mail' ) }
								initialOpen={ false }
							>
								<TextControl
									label={ __( 'Start Time', 'click-to-mail' ) }
									value={ wednesdayStart }
									onChange={ ( val ) =>
										setAttributes( { wednesdayStart: val } )
									}
									placeholder={ __( '00:00', 'click-to-mail' ) }
								/>
								<TextControl
									label={ __( 'End Time', 'click-to-mail' ) }
									value={ wednesdayEnd }
									onChange={ ( val ) =>
										setAttributes( { wednesdayEnd: val } )
									}
									placeholder={ __( '24:00', 'click-to-mail' ) }
								/>
							</PanelBody>
							<PanelBody
								title={ __( 'Thursday', 'click-to-mail' ) }
								initialOpen={ false }
							>
								<TextControl
									label={ __( 'Start Time', 'click-to-mail' ) }
									value={ thursdayStart }
									onChange={ ( val ) =>
										setAttributes( { thursdayStart: val } )
									}
									placeholder={ __( '00:00', 'click-to-mail' ) }
								/>
								<TextControl
									label={ __( 'End Time', 'click-to-mail' ) }
									value={ thursdayEnd }
									onChange={ ( val ) =>
										setAttributes( { thursdayEnd: val } )
									}
									placeholder={ __( '24:00', 'click-to-mail' ) }
								/>
							</PanelBody>
							<PanelBody
								title={ __( 'Friday', 'click-to-mail' ) }
								initialOpen={ false }
							>
								<TextControl
									label={ __( 'Start Time', 'click-to-mail' ) }
									value={ fridayStart }
									onChange={ ( val ) =>
										setAttributes( { fridayStart: val } )
									}
									placeholder={ __( '00:00', 'click-to-mail' ) }
								/>
								<TextControl
									label={ __( 'End Time', 'click-to-mail' ) }
									value={ fridayEnd }
									onChange={ ( val ) =>
										setAttributes( { fridayEnd: val } )
									}
									placeholder={ __( '24:00', 'click-to-mail' ) }
								/>
							</PanelBody>
							<PanelBody
								title={ __( 'Saturday', 'click-to-mail' ) }
								initialOpen={ false }
							>
								<TextControl
									label={ __( 'Start Time', 'click-to-mail' ) }
									value={ saturdayStart }
									onChange={ ( val ) =>
										setAttributes( { saturdayStart: val } )
									}
									placeholder={ __( '00:00', 'click-to-mail' ) }
								/>
								<TextControl
									label={ __( 'End Time', 'click-to-mail' ) }
									value={ saturdayEnd }
									onChange={ ( val ) =>
										setAttributes( { saturdayEnd: val } )
									}
									placeholder={ __( '24:00', 'click-to-mail' ) }
								/>
							</PanelBody>
							<PanelBody
								title={ __( 'Sunday', 'click-to-mail' ) }
								initialOpen={ false }
							>
								<TextControl
									label={ __( 'Start Time', 'click-to-mail' ) }
									value={ sundayStart }
									onChange={ ( val ) =>
										setAttributes( { sundayStart: val } )
									}
									placeholder={ __( '00:00', 'click-to-mail' ) }
								/>
								<TextControl
									label={ __( 'End Time', 'click-to-mail' ) }
									value={ sundayEnd }
									onChange={ ( val ) =>
										setAttributes( { sundayEnd: val } )
									}
									placeholder={ __( '24:00', 'click-to-mail' ) }
								/>
							</PanelBody>
						</PanelBody>
						<PanelBody
							title={ __( 'Appearance settings', 'click-to-mail' ) }
							initialOpen={ false }
						>
							<SelectControl
								label={ __( 'Visibility on', 'click-to-mail' ) }
								value={ visibility }
								options={ visibilityOn.map(
									( { value, label } ) => ( {
										value,
										label,
									} )
								) }
								onChange={ ( newSize ) => {
									setAttributes( { visibility: newSize } );
								} }
							/>
							<SelectControl
								label={ __( 'Size', 'click-to-mail' ) }
								value={ buttonSize }
								options={ buttonSizeOptions.map(
									( { value, label } ) => ( {
										value,
										label,
									} )
								) }
								onChange={ ( newSize ) => {
									setAttributes( { buttonSize: newSize } );
								} }
							/>
							<SelectControl
								label={ __( 'Border Radius', 'click-to-mail' ) }
								value={ borderRadius }
								options={ borderRadiusOptions.map(
									( { value, label } ) => ( {
										value,
										label,
									} )
								) }
								onChange={ ( newSize ) => {
									setAttributes( { borderRadius: newSize } );
								} }
							/>
						</PanelBody>
					</InspectorControls>
					<BlockControls>
						<AlignmentToolbar
							value={ textAlignment }
							onChange={ onChangeAlignment }
						/>
					</BlockControls>
					<div
						className={ `button-wrapper ctm-editor ${ textClasses }` }
					>
						<button
							{ ...useBlockProps( {
								className: `avatar-active ${ classes } ${ buttonSize } ${ borderRadius } ${ visibility }`,
							} ) }
							data-ctmTime={ `{ "monday":"${ mondayStart }-${ mondayEnd }", "tuesday":"${ tuesdayStart }-${ tuesdayEnd }", "wednesday":"${ wednesdayStart }-${ wednesdayEnd }", "thursday":"${ thursdayStart }-${ thursdayEnd }", "friday":"${ fridayStart }-${ fridayEnd }", "saturday":"${ saturdayStart }-${ saturdayEnd }", "sunday":"${ sundayStart }-${ sundayEnd }" }` }
							data-timezone={ timeZone }
						>
							<img
								src={ imageUrl ? imageUrl : agentImage }
								alt="agent"
							/>
							<div className="info-wrapper">
								<RichText
									onChange={ advancedBtnInfo }
									value={ info }
									placeholder={ __(
										'Robert / Sales Support',
										'click-to-mail'
									) }
									tagName="p"
									allowedFormats={ [] }
									className="info"
								/>
								<RichText
									onChange={ advancedBtnTitle }
									value={ title }
									placeholder={ __(
										'How can I help you?',
										'click-to-mail'
									) }
									tagName="p"
									allowedFormats={ [] }
									className="title"
								/>
								<RichText
									onChange={ advancedBtnOnlineBadge }
									value={ online }
									placeholder={ __(
										'I am online',
										'click-to-mail'
									) }
									tagName="p"
									allowedFormats={ [] }
									className="online"
								/>
								<RichText
									onChange={ advancedBtnOnlineBadge }
									value={ offline }
									placeholder={ __(
										"I'm not available",
										'click-to-mail'
									) }
									tagName="p"
									allowedFormats={ [] }
									className="offline"
								/>
							</div>
						</button>
					</div>
				</>
			) }
		</>
	);
}
