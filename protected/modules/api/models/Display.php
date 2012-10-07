<?php

Yii::import('application.models.ar._base.BaseDisplays');

class Display extends BaseDisplays
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    public function behaviors() {
        return array(
            'MorrayBehavior'=>array(
                'class'=>'application.behaviors.MorrayBehavior'
            ),
        );
    }
}