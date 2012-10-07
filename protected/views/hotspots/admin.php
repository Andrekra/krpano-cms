<?php
$this->breadcrumbs=array(
	'Hotspots'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Hotspots', 'url'=>array('index')),
	array('label'=>'Create Hotspots', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hotspots-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hotspots</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'hotspots-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'HotspotId',
		'LocationId',
		'Name',
		'Alturl',
		'Keep',
		'Devices',
		/*
		'Visible',
		'Enabled',
		'Scale9grid',
		'Zorder',
		'Capture',
		'Children',
		'Preload',
		'Blendmode',
		'Edge',
		'Ox',
		'Oy',
		'Zoom',
		'Distorted',
		'Rx',
		'Ry',
		'Rz',
		'Inverserotation',
		'Flying',
		'Width',
		'Height',
		'Scale',
		'Altscale',
		'Rotate',
		'Smoothing',
		'Accuracy',
		'Alpha',
		'Usecontentsize',
		'Type',
		'Meta',
		'Url',
		'Ath',
		'Atv',
		'Onover',
		'Onout',
		'Onclick',
		'Crop',
		'Onovercrop',
		'Ondowncrop',
		'Scalechildren',
		'Mask',
		'Effect',
		'Onhover',
		'Ondown',
		'Onup',
		'Onloaded',
		'Altonloaded',
		'Handcursor',
		'Style',
		'Effects',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
