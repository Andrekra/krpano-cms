<?php
$this->breadcrumbs=array(
	'Hotspots',
);

$this->menu=array(
	array('label'=>'Create Hotspots', 'url'=>array('create')),
	array('label'=>'Manage Hotspots', 'url'=>array('admin')),
);
?>

<h1>Hotspots</h1>

<?php
Kint::dump($model);
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
