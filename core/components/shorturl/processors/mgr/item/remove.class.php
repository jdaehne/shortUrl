<?php
/**
 * Remove an Item.
 *
 * @package shorturl
 * @subpackage processors
 */
class ShortUrlRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'ShortUrlItem';
    public $languageTopics = array('shorturl:default');
    public $objectType = 'shorturl.items';
}
return 'ShortUrlRemoveProcessor';
