<?php

/* 
3
* PayPal and database configuration 
4
*/ 
// PayPal configuration 

 define('PAYPAL_ID', 'sb-8iprx6444074@business.example.com'); 

 define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 


 define('PAYPAL_RETURN_URL', 'http://www.example.com/success.php'); 

 define('PAYPAL_CANCEL_URL', 'http://www.example.com/cancel.php'); 

 define('PAYPAL_NOTIFY_URL', 'http://www.example.com/ipn.php'); 

 define('PAYPAL_CURRENCY', 'MYR'); 


 // Database configuration 

 define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'bytecode_dercs');
define('DB_USER', 'root');
define('DB_PASS', '');
 // Change not required 

 define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

?>