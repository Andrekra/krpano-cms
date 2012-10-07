<?php

Yii::import('application.models.ar._base.BaseNetwork');

class Network extends BaseNetwork
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}