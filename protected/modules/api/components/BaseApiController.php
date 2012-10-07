<?php
abstract class BaseApiController extends CController
{
    public $method = false;
    public $layout = false;
    public $data = false;
    public $allowed_scopes = array('project', 'projects');
    
    public function init()
    {
        $this->data = json_decode(file_get_contents("php://input"), true);
    }

    public function sendResponse($status = 404, $content = "")
    {
        header("HTTP/1.1 " . $status . " " . $this->getStatusCodeMessage($status));

        if (!empty($content)) {
            header('Content-type: application/json');
            if (is_string($content)) {
                $content = (array)$content;
            }

            echo json_encode($content);
        }
        else {
            header('Content-type: text/html');
        }

        exit;
    }

    public static function getStatusCodeMessage($status)
    {
        $codes = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    //get model name based on controller name 
    protected function getModel(){
        $class = ucfirst($this->id);
        return $class::model();
    }

    public function actionGet($id = false, $scope = false, $scope_id = false){
          if($id == false){
            $this->showList($scope, $scope_id);
        } else {
            $this->View($id, $scope, $scope_id);
            //get planning with id...
        }
    }
    public function actionPut($id = false, $scope = false, $scope_id = false){
        if($this->data != false){
            if($id == false){
                //bulk update planning
                $this->updateAll($this->data, $scope, $scope_id);
            } else {
                $this->Update($id, $this->data, $scope, $scope_id);
                //update planning with id...
            }
        }
    }
    public function actionDelete($id = false, $scope = false, $scope_id = false){
        if($id == false){
            $this->deleteAll($scope, $scope_id);
        } else {
            //delete planning with id...
            $this->Delete($id, $scope, $scope_id);
        }
    }
    public function actionPost($scope = false, $scope_id = false){
        //create new record
        $this->Create($this->data, $scope, $scope_id);
    }

    //delete all
    protected function deleteAll($scope = false, $scope_id = false){
        //delete all planning?
        $models = $this->getModel()->findAll();
        foreach($models as $model){
            $model->delete();
        }
        if(!$models = $this->getModel()->findAll()){
          $this->sendResponse(200, 'All '. $this->id.' deleted');
        } else {
           $arr = array();
           foreach ($models as $obj) {
                $arr[] = $obj->toArray(array("scenario"=>"api-get"));
           }
           $this->sendResponse(500, $arr);
        }
    }

    //delete with specific id
    protected function Delete($id, $scope = false, $scope_id = false){
        $model = $this->getModel()->findByPk($id);
        if($model){
            if($model->delete()){
                //model deleted
                $this->sendResponse(200, $this->id.' deleted '. $id);
            } else {
                //failed to delete model
                $this->sendResponse(500, $model->getErrors());
            };
        } else {
            //model does not exist
            $this->sendResponse(204, $this->id. ' with id: '. $id . ' not found');
        }
    }

    //create a new model
    protected function Create($data = false, $scope = false, $scope_id = false){
        $modelname = ucfirst($this->id);

        //only set attributes within api-put scenario
        $model = new $modelname("api-put");
        $model->setAttributes($data);

        if($model->save()){
            //do another request to get the proper data from db (created and modified acts weird if you just use $planning)
            $model_in_db = $this->getModel()->findByPK($model->id);

            //only show attributes within api-get scenario
            $this->sendResponse(200, $model_in_db->toArray(array("scenario"=>"api-get")));
        } else {
            //server error or required fields empty
            $this->sendResponse(500, $model->getErrors());
        };
    }

    //view whole list of models
    protected function showList($scope = false, $scope_id = false){
       if(in_array($scope, $this->allowed_scopes)){
           # if there is a scope, append _id to it. For example planning, becomes planning_id.
           # use that as condition key + scope_id as a condition value.
            $scope_name = strtolower($scope) . '_id';
            $models = $this->getModel()->findAll(array(
                                                     'condition' => $scope_name . '= '.$scope_id
                                                 ));
        } else {
            $models = $this->getModel()->findAll();
        }
        
        if($models){
            $arr = array();
            foreach ($models as $obj) {
               $arr[] = $obj->toArray(array("scenario"=>"api-get"));
            }
            $this->sendResponse(200, $arr);
        } else {
            $this->sendResponse(204, 'no records not found');
        }

    }

    //view 1 model
    protected function View($id, $scope = false, $scope_id = false){
        //scope is not nescesary, since a model with id ### will always point to that record, with or without a scope.
        $model = $this->getModel()->findByPK($id);
        if($model){
             $this->sendResponse(200, $model->toArray(array("scenario"=>"api-get")));
        } else {
            $this->sendResponse(204, 'record not found');
        }

    }

    //update model
    protected function Update($id, $data, $scope = false, $scope_id = false){
        $model = $this->getModel()->findByPK($id);

        if($model){
            $model->scenario = "api-put";
            $model->setAttributes($data);
            if($model->save()){
                //fetch it from server again to check if it's valid;
                $model = $this->getModel()->findByPK($id);
                $this->sendResponse(200, $model->toArray(array("scenario"=>"api-get")));
            } else {
               $this->sendResponse(500, CJSON::encode($model->getErrors()));
            }
        } else {
             $this->sendResponse(204, 'record not found');
        }
    }

    //update all models
    protected function updateAll($data, $scope = false, $scope_id = false){
        $success = array();
        $error = array();
        foreach($data as $modeldata){
            if($modeldata->id){
                $model = $this->getModel()->findByPK($modeldata->id);
                if($model){
                    $model->scenario = "api-put";
                    $model->setAttributes($modeldata);
                    if($model->save()){
                        $success[] = $model->toArray(array("scenario"=>"api-get"));
                    } else {
                        $error[] = $modeldata;
                    }
                }
            }
        }

        if($error){
           $this->sendResponse(500, 'failed to update:'. $error);
        } else {
            $this->sendResponse(200, 'successfull update:'. $success);
        }
    }
}