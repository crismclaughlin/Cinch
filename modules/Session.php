<?php
/**
 * Session
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

namespace Session;

$session_data = array();

// Initialize the session
if (isset($_COOKIE[\Config\Session\NAME]))
{
	$cookie_data = $_COOKIE[\Config\Session\NAME];
	
	// Decrypt the session data if encryption is enabled
	if (\Config\Session\ENCRYPTED === TRUE)
		$cookie_data = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(\Config\Session\SECRET_KEY), base64_decode($cookie_data), MCRYPT_MODE_CBC, md5(md5(\Config\Session\SECRET_KEY))), "\0");

	$session_data = unserialize($cookie_data);
	
	// Validate the session
	if (!isset($session_data['ip_address']) ||
		!isset($session_data['user_agent']) ||
		!isset($session_data['last_accessed']))
		destroy();
	else if ($session_data['ip_address'] != ip2long(\Request\ip_address()) ||
	    trim($session_data['user_agent']) != trim(substr(\Request\user_agent(), 0, 120)) ||
		($session_data['last_accessed'] + \Config\Session\EXPIRATION) < time())
		destroy();
}

/**
 * Gets a value from the current session
 * @param string $key Key of the value to get
 * @return mixed Value based off of the given key; NULL if key doesn't exist
 */
function read($key)
{
	global $session_data;
	
	if (isset($session_data['data'][$key]))
		return $session_data['data'][$key];
	
	return NULL;
}

/**
 * Writes a value into the current session
 * @param string $key Key of the value to set
 */
function write($key, $value)
{
	global $session_data;
	$session_data['data'][$key] = $value;
}

/**
 * Saves the current session so it can be retrieved next request
 */
function save()
{
	global $session_data;

	// Only save session data if it exists
	if (!empty($session_data['data']))
	{
		// Generate a random session ID
		$session_id = '';
		while (!isset($session_id{32}))
			$session_id .= mt_rand(0, mt_getrandmax());
		
		$session_data['session_id'] = $session_id;
		$session_data['ip_address'] = ip2long(\Request\ip_address());
		$session_data['user_agent'] = trim(\Request\user_agent(), 0, 120);
		$session_data['last_accessed'] = time();
		
		$cookie_data = '';
		
		// Encrypt the session data if encryption is enabled
		if (\Config\Session\ENCRYPTED === TRUE)
			$cookie_data = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(\Config\Session\SECRET_KEY), serialize($session_data), MCRYPT_MODE_CBC, md5(md5(\Config\Session\SECRET_KEY))));
		else
			$cookie_data = serialize($session_data);
		
		setcookie(\Config\Session\NAME, $cookie_data, $session_data['last_accessed'] + \Config\Session\EXPIRATION, '/');
	}
}

/**
 * Destroys the current session
 */
function destroy()
{
	global $session_data;
	unset($session_data);
	
	setcookie(\Config\Session\NAME, '', time() - 86500);
}
