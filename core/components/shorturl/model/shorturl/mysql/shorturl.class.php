<?php
/**
 * @package shorturl
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/shorturl.class.php');
class shortUrl_mysql extends shortUrl {}
?>