<?php
$this->breadcrumbs=array(
	'Krpano Properties',
);

$this->menu=array(
	array('label'=>'Create KrpanoProperties', 'url'=>array('create')),
	array('label'=>'Manage KrpanoProperties', 'url'=>array('admin')),
);
?>

<h1>Krpano Properties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
