<?php
Yii::setPathOfAlias('editor' , dirname(__FILE__));
class KrpanoEditorWidget extends CWidget
{

    private $assetsUrl;
    public $project;
    public $locations;
    public $default_location;
    public $krpanoproperties;
    private $theme='flick'; //can be found in vendors.jquery.ui

    public function init()
    {
        //copy assets of krpano to assets folder
       $this->assetsUrl = Yii::app()->assetManager->publish(
                 Yii::getPathOfAlias('editor.assets'), false, -1, YII_DEBUG
        ).'/';

        //register the scripts in the head of the html document
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($this->assetsUrl . 'js/editor/editor.init.js',CClientScript::POS_HEAD)
        ->registerCoreScript('jquery')
        ->registerCoreScript('jquery.ui')
        ->registerCssFile(
            Yii::app()->assetManager->publish(
                Yii::app()->basePath . '/vendors/jquery.ui/'.$this->theme.'/'
            ).
            '/jquery-ui-1.8.16.custom.css', 'screen'
        )
       // ->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/pirobox/pirobox_extended_min.js',CClientScript::POS_HEAD)
        ->registerCSSFile($this->assetsUrl . 'js/pirobox/css/style_2/style.css', 'screen')
        ->registerScriptFile($this->assetsUrl . 'js/jquery.colorpicker/js/colorpicker.js',CClientScript::POS_HEAD)
        ->registerCSSFile($this->assetsUrl . 'js/jquery.colorpicker/css/colorpicker.css', 'screen')
        ->registerScriptFile($this->assetsUrl . 'js/jquery.ui.spinner/ui.spinner.min.js',CClientScript::POS_HEAD)
        ->registerCSSFile($this->assetsUrl . 'js/jquery.ui.spinner/ui.spinner.css', 'screen')
        ->registerScriptFile($this->assetsUrl . 'js/editor/editor.location.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/editor/editor.theme.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/editor/editor.tour.js',CClientScript::POS_HEAD)

        ->registerCSSFile($this->assetsUrl . 'css/custom.css', 'screen');

         $project = CJavaScript::jsonEncode($this->project);
         $network = CJavaScript::jsonEncode($this->project->network);
         $display = CJavaScript::jsonEncode($this->project->display);
         $memory = CJavaScript::jsonEncode($this->project->memory);
         $control = CJavaScript::jsonEncode($this->project->control);
         $autorotate = CJavaScript::jsonEncode($this->project->autorotate);
         $locations = CJavaScript::jsonEncode($this->locations);
         $current_location = CJavaScript::jsonEncode($this->default_location);
         $hotspots = CJavaScript::jsonEncode($this->default_location->hotspots);
         $image = CJavaScript::jsonEncode($this->default_location->image);
         $view = CJavaScript::jsonEncode($this->default_location->view);
         $preview = CJavaScript::jsonEncode($this->default_location->preview);
         Yii::app()->clientScript->registerScript('editor',
                    'var networkJSON = '.$network.';'.
                    'var displayJSON = '.$display.';'.
                    'var memoryJSON = '.$memory.';'.
                    'var controlJSON = '.$control.';'.
                    'var autorotateJSON = '.$autorotate.';'.
                    'var projectJSON = '.$project.';'.
                    'var locationsJSON = '.$locations.';'.
                    'var current_locationJSON = '.$current_location.';'.
                    'var hotspotsJSON = '.$hotspots.';'.
                    'var imageJSON = '.$image.';'.
                    'var viewJSON = '.$view.';'.
                    'var previewJSON = '.$preview.';'.
                    'var themeJSON = '. '{id: 0, path: "'.Yii::app()->getRequest()->getHostInfo().'/src/themes/", name: "default"};'.
                    'var url_createhotspot = "'. Yii::app()->createUrl('hotspots/create') . '";'.
                    'var url_updatehotspot = "'. Yii::app()->createUrl('hotspots/update') . '";'.
                    'var url_deletehotspot = "'. Yii::app()->createUrl('hotspots/delete') . '";'.
                    'var projectid = "'. $this->project->ProjectId . '";'
            , CClientScript::POS_HEAD);
                /*
                 *

         * 		Yii::app()->clientScript->registerCoreScript('jquery')
				->registerScriptFile($assets . '/jquery.uniform.js')
				->registerCssFile($assets . "/css/uniform.{$this->theme}.css");


		$options = CJavaScript::encode($this->options);
		Yii::app()->getClientScript()->registerScript($id, "jQuery('{$this->selector}').uniform({$options});", CClientScript::POS_READY);

         */
       /* $id = __CLASS__ . '#' . md5('piro');
        Yii::app()->getClientScript()->registerScript($id, 
                                                      "$().piroBox_ext({
                                                            piro_speed : 700,
                                                            bg_alpha : 0.5,
                                                            piro_scroll : true
                                                         });", CClientScript::POS_READY);
*/
    }
    public function run()
    {
        Kint::dump($this->project);
       $this->render('editor.view');
    }
    public function get_value($class,$property){
        if(isset($this->project[$class])){
            return $this->project[$class][$property]; 
        } else if(isset($this->default_location[$class])){
            return $this->default_location[$class][$property];
        }else if(isset($this->krpanoproperties[$class])){
            return isset($this->krpanoproperties[$class][$property]) ? $this->krpanoproperties[$class][$property] : '';
        } else {
            return '';
        }
    }
}
