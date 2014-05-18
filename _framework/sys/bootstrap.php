<?php defined('APPPATH') or die('No direct script access.');
/**
 * TROLL process switch file, initiated by root index.php file.
 */

define('TROLL_VERSION',  '3.0');

// Detect Windows
define('WINDOWS_PLATFORM', DIRECTORY_SEPARATOR === '\\');

// Load core files
// TODO either do something with the Troll class or remove it
require SYSPATH.'core/Troll.php';
final class Troll extends Troll_Core {}