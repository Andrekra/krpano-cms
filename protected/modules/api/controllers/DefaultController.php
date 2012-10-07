<?php
class DefaultController extends CController{

    public function actionError()
    {
        $this->layout = false;
        $content = "geen geldige model";
        header("HTTP/1.1 500 Bad request");
        header('Content-type: text/html');

        echo "geen geldige model";
        exit;
    }
}
?>