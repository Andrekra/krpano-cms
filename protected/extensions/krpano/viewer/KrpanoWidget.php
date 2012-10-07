<?php
Yii::setPathOfAlias('krpano' , dirname(__FILE__));
class KrpanoWidget extends CWidget
{
    public $image_url = 'preview.jpg';
    public $image_type = 'cubestrip';
    public $krpano_license = 'krpano.license';
    public $xml_url = 'hotspot.xml';
    public $wmode = 'transparent';

    public $assetsUrl;
    public function init()
    {
        //copy assets of krpano to assets folder
        $this->assetsUrl = Yii::app()->assetManager->publish(
                 Yii::getPathOfAlias('krpano.assets'), false, -1, YII_DEBUG
        ).'/';


         $cs = Yii::app()->getClientScript();
         $cs->registerCoreScript('jquery')
        ->registerScriptFile($this->assetsUrl . 'js/krpano.autorotate.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.control.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.display.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.hotspot.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.image.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.memory.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.plugin.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.network.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.preview.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/krpano.view.js',CClientScript::POS_HEAD);

 /*
		$id = __CLASS__ . '#' . md5($this->selector);
		$options = CJavaScript::encode($this->options);
		Yii::app()->getClientScript()->registerScript($id, "jQuery('{$this->selector}').uniform({$options});", CClientScript::POS_READY);

         */

    }
    public function run()
    {
        $this->render('krpano.view');
    }
}
