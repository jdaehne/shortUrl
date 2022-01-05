<?php
/**
 * Update an Item
 *
 * @package shorturl
 * @subpackage processors
 */
class ShortUrlUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'ShortUrlItem';
    public $languageTopics = array('shorturl:default');
    public $objectType = 'shorturl.items';

    public function beforeSet(){
        $url = $this->getProperty('url');
        $short = $this->getProperty('short');
        $id = $this->getProperty('id');

        if (empty($url)) {
            $this->addFieldError('url', $this->modx->lexicon('shorturl.item_err_ns_url'));
        }

        if (empty($short)) {
            $this->addFieldError('short', $this->modx->lexicon('shorturl.item_err_ns_short'));
        }

        $this->setProperty('url', $url);
        $this->setProperty('short', $short);

        return parent::beforeSet();
    }
}
return 'ShortUrlUpdateProcessor';
