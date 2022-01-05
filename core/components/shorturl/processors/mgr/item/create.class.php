<?php
/**
 * Create an Item
 *
 * @package shorturl
 * @subpackage processors
 */
class ShortUrlCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'ShortUrlItem';
    public $languageTopics = array('shorturl:default');
    public $objectType = 'shorturl.items';

    public function beforeSet(){
        $url = $this->getProperty('url');

        if (empty($url)) {
            $this->addFieldError('url', $this->modx->lexicon('shorturl.item_err_ns_url'));
        }

        $shortUrl = new ShortUrl($this->modx);

        $this->setProperty('url', $url);
        $this->setProperty('short', $shortUrl->createShortUrl());

        return parent::beforeSet();
    }
}
return 'ShortUrlCreateProcessor';
