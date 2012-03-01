<?php
/**
 * Cinch Framework
 * 
 * A simple, procedural, non-OOP MVC framework for PHP
 * 
 * @package   Cinch
 * @author    Cris McLaughlin
 * @version   1.0
 * @copyright Copyright (C) 2012 Cris McLaughlin
 * 
 * MIT License
 * 
 * Copyright (C) 2012 Cris McLaughlin
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
 * Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN
 * AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

/**
 * Defines the run mode of Cinch
 * 
 * Usage:
 *  development - Reports all errors and warnings; Useful this for debugging.
 *  production  - Reports nothing and increases performance.
 */
define('DEBUGGING_ON', TRUE);

/**
 * WARNING! DO NOT EDIT ANYTHING BELOW
 */
if (defined('DEBUGGING_ON'))
{
	switch (DEBUGGING_ON)
	{
		case TRUE:
			error_reporting(E_ALL | E_STRICT);
			break;
		case FALSE:
			error_reporting(0);
			break;
		default:
			exit("Cinch isn't setup properly; please check your configuration.");
	}

	// Define where Cinch controllers should reside
	$cinch_base_directory = dirname(__FILE__);
	define('CONTROLLERS_DIR', $cinch_base_directory . '/controllers/');
	define('MODULES_DIR', $cinch_base_directory . '/modules/');
	define('MODELS_DIR', $cinch_base_directory . '/models/');
	define('VIEWS_DIR', $cinch_base_directory . '/views/');
	
	// Load Cinch libraries
	require 'cinch/Config.php';
	require 'cinch/Uri.php';
	require 'cinch/Request.php';
	require 'cinch/Load.php';
	require 'cinch/Router.php';
	
	// Check if the session module is loaded and requires autosaving
	if (\Load\is_modules_loaded('session') &&
		\Config\Session\AUTOSAVE === TRUE)
		\Session\save();
}