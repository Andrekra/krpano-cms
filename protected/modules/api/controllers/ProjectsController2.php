<?php
class ProjectsController extends RestBaseController{
	public $layout = false;
    
    public function init(){

	}
	public function actionView($id = false){
        if($id){
            $project = Projects::model()->with(
                array('locations',
                     'defaultLocation',
                     'locations.hotspots',
                     'locations.image',
                     'locations.preview',
                     'locations.view',
                     'autorotate',
                     'control',
                     'display',
                     'memory',
                     'network')
            )->findByPK($id);

            $this->sendResponse(200, CJSON::encode($project->toArray(array("scenario"=>"api"))), 'application/json');
        }
        else{
            $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing' );
        }
	}
	public function actionIndex(){
			//$project = Projects::model()->with(array('hotspots'))->findAll();
		//	print CJSON::encode($project->attributes);
	}
    public function actionList($include = false){
        $projects = Projects::model()->with(
                array('locations',
                     'defaultLocation',
                     'locations.hotspots',
                     'locations.image',
                     'locations.preview',
                     'locations.view',
                     'autorotate',
                     'control',
                     'display',
                     'memory',
                     'network')
            )->findAll();
        $arr = array();
        foreach ($projects as $obj) {
             $arr[] = $obj->toArray(array("scenario"=>"api"));
        }
        if($include){
            die(print_r(explode('|',$include)));
        }
		$this->sendResponse(200, CJSON::encode($arr), 'application/json');
    }
	public function actionUpdate($id = false){
		
	}
	public function actionDelete($id = false){
        if($id){
            if(Projects::model()->deleteByPk($id)){
                $this->sendResponse(200, sprintf("Model <b>%s</b> with ID <b>%s</b> has been deleted.", 'Projects', $id) );
            } else {
                //delete failed
                $this->sendResponse(500, sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.",'Projects', $id) );
            }
        }
        else{
            $this->sendResponse(500, 'Error: Parameter <b>id</b> is missing' );
        }
	}
	public function actionCreate(){

       $model = new Projects();

        // Try to assign POST values to attributes
        foreach($_POST as $var=>$value) {
            // Does the model have this attribute?
            if($model->hasAttribute($var)) {
                $model->$var = $value;
            } else {
                // No, raise an error
                $this->sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, 'Projects') );
            }
        }
        if($model->save()) {
            // Saving was OK
            $this->sendResponse(200, CJSON::encode($model->toArray()), 'application/json');
        } else {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", 'Projects');
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->sendResponse(500, $msg );
        }

        var_dump($_REQUEST);
	}
}
?>