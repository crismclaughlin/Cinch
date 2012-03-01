<?php
/**
 * Router
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

namespace Router;

// Load the default route if no request URI segments exist
if (\Uri\segment_count() == 0)
{
	include CONTROLLERS_DIR . \Config\Router\DEFAULT_ROUTE . 'controller.php';

	if (function_exists(\Config\Router\DEFAULT_ROUTE . 'controller\\index'))
		call_user_func(\Config\Router\DEFAULT_ROUTE . 'controller\\index');
}
else
{
	$controller = \Uri\segment(1);
	include CONTROLLERS_DIR . $controller . 'controller.php';
	
	// Load the default action if no controller action is specified
	if (\Uri\segment_count() == 1)
	{
		if (function_exists($controller . 'controller\\index'))
			call_user_func($controller . 'controller\\index');
	}
	else
	{
		$action = \Uri\segment(2);
		if (function_exists($controller . 'controller\\' . $action))
			call_user_func_array($controller . 'controller\\' . $action, array_slice(\Uri\segment_array(), 2));
	}
}