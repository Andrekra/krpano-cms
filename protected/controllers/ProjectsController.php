<?php

class ProjectsController extends Controller {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Projects'),
		));
	}

	public function actionCreate() {
		$model = new Projects;

        $autorotate = new Autorotates();

        if($autorotate->save(false)){

    } else {
            var_dump($autorotate->getErrors());
        }
        $progress = new Progresses(); $progress->save();
        $network = new Networks(); $network->save();
        $memory = new Memories(); $memory->save();
        $display = new Displays(); $display->save();
        $controls = new Controls(); $controls->save();

        $model->autorotate_id = $autorotate->id;
        $model->progress_id = $progress->id;
        $model->network_id = $network->id;
        $model->memory_id = $memory->id;
        $model->display_id = $display->id;
        $model->control_id = $controls->id;

        if($model->save()){
            $image = new Images(); $image->save();
            $preview = new Previews(); $preview->save();
            $views = new Views(); $views->save();
            $default_location = new Locations();
            $default_location->view_id = $views->id;
            $default_location->image_id = $image->id;
            $default_location->preview_id = $preview->id;
            $default_location->project_id = $model->id;
            $default_location->save();

            $model->default_location_id = $default_location->id;
            $model->save();
        } else {
            $progress->delete();
            $network->delete();
            $memory->delete();
            $display->delete();
            $controls->delete();
        }
		if (isset($_POST['Projects'])) {
			$model->setAttributes($_POST['Projects']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Projects');


		if (isset($_POST['Projects'])) {
			$model->setAttributes($_POST['Projects']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Projects')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Projects');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Projects('search');
		$model->unsetAttributes();

		if (isset($_GET['Projects']))
			$model->setAttributes($_GET['Projects']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}