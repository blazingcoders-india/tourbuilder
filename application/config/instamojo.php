<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* instamojo payment API v1 library for CodeIgniter
*
* @license Creative Commons Attribution 3.0 <http://creativecommons.org/licenses/by/3.0/>
* @version 1.0
* @author Rajeev bbqq <https://github.com/rajeevbbqq>
* @copyright Copyright (c) 2018, Rajeev bbqq
*/

/*
|--------------------------------------------------------------------------
| Mode
|--------------------------------------------------------------------------
|
| $config['mojo_mode'] = 'sandbox'; for testing
| $config['mojo_mode'] = 'live'   ; for production
|
*/


$config['mojo_mode']  = 'sandbox' ;


/*
|--------------------------------------------------------------------------
| API_KEY
|--------------------------------------------------------------------------
| API_KEY are different for test and production !
| $config['mojo_apikey'] = '650f7eed3d900273d6fafd635a';
|
*/

$config['mojo_apikey'] = 'e79f4477c14f57d0762fd899cd47ccca' ;


/*
|--------------------------------------------------------------------------
| AUTH_TOKEN
|--------------------------------------------------------------------------
| AUTH_TOKEN are different for test and production !
| $config['mojo_token'] = '650f7eed3d900273d6fafd635a';
|
*/


$config['mojo_token']  = '5bc67b1aa6d3815f893f53c3b75618e6' ;


/*
|--------------------------------------------------------------------------
| REDIRECT_URL
|--------------------------------------------------------------------------
| Set redirect url !
| $config['mojo_url'] = 'https://github.com/Instamojo/instamojo-php';
|
*/

$config['mojo_url'] = 'https://test.instamojo.com/api/1.1/payment-requests/';


/*
|--------------------------------------------------------------------------
| DATABASE
|--------------------------------------------------------------------------
| Creates a 'mojo' table and store all orders, if set to true
|
*/

$config['mojo_db']  = true ;


/*
|--------------------------------------------------------------------------
| TABE NAME
|--------------------------------------------------------------------------
| Creates table if $config['mojo_db']  = true ;
|
*/

$config['mojo_table']  = 'table_name' ;


/* End of file instamojo.php */
/* Location: ./application/config/instamojo.php */
