<?
Yii::setPathOfAlias('api' , dirname(__FILE__));
class ApiModule extends CWebModule
{
    public function init()
    {
        // import the module-level models and components
        $this->setImport(array(
                              'application.models.ar._base.*',
                              'application.models.ar.*',
                              'application.models.*',
                              'api.models.*',
                              'api.components.*',
                         ));
        Yii::app()->setComponents(array(
                                       'errorHandler' => array(
                                           'errorAction' => '/api/default/error',
                                       ),
                                  ));
    }
}