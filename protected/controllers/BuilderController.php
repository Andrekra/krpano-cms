<?php
class BuilderController extends Controller
{
    public function actionCreateThumb(){
        
         Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder='upload/';// folder for uploaded files
        $allowedExtensions = array("jpg");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $result;// it's array
    }
}