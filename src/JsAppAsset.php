<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

namespace PetrGrishin\Asset\JsApp;


use CApplicationComponent;
use CAssetManager;
use CClientScript;
use Yii;

class JsAppAsset extends CApplicationComponent {

    private $vendorPath;

    public function init() {
        parent::init();
        $vendorPath = $this->getVendorPath();
        $assetPath = $this->getAssetManager()->publish($vendorPath . '/petrgrishin/jsapp/build/');
        $this->getClientScript()->registerScriptFile($assetPath . '/app.min.js');
    }

    public function setVendorPath($vendorPath) {
        $this->vendorPath = $vendorPath;
        return $this;
    }

    protected function getVendorPath() {
        return $this->vendorPath ?: sprintf('%s/../vendor', Yii::getPathOfAlias('application'));
    }

    /**
     * @return CAssetManager
     */
    protected function getAssetManager() {
        return $this->getApp()->getComponent('assetManager');
    }

    /**
     * @return CClientScript
     */
    protected function getClientScript() {
        return $this->getApp()->getComponent('clientScript');
    }

    protected function getApp() {
        return Yii::app();
    }
}
 