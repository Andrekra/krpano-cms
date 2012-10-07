<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('projects-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Projects</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ProjectId',
		'Name',
		'Description',
		'Keywords',
		'UserId',
		'ThemeId',
		/*
		'DefaultLocation',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}{visualeditor}',
            'buttons'=>array
            (
                'visualeditor' => array
                    (
                        'label'=>'visualeditor',     //Text label of the button.
                        'url'=>'Yii::app()->createUrl("admin/visualeditor/index/", array("id"=>$data->ProjectId))',       //A PHP expression for generating the URL of the button.
                    )
                ),
		),
	),
)); ?>


