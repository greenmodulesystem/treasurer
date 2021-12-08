<?php
/*
|--------------------------------------------------------------------------
| Project Information
|--------------------------------------------------------------------------
|
| Use this file to keep information regarding the project.
| Information such as the default password, cycle date and system
| should be stored here.
|
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Default Password
|--------------------------------------------------------------------------
*/
$config['default_password'] = 'password1234';

/*
|--------------------------------------------------------------------------
| Cycle Date
|--------------------------------------------------------------------------
*/
$config['cycle_date'] = date('Y');

/*
|--------------------------------------------------------------------------
| System Name
|--------------------------------------------------------------------------
*/
$config['system_name'] = "<b>Business Licensing</b> Information System";
$config['system_name_short'] = "<b>BL</b>IS";
$config['system_tab_name'] = "Business Licensing Information System";
$config['socket_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/bplo/';


/*
|--------------------------------------------------------------------------
| Version
|--------------------------------------------------------------------------
*/
$config['version'] = "1.1.1";

/*
|--------------------------------------------------------------------------
| API path
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Hash key
|--------------------------------------------------------------------------
*/
$config['hash_key'] = '03b13e00c0d132dbff8b1e9a0c03c9ad6dbe0da6';

$config['department_short'] = "Collector";
$config['department_long'] = "Treasurer's Office - Collectors";