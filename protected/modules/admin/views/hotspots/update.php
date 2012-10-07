<?php
$this->breadcrumbs=array(
	'Hotspots'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hotspots', 'url'=>array('index')),
	array('label'=>'Create Hotspots', 'url'=>array('create')),
	array('label'=>'View Hotspots', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Hotspots', 'url'=>array('admin')),
);
?>

<h1>Update Hotspots <?php echo $model->HotspotId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>