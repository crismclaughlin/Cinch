<?php
/**
 * Config
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

/**
 * Router configuration
 */
namespace Config\Router
{
	/**
	 * The default route if no controller is found in the URI
	 */
	const DEFAULT_ROUTE = 'Home';
	
	/**
	 * Gets a list of custom routes
	 * 
	 * Usage:
	 *  Key   = route with regex
	 *  Value = controller/action
	 * 
	 * Example:
	 *  'inventory/(\\d)/([A-Za-z\\-0-9]+)' => 'inventory/view/$1'
	 */
	function route_array()
	{
		return array();
	}
}

/**
 * Session configuration
 */
namespace Config\Session
{
	/**
	 * Name of the session cookie
	 */
	const NAME = 'cinch_cookie';
	
	/**
	 * Time in seconds until the session will expire
	 */
	const EXPIRATION = 7200;
	
	/**
	 * TRUE if the session should be encrypted; FALSE otherwise
	 */
	const ENCRYPT =	TRUE;
	
	/**
	 * Secret key used to encrypt the session; Please change this
	 */
	const SECRET_KEY = '!@#C|-|aNg3M3n0w*';
	
	/**
	 * TRUE if the session should autosave itself at the end of every request; FALSE otherwise
	 */
	const AUTOSAVE = TRUE;
}
