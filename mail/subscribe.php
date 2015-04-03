<?php

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

if (is_ajax()) {

$api_key = "f108960360f2a8aa585630bb4c907a04-us10";
$list_id = "10f9345499";

require('../mailchimp/Mailchimp.php');
$Mailchimp = new Mailchimp( $api_key );
$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );

IF( EMPTY($_POST['EMAIL']) ||
    !FILTER_VAR($_POST['EMAIL'],FILTER_VALIDATE_EMAIL))
    {
	     ECHO "NO ARGUMENTS PROVIDED!";
	    RETURN FALSE;
    }

$email_address = $_POST['email'];

$subscriber = $Mailchimp_Lists->subscribe( $list_id, array( 'email' => htmlentities($email_address) ) );

if ( ! empty( $subscriber['leid'] ) ) {
   echo "success";
}
else
{
    echo "fail";
}
}
?>
