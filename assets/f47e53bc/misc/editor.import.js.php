<script type="text/javascript">
/* Globals */
var projectid = <?php echo $project->ProjectId?>;
var url_savetodb = "<?php echo site_url('visualeditor/save'); ?>";
var url_createhotspot = "<?php echo site_url('hotspots/createHotspot'); ?>";
var url_updatehotspot = "<?php echo site_url('hotspots/updateHotspot'); ?>";
var url_deletehotspot = "<?php echo site_url('hotspots/deleteHotspot'); ?>";

function get_attributes_from_php(){

/* 
    Called by Tour.Init
*/
	var display = new Display();
	display.Init({
<?php 
foreach($krpano_attri['display'] as $property => $value){
	if($value != null){
		if(!is_numeric($value) && !is_bool($value)){
			$value = "'".$value."'";
		}echo $property.':'.$value.',';
	}
}
?>
	});
	var network = new Network();
	network.Init({
<?php 
foreach($krpano_attri['network'] as $property => $value){
	if($value != null){
		if(!is_numeric($value) && !is_bool($value)){
			$value = "'".$value."'";
		}echo $property.':'.$value.',';
	}
}
?>
	});
	var autorotate = new Autorotate();
	autorotate.Init({
<?php 
foreach($krpano_attri['autorotate'] as $property => $value){
	if($value != null){
		$property = strtolower($property); //Convert property to lowercase.
		if(!is_numeric($value) && !is_bool($value)){
			$value = "'".$value."'";
		}
		//$value = is_string($value)? "'".$value."'" : $value; //if value is a string, doublequote it.
		echo $property.':'.$value.',';
	}
}
?>
	});
	var memory = new Memory();
	autorotate.Init({
<?php 
foreach($krpano_attri['memory'] as $property => $value){
	if($value != null){
		if(!is_numeric($value) && !is_bool($value)){
			$value = "'".$value."'";
		}echo $property.':'.$value.',';
	}
}
?>
});
	var control = new Control();
	control.Init({
<?php 
foreach($krpano_attri['control'] as $property => $value){
	if($value != null){
		if(!is_numeric($value) && !is_bool($value)){
			$value = "'".$value."'";
		}echo $property.':'.$value.',';
	}
}
?>
	});
	//return this to Tour Class
	return {display: display, network: network, autorotate: autorotate, memory: memory, control: control};
}
function get_current_location_from_php(){
//all the krpano attributes of the current location

    var view = new View();
	view.Init({
	<?php 
	foreach($krpano_loc_attri['view'] as $property => $value){
		if($value != null){
			if(!is_numeric($value) && !is_bool($value)){
				$value = "'".$value."'";
			}echo $property.':'.$value.',';
		}
	}
	?>
	});
    
	var preview = new Preview();
	preview.Init({
	<?php 
	foreach($krpano_loc_attri['preview'] as $property => $value){
		if($value != null){
			if(!is_numeric($value) && !is_bool($value)){
				$value = "'".$value."'";
			}echo $property.':'.$value.',';
		}
	}
	?>
	});
    
	var image = new Image();
	image.Init({
	<?php 
	foreach($krpano_loc_attri['image'] as $property => $value){
		if($value != null){
			if(!is_numeric($value) && !is_bool($value)){
				$value = "'".$value."'";
			}echo $property.':'.$value.',';
		}
	}
	?>
	});

	var currentLocation = new Location()
	currentLocation.Init(
	<?php echo $location->id ?>,
	{
		view: view,
		image: image,
		preview: preview,
	});
 
	return currentLocation;
};
function get_current_location_hotspots_from_php(){
var hotspots = new Array;
<?php
if($hotspots){
	$i = 0;
	foreach($hotspots as $hotspot){
		$i++;
		echo 'var hotspot_'.$hotspot->HotspotId.' = new Hotspot();'. "\n";
		echo 'hotspot_'.$hotspot->HotspotId.'.Init(';
		echo $hotspot->HotspotId.','.$i.',{';
		foreach($hotspot as $key => $value) {	
			if($value != null){
				if(!is_numeric($value) && !is_bool($value)){
					$value = "'".$value."'";
				}echo $key.':'.$value.',';
			}
		};
		echo '});'. "\n";
		echo 'hotspots.push(hotspot_'.$hotspot->HotspotId.');'. "\n";
	};
};
?>
return hotspots;
}
function get_tour_theme_from_php(){
    var theme = new Theme();
    theme.Init(0,{
		Name : '<?php echo base_url() ?>application/views/build/theme/<?php echo $theme['Name'] ?>/',
	});
    return theme;
}

</script>