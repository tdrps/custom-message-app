<?php

namespace Classes;
/**
 * This class encapsulates everything about greetings, how they are constructed and used
 * 
 * 
 */
class Greeting
{
  /**
   * This function returns a different greeting string based on the time of day
   * 
   * @return string The time appropriate greeting
   */
  public static function getTimeAppropriateGreeting(string $timezoneId = 'America/Chicago') : string
  {
    //Set timezone
    date_default_timezone_set($timezoneId);

    // get current Hour(24 hour clock)
    $hour = date('H');

    $greeting = ($hour > 17) ? "Good evening" : (($hour > 12) ? "Good afternoon" : "Good morning");
    
    return $greeting;
  }
}