<!-- THEME JAVASCRIPT -->
 <script type="text/javascript" charset="UTF-8">
	 //Initalize
	var color_picker_array = ["#theme_Headerbackground_amount","#theme_Footerbackground_amount"];
	var theme_slider_array = ["#theme_Headeropacity_slider","#theme_Footeropacity_slider"];
	$(document).ready(function () { 
		$("#theme_Headeropacity_slider").slider({ 			min: 0, 	max: 1, 	value: 1, 		step: 0.1 });
		$("#theme_Footeropacity_slider").slider({ 			min: 0, 	max: 1, 	value: 1, 		step: 0.1 });
		var i=0;
		for(i in color_picker_array)
		{
			$(color_picker_array[i]).mColorPicker();
		}
	});
	 //set init value
	$(document).ready(function () { 
		$("#theme_Headeropacity_slider").slider("value", 1);
		$('#theme_Headeropacity_amount').val(1);
		
		$('#theme_Headerbackground_amount').val("#000000");
		$('#theme_Footerbackground_amount').val("#000000");
	});
    $(document).ready(function () {   
		//bind colorpicker to update function
		$(color_picker_array.join(",")).bind('change', function () {
			var id = $(this).attr('id');
			var target_element = id.substr(6,6);
			var target_id = "#content_" + target_element;
			var property = id.replace(/theme_/, "").replace(/_amount/,"").replace(target_element,"");
			
			updateCSS(target_id,property,$(this).val())
        });

		//bind slider to an update function. 
		$(theme_slider_array.join(",")).bind("slide", function(event, ui) {
			var id = $(this).attr('id');
			var target_element = id.substr(6,6);
			var target_id = "#content_" + target_element;
			
			//update css 
			var property = id.replace(/_slider/, "").replace(/theme_/, "").replace(target_element,"");
			updateCSS(target_id,property,ui.value);
			
			//show value in input box
			var amount_div_id = "#" + id.replace(/_slider/, "") + "_amount"; 
			$(amount_div_id).val(ui.value);
		});	
	});	
	//set background buttons
	 $(document).ready(function () { 
		var bg_array = ['aqua','bluewood','bronze','concrete','darkwood','desert','earth','heaven','hell','jungle','lava','neon','red','uv']
		var i = 0;
		$("#background_list a").each(function() {	
			$(this).click(function(){
				var id = parseInt($(this).attr('id').replace(/background_/, ""));
				$("#content").css("background-image","url('<?= base_url() ?>application/views/build/theme/<?= $theme['Name'] ?>/html/bg_body_"+bg_array[id]+".jpg')");
				return false;
			});
		});
	 });
	function updateCSS(id,property,value)
	{
		$("#message").html("updateCSS("+id+","+property+","+value+")");
		$(id).css(property,value);
	}
</script>