<?php

namespace Classes;

use Interface\ISelectable;

/**
 * This class manages all of the data related to a guest. 
 * 
 * @var string $firstName the guest's first name
 * @var string $lastName the guest's last name
 * @var string $id the guest id from the json file
 * @var array $reservation the guest's reservation
 * 
 */

class Guest implements ISelectable
{
  private string $firstName;

  private string $lastName;

  private string $id;

  private array $reservation;

  function __construct( string $id, string $firstName, string $lastName, array $reservation)
  {

    $this->firstName = $firstName;

    $this->lastName = $lastName;

    $this->id = $id;

    $this->reservation = $reservation;

  }

  public function getRoomNumber() : string
  {
    return $this->reservation['roomNumber'];
  }

  public function getFullName() : string
  {
    return $this->firstName . ' ' . $this->lastName;
  }

   /**
   * This is one of the Selectable interface methods. This method returns the value that should be used
   *  for the select option's Label attribute. This will use the Guest's Full Name as the label, as well as
   *  the room number
   * 
   * @return string
   */
  public function getLabel(): string
  {
    return self::getFullName() . ' (RoomNo: ' . $this->reservation['roomNumber'] . ')';
  }

   /**
   * This is one of the Selectable interface methods. This method returns the value that should be used
   *  for the select option's Value attribute. This will use the Guest's name as the value
   * 
   * @return string
   */
  public function getValue(): string
  {
    return $this->id;
  }
}