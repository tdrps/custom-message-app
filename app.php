<?php

include './Classes/JsonImporter.php';
include './autoloader.php';

use Classes\CompanyJsonImporter;
use Classes\MessageTemplateJsonImporter;
use Classes\GuestJsonImporter;

session_start();

// Get the full lists of guests/companies/messageTemplates
$guests = GuestJsonImporter::JsonDataToObjectList('./Data/Guests.json');
$companies = CompanyJsonImporter::JsonDataToObjectList('./Data/Companies.json');
$messageTemplates = MessageTemplateJsonImporter::JsonDataToObjectList('./Data/Templates.json');

// Set session data
$_SESSION['guests'] = $guests;
$_SESSION['companies'] = $companies;
$_SESSION['messageTemplates'] = $messageTemplates;
