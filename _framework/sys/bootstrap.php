<?php
/**
 * Mouse CMS process switch file, initiated by root index.php file.
 */

define('TROLL_VERSION',  '3.0');

// Test of Mouse CMS is running in Windows
define('MOUSE_IS_WIN', DIRECTORY_SEPARATOR === '\\');

// Load core files
require SYSPATH.'core/Troll.php';
final class Troll extends Troll_Core {}