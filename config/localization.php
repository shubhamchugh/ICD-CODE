<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Domain name
    |--------------------------------------------------------------------------
    |
    | Here you may change the name of the domain used in your application.
    | By default, the domain is read from the .env file.
    | Example: APP_DOMAIN=185ad73e.eu.ngrok.io (only because of this we know what your real domain is)
    |
    */
    'domain' => env('APP_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Beautify url
    |--------------------------------------------------------------------------
    |
    | Use to set fallback language to mydomain.com and not to en.mydomain.com
    | Other languages are getting e.g. fr.mydomain.com
    |
    */
    'beautify_url' => true,
    /*
    |--------------------------------------------------------------------------
    | subdomains that are whitelisted
    |--------------------------------------------------------------------------
    |
    | If you don't want to be redirected, when you have special subdomains
    | for example 'admin', 'archontas', 'nova' etc.
    |
    */
    'subdomains' => [],
    /*
    |--------------------------------------------------------------------------
    | custom locale subdomains via aliases
    |--------------------------------------------------------------------------
    |
    | Let's say you don't want to use locale as a subdomain.
    | You can add your custom subdomains here. Example:
    | gewinnen.domain.com --> "de"
    | gagner.domain.com --> "fr",
    |
    */
    'aliases' => [
        //'gewinnen' => 'de', //important: it has to match with an active locale from the supportedLocales list
        //'gagner' => 'fr'
    ],
    /*
    |--------------------------------------------------------------------------
    | https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Accept-Language
    |--------------------------------------------------------------------------
    |
    |  Negotiate for the user locale using the Accept-Language header if it's not defined in the URL
    |  If false, system will take app.php fallback locale attribute
    |
    */
    'acceptLanguage' => true,
    /*
    |--------------------------------------------------------------------------
    | Cookie localization
    |--------------------------------------------------------------------------
    |
    | Use this option to enable or disable the use of cookies
    | in locale detection.
    |
    */
    'cookie_localization' => true,
    /*
    |--------------------------------------------------------------------------
    | Cookie Serialization
    |--------------------------------------------------------------------------
    |
    | If you have not changed anything in your middleware "EncryptCookies", you
    | don't need to change anything here as well.
    | For information visit:
    | https://laravel.com/docs/5.6/upgrade#upgrade-5.6.30
    */
    'cookie_serialize' => false,
    /*
    |--------------------------------------------------------------------------
    | Prevent redirect
    |--------------------------------------------------------------------------
    |
    | Sometimes in testing you don't want to use redirection.
    | If you set the value to true, the middleware TongueSpeaksLocale
    | will not redirect anymore.
    |
    */
    'prevent_redirect' => env('PREVENT_REDIRECT', false),

    // Uncomment the languages that your site supports - or add new ones.
    // These are sorted by the native name, which is the order you might show them in a language selector.
    // Regional languages are sorted by their base language, so "British English" sorts as "English, British"
    'supportedLocales' => [
        //'ace'         => ['name' => 'Achinese',               'script' => 'Latn', 'native' => 'Aceh', 'regional' => ''],
        //'af'          => ['name' => 'Afrikaans',              'script' => 'Latn', 'native' => 'Afrikaans', 'regional' => 'af_ZA'],
        //'agq'         => ['name' => 'Aghem',                  'script' => 'Latn', 'native' => 'Aghem', 'regional' => ''],
        //'ak'          => ['name' => 'Akan',                   'script' => 'Latn', 'native' => 'Akan', 'regional' => 'ak_GH'],
        //'an'          => ['name' => 'Aragonese',              'script' => 'Latn', 'native' => 'aragonés', 'regional' => 'an_ES'],
        //'cch'         => ['name' => 'Atsam',                  'script' => 'Latn', 'native' => 'Atsam', 'regional' => ''],
        //'gn'          => ['name' => 'Guaraní',                'script' => 'Latn', 'native' => 'Avañe’ẽ', 'regional' => ''],
        //'ae'          => ['name' => 'Avestan',                'script' => 'Latn', 'native' => 'avesta', 'regional' => ''],
        //'ay'          => ['name' => 'Aymara',                 'script' => 'Latn', 'native' => 'aymar aru', 'regional' => 'ay_PE'],
        //'az'          => ['name' => 'Azerbaijani (Latin)',    'script' => 'Latn', 'native' => 'azərbaycanca', 'regional' => 'az_AZ'],
        //'id'          => ['name' => 'Indonesian',             'script' => 'Latn', 'native' => 'Bahasa Indonesia', 'regional' => 'id_ID'],
        //'ms'          => ['name' => 'Malay',                  'script' => 'Latn', 'native' => 'Bahasa Melayu', 'regional' => 'ms_MY'],
        //'bm'          => ['name' => 'Bambara',                'script' => 'Latn', 'native' => 'bamanakan', 'regional' => ''],
        //'jv'          => ['name' => 'Javanese (Latin)',       'script' => 'Latn', 'native' => 'Basa Jawa', 'regional' => ''],
        //'su'          => ['name' => 'Sundanese',              'script' => 'Latn', 'native' => 'Basa Sunda', 'regional' => ''],
        //'bh'          => ['name' => 'Bihari',                 'script' => 'Latn', 'native' => 'Bihari', 'regional' => ''],
        //'bi'          => ['name' => 'Bislama',                'script' => 'Latn', 'native' => 'Bislama', 'regional' => ''],
        //'nb'          => ['name' => 'Norwegian Bokmål',       'script' => 'Latn', 'native' => 'Bokmål', 'regional' => 'nb_NO'],
        //'bs'          => ['name' => 'Bosnian',                'script' => 'Latn', 'native' => 'bosanski', 'regional' => 'bs_BA'],
        //'br'          => ['name' => 'Breton',                 'script' => 'Latn', 'native' => 'brezhoneg', 'regional' => 'br_FR'],
        //'ca'          => ['name' => 'Catalan',                'script' => 'Latn', 'native' => 'català', 'regional' => 'ca_ES'],
        //'ch'          => ['name' => 'Chamorro',               'script' => 'Latn', 'native' => 'Chamoru', 'regional' => ''],
        //'ny'          => ['name' => 'Chewa',                  'script' => 'Latn', 'native' => 'chiCheŵa', 'regional' => ''],
        //'kde'         => ['name' => 'Makonde',                'script' => 'Latn', 'native' => 'Chimakonde', 'regional' => ''],
        //'sn'          => ['name' => 'Shona',                  'script' => 'Latn', 'native' => 'chiShona', 'regional' => ''],
        //'co'          => ['name' => 'Corsican',               'script' => 'Latn', 'native' => 'corsu', 'regional' => ''],
        //'cy'          => ['name' => 'Welsh',                  'script' => 'Latn', 'native' => 'Cymraeg', 'regional' => 'cy_GB'],
        //'da'          => ['name' => 'Danish',                 'script' => 'Latn', 'native' => 'dansk', 'regional' => 'da_DK'],
        //'se'          => ['name' => 'Northern Sami',          'script' => 'Latn', 'native' => 'davvisámegiella', 'regional' => 'se_NO'],
        //'de'          => ['name' => 'German',                 'script' => 'Latn', 'native' => 'Deutsch', 'regional' => 'de_DE'],
        //'luo'         => ['name' => 'Luo',                    'script' => 'Latn', 'native' => 'Dholuo', 'regional' => ''],
        //'nv'          => ['name' => 'Navajo',                 'script' => 'Latn', 'native' => 'Diné bizaad', 'regional' => ''],
        //'dua'         => ['name' => 'Duala',                  'script' => 'Latn', 'native' => 'duálá', 'regional' => ''],
        //'et'          => ['name' => 'Estonian',               'script' => 'Latn', 'native' => 'eesti', 'regional' => 'et_EE'],
        //'na'          => ['name' => 'Nauru',                  'script' => 'Latn', 'native' => 'Ekakairũ Naoero', 'regional' => ''],
        //'guz'         => ['name' => 'Ekegusii',               'script' => 'Latn', 'native' => 'Ekegusii', 'regional' => ''],
        'en'          => ['name' => 'English',                'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
        //'en-AU'       => ['name' => 'Australian English',     'script' => 'Latn', 'native' => 'Australian English', 'regional' => 'en_AU'],
        //'en-GB'       => ['name' => 'British English',        'script' => 'Latn', 'native' => 'British English', 'regional' => 'en_GB'],
        //'en-US'       => ['name' => 'U.S. English',           'script' => 'Latn', 'native' => 'U.S. English', 'regional' => 'en_US'],
        'es'          => ['name' => 'Spanish',                'script' => 'Latn', 'native' => 'español', 'regional' => 'es_ES'],
        //'eo'          => ['name' => 'Esperanto',              'script' => 'Latn', 'native' => 'esperanto', 'regional' => ''],
        //'eu'          => ['name' => 'Basque',                 'script' => 'Latn', 'native' => 'euskara', 'regional' => 'eu_ES'],
        //'ewo'         => ['name' => 'Ewondo',                 'script' => 'Latn', 'native' => 'ewondo', 'regional' => ''],
        //'ee'          => ['name' => 'Ewe',                    'script' => 'Latn', 'native' => 'eʋegbe', 'regional' => ''],
        //'fil'         => ['name' => 'Filipino',               'script' => 'Latn', 'native' => 'Filipino', 'regional' => 'fil_PH'],
        'fr'          => ['name' => 'French',                 'script' => 'Latn', 'native' => 'français', 'regional' => 'fr_FR'],
        //'fr-CA'       => ['name' => 'Canadian French',        'script' => 'Latn', 'native' => 'français canadien', 'regional' => 'fr_CA'],
        //'fy'          => ['name' => 'Western Frisian',        'script' => 'Latn', 'native' => 'frysk', 'regional' => 'fy_DE'],
        //'fur'         => ['name' => 'Friulian',               'script' => 'Latn', 'native' => 'furlan', 'regional' => 'fur_IT'],
        //'fo'          => ['name' => 'Faroese',                'script' => 'Latn', 'native' => 'føroyskt', 'regional' => 'fo_FO'],
        //'gaa'         => ['name' => 'Ga',                     'script' => 'Latn', 'native' => 'Ga', 'regional' => ''],
        //'ga'          => ['name' => 'Irish',                  'script' => 'Latn', 'native' => 'Gaeilge', 'regional' => 'ga_IE'],
        //'gv'          => ['name' => 'Manx',                   'script' => 'Latn', 'native' => 'Gaelg', 'regional' => 'gv_GB'],
        //'sm'          => ['name' => 'Samoan',                 'script' => 'Latn', 'native' => 'Gagana fa’a Sāmoa', 'regional' => ''],
        //'gl'          => ['name' => 'Galician',               'script' => 'Latn', 'native' => 'galego', 'regional' => 'gl_ES'],
        //'ki'          => ['name' => 'Kikuyu',                 'script' => 'Latn', 'native' => 'Gikuyu', 'regional' => ''],
        //'gd'          => ['name' => 'Scottish Gaelic',        'script' => 'Latn', 'native' => 'Gàidhlig', 'regional' => 'gd_GB'],
        //'ha'          => ['name' => 'Hausa',                  'script' => 'Latn', 'native' => 'Hausa', 'regional' => 'ha_NG'],
        //'bez'         => ['name' => 'Bena',                   'script' => 'Latn', 'native' => 'Hibena', 'regional' => ''],
        //'ho'          => ['name' => 'Hiri Motu',              'script' => 'Latn', 'native' => 'Hiri Motu', 'regional' => ''],
        //'hr'          => ['name' => 'Croatian',               'script' => 'Latn', 'native' => 'hrvatski', 'regional' => 'hr_HR'],
        //'bem'         => ['name' => 'Bemba',                  'script' => 'Latn', 'native' => 'Ichibemba', 'regional' => 'bem_ZM'],
        //'io'          => ['name' => 'Ido',                    'script' => 'Latn', 'native' => 'Ido', 'regional' => ''],
        //'ig'          => ['name' => 'Igbo',                   'script' => 'Latn', 'native' => 'Igbo', 'regional' => 'ig_NG'],
        //'rn'          => ['name' => 'Rundi',                  'script' => 'Latn', 'native' => 'Ikirundi', 'regional' => ''],
        //'ia'          => ['name' => 'Interlingua',            'script' => 'Latn', 'native' => 'interlingua', 'regional' => 'ia_FR'],
        //'iu-Latn'     => ['name' => 'Inuktitut (Latin)',      'script' => 'Latn', 'native' => 'Inuktitut', 'regional' => 'iu_CA'],
        //'sbp'         => ['name' => 'Sileibi',                'script' => 'Latn', 'native' => 'Ishisangu', 'regional' => ''],
        //'nd'          => ['name' => 'North Ndebele',          'script' => 'Latn', 'native' => 'isiNdebele', 'regional' => ''],
        //'nr'          => ['name' => 'South Ndebele',          'script' => 'Latn', 'native' => 'isiNdebele', 'regional' => 'nr_ZA'],
        //'xh'          => ['name' => 'Xhosa',                  'script' => 'Latn', 'native' => 'isiXhosa', 'regional' => 'xh_ZA'],
        //'zu'          => ['name' => 'Zulu',                   'script' => 'Latn', 'native' => 'isiZulu', 'regional' => 'zu_ZA'],
        //'it'          => ['name' => 'Italian',                'script' => 'Latn', 'native' => 'italiano', 'regional' => 'it_IT'],
        //'ik'          => ['name' => 'Inupiaq',                'script' => 'Latn', 'native' => 'Iñupiaq', 'regional' => 'ik_CA'],
        //'dyo'         => ['name' => 'Jola-Fonyi',             'script' => 'Latn', 'native' => 'joola', 'regional' => ''],
        //'kea'         => ['name' => 'Kabuverdianu',           'script' => 'Latn', 'native' => 'kabuverdianu', 'regional' => ''],
        //'kaj'         => ['name' => 'Jju',                    'script' => 'Latn', 'native' => 'Kaje', 'regional' => ''],
        //'mh'          => ['name' => 'Marshallese',            'script' => 'Latn', 'native' => 'Kajin M̧ajeļ', 'regional' => 'mh_MH'],
        //'kl'          => ['name' => 'Kalaallisut',            'script' => 'Latn', 'native' => 'kalaallisut', 'regional' => 'kl_GL'],
        //'kln'         => ['name' => 'Kalenjin',               'script' => 'Latn', 'native' => 'Kalenjin', 'regional' => ''],
        //'kr'          => ['name' => 'Kanuri',                 'script' => 'Latn', 'native' => 'Kanuri', 'regional' => ''],
        //'kcg'         => ['name' => 'Tyap',                   'script' => 'Latn', 'native' => 'Katab', 'regional' => ''],
        //'kw'          => ['name' => 'Cornish',                'script' => 'Latn', 'native' => 'kernewek', 'regional' => 'kw_GB'],
        //'naq'         => ['name' => 'Nama',                   'script' => 'Latn', 'native' => 'Khoekhoegowab', 'regional' => ''],
        //'rof'         => ['name' => 'Rombo',                  'script' => 'Latn', 'native' => 'Kihorombo', 'regional' => ''],
        //'kam'         => ['name' => 'Kamba',                  'script' => 'Latn', 'native' => 'Kikamba', 'regional' => ''],
        //'kg'          => ['name' => 'Kongo',                  'script' => 'Latn', 'native' => 'Kikongo', 'regional' => ''],
        //'jmc'         => ['name' => 'Machame',                'script' => 'Latn', 'native' => 'Kimachame', 'regional' => ''],
        //'rw'          => ['name' => 'Kinyarwanda',            'script' => 'Latn', 'native' => 'Kinyarwanda', 'regional' => 'rw_RW'],
        //'asa'         => ['name' => 'Kipare',                 'script' => 'Latn', 'native' => 'Kipare', 'regional' => ''],
        //'rwk'         => ['name' => 'Rwa',                    'script' => 'Latn', 'native' => 'Kiruwa', 'regional' => ''],
        //'saq'         => ['name' => 'Samburu',                'script' => 'Latn', 'native' => 'Kisampur', 'regional' => ''],
        //'ksb'         => ['name' => 'Shambala',               'script' => 'Latn', 'native' => 'Kishambaa', 'regional' => ''],
        //'swc'         => ['name' => 'Congo Swahili',          'script' => 'Latn', 'native' => 'Kiswahili ya Kongo', 'regional' => ''],
        //'sw'          => ['name' => 'Swahili',                'script' => 'Latn', 'native' => 'Kiswahili', 'regional' => 'sw_KE'],
        //'dav'         => ['name' => 'Dawida',                 'script' => 'Latn', 'native' => 'Kitaita', 'regional' => ''],
        //'teo'         => ['name' => 'Teso',                   'script' => 'Latn', 'native' => 'Kiteso', 'regional' => ''],
        //'khq'         => ['name' => 'Koyra Chiini',           'script' => 'Latn', 'native' => 'Koyra ciini', 'regional' => ''],
        //'ses'         => ['name' => 'Songhay',                'script' => 'Latn', 'native' => 'Koyraboro senni', 'regional' => ''],
        //'mfe'         => ['name' => 'Morisyen',               'script' => 'Latn', 'native' => 'kreol morisien', 'regional' => ''],
        //'ht'          => ['name' => 'Haitian',                'script' => 'Latn', 'native' => 'Kreyòl ayisyen', 'regional' => 'ht_HT'],
        //'kj'          => ['name' => 'Kuanyama',               'script' => 'Latn', 'native' => 'Kwanyama', 'regional' => ''],
        //'ksh'         => ['name' => 'Kölsch',                 'script' => 'Latn', 'native' => 'Kölsch', 'regional' => ''],
        //'ebu'         => ['name' => 'Kiembu',                 'script' => 'Latn', 'native' => 'Kĩembu', 'regional' => ''],
        //'mer'         => ['name' => 'Kimîîru',                'script' => 'Latn', 'native' => 'Kĩmĩrũ', 'regional' => ''],
        //'lag'         => ['name' => 'Langi',                  'script' => 'Latn', 'native' => 'Kɨlaangi', 'regional' => ''],
        //'lah'         => ['name' => 'Lahnda',                 'script' => 'Latn', 'native' => 'Lahnda', 'regional' => ''],
        //'la'          => ['name' => 'Latin',                  'script' => 'Latn', 'native' => 'latine', 'regional' => ''],
        //'lv'          => ['name' => 'Latvian',                'script' => 'Latn', 'native' => 'latviešu', 'regional' => 'lv_LV'],
        //'to'          => ['name' => 'Tongan',                 'script' => 'Latn', 'native' => 'lea fakatonga', 'regional' => ''],
        //'lt'          => ['name' => 'Lithuanian',             'script' => 'Latn', 'native' => 'lietuvių', 'regional' => 'lt_LT'],
        //'li'          => ['name' => 'Limburgish',             'script' => 'Latn', 'native' => 'Limburgs', 'regional' => 'li_BE'],
        //'ln'          => ['name' => 'Lingala',                'script' => 'Latn', 'native' => 'lingála', 'regional' => ''],
        //'lg'          => ['name' => 'Ganda',                  'script' => 'Latn', 'native' => 'Luganda', 'regional' => 'lg_UG'],
        //'luy'         => ['name' => 'Oluluyia',               'script' => 'Latn', 'native' => 'Luluhia', 'regional' => ''],
        //'lb'          => ['name' => 'Luxembourgish',          'script' => 'Latn', 'native' => 'Lëtzebuergesch', 'regional' => 'lb_LU'],
        //'hu'          => ['name' => 'Hungarian',              'script' => 'Latn', 'native' => 'magyar', 'regional' => 'hu_HU'],
        //'mgh'         => ['name' => 'Makhuwa-Meetto',         'script' => 'Latn', 'native' => 'Makua', 'regional' => ''],
        //'mg'          => ['name' => 'Malagasy',               'script' => 'Latn', 'native' => 'Malagasy', 'regional' => 'mg_MG'],
        //'mt'          => ['name' => 'Maltese',                'script' => 'Latn', 'native' => 'Malti', 'regional' => 'mt_MT'],
        //'mtr'         => ['name' => 'Mewari',                 'script' => 'Latn', 'native' => 'Mewari', 'regional' => ''],
        //'mua'         => ['name' => 'Mundang',                'script' => 'Latn', 'native' => 'Mundang', 'regional' => ''],
        //'mi'          => ['name' => 'Māori',                  'script' => 'Latn', 'native' => 'Māori', 'regional' => 'mi_NZ'],
        //'nl'          => ['name' => 'Dutch',                  'script' => 'Latn', 'native' => 'Nederlands', 'regional' => 'nl_NL'],
        //'nmg'         => ['name' => 'Kwasio',                 'script' => 'Latn', 'native' => 'ngumba', 'regional' => ''],
        //'yav'         => ['name' => 'Yangben',                'script' => 'Latn', 'native' => 'nuasue', 'regional' => ''],
        //'nn'          => ['name' => 'Norwegian Nynorsk',      'script' => 'Latn', 'native' => 'nynorsk', 'regional' => 'nn_NO'],
        //'oc'          => ['name' => 'Occitan',                'script' => 'Latn', 'native' => 'occitan', 'regional' => 'oc_FR'],
        //'ang'         => ['name' => 'Old English',            'script' => 'Runr', 'native' => 'Old English', 'regional' => ''],
        //'xog'         => ['name' => 'Soga',                   'script' => 'Latn', 'native' => 'Olusoga', 'regional' => ''],
        //'om'          => ['name' => 'Oromo',                  'script' => 'Latn', 'native' => 'Oromoo', 'regional' => 'om_ET'],
        //'ng'          => ['name' => 'Ndonga',                 'script' => 'Latn', 'native' => 'OshiNdonga', 'regional' => ''],
        //'hz'          => ['name' => 'Herero',                 'script' => 'Latn', 'native' => 'Otjiherero', 'regional' => ''],
        //'uz-Latn'     => ['name' => 'Uzbek (Latin)',          'script' => 'Latn', 'native' => 'oʼzbekcha', 'regional' => 'uz_UZ'],
        //'nds'         => ['name' => 'Low German',             'script' => 'Latn', 'native' => 'Plattdüütsch', 'regional' => 'nds_DE'],
        //'pl'          => ['name' => 'Polish',                 'script' => 'Latn', 'native' => 'polski', 'regional' => 'pl_PL'],
        //'pt'          => ['name' => 'Portuguese',             'script' => 'Latn', 'native' => 'português', 'regional' => 'pt_PT'],
        //'pt-BR'       => ['name' => 'Brazilian Portuguese',   'script' => 'Latn', 'native' => 'português do Brasil', 'regional' => 'pt_BR'],
        //'ff'          => ['name' => 'Fulah',                  'script' => 'Latn', 'native' => 'Pulaar', 'regional' => 'ff_SN'],
        //'pi'          => ['name' => 'Pahari-Potwari',         'script' => 'Latn', 'native' => 'Pāli', 'regional' => ''],
        //'aa'          => ['name' => 'Afar',                   'script' => 'Latn', 'native' => 'Qafar', 'regional' => 'aa_ER'],
        //'ty'          => ['name' => 'Tahitian',               'script' => 'Latn', 'native' => 'Reo Māohi', 'regional' => ''],
        //'ksf'         => ['name' => 'Bafia',                  'script' => 'Latn', 'native' => 'rikpa', 'regional' => ''],
        //'ro'          => ['name' => 'Romanian',               'script' => 'Latn', 'native' => 'română', 'regional' => 'ro_RO'],
        //'cgg'         => ['name' => 'Chiga',                  'script' => 'Latn', 'native' => 'Rukiga', 'regional' => ''],
        //'rm'          => ['name' => 'Romansh',                'script' => 'Latn', 'native' => 'rumantsch', 'regional' => ''],
        //'qu'          => ['name' => 'Quechua',                'script' => 'Latn', 'native' => 'Runa Simi', 'regional' => ''],
        //'nyn'         => ['name' => 'Nyankole',               'script' => 'Latn', 'native' => 'Runyankore', 'regional' => ''],
        //'ssy'         => ['name' => 'Saho',                   'script' => 'Latn', 'native' => 'Saho', 'regional' => ''],
        //'sc'          => ['name' => 'Sardinian',              'script' => 'Latn', 'native' => 'sardu', 'regional' => 'sc_IT'],
        //'de-CH'       => ['name' => 'Swiss High German',      'script' => 'Latn', 'native' => 'Schweizer Hochdeutsch', 'regional' => 'de_CH'],
        //'gsw'         => ['name' => 'Swiss German',           'script' => 'Latn', 'native' => 'Schwiizertüütsch', 'regional' => ''],
        //'trv'         => ['name' => 'Taroko',                 'script' => 'Latn', 'native' => 'Seediq', 'regional' => ''],
        //'seh'         => ['name' => 'Sena',                   'script' => 'Latn', 'native' => 'sena', 'regional' => ''],
        //'nso'         => ['name' => 'Northern Sotho',         'script' => 'Latn', 'native' => 'Sesotho sa Leboa', 'regional' => 'nso_ZA'],
        //'st'          => ['name' => 'Southern Sotho',         'script' => 'Latn', 'native' => 'Sesotho', 'regional' => 'st_ZA'],
        //'tn'          => ['name' => 'Tswana',                 'script' => 'Latn', 'native' => 'Setswana', 'regional' => 'tn_ZA'],
        //'sq'          => ['name' => 'Albanian',               'script' => 'Latn', 'native' => 'shqip', 'regional' => 'sq_AL'],
        //'sid'         => ['name' => 'Sidamo',                 'script' => 'Latn', 'native' => 'Sidaamu Afo', 'regional' => 'sid_ET'],
        //'ss'          => ['name' => 'Swati',                  'script' => 'Latn', 'native' => 'Siswati', 'regional' => 'ss_ZA'],
        //'sk'          => ['name' => 'Slovak',                 'script' => 'Latn', 'native' => 'slovenčina', 'regional' => 'sk_SK'],
        //'sl'          => ['name' => 'Slovene',                'script' => 'Latn', 'native' => 'slovenščina', 'regional' => 'sl_SI'],
        //'so'          => ['name' => 'Somali',                 'script' => 'Latn', 'native' => 'Soomaali', 'regional' => 'so_SO'],
        //'sr-Latn'     => ['name' => 'Serbian (Latin)',        'script' => 'Latn', 'native' => 'Srpski', 'regional' => 'sr_RS'],
        //'sh'          => ['name' => 'Serbo-Croatian',         'script' => 'Latn', 'native' => 'srpskohrvatski', 'regional' => ''],
        //'fi'          => ['name' => 'Finnish',                'script' => 'Latn', 'native' => 'suomi', 'regional' => 'fi_FI'],
        //'sv'          => ['name' => 'Swedish',                'script' => 'Latn', 'native' => 'svenska', 'regional' => 'sv_SE'],
        //'sg'          => ['name' => 'Sango',                  'script' => 'Latn', 'native' => 'Sängö', 'regional' => ''],
        //'tl'          => ['name' => 'Tagalog',                'script' => 'Latn', 'native' => 'Tagalog', 'regional' => 'tl_PH'],
        //'tzm-Latn'    => ['name' => 'Central Atlas Tamazight (Latin)', 'script' => 'Latn', 'native' => 'Tamazight', 'regional' => ''],
        //'kab'         => ['name' => 'Kabyle',                 'script' => 'Latn', 'native' => 'Taqbaylit', 'regional' => 'kab_DZ'],
        //'twq'         => ['name' => 'Tasawaq',                'script' => 'Latn', 'native' => 'Tasawaq senni', 'regional' => ''],
        //'shi'         => ['name' => 'Tachelhit (Latin)',      'script' => 'Latn', 'native' => 'Tashelhit', 'regional' => ''],
        //'nus'         => ['name' => 'Nuer',                   'script' => 'Latn', 'native' => 'Thok Nath', 'regional' => ''],
        //'vi'          => ['name' => 'Vietnamese',             'script' => 'Latn', 'native' => 'Tiếng Việt', 'regional' => 'vi_VN'],
        //'tg-Latn'     => ['name' => 'Tajik (Latin)',          'script' => 'Latn', 'native' => 'tojikī', 'regional' => 'tg_TJ'],
        //'lu'          => ['name' => 'Luba-Katanga',           'script' => 'Latn', 'native' => 'Tshiluba', 'regional' => 've_ZA'],
        //'ve'          => ['name' => 'Venda',                  'script' => 'Latn', 'native' => 'Tshivenḓa', 'regional' => ''],
        //'tw'          => ['name' => 'Twi',                    'script' => 'Latn', 'native' => 'Twi', 'regional' => ''],
        //'tr'          => ['name' => 'Turkish',                'script' => 'Latn', 'native' => 'Türkçe', 'regional' => 'tr_TR'],
        //'ale'         => ['name' => 'Aleut',                  'script' => 'Latn', 'native' => 'Unangax tunuu', 'regional' => ''],
        //'ca-valencia' => ['name' => 'Valencian',              'script' => 'Latn', 'native' => 'valencià', 'regional' => ''],
        //'vai-Latn'    => ['name' => 'Vai (Latin)',            'script' => 'Latn', 'native' => 'Viyamíĩ', 'regional' => ''],
        //'vo'          => ['name' => 'Volapük',                'script' => 'Latn', 'native' => 'Volapük', 'regional' => ''],
        //'fj'          => ['name' => 'Fijian',                 'script' => 'Latn', 'native' => 'vosa Vakaviti', 'regional' => ''],
        //'wa'          => ['name' => 'Walloon',                'script' => 'Latn', 'native' => 'Walon', 'regional' => 'wa_BE'],
        //'wae'         => ['name' => 'Walser',                 'script' => 'Latn', 'native' => 'Walser', 'regional' => 'wae_CH'],
        //'wen'         => ['name' => 'Sorbian',                'script' => 'Latn', 'native' => 'Wendic', 'regional' => ''],
        //'wo'          => ['name' => 'Wolof',                  'script' => 'Latn', 'native' => 'Wolof', 'regional' => 'wo_SN'],
        //'ts'          => ['name' => 'Tsonga',                 'script' => 'Latn', 'native' => 'Xitsonga', 'regional' => 'ts_ZA'],
        //'dje'         => ['name' => 'Zarma',                  'script' => 'Latn', 'native' => 'Zarmaciine', 'regional' => ''],
        //'yo'          => ['name' => 'Yoruba',                 'script' => 'Latn', 'native' => 'Èdè Yorùbá', 'regional' => 'yo_NG'],
        //'de-AT'       => ['name' => 'Austrian German',        'script' => 'Latn', 'native' => 'Österreichisches Deutsch', 'regional' => 'de_AT'],
        //'is'          => ['name' => 'Icelandic',              'script' => 'Latn', 'native' => 'íslenska', 'regional' => 'is_IS'],
        //'cs'          => ['name' => 'Czech',                  'script' => 'Latn', 'native' => 'čeština', 'regional' => 'cs_CZ'],
        //'bas'         => ['name' => 'Basa',                   'script' => 'Latn', 'native' => 'Ɓàsàa', 'regional' => ''],
        //'mas'         => ['name' => 'Masai',                  'script' => 'Latn', 'native' => 'ɔl-Maa', 'regional' => ''],
        //'haw'         => ['name' => 'Hawaiian',               'script' => 'Latn', 'native' => 'ʻŌlelo Hawaiʻi', 'regional' => ''],
        //'el'          => ['name' => 'Greek',                  'script' => 'Grek', 'native' => 'Ελληνικά', 'regional' => 'el_GR'],
        //'uz'          => ['name' => 'Uzbek (Cyrillic)',       'script' => 'Cyrl', 'native' => 'Ўзбек', 'regional' => 'uz_UZ'],
        //'az-Cyrl'     => ['name' => 'Azerbaijani (Cyrillic)', 'script' => 'Cyrl', 'native' => 'Азәрбајҹан', 'regional' => 'uz_UZ'],
        //'ab'          => ['name' => 'Abkhazian',              'script' => 'Cyrl', 'native' => 'Аҧсуа', 'regional' => ''],
        //'os'          => ['name' => 'Ossetic',                'script' => 'Cyrl', 'native' => 'Ирон', 'regional' => 'os_RU'],
        //'ky'          => ['name' => 'Kyrgyz',                 'script' => 'Cyrl', 'native' => 'Кыргыз', 'regional' => 'ky_KG'],
        //'sr'          => ['name' => 'Serbian (Cyrillic)',     'script' => 'Cyrl', 'native' => 'Српски', 'regional' => 'sr_RS'],
        //'av'          => ['name' => 'Avaric',                 'script' => 'Cyrl', 'native' => 'авар мацӀ', 'regional' => ''],
        //'ady'         => ['name' => 'Adyghe',                 'script' => 'Cyrl', 'native' => 'адыгэбзэ', 'regional' => ''],
        //'ba'          => ['name' => 'Bashkir',                'script' => 'Cyrl', 'native' => 'башҡорт теле', 'regional' => ''],
        //'be'          => ['name' => 'Belarusian',             'script' => 'Cyrl', 'native' => 'беларуская', 'regional' => 'be_BY'],
        //'bg'          => ['name' => 'Bulgarian',              'script' => 'Cyrl', 'native' => 'български', 'regional' => 'bg_BG'],
        //'kv'          => ['name' => 'Komi',                   'script' => 'Cyrl', 'native' => 'коми кыв', 'regional' => ''],
        //'mk'          => ['name' => 'Macedonian',             'script' => 'Cyrl', 'native' => 'македонски', 'regional' => 'mk_MK'],
        //'mn'          => ['name' => 'Mongolian (Cyrillic)',   'script' => 'Cyrl', 'native' => 'монгол', 'regional' => 'mn_MN'],
        //'ce'          => ['name' => 'Chechen',                'script' => 'Cyrl', 'native' => 'нохчийн мотт', 'regional' => 'ce_RU'],
        //'ru'          => ['name' => 'Russian',                'script' => 'Cyrl', 'native' => 'русский', 'regional' => 'ru_RU'],
        //'sah'         => ['name' => 'Yakut',                  'script' => 'Cyrl', 'native' => 'саха тыла', 'regional' => ''],
        //'tt'          => ['name' => 'Tatar',                  'script' => 'Cyrl', 'native' => 'татар теле', 'regional' => 'tt_RU'],
        //'tg'          => ['name' => 'Tajik (Cyrillic)',       'script' => 'Cyrl', 'native' => 'тоҷикӣ', 'regional' => 'tg_TJ'],
        //'tk'          => ['name' => 'Turkmen',                'script' => 'Cyrl', 'native' => 'түркменче', 'regional' => 'tk_TM'],
        //'uk'          => ['name' => 'Ukrainian',              'script' => 'Cyrl', 'native' => 'українська', 'regional' => 'uk_UA'],
        //'cv'          => ['name' => 'Chuvash',                'script' => 'Cyrl', 'native' => 'чӑваш чӗлхи', 'regional' => 'cv_RU'],
        //'cu'          => ['name' => 'Church Slavic',          'script' => 'Cyrl', 'native' => 'ѩзыкъ словѣньскъ', 'regional' => ''],
        //'kk'          => ['name' => 'Kazakh',                 'script' => 'Cyrl', 'native' => 'қазақ тілі', 'regional' => 'kk_KZ'],
        //'hy'          => ['name' => 'Armenian',               'script' => 'Armn', 'native' => 'Հայերեն', 'regional' => 'hy_AM'],
        //'yi'          => ['name' => 'Yiddish',                'script' => 'Hebr', 'native' => 'ייִדיש', 'regional' => 'yi_US'],
        //'he'          => ['name' => 'Hebrew',                 'script' => 'Hebr', 'native' => 'עברית', 'regional' => 'he_IL'],
        //'ug'          => ['name' => 'Uyghur',                 'script' => 'Arab', 'native' => 'ئۇيغۇرچە', 'regional' => 'ug_CN'],
        //'ur'          => ['name' => 'Urdu',                   'script' => 'Arab', 'native' => 'اردو', 'regional' => 'ur_PK'],
        'ar'          => ['name' => 'Arabic',                 'script' => 'Arab', 'native' => 'العربية', 'regional' => 'ar_AE'],
        //'uz-Arab'     => ['name' => 'Uzbek (Arabic)',         'script' => 'Arab', 'native' => 'اۉزبېک', 'regional' => ''],
        //'tg-Arab'     => ['name' => 'Tajik (Arabic)',         'script' => 'Arab', 'native' => 'تاجیکی', 'regional' => 'tg_TJ'],
        //'sd'          => ['name' => 'Sindhi',                 'script' => 'Arab', 'native' => 'سنڌي', 'regional' => 'sd_IN'],
        //'fa'          => ['name' => 'Persian',                'script' => 'Arab', 'native' => 'فارسی', 'regional' => 'fa_IR'],
        //'pa-Arab'     => ['name' => 'Punjabi (Arabic)',       'script' => 'Arab', 'native' => 'پنجاب', 'regional' => 'pa_IN'],
        //'ps'          => ['name' => 'Pashto',                 'script' => 'Arab', 'native' => 'پښتو', 'regional' => 'ps_AF'],
        //'ks'          => ['name' => 'Kashmiri (Arabic)',      'script' => 'Arab', 'native' => 'کأشُر', 'regional' => 'ks_IN'],
        //'ku'          => ['name' => 'Kurdish',                'script' => 'Arab', 'native' => 'کوردی', 'regional' => 'ku_TR'],
        //'dv'          => ['name' => 'Divehi',                 'script' => 'Thaa', 'native' => 'ދިވެހިބަސް', 'regional' => 'dv_MV'],
        //'ks-Deva'     => ['name' => 'Kashmiri (Devaganari)',  'script' => 'Deva', 'native' => 'कॉशुर', 'regional' => 'ks_IN'],
        //'kok'         => ['name' => 'Konkani',                'script' => 'Deva', 'native' => 'कोंकणी', 'regional' => 'kok_IN'],
        //'doi'         => ['name' => 'Dogri',                  'script' => 'Deva', 'native' => 'डोगरी', 'regional' => 'doi_IN'],
        //'ne'          => ['name' => 'Nepali',                 'script' => 'Deva', 'native' => 'नेपाली', 'regional' => ''],
        //'pra'         => ['name' => 'Prakrit',                'script' => 'Deva', 'native' => 'प्राकृत', 'regional' => ''],
        //'brx'         => ['name' => 'Bodo',                   'script' => 'Deva', 'native' => 'बड़ो', 'regional' => 'brx_IN'],
        //'bra'         => ['name' => 'Braj',                   'script' => 'Deva', 'native' => 'ब्रज भाषा', 'regional' => ''],
        //'mr'          => ['name' => 'Marathi',                'script' => 'Deva', 'native' => 'मराठी', 'regional' => 'mr_IN'],
        //'mai'         => ['name' => 'Maithili',               'script' => 'Tirh', 'native' => 'मैथिली', 'regional' => 'mai_IN'],
        //'raj'         => ['name' => 'Rajasthani',             'script' => 'Deva', 'native' => 'राजस्थानी', 'regional' => ''],
        //'sa'          => ['name' => 'Sanskrit',               'script' => 'Deva', 'native' => 'संस्कृतम्', 'regional' => 'sa_IN'],
        //'hi'          => ['name' => 'Hindi',                  'script' => 'Deva', 'native' => 'हिन्दी', 'regional' => 'hi_IN'],
        //'as'          => ['name' => 'Assamese',               'script' => 'Beng', 'native' => 'অসমীয়া', 'regional' => 'as_IN'],
        //'bn'          => ['name' => 'Bengali',                'script' => 'Beng', 'native' => 'বাংলা', 'regional' => 'bn_BD'],
        //'mni'         => ['name' => 'Manipuri',               'script' => 'Beng', 'native' => 'মৈতৈ', 'regional' => 'mni_IN'],
        //'pa'          => ['name' => 'Punjabi (Gurmukhi)',     'script' => 'Guru', 'native' => 'ਪੰਜਾਬੀ', 'regional' => 'pa_IN'],
        //'gu'          => ['name' => 'Gujarati',               'script' => 'Gujr', 'native' => 'ગુજરાતી', 'regional' => 'gu_IN'],
        //'or'          => ['name' => 'Oriya',                  'script' => 'Orya', 'native' => 'ଓଡ଼ିଆ', 'regional' => 'or_IN'],
        //'ta'          => ['name' => 'Tamil',                  'script' => 'Taml', 'native' => 'தமிழ்', 'regional' => 'ta_IN'],
        //'te'          => ['name' => 'Telugu',                 'script' => 'Telu', 'native' => 'తెలుగు', 'regional' => 'te_IN'],
        //'kn'          => ['name' => 'Kannada',                'script' => 'Knda', 'native' => 'ಕನ್ನಡ', 'regional' => 'kn_IN'],
        //'ml'          => ['name' => 'Malayalam',              'script' => 'Mlym', 'native' => 'മലയാളം', 'regional' => 'ml_IN'],
        //'si'          => ['name' => 'Sinhala',                'script' => 'Sinh', 'native' => 'සිංහල', 'regional' => 'si_LK'],
        //'th'          => ['name' => 'Thai',                   'script' => 'Thai', 'native' => 'ไทย', 'regional' => 'th_TH'],
        //'lo'          => ['name' => 'Lao',                    'script' => 'Laoo', 'native' => 'ລາວ', 'regional' => 'lo_LA'],
        //'bo'          => ['name' => 'Tibetan',                'script' => 'Tibt', 'native' => 'པོད་སྐད་', 'regional' => 'bo_IN'],
        //'dz'          => ['name' => 'Dzongkha',               'script' => 'Tibt', 'native' => 'རྫོང་ཁ', 'regional' => 'dz_BT'],
        //'my'          => ['name' => 'Burmese',                'script' => 'Mymr', 'native' => 'မြန်မာဘာသာ', 'regional' => 'my_MM'],
        //'ka'          => ['name' => 'Georgian',               'script' => 'Geor', 'native' => 'ქართული', 'regional' => 'ka_GE'],
        //'byn'         => ['name' => 'Blin',                   'script' => 'Ethi', 'native' => 'ብሊን', 'regional' => 'byn_ER'],
        //'tig'         => ['name' => 'Tigre',                  'script' => 'Ethi', 'native' => 'ትግረ', 'regional' => 'tig_ER'],
        //'ti'          => ['name' => 'Tigrinya',               'script' => 'Ethi', 'native' => 'ትግርኛ', 'regional' => 'ti_ET'],
        //'am'          => ['name' => 'Amharic',                'script' => 'Ethi', 'native' => 'አማርኛ', 'regional' => 'am_ET'],
        //'wal'         => ['name' => 'Wolaytta',               'script' => 'Ethi', 'native' => 'ወላይታቱ', 'regional' => 'wal_ET'],
        //'chr'         => ['name' => 'Cherokee',               'script' => 'Cher', 'native' => 'ᏣᎳᎩ', 'regional' => ''],
        //'iu'          => ['name' => 'Inuktitut (Canadian Aboriginal Syllabics)', 'script' => 'Cans', 'native' => 'ᐃᓄᒃᑎᑐᑦ', 'regional' => 'iu_CA'],
        //'oj'          => ['name' => 'Ojibwa',                 'script' => 'Cans', 'native' => 'ᐊᓂᔑᓈᐯᒧᐎᓐ', 'regional' => ''],
        //'cr'          => ['name' => 'Cree',                   'script' => 'Cans', 'native' => 'ᓀᐦᐃᔭᐍᐏᐣ', 'regional' => ''],
        //'km'          => ['name' => 'Khmer',                  'script' => 'Khmr', 'native' => 'ភាសាខ្មែរ', 'regional' => 'km_KH'],
        //'mn-Mong'     => ['name' => 'Mongolian (Mongolian)',  'script' => 'Mong', 'native' => 'ᠮᠣᠨᠭᠭᠣᠯ ᠬᠡᠯᠡ', 'regional' => 'mn_MN'],
        //'shi-Tfng'    => ['name' => 'Tachelhit (Tifinagh)',   'script' => 'Tfng', 'native' => 'ⵜⴰⵎⴰⵣⵉⵖⵜ', 'regional' => ''],
        //'tzm'         => ['name' => 'Central Atlas Tamazight (Tifinagh)','script' => 'Tfng', 'native' => 'ⵜⴰⵎⴰⵣⵉⵖⵜ', 'regional' => ''],
        //'yue'         => ['name' => 'Yue',                    'script' => 'Hant', 'native' => '廣州話', 'regional' => 'yue_HK'],
        //'ja'          => ['name' => 'Japanese',               'script' => 'Jpan', 'native' => '日本語', 'regional' => 'ja_JP'],
        'zh'          => ['name' => 'Chinese (Simplified)',   'script' => 'Hans', 'native' => '简体中文', 'regional' => 'zh_CN'],
        //'zh-Hant'     => ['name' => 'Chinese (Traditional)',  'script' => 'Hant', 'native' => '繁體中文', 'regional' => 'zh_CN'],
        //'ii'          => ['name' => 'Sichuan Yi',             'script' => 'Yiii', 'native' => 'ꆈꌠꉙ', 'regional' => ''],
        //'vai'         => ['name' => 'Vai (Vai)',              'script' => 'Vaii', 'native' => 'ꕙꔤ', 'regional' => ''],
        //'jv-Java'     => ['name' => 'Javanese (Javanese)',    'script' => 'Java', 'native' => 'ꦧꦱꦗꦮ', 'regional' => ''],
        //'ko'          => ['name' => 'Korean',                 'script' => 'Hang', 'native' => '한국어', 'regional' => 'ko_KR'],
    ],
];
