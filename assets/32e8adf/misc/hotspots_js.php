<script type="text/javascript">
// <![CDATA[
function displayHotspotInfo_decap(Hotspot)
{
	//show panel
	$("#hotspot_information").css("display", "block"); 
	//fill in the inputfields and sliders
	$("#hotspot_Atv_slider").slider("value", Hotspot.Atv);
	$('#hotspot_Atv_amount').val(Hotspot.Atv);
	$("#hotspot_Ath_slider").slider("value", Hotspot.Ath);
	$('#hotspot_Ath_amount').val(Hotspot.Ath);
	
	$("#hotspot_Zorder_slider").slider("value", Hotspot.Zorder);
	$('#hotspot_Zorder_amount').val(Hotspot.Zorder);
	$("#hotspot_Flying_slider").slider("value", Hotspot.Flying);
	$('#hotspot_Flying_amount').val(Hotspot.Flying);
	$("#hotspot_Scale_slider").slider("value", Hotspot.Scale);
	$('#hotspot_Scale_amount').val(Hotspot.Scale);
	$("#hotspot_Altscale_slider").slider("value", Hotspot.Altscale);
	$('#hotspot_Altscale_amount').val(Hotspot.Altscale);
	$("#hotspot_Accuracy_slider").slider("value", Hotspot.Accuracy);
	$('#hotspot_Accuracy_amount').val(Hotspot.Accuracy);
	$("#hotspot_Alpha_slider").slider("value", Hotspot.Alpha);
	$('#hotspot_Alpha_amount').val(Hotspot.Alpha);
	$("#hotspot_Rotate_slider").slider("value", Hotspot.Rotate);
	$('#hotspot_Rotate_slider').val(Hotspot.Rotate);	
	$('#hotspot_Ry_amount').val(Hotspot.Ry);
	$("#hotspot_Ry_slider").slider("value", Hotspot.Ry);
	$('#hotspot_Rx_amount').val(Hotspot.Rx);
	$("#hotspot_Rx_slider").slider("value", Hotspot.Rx);
	$('#hotspot_Rz_amount').val(Hotspot.Rz);
	$("#hotspot_Rz_slider").slider("value", Hotspot.Rz);
	
	$('#hotspot_Devices_amount').val(Hotspot.Devices);
	$('#hotspot_Url_amount').val(Hotspot.Url);
	$('#hotspot_Alturl_amount').val(Hotspot.Alturl);
	$('#hotspot_Blendmode_amount').val(Hotspot.Blendmode);	
	$('#hotspot_HotspotId_amount').val(Hotspot.HotspotId);
	$('#hotspot_Style_amount').val(Hotspot.Style);
	$('#hotspot_Name_amount').text(Hotspot.Name);
	$('#hotspot_Edge_amount').val(Hotspot.Edge);
	$('#hotspot_Ox_amount').val(Hotspot.Ox);
	$('#hotspot_Oy_amount').val(Hotspot.Oy);

	$('#hotspot_Width_amount').val(Hotspot.Width);
	$('#hotspot_Height_amount').val(Hotspot.Height);
	$('#hotspot_Blendmode_amount').val(Hotspot.Blendmode);
	$('#hotspot_Scale9grid_amount').val(Hotspot.Scale9grid);
	$('#hotspot_Crop_amount').val(Hotspot.Crop);
	$('#hotspot_Onovercrop_amount').val(Hotspot.Onovercrop);
	$('#hotspot_Ondowncrop_amount').val(Hotspot.Ondowncrop);
	$('#hotspot_Mask_amount').val(Hotspot.Mask);
	$('#hotspot_Effect_amount').val(Hotspot.Effect);
	$('#hotspot_Onhover_amount').val(Hotspot.Onhover);
	$('#hotspot_Onout_amount').val(Hotspot.Onout);
	$('#hotspot_Onclick_amount').val(Hotspot.Onclick);
	$('#hotspot_Ondown_amount').val(Hotspot.Ondown);
	$('#hotspot_Onup_amount').val(Hotspot.Onup);
	$('#hotspot_Onloaded_amount').val(Hotspot.Onloaded);
	$('#hotspot_Altonloaded_amount').val(Hotspot.Altonloaded);
	$('#hotspot_Effects_amount').val(Hotspot.Effects);
	
	//checkboxes
	$('#hotspot_Handcursor_amount').attr('checked', Hotspot.Handcursor);
	$('#hotspot_Keep_amount').attr('checked', Hotspot.Keep);
	$('#hotspot_Visible_amount').attr('checked', Hotspot.Visible);
	$('#hotspot_Enabled_amount').attr('checked', Hotspot.Enabled);
	$('#hotspot_Capture_amount').attr('checked', Hotspot.Capture);
	$('#hotspot_Preload_amount').attr('checked', Hotspot.Preload);
	$('#hotspot_Children_amount').attr('checked', Hotspot.Children);
	$('#hotspot_Zoom_amount').attr('checked', Hotspot.Zoom);
	
	
	$('#hotspot_Distorted_amount').attr('checked', StrToBoolean(Hotspot.Distorted));	
	$('#hotspot_Inverserotation_amount').attr('checked', Hotspot.Inverserotation);
	$('#hotspot_Smoothing_amount').attr('checked', Hotspot.Smoothing);
	$('#hotspot_Usecontentsize_amount').attr('checked', Hotspot.Usecontentsize);
	$('#hotspot_Scalechildren_amount').attr('checked', Hotspot.Scalechildren);
	
	SetHotspotType(Hotspot);
}


$(document).ready(function(){
	//toggleHotspotAdvanced();
	
	$('.hotspot_delete').live( "click", function() {
		if(confirm('Are you sure want to delete this Location? This will remove everything in it.'))
		{
			//
			var hotspotid = $(this).parent().parent().children("td:first").html();
			var rowtodelete = $(this).closest('tr').attr('id');
			var postData = {
				hotspotid: hotspotid,
				ajax: '1'		
			};	
			$.ajax({
				url: "<?php echo site_url('hotspots/deleteHotspot'); ?>",
				type: 'POST',
				data: postData,
				dataType: 'html',
				success: function(data) {
						$("#message").html("Hotspot deleted");
						$('#'+rowtodelete).css('display','none');
						krpano().call("removehotspot(hotspot_" +  hotspotid+ ")");		
						//$("#editspot").css("display", "none"); 
				}
			}); 	
		}
		else
		{
			return false;
		}
	});
	$(".test_hotspot").click(function(){
		krpano().call("trace(hotspot.count)");
		return false;
	});
	$(".delete_hotspot").click(	function() {
		deleteHotspot();
	});	
/* 	$('#hotspot_Showadvanced_amount').click(function() {			
		toggleHotspotAdvanced();			
	});	 */
	//init
	//$("#hotspot_Width_amount").spinbox();
	//$("#hotspot_Height_amount").spinbox();

});/* 
function toggleHotspotAdvanced(){
	var advanced_mode = $('#hotspot_Showadvanced_amount').attr('checked')? 'table-row' : 'none';
	$('#hotspot_Capture_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Children_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Preload_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Blendmode_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Style_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Ox_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Oy_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Inverserotation_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Flying_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Smoothing_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Accuracy_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Usecontentsize_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Scale9grid_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Crop_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Onovercrop_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Ondowncrop_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Scalechildren_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Mask_amount').closest('tr').css('display',advanced_mode);
	$('#hotspot_Effect_amount').closest('tr').css('display',advanced_mode); 
	
}
function deleteHotspot(){
	if(confirm('Are you sure want to delete this Location? This will remove everything in it.'))
	{
		//
		var hotspotid = $('#hotspot_HotspotId_amount').val();
		var rowtodelete = "#hotspot_"+hotspotid+"_row"
		var postData = {
			hotspotid: hotspotid,
			ajax: '1'		
		};	
		$.ajax({
			url: "<?php echo site_url('hotspots/deleteHotspot'); ?>",
			type: 'POST',
			data: postData,
			dataType: 'html',
			success: function(data) {
					$("#message").html("Hotspot deleted");
					$(rowtodelete).css('display','none');
					$("#hotspot_information").css('display','none');
					krpano().set("hotspot[tiny_bar].visible", false);
					krpano().call("removehotspot(hotspot_" +  hotspotid+ ")");		
					//$("#editspot").css("display", "none"); 
			}
		}); 	
	}
	else
	{
		return false;
	}
}
function updateHotspot()
{
	var type =  $('#hotspot_Type_amount').val(); //the value of the type dropbox
	var metainfoid = "#hotspot_Type_" + type; //the value of the type content

	var postData = { 
		HotspotId: $('#hotspot_HotspotId_amount').val(),
		Name: $("#hotspot_Name_amount").text(),
	    Type: $('#hotspot_Type_amount').val(),
		Meta: $(metainfoid).val(),
		Atv: $('#hotspot_Atv_amount').val(),
		Ath: $('#hotspot_Ath_amount').val(),
		Keep: $('#hotspot_Keep_amount').attr('checked'),
		Devices: $('#hotspot_Devices_amount').val(),
		Visible: $('#hotspot_Visible_amount').attr('checked'),
		Enabled: $('#hotspot_Enabled_amount').attr('checked'),
		Handcursor:  $('#hotspot_Handcursor_amount').attr('checked'),
		Zorder: $('#hotspot_Zorder_amount').val(),
		Capture: $('#hotspot_Capture_amount').attr('checked'),
		Preload: $('#hotspot_Preload_amount').attr('checked'),
		Children: $('#hotspot_Children_amount').attr('checked'),
		Blendmode: $('#hotspot_Blendmode_amount').val(),
		Style: $('#hotspot_Style_amount').val(),
		Edge: $('#hotspot_Edge_amount').val(),
		Ox: $('#hotspot_Ox_amount').val(),
		Oy: $('#hotspot_Oy_amount').val(),
		Zoom: $('#hotspot_Zoom_amount').attr('checked'),
		Distorted: StrToBoolean($('#hotspot_Distorted_amount').attr('checked')),
		Rx: $('#hotspot_Rx_amount').val(),
		Ry: $('#hotspot_Ry_amount').val(),
		Rz: $('#hotspot_Rz_amount').val(),
		Inverserotation: $('#hotspot_Inverserotation_amount').attr('checked'),
		Flying: $('#hotspot_Flying_amount').val(),
		Width: $('#hotspot_Width_amount').val(),
		Height: $('#hotspot_Height_amount').val(),
		Scale: $('#hotspot_Scale_amount').val(),
		Altscale: $('#hotspot_Altscale_amount').val(),
		Rotate: $('#hotspot_Rotate_amount').val(),
		Smoothing: $('#hotspot_Smoothing_amount').attr('checked'),
		Accuracy: $('#hotspot_Accuracy_amount').val(),
		Alpha: $('#hotspot_Alpha_amount').val(),
		Usecontentsize: $('#hotspot_Usecontentsize_amount').attr('checked'),
		Scalechildren: $('#hotspot_Scalechildren_amount').attr('checked'),
		Scale9grid: $('#hotspot_Scale9grid_amount').val(),
		Mask: $('#hotspot_Mask_amount').val(),
		Effect: $('#hotspot_Effect_amount').val(),
		Onhover: $('#hotspot_Onhover_amount').val(),				
		Onover: $('#hotspot_Onover_amount').val(),
		Onout: $('#hotspot_Onout_amount').val(),
		Onclick: $('#hotspot_Onclick_amount').val(),
		Ondown: $('#hotspot_Ondown_amount').val(),				
		Onup: $('#hotspot_Onup_amount').val(),			
		Onloaded: $('#hotspot_Onloaded_amount').val(),			
		Altonloaded: $('#hotspot_Altonloaded_amount').val(),	
		Effects: $('#hotspot_Effects_amount').val(),
		ajax: '1'		
	};	
	$.ajax({
		url: "<?php echo site_url('hotspots/updateHotspot'); ?>",
		type: 'POST',
		data: postData,
		dataType: 'html',
		success: function(data) {				
			if(data == 1 || data == "success")
			{
				$("#message").html("Hotspot succesfully saved");	
			}
			else
			{
				$("#message").html("problem occured while saving to database");
			}
		}
	}); 	
}*/
/* function getxml(){
	var test = krpano().get("xml.content");
	krpano().call("trace("+ test + ")");
} */
function SetHotspotType(Hotspot)
{
	$('#hotspot_Type_amount').val(Hotspot.Type);
	var type_array = new Array("location","javascript","trigger","hint","url");	
	for(var i = 0; i < type_array.length; i++)
	{
		if(type_array[i] == String(Hotspot.Type).toLowerCase())
		{
			$('#hotspot_Type_'+type_array[i]).closest('tr').css('display','table-row');
		}
		else
		{
			$('#hotspot_Type_'+type_array[i]).closest('tr').css('display','none');
		}
	}    

	<!--type can be location, hint, trigger, url or javascript -->
	<!-- Hotspot type/shortcut OPTION BOX -->	
	//var optionid = "#hotspot_Type_" + Hotspot.Type;
	//$("select#hotspot_type option[selected]").removeAttr("selected"); //remove all selected
	//$(optionid).attr("selected", "selected"); //set the hotspots type as selected
	
	//showMetaFields(Hotspot.Type);
	//fillMetaFields(Hotspot.Type, Hotspot.Meta);
}
// ]]>
</script>