<?php
/**
 * URI
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

namespace Uri;

// Parses the request URI and populates objects
$request_uri = trim($_SERVER['REQUEST_URI'], '/');
$segments_array = array_filter(explode('/', $request_uri));
$segments_count = count($segments_array);

/**
 * Gets a request URI segment
 * @param  int $index Request segment index
 * @return string Request URI segment
 */
function segment($index)
{
	global $segments_array, $segments_count;
	if ($index <= $segments_count)
		return $segments_array[$index - 1];
	
	return NULL;
}

/**
 * Gets the request URI string
 * @return string Request URI string
 */
function segment_string()
{
	global $request_uri;
	return $request_uri;
}

/**
 * Gets all request URI segments as an array
 * @return array All request URI segments
 */
function segment_array()
{
	global $segments_array;
	return $segments_array;
}

/**
 * Gets the request URI segment count
 * @return int Request URI segment count
 */
function segment_count()
{
	global $segments_count;
	return $segments_count;
}
