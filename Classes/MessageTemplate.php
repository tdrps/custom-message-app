<?php

namespace Classes;

use Interface\ISelectable;

/**
 * Class MessageTemplate
 * 
 * This class encapsulates the templated message object. It manages the logic for generating and replacing variables
 * within it's template fields
 * 
 * @var string $template The message template
 */

class MessageTemplate implements ISelectable
{

  private string $messageTemplate;

  private string $name;

  private string $id;

  public function __construct( string $id, string $name, string $messageTemplate)
  {

    $this->messageTemplate = $messageTemplate;

    $this->name = $name;

    $this->id = $id;

  }

  /**
   * This function uses the objects message template and string variables to build a message.
   * 
   * @param string $guestName The Guest's full name
   * @param string $companyName The Company's name
   * 
   * @return string The built message 
   */
  public function render($vars) : string
  {

    return strtr($this->messageTemplate, $vars);

  }

  /**
   * This is one of the Selectable interface methods. This method returns the value that should be used
   *  for the select option's Label attribute. This will use the Template's name as the label
   * 
   * @return string
   */
  public function getLabel(): string
  {
    return $this->name;
  }

   /**
   * This is one of the Selectable interface methods. This method returns the value that should be used
   *  for the select option's value attribute. This will use the Template's id as the value
   * 
   * @return string
   */
  public function getValue(): string
  {
    return $this->id;
  }

}