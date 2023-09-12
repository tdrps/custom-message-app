<?php

include './autoloader.php';

use Classes\MessageTemplate;
use Classes\Greeting;

/**
 * This script is called when the form is submitted via AJAX. It handles the logic for building 
 * the message from the form inputs and echoes the message to the client.
 * 
 */

session_start();

//Define constants for message String replacement
const GUEST_NAME_PLACEHOLDER = '{$guest}';

const COMPANY_NAME_PLACEHOLDER = '{$company}';

const GREETING_PLACEHOLDER = '{$greeting}';

const ROOMNUMBER_PLACEHOLDER = '{$roomNumber}';

try
{
  // Get params from post body
  $message_template_id = htmlspecialchars($_POST['template']);

  $guest_id = htmlspecialchars($_POST['guest']); 

  $company_id = htmlspecialchars($_POST['company']);

  $custom_message = htmlspecialchars($_POST['custom-message'], ENT_COMPAT);

}
catch (Exception $e)
{
  echo '<script>alert(' . $e->getMessage() . ')</script>';
}

// Reference session variables - full lists of all objects
$guests = $_SESSION['guests'];
$companies = $_SESSION['companies'];
$messageTemplates = $_SESSION['messageTemplates'];

// if the user chooses a preexisting message template, use that message template, otherwise, use the url param message
if($message_template_id === '-1')
{
  $messageTemplate = new MessageTemplate('', '', $custom_message);
}
else
{
  $messageTemplate = $messageTemplates[$message_template_id];
}

// Get the specific guest and company
$guest = $guests[$guest_id];

$company = $companies[$company_id];

//build the word replacement map
$vars = [
  COMPANY_NAME_PLACEHOLDER => !is_null($company) ? $company->getName() : '',
  GUEST_NAME_PLACEHOLDER => !is_null($guest)? $guest->getFullName() : '',
  GREETING_PLACEHOLDER => Greeting::getTimeAppropriateGreeting(),
  ROOMNUMBER_PLACEHOLDER => !is_null($guest)? $guest->getRoomNumber() : ''
];

// Create the message
$rendered_message = $messageTemplate->render( $vars );

echo $rendered_message;
