<?php
class DisplayController extends BaseApiController{
    protected function showList($scope = false, $scope_id = false){
        $this->allowed_scopes = array('projects');
        if($scope){
            if(in_array($scope, $this->allowed_scopes)){
                $models = Projects::model()->findByPk($scope_id);
            } else {
                $this->sendResponse(401, 'scope not allowed');
            }
        } else {
            $models = $this->getModel()->findAll();
        }

        if($models && is_array($models)){
            $arr = array();
            foreach ($models as $obj) {
                $arr[] = $obj->toArray(array("scenario"=>"api-get"));
            }
            $this->sendResponse(200, $arr);
        } elseif ($models){
            $this->sendResponse(200, $models->display->toArray());
        }
        else {
            $this->sendResponse(204, 'no records not found');
        }

    }
}
?>