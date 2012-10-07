<?php
$this->breadcrumbs=array(
	'Projects',
);

$this->menu=array(
	array('label'=>'Create Projects', 'url'=>array('create')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>

<h1>Projects</h1>

<?php
Kint::dump($model);

foreach($model as $project){
    echo '<p>'.$project->name.'</p>';
    echo CHtml::link('edit',$this->createUrl('visualeditor/', array('id'=>$project->id)) );
}
?>
