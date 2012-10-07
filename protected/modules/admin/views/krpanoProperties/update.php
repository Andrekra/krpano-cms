<?php
$this->breadcrumbs=array(
	'Krpano Properties'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KrpanoProperties', 'url'=>array('index')),
	array('label'=>'Create KrpanoProperties', 'url'=>array('create')),
	array('label'=>'View KrpanoProperties', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KrpanoProperties', 'url'=>array('admin')),
);
?>

<h1>Update KrpanoProperties <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>