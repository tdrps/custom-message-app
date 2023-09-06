<?php

include './Classes/JsonImporter.php';

use Classes\CompanyJsonImporter;
use Classes\MessageTemplateJsonImporter;
use Classes\GuestJsonImporter;
use Classes\MessageTemplate;
use Classes\Greeting;

// Autoload classes
spl_autoload_register(function ($name) {
  // use namespace as directory
  list($dir, $fname) = explode('\\', $name);
  include $dir . '/' . $fname . '.php';

});

//Define constants for message String replacement
const GUEST_NAME_PLACEHOLDER = '{$guest}';

const COMPANY_NAME_PLACEHOLDER = '{$company}';

const GREETING_PLACEHOLDER = '{$greeting}';

const ROOMNUMBER_PLACEHOLDER = '{$roomNumber}';


// Get the full lists of guests/companies/messageTemplates
$guests = GuestJsonImporter::JsonDataToObjectList('./Data/Guests.json');
$companies = CompanyJsonImporter::JsonDataToObjectList('./Data/Companies.json');
$messageTemplates = MessageTemplateJsonImporter::JsonDataToObjectList('./Data/Templates.json');


/**
 * This function is called when the form is submitted. It handles the logic for building 
 * the message from the url parameters
 * 
 */
function buildMessage()
{
  try
  {
    // Get params from url
    $message_template_id = htmlspecialchars($_GET['template']);

    $guest_id = htmlspecialchars($_GET['guest']); 

    $company_id = htmlspecialchars($_GET['company']);

    $custom_message = htmlspecialchars($_GET['custom-message'], ENT_COMPAT);

  }
  catch (Exception $e)
  {
    echo '<script>alert(' . $e->getMessage() . ')</script>';
  }


  // Reference global variables - full lists of all objects
  global $guests;
  global $companies;
  global $messageTemplates;

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
  
  $vars = [
    COMPANY_NAME_PLACEHOLDER => !is_null($company) ? $company->getName() : '',
    GUEST_NAME_PLACEHOLDER => !is_null($guest)? $guest->getFullName() : '',
    GREETING_PLACEHOLDER => Greeting::getTimeAppropriateGreeting(),
    ROOMNUMBER_PLACEHOLDER => !is_null($guest)? $guest->getRoomNumber() : ''
  ];

  // Create the message
  $rendered_message = $messageTemplate->render( $vars );

  // Send the message
  sendMessage( $rendered_message );
  
}

function sendMessage( string $rendered_message )
{
  echo '<script>alert("Send the following Message:\n' .  $rendered_message . '");</script>';
}