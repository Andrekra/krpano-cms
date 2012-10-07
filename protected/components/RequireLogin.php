<?php
class RequireLogin extends CBehavior
{
    public function attach($owner)
    {
        $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
    }
    public function handleBeginRequest($event)
    {
      //  die(print_r(Yii::app()->request->baseUrl));
        if (Yii::app()->user->isGuest &&
            !in_array($_SERVER['REQUEST_URI'],array(Yii::app()->request->baseUrl.'/site/login', Yii::app()->request->baseUrl.'/site/index'))
        ) {
        //if (Yii::app()->user->isGuest && (!isset($_GET['r']) || $_GET['r'] != 'site/login')) {
          Yii::app()->user->loginRequired();
        }
    }
}
?>