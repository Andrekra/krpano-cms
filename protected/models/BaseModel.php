<?php
class BaseModel extends GxActiveRecord{
   /* public static function model($className=__CLASS__) {
          return parent::model($className);
      }*/

    public function behaviors() {
         return array(
             'MorrayBehavior'=>array(
                 'class'=>'application.behaviors.MorrayBehavior'
             ),
         );
     }
}
?>