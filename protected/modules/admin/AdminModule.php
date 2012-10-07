<?
Yii::setPathOfAlias('admin' , dirname(__FILE__));
class AdminModule extends CWebModule
{
    public $assetsUrl;

    public function init()
    {
        // import the module-level models and components

        $this->setImport(array(
                              'admin.models.*',
                              'admin.components.*',
                              'admin.extensions.*',
                              'admin.helpers.*',
        ));
        //redirect site/login to admin/site/login
        $this->setComponents(array(
                'errorHandler' => array(
                    'errorAction' => Yii::app()->createUrl('/admin/site/error')
                ),
               'user' => array(
                    'class' => 'admin.components.UserRoles',
                    'loginUrl' => Yii::app()->createUrl('/admin/site/login'),
                    'returnUrl' => Yii::app()->createUrl('admin/projects/admin'),
                    'allowAutoLogin' => true,
                  ),
                /* 'image' => array(
                         'class' => 'admin.extensions.image.CImageComponent',
                         'driver' => 'ImageMagick', // GD or ImageMagick
                         'params' => array('directory' => '/var/pages/'
                 ), */
            
        ));
        //prefix the session so you dont overwrite potential other login pages in the future
        Yii::app()->user->setStateKeyPrefix('_admin');

        //copy assets
        $this->assetsUrl = Yii::app()->assetManager->publish(
             Yii::getPathOfAlias('admin.assets'), false, -1, YII_DEBUG
        ).'/';

         Yii::app()->clientScript->registerCoreScript('jquery')
        ->registerCoreScript('jquery.ui')
        //->registerScriptFile($this->assetsUrl . 'js/mColorPicker.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/jquery.qtip-1.0.0-rc3.min.js',CClientScript::POS_HEAD)
        ->registerScriptFile($this->assetsUrl . 'js/custom.js',CClientScript::POS_HEAD);
    }
    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            $route = $controller->id . '/' . $action->id;
           // echo $route;
            $publicPages = array(
                'site/login',
                'site/error',
            );
            if (Yii::app()->user->isGuest && !in_array($route, $publicPages)){
                Yii::app()->getModule('admin')->user->loginRequired();
            }
            else {
                return true;
            }
        }
        else {
            return false;
        }
    }
}