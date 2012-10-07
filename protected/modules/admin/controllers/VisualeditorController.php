<?php

class VisualeditorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = "admin.views.layouts.editor.main";

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionIndex($id)
	{
        $project=Projects::model()->withAll()->findByPk((int)$id);
        $default_location = Locations::model()->withAll()->findByAttributes(array('LocationId' => (int)$project->DefaultLocation));
        $locations = Locations::model()->withAll()->findall();
        $krpanoproperties = KrpanoProperties::model()->findall();

        $this->render('view',array(
			'project'=>$project,
			'default_location'=>$default_location,
			'locations'=>$locations,
            'krpanoproperties' => $krpanoproperties,
		));
	}
}
