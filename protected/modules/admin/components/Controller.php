<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = "//../modules/admin/views/layouts/column2";
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();


    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
            array('allow', // allow all users to see the login and error screen
				'actions'=>array('login','error'),
				'users'=>array('*'),
             ),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'controllers'=>array('projects','locations','visualeditor','site','hotspots'),
                'expression'=> 'Yii::app()->user->isAdminUser',
                'users'=>array('Andre'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}


//include helper
