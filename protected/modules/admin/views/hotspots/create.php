<?php
$this->breadcrumbs=array(
	'Hotspots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Hotspots', 'url'=>array('index')),
	array('label'=>'Manage Hotspots', 'url'=>array('admin')),
);
?>

<h1>Create Hotspots</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>