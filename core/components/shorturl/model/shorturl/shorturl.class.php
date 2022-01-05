<?php
/**
 * @package shorturl
 */
class ShortUrl {

    /** @var \modX $modx */
    public $modx;

    /** @var array $config */
    public $config = array();

    private $alphabet = 'abcdefghijklmnopqrstuvwxyz0123456789';


    function __construct(modX &$modx,array $config = array()) {

        $this->modx =& $modx;

        $corePath = $this->modx->getOption('shorturl.core_path',$config,$this->modx->getOption('core_path').'components/shorturl/');
        $assetsUrl = $this->modx->getOption('shorturl.assets_url',$config,$this->modx->getOption('assets_url').'components/shorturl/');
        $connectorUrl = $assetsUrl.'connector.php';

        $this->config = array_merge(array(
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl.'css/',
            'jsUrl' => $assetsUrl.'js/',
            'imagesUrl' => $assetsUrl.'images/',

            'connectorUrl' => $connectorUrl,

            'corePath' => $corePath,
            'modelPath' => $corePath.'model/',
            'chunksPath' => $corePath.'elements/chunks/',
            'chunkSuffix' => '.chunk.tpl',
            'snippetsPath' => $corePath.'elements/snippets/',
            'processorsPath' => $corePath.'processors/',
            'templatesPath' => $corePath.'templates/',
        ),$config);

        $this->modx->addPackage('shorturl',$this->config['modelPath']);
        $this->modx->lexicon->load('shorturl:default');
    }

    public function createShortUrl() {

        $chars = str_split($this->alphabet);
        $siteUrl = $this->modx->getOption('site_url');
        $b=0;

        for ($b=0; $b<=100; $b++) {
            for ($i=0; $i<=count($chars); $i++) {
                $alias = $aliasPath . $chars[$i];
                $url = $siteUrl . $alias;
                if ($this->checkShortUrl($alias)) return $url;
            }

            $aliasPath = $chars[$b];
        }

        return $url;
    }

    public function checkShortUrl($alias) {

        $siteUrl = $this->modx->getOption('site_url');

        // check if alias already is shortened
        if ($this->modx->getObject('ShortUrlItem', array('short' => $siteUrl . $alias))) return false;

        // check if resource already has alias
        if ($this->modx->getObject('modResource', array('alias' => $alias))) return false;


        return true;
    }

}
?>
