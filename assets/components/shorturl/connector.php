<?php
/**
 * ShortUrl connector
 *
 * @package shorturl
 * @subpackage connector
 *
 * @var modX $modx
 */

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('shorturl.core_path', null,$modx->getOption('core_path').'components/shorturl/');
require_once $corePath.'model/shorturl/shorturl.class.php';
$modx->shorturl = new ShortUrl($modx);

$modx->lexicon->load('shorturl:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->shorturl->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));
