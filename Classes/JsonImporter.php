<?php

namespace Classes;

abstract class JsonImporter
{
  /**
   * This function imports data from a json file and returns an associative array.
   * 
   * @param string $jsonFilePath : The path to the json file
   * @return array : the array of values from the json file
   */
  public static function importJsonData($jsonFilePath) : array | bool
  {
    // Check if the file exists
    if (!file_exists($jsonFilePath)) {
      return false; // Return false if the file doesn't exist
    }

    // Read the JSON file content
    $jsonContent = file_get_contents($jsonFilePath);

    // Attempt to decode the JSON data into an associative array
    $jsonData = json_decode($jsonContent, true);

    // Check if JSON decoding was successful
    if ($jsonData === null) {
      return false; // Return false if decoding failed
    }

    return $jsonData; // Return the decoded data as an associative array
  }

  public abstract static function JsonDataToObjectList(string $jsonFilePath) : array;
  
}


/**
 * This class manages the import of Companies from a json file into COmpany objects
 */
class CompanyJsonImporter extends JsonImporter
{
  public static function JsonDataToObjectList(string $jsonFilePath): array
  {
    $companiesArr = self::importJsonData($jsonFilePath);

    $companies = [];

    foreach ($companiesArr as $companyRow) {
      $companies[$companyRow['id']] = new Company(
        $companyRow['id'],
        $companyRow['company'],
        $companyRow['city'],
        $companyRow['timezone']
      );
    }

    return $companies;
  }
}

/**
 * This class manages the import of Guests from a json file into Guest objects
 */
class GuestJsonImporter extends JsonImporter
{
  public static function JsonDataToObjectList(string $jsonFilePath) : array
  {
    $guestsArr = self::importJsonData($jsonFilePath);

    $guests = [];

    foreach ($guestsArr as $guestRow) {
      $guests[$guestRow['id']] = new Guest(
        $guestRow['id'],
        $guestRow['firstName'],
        $guestRow['lastName'],
        $guestRow['reservation']
      );
    }

    return $guests;
  }
}

/**
 * This class manages the import of Message Templates from a json file into MessageTemplate objects
 */
class MessageTemplateJsonImporter extends JsonImporter
{
  public static function JsonDataToObjectList(string $jsonFilePath): array
  {

    $templatesArr = self::importJsonData($jsonFilePath);

    $templates = [];

    foreach ($templatesArr as $templateRow) {
      $templates[$templateRow['id']] = new MessageTemplate(
        $templateRow['id'],
        $templateRow['name'],
        $templateRow['message']
      );
    }

    return $templates;
  }
}
