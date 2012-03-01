<?php
/**
 * Request
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

namespace Request;

/**
 * Gets the value of a POST variable
 * @param string $key Key of the POST variable
 * @return mixed Value of the POST variable if populated; NULL otherwise
 */
function post($key)
{
	if (isset($_POST[$key]))
		return $_POST[$key];
	
	return NULL;
}

/**
 * Gets the value of a GET variable
 * @param string $key Key of the GET variable
 * @return mixed Value of the GET variable if populated; NULL otherwise
 */
function get($key)
{
	if (isset($_GET[$key]))
		return $_GET[$key];
	
	return NULL;
}

/**
 * Gets the value of a SERVER variable
 * @param string $key Key of the SERVER variable
 * @return mixed Value of the SERVER variable if populated; NULL otherwise
 */
function server($key)
{
	if (isset($_SERVER[$key]))
		return $_SERVER[$key];
	
	return NULL;
}

/**
 * Gets the IP address of the user viewing the page
 * @return string IP address of the user viewing the page
 */
function ip_address()
{
	return $_SERVER['REMOTE_ADDR'];
}

/**
 * Gets the content of the User-Agent header
 * @return string Content of the User-Agent header
 */
function user_agent()
{
	return $_SERVER['HTTP_USER_AGENT'];
}

/**
 * Gets if the current request method is of type POST
 * @return bool TRUE if the request method is of type POST; FALSE otherwise
 */
function is_post()
{
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Gets if the current request method is of type GET
 * @return bool TRUE if the request method is of type GET; FALSE otherwise
 */
function is_get()
{
	return $_SERVER['REQUEST_METHOD'] == 'GET';
}

/**
 * Gets if the current request is secure
 * @return bool TRUE if the request is secure; FALSE otherwise
 */
function is_secure()
{
	return !empty($_SERVER['HTTPS']) &&
		   $_SERVER['HTTPS'] !== 'off';
}

/**
 * Gets if the current request was made via AJAX (Asynchronous JavaScript and XML)
 * @return bool TRUE if the request was made via AJAX; FALSE otherwise
 */
function is_ajax()
{
	return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
		   strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
