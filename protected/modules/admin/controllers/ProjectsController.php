<?php

class ProjectsController extends Controller
{
    private $_id;
    
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
    public function actionEditor($id)
	{
		$this->render('visualeditor',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$project=new Projects;
		$location=new Locations();

		if(isset($_POST['Projects']))
		{
			//$project->attributes=$_POST['Projects'];
                //save file
            $location = new Locations();
            $dest_dir = dirname(Yii::app()->getBasePath()) . "/var/locations/";
            $dest_file = uniqid('project_') . ".jpg";
            $location->imagedata = CUploadedFile::getInstance($project, 'imagedata');

            if ($location->imagedata->saveAs($dest_dir . $dest_file)) {
                $project->attributes=$_POST['Projects'];
                $project->UserId  = Yii::app()->user->getId();
                $project->ThemeId = 1;
                $autorotate = new Autorotate(); $autorotate->save();
                 if(!$autorotate->save()){
                     Kint::dump($autorotate);
                }
                $control = new Control();$control->save();
                 if(!$control->save()){
                     Kint::dump($control);
                }
                $display = new Display(); $display->save();
                 if(!$display->save()){
                     Kint::dump($display);
                }
                $memory = new Memory; $memory->save();
                 if(!$memory->save()){
                     Kint::dump($memory);
                }
                $network = new Network();
                if(!$network->save()){
                     Kint::dump($network);
                }
                $project->krpano_memory_id = $memory->primaryKey;
                $project->krpano_network_id = $network->primaryKey;
                $project->krpano_autorotate_id = $autorotate->primaryKey;
                $project->krpano_control_id = $control->primaryKey;
                $project->krpano_display_id = $display->primaryKey;

                if($project->save()){
                    $this->_id = $project->ProjectId;

                    $defaultlocation = $location;
                    $defaultlocation->ProjectId =  $project->primaryKey;

                    $krpano_view = new View();
                    if(!$krpano_view->save()){
                        Kint::dump($krpano_view);
                    };

                    $krpano_image = new KrImage();
                         $krpano_image->Url = "/var/locations/full/" . $dest_file;
                    if(!$krpano_image->save()){
                        Kint::dump($krpano_image);
                    };

                    $krpano_preview = new Preview();
                        $krpano_preview->Url = "/var/locations/full/" . $dest_file;
                    if(!$krpano_preview->save()){
                        Kint::dump($krpano_preview);
                    };

                    $defaultlocation->krpano_preview_id = $krpano_preview->primaryKey;
                    $defaultlocation->krpano_image_id = $krpano_image->primaryKey;
                    $defaultlocation->krpano_view_id = $krpano_view->primaryKey;

                    if(!$defaultlocation->save()){
                        Kint::dump($defaultlocation);
                    }
                    //upload the image and create a thumb
                    $image = Yii::app()->image->load($dest_dir . $dest_file);
                    $image->quality(100);
                    $image->save(dirname(Yii::app()->getBasePath()) . "/var/locations/full/" . $dest_file);

                    //create thumbnail
                    $image = Yii::app()->image->load($dest_dir . $dest_file);
                    $image->resize(300, 150)->quality(100);
                    $image->save(dirname(Yii::app()->getBasePath()) . "/var/locations/thumb/" . $dest_file);

                    //store default location in project
                    $project->DefaultLocation = $location->LocationId;
                    $project->save();
                 } else {
                    Kint::dump($project);
                    Kint::dump($network);
                    Kint::dump($display);
                    Kint::dump($memory);
                    Kint::dump($autorotate);
                    Kint::dump($control);
                    Kint::dump($project->getErrors());
                    die;
                }
                // redirect to success page
                $this->redirect(array('view','id'=>$project->ProjectId));
            } else {
                die('invalid image');
            }
		}
		$this->render('create',array(
			'model'=>$project,
		));
	}
    public function CreateLocation(){
        $location = new Locations();
         $location->Name = 'default location';
                    $location->ProjectId = $project->ProjectId;
                    $location->thumbnail =  "/var/locations/thumb/" . $dest_file;
                    $location->krpano_image_id = 123;
                    $location->krpano_preview_id = 123;
                    $location->krpano_view_id = 123;
                    $location->save();
        return $location->LocationId;
    }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ProjectId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $id = yii::app()->user->id;
        $model = Projects::model()->with('user', 'locations')->findAll();
        $locations = Locations::model()->with('project')->findAll();

		$this->render('index',array(
			'model'=>$model,
			'locations'=>$locations,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		$model=new Projects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projects']))
			$model->attributes=$_GET['Projects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Projects::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    private function createAutorotate(){
        $autorotate = new Autorotate();
        $autorotate->ProjectId = $this->_id;

        $autorotate->save();
die($this->_id);
        return $autorotate->AutorotateId;
    }
}
