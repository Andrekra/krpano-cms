<?php
$mainconfig = array(
'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name'=>'Panofy',
    //use discussion as the initial controller(instead of site)

	// preloading 'log' component
	'preload'=>array('log'),
    'sourceLanguage' => 'en',
    'language' => 'nl_NL',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.ar.*',
		'application.models.ar._base',
		'application.components.*',
		'application.behaviours.MorrayBehavior',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
        'admin',
        'api',
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'12345',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','95.130.236.39','82.75.35.114', '82.74.153.162','::1'),
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
            ),
        ),
	),

    'defaultController'=>'admin/projects/',
	// application components
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
                'admin' => 'admin/projects',
                // templates
                'templates/<category>' => 'templates/parse/<controller:\w+>',
                 // REST patterns
                array('api/<controller>/get', 'pattern'=>'api/<controller:\w+>', 'verb'=>'GET'),
                array('api/<controller>/get', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'GET'),
                array('api/<controller>/put', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'PUT'),
                array('api/<controller>/put', 'pattern'=>'api/<controller:\w+>', 'verb'=>'PUT'),
                array('api/<controller>/delete', 'pattern'=>'api/<controller:\w+>/<id:\d+>', 'verb'=>'DELETE'),
                array('api/<controller>/post', 'pattern'=>'api/<controller:\w+>', 'verb'=>'POST'),

                // SCOPED REST patterns
                //VIEW list of records within planning with id: scope_id
                array('api/<controller>/get', 'pattern'=>'api/<scope:\w+>/<scope_id:\d+>/<controller:\w+>', 'verb'=>'GET'),
                //VIEW single record of id: id, within scope planning with id: scope_id
                array('api/<controller>/get', 'pattern'=>'api/<scope:\w+>/<scope_id:\d+>/<controller:\w+>/<id:\d+>', 'verb'=>'GET'),
                //UPDATE single record of id: id, within scope planning with id: scope_id
                array('api/<controller>/put', 'pattern'=>'api/<scope:\w+>/<scope_id:\d+>/<controller:\w+>/<id:\d+>', 'verb'=>'PUT'),
                //UPDATE all records, within scope planning with id: scope_id
                array('api/<controller>/put', 'pattern'=>'api/<scope:\w+>/<scope_id:\d+>/<controller:\w+>', 'verb'=>'PUT'),
                //CREATE a new record within planning with id: scope_id
                //ex method: public function actionPost($id = false, $scope = false, $scope_id = false){ }
                array('api/<controller>/post', 'pattern'=>'api/<scope:\w+>/<scope_id:\d+>/<controller:\w+>', 'verb'=>'POST'),
                //DELETE a record within planning with id: scope_id
                array('api/<controller>/delete', 'pattern'=>'api/<scope:\w+>/<scope_id:\d+>/<controller:\w+>/<id:\d+>', 'verb'=>'DELETE'),

                //default controller/action path
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                
			),
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            //'errorAction'=>'admin/site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);
if (strpos($_SERVER['DOCUMENT_ROOT'], "panofy.com")) {
    $mainconfig = CMap::mergeArray(
        $mainconfig,
        array(
             'params' => array(
                 'adminEmail' => 'andrekramer84@hotmail.com',
             ),
                         // autoloading model and component classes
             'import' => array(
                 'application.vendors.kint.Kint',
                 'ext.giix-components.*', // giix components
             ),
             'components' => array(
                 'db'=>array(
                     'connectionString' => 'mysql:host=localhost;dbname=deb51536_krpano',
                     'emulatePrepare' => true,
                     'username' => 'deb51536_krpano',
                     'password' => '8442ba',
                     'charset' => 'utf8',
                 ),
                 'image' => array(
                     'class' => 'application.extensions.image.CImageComponent',
                     'driver' => 'GD', // GD or ImageMagick
                     'params' => array('directory' => '/usr/bin'),
                 ),
                  'errorHandler' => array(
                   // 'errorAction' => 'admin/site/error'
                  ),
                /* 'user' => array(
                        'class' => 'admin.components.UserRoles',
                        'loginUrl' => 'admin/site/login',
                        'returnUrl' => 'admin/projects/admin',
                        'allowAutoLogin' => true,
                    )*/
             ),


        )
    );
};
return $mainconfig;