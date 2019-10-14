<?php

namespace App\Libraries;

class PaypalInvoice {
    // App credentials
    private $client_id = 'AbaUYvIWC-ynINJcovapIV5nOrPevHa0Kjg0jyHRGj6bqgJ87UkX8secGUyJkBI7DaSuFh_dpsrpu9X2';
    private $secret = 'EIIMNWEReGIqipv31iVFemfEjuELNx5xD87_TfkmAtOd2wWAVW0-a5SJyBinw5X2dLMH72Id44gtOc-_';
    private $expiry_date;

    private $access_token;
    private $token_type;

    private $countryArray = array(
        'AD'=>array('name'=>'ANDORRA','code'=>'376'),
        'AE'=>array('name'=>'UNITED ARAB EMIRATES','code'=>'971'),
        'AF'=>array('name'=>'AFGHANISTAN','code'=>'93'),
        'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'1268'),
        'AI'=>array('name'=>'ANGUILLA','code'=>'1264'),
        'AL'=>array('name'=>'ALBANIA','code'=>'355'),
        'AM'=>array('name'=>'ARMENIA','code'=>'374'),
        'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'599'),
        'AO'=>array('name'=>'ANGOLA','code'=>'244'),
        'AQ'=>array('name'=>'ANTARCTICA','code'=>'672'),
        'AR'=>array('name'=>'ARGENTINA','code'=>'54'),
        'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'1684'),
        'AT'=>array('name'=>'AUSTRIA','code'=>'43'),
        'AU'=>array('name'=>'AUSTRALIA','code'=>'61'),
        'AW'=>array('name'=>'ARUBA','code'=>'297'),
        'AZ'=>array('name'=>'AZERBAIJAN','code'=>'994'),
        'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'387'),
        'BB'=>array('name'=>'BARBADOS','code'=>'1246'),
        'BD'=>array('name'=>'BANGLADESH','code'=>'880'),
        'BE'=>array('name'=>'BELGIUM','code'=>'32'),
        'BF'=>array('name'=>'BURKINA FASO','code'=>'226'),
        'BG'=>array('name'=>'BULGARIA','code'=>'359'),
        'BH'=>array('name'=>'BAHRAIN','code'=>'973'),
        'BI'=>array('name'=>'BURUNDI','code'=>'257'),
        'BJ'=>array('name'=>'BENIN','code'=>'229'),
        'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'590'),
        'BM'=>array('name'=>'BERMUDA','code'=>'1441'),
        'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'673'),
        'BO'=>array('name'=>'BOLIVIA','code'=>'591'),
        'BR'=>array('name'=>'BRAZIL','code'=>'55'),
        'BS'=>array('name'=>'BAHAMAS','code'=>'1242'),
        'BT'=>array('name'=>'BHUTAN','code'=>'975'),
        'BW'=>array('name'=>'BOTSWANA','code'=>'267'),
        'BY'=>array('name'=>'BELARUS','code'=>'375'),
        'BZ'=>array('name'=>'BELIZE','code'=>'501'),
        'CA'=>array('name'=>'CANADA','code'=>'1'),
        'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'61'),
        'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'243'),
        'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'236'),
        'CG'=>array('name'=>'CONGO','code'=>'242'),
        'CH'=>array('name'=>'SWITZERLAND','code'=>'41'),
        'CI'=>array('name'=>'COTE D IVOIRE','code'=>'225'),
        'CK'=>array('name'=>'COOK ISLANDS','code'=>'682'),
        'CL'=>array('name'=>'CHILE','code'=>'56'),
        'CM'=>array('name'=>'CAMEROON','code'=>'237'),
        'CN'=>array('name'=>'CHINA','code'=>'86'),
        'CO'=>array('name'=>'COLOMBIA','code'=>'57'),
        'CR'=>array('name'=>'COSTA RICA','code'=>'506'),
        'CU'=>array('name'=>'CUBA','code'=>'53'),
        'CV'=>array('name'=>'CAPE VERDE','code'=>'238'),
        'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'61'),
        'CY'=>array('name'=>'CYPRUS','code'=>'357'),
        'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'420'),
        'DE'=>array('name'=>'GERMANY','code'=>'49'),
        'DJ'=>array('name'=>'DJIBOUTI','code'=>'253'),
        'DK'=>array('name'=>'DENMARK','code'=>'45'),
        'DM'=>array('name'=>'DOMINICA','code'=>'1767'),
        'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'1809'),
        'DZ'=>array('name'=>'ALGERIA','code'=>'213'),
        'EC'=>array('name'=>'ECUADOR','code'=>'593'),
        'EE'=>array('name'=>'ESTONIA','code'=>'372'),
        'EG'=>array('name'=>'EGYPT','code'=>'20'),
        'ER'=>array('name'=>'ERITREA','code'=>'291'),
        'ES'=>array('name'=>'SPAIN','code'=>'34'),
        'ET'=>array('name'=>'ETHIOPIA','code'=>'251'),
        'FI'=>array('name'=>'FINLAND','code'=>'358'),
        'FJ'=>array('name'=>'FIJI','code'=>'679'),
        'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'500'),
        'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'691'),
        'FO'=>array('name'=>'FAROE ISLANDS','code'=>'298'),
        'FR'=>array('name'=>'FRANCE','code'=>'33'),
        'GA'=>array('name'=>'GABON','code'=>'241'),
        'GB'=>array('name'=>'UNITED KINGDOM','code'=>'44'),
        'GD'=>array('name'=>'GRENADA','code'=>'1473'),
        'GE'=>array('name'=>'GEORGIA','code'=>'995'),
        'GH'=>array('name'=>'GHANA','code'=>'233'),
        'GI'=>array('name'=>'GIBRALTAR','code'=>'350'),
        'GL'=>array('name'=>'GREENLAND','code'=>'299'),
        'GM'=>array('name'=>'GAMBIA','code'=>'220'),
        'GN'=>array('name'=>'GUINEA','code'=>'224'),
        'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'240'),
        'GR'=>array('name'=>'GREECE','code'=>'30'),
        'GT'=>array('name'=>'GUATEMALA','code'=>'502'),
        'GU'=>array('name'=>'GUAM','code'=>'1671'),
        'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'245'),
        'GY'=>array('name'=>'GUYANA','code'=>'592'),
        'HK'=>array('name'=>'HONG KONG','code'=>'852'),
        'HN'=>array('name'=>'HONDURAS','code'=>'504'),
        'HR'=>array('name'=>'CROATIA','code'=>'385'),
        'HT'=>array('name'=>'HAITI','code'=>'509'),
        'HU'=>array('name'=>'HUNGARY','code'=>'36'),
        'ID'=>array('name'=>'INDONESIA','code'=>'62'),
        'IE'=>array('name'=>'IRELAND','code'=>'353'),
        'IL'=>array('name'=>'ISRAEL','code'=>'972'),
        'IM'=>array('name'=>'ISLE OF MAN','code'=>'44'),
        'IN'=>array('name'=>'INDIA','code'=>'91'),
        'IQ'=>array('name'=>'IRAQ','code'=>'964'),
        'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'98'),
        'IS'=>array('name'=>'ICELAND','code'=>'354'),
        'IT'=>array('name'=>'ITALY','code'=>'39'),
        'JM'=>array('name'=>'JAMAICA','code'=>'1876'),
        'JO'=>array('name'=>'JORDAN','code'=>'962'),
        'JP'=>array('name'=>'JAPAN','code'=>'81'),
        'KE'=>array('name'=>'KENYA','code'=>'254'),
        'KG'=>array('name'=>'KYRGYZSTAN','code'=>'996'),
        'KH'=>array('name'=>'CAMBODIA','code'=>'855'),
        'KI'=>array('name'=>'KIRIBATI','code'=>'686'),
        'KM'=>array('name'=>'COMOROS','code'=>'269'),
        'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'1869'),
        'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'850'),
        'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'82'),
        'KW'=>array('name'=>'KUWAIT','code'=>'965'),
        'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'1345'),
        'KZ'=>array('name'=>'KAZAKSTAN','code'=>'7'),
        'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'856'),
        'LB'=>array('name'=>'LEBANON','code'=>'961'),
        'LC'=>array('name'=>'SAINT LUCIA','code'=>'1758'),
        'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'423'),
        'LK'=>array('name'=>'SRI LANKA','code'=>'94'),
        'LR'=>array('name'=>'LIBERIA','code'=>'231'),
        'LS'=>array('name'=>'LESOTHO','code'=>'266'),
        'LT'=>array('name'=>'LITHUANIA','code'=>'370'),
        'LU'=>array('name'=>'LUXEMBOURG','code'=>'352'),
        'LV'=>array('name'=>'LATVIA','code'=>'371'),
        'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'218'),
        'MA'=>array('name'=>'MOROCCO','code'=>'212'),
        'MC'=>array('name'=>'MONACO','code'=>'377'),
        'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'373'),
        'ME'=>array('name'=>'MONTENEGRO','code'=>'382'),
        'MF'=>array('name'=>'SAINT MARTIN','code'=>'1599'),
        'MG'=>array('name'=>'MADAGASCAR','code'=>'261'),
        'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'692'),
        'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'389'),
        'ML'=>array('name'=>'MALI','code'=>'223'),
        'MM'=>array('name'=>'MYANMAR','code'=>'95'),
        'MN'=>array('name'=>'MONGOLIA','code'=>'976'),
        'MO'=>array('name'=>'MACAU','code'=>'853'),
        'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'1670'),
        'MR'=>array('name'=>'MAURITANIA','code'=>'222'),
        'MS'=>array('name'=>'MONTSERRAT','code'=>'1664'),
        'MT'=>array('name'=>'MALTA','code'=>'356'),
        'MU'=>array('name'=>'MAURITIUS','code'=>'230'),
        'MV'=>array('name'=>'MALDIVES','code'=>'960'),
        'MW'=>array('name'=>'MALAWI','code'=>'265'),
        'MX'=>array('name'=>'MEXICO','code'=>'52'),
        'MY'=>array('name'=>'MALAYSIA','code'=>'60'),
        'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'258'),
        'NA'=>array('name'=>'NAMIBIA','code'=>'264'),
        'NC'=>array('name'=>'NEW CALEDONIA','code'=>'687'),
        'NE'=>array('name'=>'NIGER','code'=>'227'),
        'NG'=>array('name'=>'NIGERIA','code'=>'234'),
        'NI'=>array('name'=>'NICARAGUA','code'=>'505'),
        'NL'=>array('name'=>'NETHERLANDS','code'=>'31'),
        'NO'=>array('name'=>'NORWAY','code'=>'47'),
        'NP'=>array('name'=>'NEPAL','code'=>'977'),
        'NR'=>array('name'=>'NAURU','code'=>'674'),
        'NU'=>array('name'=>'NIUE','code'=>'683'),
        'NZ'=>array('name'=>'NEW ZEALAND','code'=>'64'),
        'OM'=>array('name'=>'OMAN','code'=>'968'),
        'PA'=>array('name'=>'PANAMA','code'=>'507'),
        'PE'=>array('name'=>'PERU','code'=>'51'),
        'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'689'),
        'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'675'),
        'PH'=>array('name'=>'PHILIPPINES','code'=>'63'),
        'PK'=>array('name'=>'PAKISTAN','code'=>'92'),
        'PL'=>array('name'=>'POLAND','code'=>'48'),
        'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'508'),
        'PN'=>array('name'=>'PITCAIRN','code'=>'870'),
        'PR'=>array('name'=>'PUERTO RICO','code'=>'1'),
        'PT'=>array('name'=>'PORTUGAL','code'=>'351'),
        'PW'=>array('name'=>'PALAU','code'=>'680'),
        'PY'=>array('name'=>'PARAGUAY','code'=>'595'),
        'QA'=>array('name'=>'QATAR','code'=>'974'),
        'RO'=>array('name'=>'ROMANIA','code'=>'40'),
        'RS'=>array('name'=>'SERBIA','code'=>'381'),
        'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'7'),
        'RW'=>array('name'=>'RWANDA','code'=>'250'),
        'SA'=>array('name'=>'SAUDI ARABIA','code'=>'966'),
        'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'677'),
        'SC'=>array('name'=>'SEYCHELLES','code'=>'248'),
        'SD'=>array('name'=>'SUDAN','code'=>'249'),
        'SE'=>array('name'=>'SWEDEN','code'=>'46'),
        'SG'=>array('name'=>'SINGAPORE','code'=>'65'),
        'SH'=>array('name'=>'SAINT HELENA','code'=>'290'),
        'SI'=>array('name'=>'SLOVENIA','code'=>'386'),
        'SK'=>array('name'=>'SLOVAKIA','code'=>'421'),
        'SL'=>array('name'=>'SIERRA LEONE','code'=>'232'),
        'SM'=>array('name'=>'SAN MARINO','code'=>'378'),
        'SN'=>array('name'=>'SENEGAL','code'=>'221'),
        'SO'=>array('name'=>'SOMALIA','code'=>'252'),
        'SR'=>array('name'=>'SURINAME','code'=>'597'),
        'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'239'),
        'SV'=>array('name'=>'EL SALVADOR','code'=>'503'),
        'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'963'),
        'SZ'=>array('name'=>'SWAZILAND','code'=>'268'),
        'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'1649'),
        'TD'=>array('name'=>'CHAD','code'=>'235'),
        'TG'=>array('name'=>'TOGO','code'=>'228'),
        'TH'=>array('name'=>'THAILAND','code'=>'66'),
        'TJ'=>array('name'=>'TAJIKISTAN','code'=>'992'),
        'TK'=>array('name'=>'TOKELAU','code'=>'690'),
        'TL'=>array('name'=>'TIMOR-LESTE','code'=>'670'),
        'TM'=>array('name'=>'TURKMENISTAN','code'=>'993'),
        'TN'=>array('name'=>'TUNISIA','code'=>'216'),
        'TO'=>array('name'=>'TONGA','code'=>'676'),
        'TR'=>array('name'=>'TURKEY','code'=>'90'),
        'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'1868'),
        'TV'=>array('name'=>'TUVALU','code'=>'688'),
        'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'886'),
        'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'255'),
        'UA'=>array('name'=>'UKRAINE','code'=>'380'),
        'UG'=>array('name'=>'UGANDA','code'=>'256'),
        'US'=>array('name'=>'UNITED STATES','code'=>'1'),
        'UY'=>array('name'=>'URUGUAY','code'=>'598'),
        'UZ'=>array('name'=>'UZBEKISTAN','code'=>'998'),
        'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'39'),
        'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'1784'),
        'VE'=>array('name'=>'VENEZUELA','code'=>'58'),
        'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'1284'),
        'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'1340'),
        'VN'=>array('name'=>'VIET NAM','code'=>'84'),
        'VU'=>array('name'=>'VANUATU','code'=>'678'),
        'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'681'),
        'WS'=>array('name'=>'SAMOA','code'=>'685'),
        'XK'=>array('name'=>'KOSOVO','code'=>'381'),
        'YE'=>array('name'=>'YEMEN','code'=>'967'),
        'YT'=>array('name'=>'MAYOTTE','code'=>'262'),
        'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'27'),
        'ZM'=>array('name'=>'ZAMBIA','code'=>'260'),
        'ZW'=>array('name'=>'ZIMBABWE','code'=>'263')
    );

    public function getAccessToken(){
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://api.sandbox.paypal.com/v1/oauth2/token');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_USERPWD, $this->client_id . ':' . $this->secret);
        //                                  ***Client ID****         ****Secret***
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Accept-Language: en_US';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            error_log("cURL Error # Get access token:" . $err);
        } else {
            $response = json_decode($response);

            $this->expiry_date = date("Y-m-d", strtotime("+". $response->expires_in ."days"));
            $this->access_token = $response->access_token;
            $this->token_type = $response->token_type;

            error_log($response->access_token);
        }

    }

    public function generateInvoiceNumber() {
        // Generate invoice number
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://api.sandbox.paypal.com/v2/invoicing/generate-next-invoice-number');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: ' . $this->token_type . ' ' . $this->access_token;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            error_log("cURL Error #Generate invoice number:" . $err);
        } else {
            // returns invoice_number
            $response = json_decode($response);
            error_log($response->invoice_number);
            return $response->invoice_number;
        }

    }

    public function createInvoice($data) {

        $now = date('Y-m-d');
        if ( $this->expiry_date = $now) {
            $this->getAccessToken();
        }

       

        $invoice_number = $this->generateInvoiceNumber();

        $curl = curl_init();

        error_log('library creating invoice '. $data['address']);
        error_log('library creating invoice '. $data['city']);
        error_log('library creating invoice '. $data['postalCode']);
        error_log('library creating invoice '. $data['countryCode']);
        error_log('library creating invoice '. $data['price']);
        error_log('library creating invoice '. $data['address']);
        error_log('library creating invoice '. $data['address']);

        curl_setopt($curl, CURLOPT_URL, 'https://api.sandbox.paypal.com/v2/invoicing/invoices');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,
            '{
                "detail":
                    {
                    "invoice_number": "' . $invoice_number . '",
                    "reference": "deal-ref",
                    "invoice_date": "'. date('Y-m-d') .'",
                    "currency_code": "USD",
                    "note": "Thank you for your business.",
                    "term": "No refunds after 30 days.",
                    "memo": "This is a long contract",
                    "payment_term": {
                        "term_type": "NET_10",
                        "due_date": "' . date("Y-m-d", strtotime("+10days")) . '"
                    }
                },

                "invoicer": {
                    "name": {
                        "given_name": "Digital",
                        "surname": "Renter"
                    },
                    "address": {
                        "address_line_1": "1234 First Street",
                        "admin_area_1": "CA",
                        "postal_code": "98765",
                        "country_code": "US"
                    },

                    "email_address": "sb-dvz59300499@business.example.com",
                    "phones": [
                        {
                            "country_code": "237",
                            "national_number": "4085551234",
                            "phone_type": "MOBILE"
                        }
                    ],

                    "website": "www.digitalrenter.com",
                    "logo_url": "https://example.com/logo.PNG",
                    "additional_notes": "2-4"
                },

                "primary_recipients": [
                    {
                        "billing_info": {
                            "name": {
                                "given_name": "'. $data['firstName'] .'",
                                "surname": "'. $data['lastName'] .'"
                            },
                            "address": {
                                "address_line_1": "'. $data['address'] .'",
                                "admin_area_1": "'. $data['city'] .'",
                                "postal_code": "'. $data['postalCode'] .'",
                                "country_code": "'. $data['countryCode'] .'"
                            },
                            "email_address": "sb-jwnnl301506@personal.example.com",
                            "phones": [
                                {
                                    "country_code": "'. substr(($this->countryArray[$data['countryCode']])['code'], 0, 3) .'",
                                    "national_number": "'. $data['telephone'] .'",
                                    "phone_type": "HOME"
                                }
                            ],
                            "additional_info_value": "add-info"
                        }
                    }
                ],
                "items": [
                    {
                        "name": "package 1",
                        "description": "My Description",
                        "quantity": "2",
                        "unit_amount": {
                            "currency_code": "USD",
                            "value": "'. $data['price'] .'"
                        },
                        "tax": {
                            "name": "Sales Tax",
                            "percent": "7.25",
                            "discount": {"percent": "5"
                            },
                            "unit_of_measure": "SIZE"
                        }
                    }
                ],
                "configuration": {
                    "partial_payment": {
                        "allow_partial_payment": true,
                        "minimum_amount_due": {
                            "currency_code": "USD",
                            "value": "'. 0.2 * $data['amount'] .'"
                        }
                    },
                    "allow_tip": true,
                    "tax_calculated_after_discount": true,
                    "tax_inclusive": false
                }
            }'
        );

        curl_setopt($curl, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: ' . $this->token_type . ' ' . $this->access_token;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        error_log('library creating invoice '.substr(($this->countryArray[$data['countryCode']])['code'], 0, 3));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            error_log("cURL Error #create invoice:" . $err);
        } else {
            error_log("I'm here");
            error_log($response);
            $response = json_decode(($response));
            error_log($response->href);
            return $response->href;
        }

    }

    public function sendInvoice($href) {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $href . '/send');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,
            '{
                "send_to_invoicer": true
            }'
        );
        curl_setopt($curl, CURLOPT_POST, 1);
        $headers = array(); $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: ' . $this->token_type . ' ' . $this->access_token;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            error_log("cURL Error #send invoice:" . $err);
        } else {
            return $response;
        }

    }

}

