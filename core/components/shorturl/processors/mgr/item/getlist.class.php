<?php
/**
 * Get list Items
 *
 * @package shorturl
 * @subpackage processors
 */
class ShortUrlGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'ShortUrlItem';
    public $languageTopics = array('shorturl:default');
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'DESC';
    public $objectType = 'shorturl.items';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                    'url:LIKE' => '%'.$query.'%',
                ));
        }
        return $c;
    }
}
return 'ShortUrlGetListProcessor';
