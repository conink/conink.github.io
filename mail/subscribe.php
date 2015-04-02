<?php
$api_key = "f108960360f2a8aa585630bb4c907a04-us10";
$list_id = "10f9345499";

require('../mailchimp/Mailchimp.php');
$Mailchimp = new Mailchimp( $api_key );
$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );

if( empty($_POST['email']) ||
    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
	     echo "No arguments Provided!";
	    return false;
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

?>
