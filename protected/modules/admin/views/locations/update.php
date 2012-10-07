<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->Name=>array('view','id'=>$model->LocationId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Locations', 'url'=>array('index')),
	array('label'=>'Create Locations', 'url'=>array('create')),
	array('label'=>'View Locations', 'url'=>array('view', 'id'=>$model->LocationId)),
	array('label'=>'Manage Locations', 'url'=>array('admin')),
);
?>

<h1>Update Locations <?php echo $model->LocationId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>