<?php
/**
 * @package shorturl
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/shorturlitem.class.php');
class ShortUrlItem_mysql extends ShortUrlItem {}
?>