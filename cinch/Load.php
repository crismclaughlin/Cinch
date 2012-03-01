<?php
/**
 * Loader
 * 
 * @package Cinch
 * @author  Cris McLaughlin
 * @version 1.0
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

namespace Load;

$loaded_modules = array();

/**
 * Loads a module
 * @param string $name Name of the module not including the extension
 */
function module($name)
{
	global $loaded_modules;
	if (in_array($name, $loaded_modules))
		return;
	
	include MODULES_DIR . $name . '.php';
	$loaded_modules[] = $name;
}

/**
 * Gets if a module is already loaded
 * @return bool TRUE if the module is already loaded; FALSE otherwise
 */
function is_module_loaded($name)
{
	global $loaded_modules;
	return in_array($name, $loaded_modules);
}

/**
 * Loads a model
 * @param string $name Name of the model not including 'Model' and the extension
 */
function model($name)
{
	include MODELS_DIR . $name . 'model.php';
}

/**
 * Loads a view
 * @param string $name Name of the view not including 'View' and the extension
 * @param array $data Data passed to the view
 */
function view($name, $data = array())
{
	extract($data);
	include VIEWS_DIR . $name . 'view.php';
}