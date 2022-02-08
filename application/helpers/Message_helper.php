<?php 
define('DUPLICATE_RECORD', 'Duplicate record already found in the system.');
define('REQUIRED_FIELD', 'Please fill in required fields.');
define('PASSWORD_LENGTH', 'Password should not be less than 6 (six) characters long.');
define('NO_USERNAME_FOUND', 'Username not found.');
define('INVALID_USERNAME_PASSWORD', 'Invalid password.');
define('INVALID_PASSWORD', 'Invalid password.');
define('ACCOUNT_DISABLED', 'Account is currently disabled.');
define('SAVED_SUCCESSFUL', 'Details saved successfully.');
define('RENEW_SUCCESSFUL', 'Application successfully saved.');
define('CONFIRM_RENEWAL', 'Submit this application?');
define('NO_CRYPTO', 'No Cryptographically Secure Random Function Available.');
define('ERROR_API_KEY', 'Error validating security key.');
define('ERROR_PROCESSING', 'Error in processing');

define('DEFAULT_PASSWORD','Do not use the default password. Please create new password.');
define('NOT_MATCH','Your password does not match. Please try again.');
define('OR_NUMBER','This OR Number is already used.'); /** 01-15-2020  */
define('INVALID_OR', 'Please double check your OR Number');

define('TABLE',[
    'accountable'   =>  'tbl_accountable_form',
    'bank'          =>  'tbl_banks',
    'bVerification' =>  'tbl_bank_verification',
    'cItems'        =>  'tbl_business_col_items',
    'cTickets'      =>  'tbl_cash_tickets',
    'certificate'   =>  'tbl_certificates',
    'cheque'        =>  'tbl_cheque', 
    'cedula'        =>  'tbl_collection_cedula',
    'cType'         =>  'tbl_collection_type',
    'collector'     =>  'tbl_collector',
    'department'    =>  'tbl_departments',
    'gCollection'   =>  'tbl_group_collection',
    'module'        =>  'tbl_modules',
    'oAccounts'     =>  'tbl_online_accounts',
    'oPayment'      =>  'tbl_online_payment', 
    'orderPayment'  =>  'tbl_order_payment',
    'orType'        =>  'tbl_or_type', 
    'particular'    =>  'tbl_particular',
    'pPaid'         =>  'tbl_particular_paid',
    'payer'         =>  'tbl_payer',
    'payment'       =>  'tbl_payment',
    'pVerification' =>  'tbl_payment_verification',
    'permission'    =>  'tbl_permission', 
    'position'      =>  'tbl_position', 
    'purchased'     =>  'tbl_purchased_or', 
    'remitSched'    =>  'tbl_remit_schedule', 
    'rptCollection' =>  'tbl_rpt_collection',
    'tempPayment'   =>  'tbl_temporary_payment', 
    'users'         =>  'tbl_users', 
    'uModule'       =>  'tbl_user_modules'
]);

define('OFFICE','ALL');
define('OFFICE_R',[
    'ALL' =>
    [
        'FORM' => [
            '52', '53', '54', '57',
        ],
        'LONG' => 'All OFFICE' 
    ],    
    'DEFAULT' =>
    [
        'FORM' => [
            '51'
        ],
        'LONG' => 'DEFAULT OFFICE' 
    ],
    'CITY_VET' => 
        [
           'FORM' => [
               '52', 
               '53',    
            ],
           'CERTIFICATES' => [
                '52' => [
                    'CERTIFICATE 1'
                ]
                , 
                '53' => [
                    'CERTIFICATE 2'
                ],    
            ],
            'LONG' => 'CITY VETERINARY OFFICE'
        ],
    'LCR' => 
    [
        'FORM' => [
            '54',
        ],
        'CERTIFICATES' => [
            '54' => [
                'marriage_certificate',
                'marriage_solemnization',
            ]            
        ],
        'LONG' => 'LCR OFFICE'  
    ],
    'SLAUGHTER' => 
    [
        'FORM' => [
            '57',
        ],
        'LONG' => 'SLAUTHER OFFICE' 
    ],
    'PORT' =>
    [
        'FORM' => [
            '51'
        ],
        'CERTIFICATES' => [
            '51' => [
                'CERTIFICATE 1'
            ]
        ],
        'LONG' => 'PORT COLLECTION'
    ],
]);
