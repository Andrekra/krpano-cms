<?php
Yii::import('application.models.ar._base.BaseLocations');
class Location extends BaseLocations
{
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        $parent = parent::rules();

        return CMap::mergeArray($parent, array(
            array('name, thumbnail', 'safe', 'on'=>'api-put'),
            array('id, project_id, name, thumbnail', 'safe', 'on'=>'api-get'),
            //array('id, name, project_id, thumbnail, krpano_image_id, krpano_preview_id, krpano_view_id', 'safe', 'on'=>'api-get'),
        ));
    }

    public function relations() {
        $parent = parent::relations();
        return CMap::mergeArray($parent, array(
            'hotspots' => array(self::HAS_MANY, 'Hotspots', 'location_id'),
            'image' => array(self::BELONGS_TO, 'Images', 'image_id'),
            'preview' => array(self::BELONGS_TO, 'Previews', 'preview_id'),
            'project' => array(self::BELONGS_TO, 'Projects', 'project_id'),
            'view' => array(self::BELONGS_TO, 'Views', 'view_id'),
        ));
    }

    public function defaultScope(){
        return array('with'=>array('hotspots','view','preview','image'));
    }
}
?>