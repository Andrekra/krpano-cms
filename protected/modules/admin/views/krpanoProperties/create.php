<?php
$this->breadcrumbs=array(
	'Krpano Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KrpanoProperties', 'url'=>array('index')),
	array('label'=>'Manage KrpanoProperties', 'url'=>array('admin')),
);
?>

<h1>Create KrpanoProperties</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>