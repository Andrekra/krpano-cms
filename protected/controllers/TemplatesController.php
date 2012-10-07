<?php
class TemplatesController extends CController{
    public $layout = false;
    public function actionParse($category){
        $template = KrpanoProperties::model()->findAllByAttributes(array(
            'category' => $category
        ));
        $this->render('template', array('template' => $template));

    }
}
?>