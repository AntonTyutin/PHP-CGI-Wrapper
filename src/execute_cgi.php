<?php

/*
 * PHP CGI Wrapper
 *     by Frank Usrs
 *
 * This script is a wrapper for running CGI scripts through PHP. For
 * help and support, consult the included README file and/or visit
 * the GitHub project page:
 *
 * https://github.com/frankusrs/PHP-CGI-Wrapper
 *
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://sam.zoy.org/wtfpl/COPYING for more details.
 */

require_once __DIR__ . '/PHP_CGI_Wrapper.php';

function execute_cgi($script) {
	$cgi = new PHP_CGI_Wrapper($script);
	$cgi->run();
	exit;
}

// If $_SERVER['DOCUMENT_PATH'], a non-standard environment value, is set, then
// assume we're acting like a handler for CGI scripts in a web server setup.
if (isset($_SERVER['DOCUMENT_PATH'])) {
	chdir(dirname($_SERVER['DOCUMENT_PATH']));
	execute_cgi(escapeshellarg($_SERVER['DOCUMENT_PATH']));
}
