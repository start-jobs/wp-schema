<?php

/*
|--------------------------------------------------------------------------
| Configure Codestar Framework
|--------------------------------------------------------------------------
*/

// Require Codestar Framework Files
require plugin_dir_path( dirname( __FILE__ ) ) . 'includes/codestar-framework/codestar-framework.php';


// Remove Codestar Framework Welcome Page
add_filter('csf_welcome_page', '__return_false');

// Multiple locations Schema variables
$location_schema = get_option('structured_data_markup')['multiple-location-schema'];

$innerpage_options = [];
if ($location_schema) {
	foreach($location_schema as $options):
		$innerpage_options[$options['location-title']] = $options['location-title'];
	endforeach;
}

/*
|--------------------------------------------------------------------------
| Admin Options
|--------------------------------------------------------------------------
*/

if( class_exists( 'CSF' ) ) {

  $prefix = 'structured_data_markup';

	CSF::createOptions($prefix, array(
	'sticky_header' => false,
	  'framework_title' => 'Structured Data Markup',
	  'menu_title' => 'Structured Data Markup',
	  'menu_slug' => 'structured-data-markup',
	  'menu_position' => 200,
	  'menu_icon' => 'dashicons-code-standards',
	  'show_reset_all' => false,
	  'show_reset_section' => false,
	  'show_search' => false,
	  'show_bar_menu'=> false,
	  'footer_text' => 'Test your structured data <a href="https://search.google.com/structured-data/testing-tool/u/0/#url=' . get_home_url() .'" target="_blank">here</a>.',
	  'footer_credit' => ' ',
	  'theme' => 'light',
	));

	CSF::createSection($prefix, array(
	  'title' => 'Schema Structured Data',
	  'icon' => 'far fa-file-code',
	  'fields' => array(
			array(
			  'id'       => 'use-local-business-schema',
			  'type'     => 'switcher',
			  'title'    => 'Enable structured data throughout the website?',
			  'text_on'  => 'Yes',
			  'text_off' => 'No',
			  'default'  => false,
			),
			array(
			  'id'            => 'local-business-tabs',
			  'type'          => 'tabbed',
				'title'         => 'General',
				'dependency'    => array('use-local-business-schema', '==', true),
			  'tabs'          => array(
			    array(
			    	'title'     => 'Information',
			      'fields'    => array(
					    array(
					      'id'    => 'local-business-name',
					      'type'  => 'text',
					      'title' => 'Bussiness Name',
					    ),
							array(
							  'id'          => 'local-business-type',
							  'type'        => 'select',
							  'title'       => 'Business Type',
							  'placeholder' => 'Select an option',
							  'chosen'      => true,
							  'options'     => array(
									'ProfessionalService' => 'ProfessionalService',
									'LocalBusiness' => 'LocalBusiness',
									'AnimalShelter' => 'AnimalShelter',
									'AutomotiveBusiness' => 'AutomotiveBusiness',
									'AutoBodyShop' => 'AutoBodyShop',
									'AutoDealer' => '&nbsp;&nbsp;AutoDealer',
									'AutoPartsStore' => '&nbsp;&nbsp;AutoPartsStore',
									'AutoRental' => '&nbsp;&nbsp;AutoRental',
									'AutoRepair' => '&nbsp;&nbsp;AutoRepair',
									'AutoWash' => '&nbsp;&nbsp;AutoWash',
									'GasStation' => '&nbsp;&nbsp;GasStation',
									'MotorcycleDealer' => '&nbsp;&nbsp;MotorcycleDealer',
									'MotorcycleRepair' => '&nbsp;&nbsp;MotorcycleRepair',
									'ChildCare' => 'ChildCare',
									'Dentist' => 'Dentist',
									'DryCleaningOrLaundry' => 'DryCleaningOrLaundry',
									'EmergencyService' => '&nbsp;&nbsp;EmergencyService',
									'FireStation' => '&nbsp;&nbsp;FireStation',
									'Hospital' => '&nbsp;&nbsp;Hospital',
									'PoliceStation' => '&nbsp;&nbsp;PoliceStation',
									'EmploymentAgency' => 'EmploymentAgency',
									'EntertainmentBusiness' => 'EntertainmentBusiness',
									'AdultEntertainment' => '&nbsp;&nbsp;AdultEntertainment',
									'AmusementPark' => '&nbsp;&nbsp;AmusementPark',
									'ArtGallery' => '&nbsp;&nbsp;ArtGallery',
									'Casino' => '&nbsp;&nbsp;Casino',
									'ComedyClub' => '&nbsp;&nbsp;ComedyClub',
									'MovieTheater' => '&nbsp;&nbsp;MovieTheater',
									'NightClub' => '&nbsp;&nbsp;NightClub',
									'FinancialService' => 'FinancialService',
									'AccountingService' => '&nbsp;&nbsp;AccountingService',
									'AutomatedTeller' => '&nbsp;&nbsp;AutomatedTeller',
									'BankOrCreditUnion' => '&nbsp;&nbsp;BankOrCreditUnion',
									'InsuranceAgency' => '&nbsp;&nbsp;InsuranceAgency',
									'FoodEstablishment' => '&nbsp;&nbsp;FoodEstablishment',
									'Bakery' => '&nbsp;&nbsp;Bakery',
									'BarOrPub' => '&nbsp;&nbsp;BarOrPub',
									'Brewery' => '&nbsp;&nbsp;Brewery',
									'CafeOrCoffeeShop' => '&nbsp;&nbsp;CafeOrCoffeeShop',
									'FastFoodRestaurant' => '&nbsp;&nbsp;FastFoodRestaurant',
									'IceCreamShop' => '&nbsp;&nbsp;IceCreamShop',
									'Restaurant' => '&nbsp;&nbsp;Restaurant',
									'Winery' => '&nbsp;&nbsp;Winery',
									'GovernmentOffice' => 'GovernmentOffice',
									'PostOffice' => '&nbsp;&nbsp;PostOffice',
									'HealthAndBeautyBusiness' => 'HealthAndBeautyBusiness',
									'BeautySalon' => '&nbsp;&nbsp;BeautySalon',
									'DaySpa' => '&nbsp;&nbsp;DaySpa',
									'HairSalon' => '&nbsp;&nbsp;HairSalon',
									'HealthClub' => '&nbsp;&nbsp;HealthClub',
									'NailSalon' => '&nbsp;&nbsp;NailSalon',
									'TattooParlor' => '&nbsp;&nbsp;TattooParlor',
									'HomeAndConstructionBusiness' => 'HomeAndConstructionBusiness',
									'Electrician' => '&nbsp;&nbsp;Electrician',
									'GeneralContractor' => '&nbsp;&nbsp;GeneralContractor',
									'HVACBusiness' => '&nbsp;&nbsp;HVACBusiness',
									'HousePainter' => '&nbsp;&nbsp;HousePainter',
									'Locksmith' => '&nbsp;&nbsp;Locksmith',
									'MovingCompany' => '&nbsp;&nbsp;MovingCompany',
									'Plumber' => '&nbsp;&nbsp;Plumber',
									'RoofingContractor' => '&nbsp;&nbsp;RoofingContractor',
									'InternetCafe' => 'InternetCafe',
									'LegalService' => 'LegalService',
									'Notary' => '&nbsp;&nbsp;Notary',
									'Library' => 'Library',
									'LodgingBusiness' => 'LodgingBusiness',
									'BedAndBreakfast' => '&nbsp;&nbsp;BedAndBreakfast',
									'Campground' => '&nbsp;&nbsp;Campground',
									'Hostel' => '&nbsp;&nbsp;Hostel',
									'Hotel' => '&nbsp;&nbsp;Hotel',
									'Motel' => '&nbsp;&nbsp;Motel',
									'Resort' => '&nbsp;&nbsp;Resort',
									'RadioStation' => 'RadioStation',
									'RealEstateAgent' => 'RealEstateAgent',
									'RecyclingCenter' => 'RecyclingCenter',
									'SelfStorage' => 'SelfStorage',
									'ShoppingCenter' => 'ShoppingCenter',
									'SportsActivityLocation' => 'SportsActivityLocation',
									'BowlingAlley' => '&nbsp;&nbsp;BowlingAlley',
									'ExerciseGym' => '&nbsp;&nbsp;ExerciseGym',
									'GolfCourse' => '&nbsp;&nbsp;GolfCourse',
									'PublicSwimmingPool' => '&nbsp;&nbsp;PublicSwimmingPool',
									'SkiResort' => '&nbsp;&nbsp;SkiResort',
									'SportsClub' => '&nbsp;&nbsp;SportsClub',
									'StadiumOrArena' => '&nbsp;&nbsp;StadiumOrArena',
									'TennisComplex' => '&nbsp;&nbsp;TennisComplex',
									'Store' => 'Store',
									'BikeStore' => '&nbsp;&nbsp;BikeStore',
									'BookStore' => '&nbsp;&nbsp;BookStore',
									'ClothingStore' => '&nbsp;&nbsp;ClothingStore',
									'ComputerStore' => '&nbsp;&nbsp;ComputerStore',
									'ConvenienceStore' => '&nbsp;&nbsp;ConvenienceStore',
									'DepartmentStore' => '&nbsp;&nbsp;DepartmentStore',
									'ElectronicsStore' => '&nbsp;&nbsp;ElectronicsStore',
									'Florist' => '&nbsp;&nbsp;Florist',
									'FurnitureStore' => '&nbsp;&nbsp;FurnitureStore',
									'GardenStore' => '&nbsp;&nbsp;GardenStore',
									'GroceryStore' => '&nbsp;&nbsp;GroceryStore',
									'HardwareStore' => '&nbsp;&nbsp;HardwareStore',
									'HobbyShop' => '&nbsp;&nbsp;HobbyShop',
									'HomeGoodsStore' => '&nbsp;&nbsp;HomeGoodsStore',
									'JewelryStore' => '&nbsp;&nbsp;JewelryStore',
									'LiquorStore' => '&nbsp;&nbsp;LiquorStore',
									'MensClothingStore' => '&nbsp;&nbsp;MensClothingStore',
									'MobilePhoneStore' => '&nbsp;&nbsp;MobilePhoneStore',
									'MovieRentalStore' => '&nbsp;&nbsp;MovieRentalStore',
									'MusicStore' => '&nbsp;&nbsp;MusicStore',
									'OfficeEquipmentStore' => '&nbsp;&nbsp;OfficeEquipmentStore',
									'OutletStore' => '&nbsp;&nbsp;OutletStore',
									'PawnShop' => '&nbsp;&nbsp;PawnShop',
									'PetStore' => '&nbsp;&nbsp;PetStore',
									'ShoeStore' => '&nbsp;&nbsp;ShoeStore',
									'SportingGoodsStore' => '&nbsp;&nbsp;SportingGoodsStore',
									'TireShop' => '&nbsp;&nbsp;TireShop',
									'ToyStore' => '&nbsp;&nbsp;ToyStore',
									'WholesaleStore' => '&nbsp;&nbsp;WholesaleStore',
									'TelevisionStation' => 'TelevisionStation',
									'TouristInformationCenter' => 'TouristInformationCenter',
									'TravelAgency' => 'TravelAgency'
							  ),
							),
				      array(
				        'id' => 'local-business-image',
				        'type' => 'media',
				        'title' => 'Image',
				        'library' => 'image',
				        'button_title' => 'Select Image',
				        'placeholder' => 'No Image Selected',
				      ),
					    array(
					      'id'    => 'local-business-phone',
					      'type'  => 'text',
					      'title' => 'Phone',
					    ),
					    array(
					      'id'    => 'local-business-price-range',
					      'type'  => 'text',
					      'title' => 'Price Range',
					    ),
			      )
			    ),
			    array(
			      'title'     => 'Social Profiles',
				  'fields'    => 
				  array(
							array(
							  'id'    => 'use-local-business-social-profiles',
							  'type'  => 'switcher',
							  'title'   => 'Display social profiles in structured data?',
							  'text_on'  => 'Yes',
							  'text_off' => 'No',
							  'default' => false,
							),
					    array(
					      'id' => 'local-business-social-profiles',
					      'type' => 'group',
								'button_title' => 'Add Social Profile',
								'remove_title' => 'Remove Social Profile',
								'dependency' => array('use-local-business-social-profiles', '==', true),
					      'fields' => array(
					        array(
					          'id' => 'social-profile',
					          'type' => 'text',
					          'title' => 'Social Profile',
					          'attributes' => array(
					            'autocomplete' => 'off',
					          ) ,
					        ) ,
					        array(
					          'id' => 'social-profile-url',
					          'type' => 'text',
					          'title' => 'Social Profile URL',
					          'attributes' => array(
					            'autocomplete' => 'off',
					          ) ,
					        ) ,
					      )
					    ) ,
			      )
			    ),
			  )
			),
			array(
			  'id'     => 'local-business-address-fieldset',
			  'type'   => 'fieldset',
			  'title'  => 'Address',
			  'dependency' => array('use-local-business-schema', '==', true),
			  'fields' => array(
			    array(
			      'id'    => 'local-business-street',
			      'type'  => 'text',
			      'title' => 'Street',
			    ),
			    array(
			      'id'    => 'local-business-city',
			      'type'  => 'text',
			      'title' => 'City',
			    ),
			    array(
			      'id'    => 'local-business-zip',
			      'type'  => 'text',
			      'title' => 'ZIP Code',
			    ),
					array(
					  'id'          => 'local-business-country',
					  'type'        => 'select',
					  'title'       => 'Country',
					  'placeholder' => 'Select a country',
					  'chosen'      => true,
					  'default'      => 'US',
					  'options'     => array(
							'CA' => 'Canada',
							'GB' => 'United Kingdom',
							'US' => 'United States',
							'AF' => 'Afghanistan',
							'AX' => 'Åland Islands',
							'AL' => 'Albania',
							'DZ' => 'Algeria',
							'AS' => 'American Samoa',
							'AD' => 'Andorra',
							'AO' => 'Angola',
							'AI' => 'Anguilla',
							'AQ' => 'Antarctica',
							'AG' => 'Antigua and Barbuda',
							'AR' => 'Argentina',
							'AM' => 'Armenia',
							'AW' => 'Aruba',
							'AU' => 'Australia',
							'AT' => 'Austria',
							'AZ' => 'Azerbaijan',
							'BS' => 'Bahamas',
							'BH' => 'Bahrain',
							'BD' => 'Bangladesh',
							'BB' => 'Barbados',
							'BY' => 'Belarus',
							'BE' => 'Belgium',
							'BZ' => 'Belize',
							'BJ' => 'Benin',
							'BM' => 'Bermuda',
							'BT' => 'Bhutan',
							'BO' => 'Bolivia, Plurinational State of',
							'BQ' => 'Bonaire, Sint Eustatius and Saba',
							'BA' => 'Bosnia and Herzegovina',
							'BW' => 'Botswana',
							'BV' => 'Bouvet Island',
							'BR' => 'Brazil',
							'IO' => 'British Indian Ocean Territory',
							'BN' => 'Brunei Darussalam',
							'BG' => 'Bulgaria',
							'BF' => 'Burkina Faso',
							'BI' => 'Burundi',
							'KH' => 'Cambodia',
							'CM' => 'Cameroon',
							'CV' => 'Cape Verde',
							'KY' => 'Cayman Islands',
							'CF' => 'Central African Republic',
							'TD' => 'Chad',
							'CL' => 'Chile',
							'CN' => 'China',
							'CX' => 'Christmas Island',
							'CC' => 'Cocos (Keeling) Islands',
							'CO' => 'Colombia',
							'KM' => 'Comoros',
							'CG' => 'Congo',
							'CD' => 'Congo, the Democratic Republic of the',
							'CK' => 'Cook Islands',
							'CR' => 'Costa Rica',
							'CI' => 'Côte dIvoire',
							'HR' => 'Croatia',
							'CU' => 'Cuba',
							'CW' => 'Curaçao',
							'CY' => 'Cyprus',
							'CZ' => 'Czech Republic',
							'DK' => 'Denmark',
							'DJ' => 'Djibouti',
							'DM' => 'Dominica',
							'DO' => 'Dominican Republic',
							'EC' => 'Ecuador',
							'EG' => 'Egypt',
							'SV' => 'El Salvador',
							'GQ' => 'Equatorial Guinea',
							'ER' => 'Eritrea',
							'EE' => 'Estonia',
							'ET' => 'Ethiopia',
							'FK' => 'Falkland Islands (Malvinas)',
							'FO' => 'Faroe Islands',
							'FJ' => 'Fiji',
							'FI' => 'Finland',
							'FR' => 'France',
							'GF' => 'French Guiana',
							'PF' => 'French Polynesia',
							'TF' => 'French Southern Territories',
							'GA' => 'Gabon',
							'GM' => 'Gambia',
							'GE' => 'Georgia',
							'DE' => 'Germany',
							'GH' => 'Ghana',
							'GI' => 'Gibraltar',
							'GR' => 'Greece',
							'GL' => 'Greenland',
							'GD' => 'Grenada',
							'GP' => 'Guadeloupe',
							'GU' => 'Guam',
							'GT' => 'Guatemala',
							'GG' => 'Guernsey',
							'GN' => 'Guinea',
							'GW' => 'Guinea-Bissau',
							'GY' => 'Guyana',
							'HT' => 'Haiti',
							'HM' => 'Heard Island and McDonald Islands',
							'VA' => 'Holy See (Vatican City State)',
							'HN' => 'Honduras',
							'HK' => 'Hong Kong',
							'HU' => 'Hungary',
							'IS' => 'Iceland',
							'IN' => 'India',
							'ID' => 'Indonesia',
							'IR' => 'Iran, Islamic Republic of',
							'IQ' => 'Iraq',
							'IE' => 'Ireland',
							'IM' => 'Isle of Man',
							'IL' => 'Israel',
							'IT' => 'Italy',
							'JM' => 'Jamaica',
							'JP' => 'Japan',
							'JE' => 'Jersey',
							'JO' => 'Jordan',
							'KZ' => 'Kazakhstan',
							'KE' => 'Kenya',
							'KI' => 'Kiribati',
							'KP' => 'Korea, Democratic Peoples Republic of',
							'KR' => 'Korea, Republic of',
							'KW' => 'Kuwait',
							'KG' => 'Kyrgyzstan',
							'LA' => 'Lao Peoples Democratic Republic',
							'LV' => 'Latvia',
							'LB' => 'Lebanon',
							'LS' => 'Lesotho',
							'LR' => 'Liberia',
							'LY' => 'Libya',
							'LI' => 'Liechtenstein',
							'LT' => 'Lithuania',
							'LU' => 'Luxembourg',
							'MO' => 'Macao',
							'MK' => 'Macedonia, the former Yugoslav Republic of',
							'MG' => 'Madagascar',
							'MW' => 'Malawi',
							'MY' => 'Malaysia',
							'MV' => 'Maldives',
							'ML' => 'Mali',
							'MT' => 'Malta',
							'MH' => 'Marshall Islands',
							'MQ' => 'Martinique',
							'MR' => 'Mauritania',
							'MU' => 'Mauritius',
							'YT' => 'Mayotte',
							'MX' => 'Mexico',
							'FM' => 'Micronesia, Federated States of',
							'MD' => 'Moldova, Republic of',
							'MC' => 'Monaco',
							'MN' => 'Mongolia',
							'ME' => 'Montenegro',
							'MS' => 'Montserrat',
							'MA' => 'Morocco',
							'MZ' => 'Mozambique',
							'MM' => 'Myanmar',
							'NA' => 'Namibia',
							'NR' => 'Nauru',
							'NP' => 'Nepal',
							'NL' => 'Netherlands',
							'NC' => 'New Caledonia',
							'NZ' => 'New Zealand',
							'NI' => 'Nicaragua',
							'NE' => 'Niger',
							'NG' => 'Nigeria',
							'NU' => 'Niue',
							'NF' => 'Norfolk Island',
							'MP' => 'Northern Mariana Islands',
							'NO' => 'Norway',
							'OM' => 'Oman',
							'PK' => 'Pakistan',
							'PW' => 'Palau',
							'PS' => 'Palestinian Territory, Occupied',
							'PA' => 'Panama',
							'PG' => 'Papua New Guinea',
							'PY' => 'Paraguay',
							'PE' => 'Peru',
							'PH' => 'Philippines',
							'PN' => 'Pitcairn',
							'PL' => 'Poland',
							'PT' => 'Portugal',
							'PR' => 'Puerto Rico',
							'QA' => 'Qatar',
							'RE' => 'Réunion',
							'RO' => 'Romania',
							'RU' => 'Russian Federation',
							'RW' => 'Rwanda',
							'BL' => 'Saint Barthélemy',
							'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
							'KN' => 'Saint Kitts and Nevis',
							'LC' => 'Saint Lucia',
							'MF' => 'Saint Martin (French part)',
							'PM' => 'Saint Pierre and Miquelon',
							'VC' => 'Saint Vincent and the Grenadines',
							'WS' => 'Samoa',
							'SM' => 'San Marino',
							'ST' => 'Sao Tome and Principe',
							'SA' => 'Saudi Arabia',
							'SN' => 'Senegal',
							'RS' => 'Serbia',
							'SC' => 'Seychelles',
							'SL' => 'Sierra Leone',
							'SG' => 'Singapore',
							'SX' => 'Sint Maarten (Dutch part)',
							'SK' => 'Slovakia',
							'SI' => 'Slovenia',
							'SB' => 'Solomon Islands',
							'SO' => 'Somalia',
							'ZA' => 'South Africa',
							'GS' => 'South Georgia and the South Sandwich Islands',
							'SS' => 'South Sudan',
							'ES' => 'Spain',
							'LK' => 'Sri Lanka',
							'SD' => 'Sudan',
							'SR' => 'Suriname',
							'SJ' => 'Svalbard and Jan Mayen',
							'SZ' => 'Swaziland',
							'SE' => 'Sweden',
							'CH' => 'Switzerland',
							'SY' => 'Syrian Arab Republic',
							'TW' => 'Taiwan, Province of China',
							'TJ' => 'Tajikistan',
							'TZ' => 'Tanzania, United Republic of',
							'TH' => 'Thailand',
							'TL' => 'Timor-Leste',
							'TG' => 'Togo',
							'TK' => 'Tokelau',
							'TO' => 'Tonga',
							'TT' => 'Trinidad and Tobago',
							'TN' => 'Tunisia',
							'TR' => 'Turkey',
							'TM' => 'Turkmenistan',
							'TC' => 'Turks and Caicos Islands',
							'TV' => 'Tuvalu',
							'UG' => 'Uganda',
							'UA' => 'Ukraine',
							'AE' => 'United Arab Emirates',
							'UM' => 'United States Minor Outlying Islands',
							'UY' => 'Uruguay',
							'UZ' => 'Uzbekistan',
							'VU' => 'Vanuatu',
							'VE' => 'Venezuela, Bolivarian Republic of',
							'VN' => 'Viet Nam',
							'VG' => 'Virgin Islands, British',
							'VI' => 'Virgin Islands, U.S.',
							'WF' => 'Wallis and Futuna',
							'EH' => 'Western Sahara',
							'YE' => 'Yemen',
							'ZM' => 'Zambia',
							'ZW' => 'Zimbabwe',
					  ),
					),
					array(
					  'id'          => 'local-business-state',
					  'type'        => 'select',
					  'title'       => 'State / Province / Region',
					  'chosen'      => true,
					  'dependency' => array('local-business-country', '==', 'US'),
					  'options'     => array(
							'AL' => 'Alabama (AL)',
							'AK' => 'Alaska (AK)',
							'AZ' => 'Arizona (AZ)',
							'AR' => 'Arkansas (AR)',
							'CA' => 'California (CA)',
							'CO' => 'Colorado (CO)',
							'CT' => 'Connecticut (CT)',
							'DE' => 'Delaware (DE)',
							'DC' => 'District Of Columbia (DC)',
							'FL' => 'Florida (FL)',
							'GA' => 'Georgia (GA)',
							'HI' => 'Hawaii (HI)',
							'ID' => 'Idaho (ID)',
							'IL' => 'Illinois (IL)',
							'IN' => 'Indiana (IN)',
							'IA' => 'Iowa (IA)',
							'KS' => 'Kansas (KS)',
							'KY' => 'Kentucky (KY)',
							'LA' => 'Louisiana (LA)',
							'ME' => 'Maine (ME)',
							'MD' => 'Maryland (MD)',
							'MA' => 'Massachusetts (MA)',
							'MI' => 'Michigan (MI)',
							'MN' => 'Minnesota (MN)',
							'MS' => 'Mississippi (MS)',
							'MO' => 'Missouri (MO)',
							'MT' => 'Montana (MT)',
							'NE' => 'Nebraska (NE)',
							'NV' => 'Nevada (NV)',
							'NH' => 'New Hampshire (NH)',
							'NJ' => 'New Jersey (NJ)',
							'NM' => 'New Mexico (NM)',
							'NY' => 'New York (NY)',
							'NC' => 'North Carolina (NC)',
							'ND' => 'North Dakota (ND)',
							'OH' => 'Ohio (OH)',
							'OK' => 'Oklahoma (OK)',
							'OR' => 'Oregon (OR)',
							'PA' => 'Pennsylvania (PA)',
							'RI' => 'Rhode Island (RI)',
							'SC' => 'South Carolina (SC)',
							'SD' => 'South Dakota (SD)',
							'TN' => 'Tennessee (TN)',
							'TX' => 'Texas (TX)',
							'UT' => 'Utah (UT)',
							'VT' => 'Vermont (VT)',
							'VA' => 'Virginia (VA)',
							'WA' => 'Washington (WA)',
							'WV' => 'West Virginia (WV)',
							'WI' => 'Wisconsin (WI)',
							'WY' => 'Wyoming (WY)',
					  ),
					),
					array(
					  'id'          => 'local-business-region',
					  'type'        => 'select',
					  'chosen'      => true,
					  'title'       => 'State / Province / Region',
					  'dependency' => array('local-business-country', '==', 'CA'),
					  'options'     => array(
							'AB' => 'Alberta',
							'BC' => 'British Columbia',
							'MB' => 'Manitoba',
							'NB' => 'New Brunswick',
							'NL' => 'Newfoundland and Labrador',
							'NS' => 'Nova Scotia',
							'ON' => 'Ontario',
							'PE' => 'Prince Edward Island',
							'QC' => 'Quebec',
							'SK' => 'Saskatchewan',
							'NT' => 'Northwest Territories',
							'NU' => 'Nunavut',
							'YT' => 'Yukon',
					  ),
					),
			    array(
			      'id'    => 'local-business-lat',
			      'type'  => 'text',
			      'title' => 'Latitude',
			      'desc' => 'You can use <a href="https://www.latlong.net/" target="_blank">this tool</a> to find the proper coordinates.'
			    ),
			    array(
			      'id'    => 'local-business-long',
			      'type'  => 'text',
			      'title' => 'Longitude',
			      'desc' => 'You can use <a href="https://www.latlong.net/" target="_blank">this tool</a> to find the proper coordinates.'
			    ),
			  ),
			),
			array(
			  'id'     => 'local-business-opening-hours-fieldset',
			  'type'   => 'fieldset',
			  'title'  => 'Opening Hours',
			  'dependency' => array('use-local-business-schema', '==', true),
			  'fields' => array(
					array(
					  'id'    => 'local-business-open-247',
					  'type'  => 'switcher',
					  'title'   => 'Open 24/7?',
					  'text_on'  => 'Yes',
					  'text_off' => 'No',
					),
			    array(
			      'id' => 'local-business-opening-hours',
			      'type' => 'group',
			      'title' => '',
						'button_title' => 'Add Opening Hours',
						'remove_title' => 'Remove Opening Hours',
						'dependency' => array('local-business-open-247', '==', 'false'),
			      'fields' => array(
					    array(
					      'id'    => 'local-business-opening-hours-id',
					      'type'  => 'text',
					      'title' => 'Identifier',
					      'desc' => 'e.g. Monday-Friday 8:00-21:00'
					    ),
							array(
							  'id'          => 'local-business-opening-hours-days',
							  'type'        => 'button_set',
							  'title'       => 'Day(s) of the week',
							  'multiple'    => true,
							  'placeholder' => 'Select an option',
							  'options'     => array(
							    'Monday' => 'Monday',
							    'Tuesday' => 'Tuesday',
							    'Wednesday' => 'Wednesday',
							    'Thursday' => 'Thursday',
							    'Friday' => 'Friday',
							    'Saturtday' => 'Saturtday',
							    'Sunday' => 'Sunday',
							  ),
							),
			        array(
			          'id' => 'local-business-opening-hours-opens',
			          'type' => 'text',
			          'title' => 'Opens at',
			          'desc' => 'e.g. 08:00',
			          'attributes' => array(
			            'autocomplete' => 'off',
			          ) ,
			        ) ,
			        array(
			          'id' => 'local-business-opening-hours-closes',
			          'type' => 'text',
			          'title' => 'Closes at',
			          'desc' => 'e.g. 21:00',
			          'attributes' => array(
			            'autocomplete' => 'off',
			          ) ,
			        ) ,
			      )
			    ) ,
			  ),
			),
	  )
	));

	CSF::createSection($prefix, array(
		'title' => 'Multiple location Schema Structured Data',
		'icon' => 'far fa-file-code',
		'fields' => array(
			array(
			  'id' => 'multiple-location-schema',
			  'type' => 'group',
			  'title' => 'Locations',
			  'button_title' => 'Add new location',
			  'remove_title' => 'Remove location',
			  'fields' => array(
				array(
				  'id' => 'location-title',
				  'type' => 'text',
				  'title' => 'Location',
				  'attributes' => array(
					'autocomplete' => 'off',
				  ) ,
				) ,
				array(
					'id' => 'location-url',
					'type' => 'text',
					'title' => 'Location Page URL',
					'desc' => 'Optional',
					'attributes' => array(
					  'autocomplete' => 'off',
					) ,
				  ) ,
				array(
					'id' => 'phone',
					'type' => 'text',
					'title' => 'Phone',
					'attributes' => array(
					  'autocomplete' => 'off',
					) ,
				) ,
				array(
					'id' => 'street',
					'type' => 'text',
					'title' => 'Street',
					'attributes' => array(
					  'autocomplete' => 'off',
					) ,
				) ,
				array(
					'id' => 'city',
					'type' => 'text',
					'title' => 'City',
					'attributes' => array(
					  'autocomplete' => 'off',
					) ,
				) ,
				array(
					'id' => 'zip-code',
					'type' => 'text',
					'title' => 'ZIP Code',
					'attributes' => array(
					  'autocomplete' => 'off',
					) ,
				) ,
				  array(
					'id'          => 'state',
					'type'        => 'select',
					'title'       => 'State',
					'chosen'      => true,
					'options'     => array(
						  'AL' => 'Alabama (AL)',
						  'AK' => 'Alaska (AK)',
						  'AZ' => 'Arizona (AZ)',
						  'AR' => 'Arkansas (AR)',
						  'CA' => 'California (CA)',
						  'CO' => 'Colorado (CO)',
						  'CT' => 'Connecticut (CT)',
						  'DE' => 'Delaware (DE)',
						  'DC' => 'District Of Columbia (DC)',
						  'FL' => 'Florida (FL)',
						  'GA' => 'Georgia (GA)',
						  'HI' => 'Hawaii (HI)',
						  'ID' => 'Idaho (ID)',
						  'IL' => 'Illinois (IL)',
						  'IN' => 'Indiana (IN)',
						  'IA' => 'Iowa (IA)',
						  'KS' => 'Kansas (KS)',
						  'KY' => 'Kentucky (KY)',
						  'LA' => 'Louisiana (LA)',
						  'ME' => 'Maine (ME)',
						  'MD' => 'Maryland (MD)',
						  'MA' => 'Massachusetts (MA)',
						  'MI' => 'Michigan (MI)',
						  'MN' => 'Minnesota (MN)',
						  'MS' => 'Mississippi (MS)',
						  'MO' => 'Missouri (MO)',
						  'MT' => 'Montana (MT)',
						  'NE' => 'Nebraska (NE)',
						  'NV' => 'Nevada (NV)',
						  'NH' => 'New Hampshire (NH)',
						  'NJ' => 'New Jersey (NJ)',
						  'NM' => 'New Mexico (NM)',
						  'NY' => 'New York (NY)',
						  'NC' => 'North Carolina (NC)',
						  'ND' => 'North Dakota (ND)',
						  'OH' => 'Ohio (OH)',
						  'OK' => 'Oklahoma (OK)',
						  'OR' => 'Oregon (OR)',
						  'PA' => 'Pennsylvania (PA)',
						  'RI' => 'Rhode Island (RI)',
						  'SC' => 'South Carolina (SC)',
						  'SD' => 'South Dakota (SD)',
						  'TN' => 'Tennessee (TN)',
						  'TX' => 'Texas (TX)',
						  'UT' => 'Utah (UT)',
						  'VT' => 'Vermont (VT)',
						  'VA' => 'Virginia (VA)',
						  'WA' => 'Washington (WA)',
						  'WV' => 'West Virginia (WV)',
						  'WI' => 'Wisconsin (WI)',
						  'WY' => 'Wyoming (WY)',
					),
				  ),
				  array(
					'id' => 'latitude',
					'type' => 'text',
					'title' => 'Latitude',
					'desc' => 'You can use <a href="https://www.latlong.net/" target="_blank">this tool</a> to find the proper coordinates.',
					'attributes' => array(
					  'autocomplete' => 'off',
					) ,
				) ,
				array(
					'id' => 'longitude',
					'type' => 'text',
					'title' => 'Longitude',
					'desc' => 'You can use <a href="https://www.latlong.net/" target="_blank">this tool</a> to find the proper coordinates.',
					'attributes' => array(
					  'autocomplete' => 'off',
					) ,
				) ,
			  )
			) ,
		)		
	));
}

/*
|--------------------------------------------------------------------------
| Page Options
|--------------------------------------------------------------------------
*/
if( class_exists( 'CSF' ) ) {

  $prefix = 'page_structured_data_markup';

  CSF::createMetabox( $prefix, array(
    'title'     => 'Structured Data Options',
    'post_type' => 'page',
    'priority' => 'high',
    'data_type' => 'unserialize',
  ) );


	CSF::createSection( $prefix, array(
		'title'  => 'FAQ Schema',
		'fields' => array(
			array(
				'id' => 'structured-data-faq-schema',
				'type' => 'group',
				'title' => 'Questions',
				'button_title' => 'Add Question',
				'remove_title' => 'Remove Question',
				'fields' => array(
					array(
						'id' => 'structured-data-question',
						'type' => 'text',
						'title' => 'Question',
						'attributes' => array(
							'autocomplete' => 'off',
						) ,
					) ,
					array(
						'id' => 'structured-data-answer',
						'type' => 'textarea',
						'title' => 'Answer',
						'attributes' => array(
							'autocomplete' => 'off',
						) ,
					) ,
				)
			) ,
		)
	) );

  CSF::createSection( $prefix, array(
    'title'  => 'Schema Markup',
    'fields' => array(
		array(
			'id'    => 'structured-data-enable-location-schema',
			'type'  => 'switcher',
			'title' => 'Enable Custom Location Schema On This Page?',
			'text_on'  => 'Yes',
			'text_off' => 'No',
		),
		array(
			'id'    => 'structured-data-location-schema',
			'type'  => 'select',
			'title' => 'Select Location',
			'dependency' => array( 'structured-data-enable-location-schema', '==', 'true' ),
			'options'     => $innerpage_options,
		),
		array(
			'id'    => 'structured-data-enable-on-this-page',
			'type'  => 'switcher',
			'title' => 'Enable Schema Markup On This Page?',
			'text_on'  => 'Yes',
			'text_off' => 'No',
		),
    )
	) );

}