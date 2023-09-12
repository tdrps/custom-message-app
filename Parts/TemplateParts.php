<?php

namespace Parts;

use Interface\Selectable;

class TemplateParts
{
  /**
   * This static function returns an html select element wrapped in a column
   * 
   * @param array $selectables An array of objects that implement the ISelectable interface
   * @param string $name The name of the select field
   * 
   * @return void
   */
  public static function customSelect(array $selectables, string $name)
  {
    
    echo '<div class="form-group | d-flex flex-column">';
    echo '<label for="' . $name . '-select">Choose ' .  $name . '</label>';
    echo '<select id="' . $name . '-select" name="' . $name . '">';
    foreach($selectables as $selectable){
      echo '<option value="' . $selectable->getValue() . '">' . $selectable->getLabel() . '</option>';
    }
    echo '</select>';
    echo '</div>';
    
  }


  public static function customTextArea($id)
  {
    echo '<div class="form-group">';
    echo '<label for="' . $id . '">Enter Custom Message Template</label>';
    echo '<textarea class="form-control" id="' . $id . '" name="custom-message" rows="3"></textarea>';
    echo '</div>';
  }
}
?>

