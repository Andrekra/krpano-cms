<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->Name=>array('view','id'=>$model->ProjectId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
	array('label'=>'View Projects', 'url'=>array('view', 'id'=>$model->ProjectId)),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>

<h1>Update Projects <?php echo $model->ProjectId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>