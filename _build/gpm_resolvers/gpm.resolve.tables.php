<?php
/**
 * Resolve creating db tables
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package shorturl
 * @subpackage build
 *
 * @var mixed $object
 * @var modX $modx
 * @var array $options
 */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('shorturl.core_path', null, $modx->getOption('core_path') . 'components/shorturl/') . 'model/';
            
            $modx->addPackage('shorturl', $modelPath, null);


            $manager = $modx->getManager();

            $manager->createObjectContainer('ShortUrlItem');

            break;
    }
}

return true;