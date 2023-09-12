<?php

// Autoload classes
/**
 * This file serves to replace multiple include statements across various php files.
 * 
 * We call the autoload method as a last attempt to include the necessary class files. The include statements
 *  are build using the namespace as the directory so files in the Classes namespace must be located in the 
 *  Classes directory, for example
 */
spl_autoload_register(function ($name) {
  // use namespace as directory
  list($dir, $fname) = explode('\\', $name);
  include $dir . '/' . $fname . '.php';

});