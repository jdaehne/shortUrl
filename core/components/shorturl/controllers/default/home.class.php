<?php
class ShorturlHomeManagerController extends modExtraManagerController {
    public function process(array $scriptProperties = array()) {}

    public function initialize()
    {
        $corePath = $this->modx->getOption('shorturl.core_path', null, $this->modx->getOption('core_path') . 'components/shorturl/');
        $this->shorturl = $this->modx->getService('shorturl', 'shorturl', $corePath . '/model/shorturl/', array(
            'core_path' => $corePath
        ));

        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            ShortUrl.config = '.$this->modx->toJSON($this->shorturl->config).';
            ShortUrl.config.connector_url = "'.$this->shorturl->config['connectorUrl'].'";
        });
        </script>');
    }

    public function getLanguageTopics()
    {
        return array('core:setting', 'shorturl:default');
    }

    public function getPageTitle()
    {
        return $this->modx->lexicon('shorturl');
    }

    public function loadCustomCssJs() {

        $this->addJavascript($this->shorturl->config['jsUrl'].'mgr/shorturl.js');

        $this->addJavascript($this->shorturl->config['jsUrl'].'mgr/widgets/items.grid.js');
        $this->addJavascript($this->shorturl->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->shorturl->config['jsUrl'].'mgr/sections/home.js');
    }

    public function getTemplateFile()
    {
        // view controller
        return $this->shorturl->config['templatesPath'] . 'home.tpl';

    }

    public function checkPermissions() {
        return true;
    }

}
