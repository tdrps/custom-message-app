<?php

namespace Classes;

use Interface\ISelectable;

/**
 * 
 * This class encapsulates everything related to a Company object.
 * 
 * @var string $name the name of the company
 * @var string $id the id of teh company from the json file
 * @var string $city the name of the company's city
 * @var string $timezone the timezone of the company
 * 
 */

class Company implements ISelectable
{
  private string $name;
  private string $id;
  private string $city;
  private string $timezone;

  function __construct( string $id, string $name, string $city, string $timezone)
  {
    $this->name = $name;
    $this->id = $id;
    $this->city = $city;
    $this->timezone = $timezone;
  }

  public function getCity(): string
  {
    return $this->city;
  }

  public function getTimezone(): string
  {
    return $this->timezone;
  }

  public function getName(): string
  {
    return $this->name;
  }

   /**
   * This is one of the Selectable interface methods. This method returns the value that should be used
   *  for the select option's Label attribute. This will use the Company's name as the label
   * 
   * @return string
   */
  public function getLabel(): string
  {
    return $this->name;
  }

   /**
   * This is one of the Selectable interface methods. This method returns the value that should be used
   *  for the select option's value attribute. This will use the Company's id as the value
   * 
   * @return string 
   */
  public function getValue(): string
  {
    return $this->id;
  }
}