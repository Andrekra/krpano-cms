<div class="accordion" >
	<h3><a href="#">Global</a></h3>
	<div>
		<table cellspacing="0" class="tableinformation corners_bottom">
			<thead>
				<tr>
					<th id="header_attribute">Attribute</th>
					<th id="value_attribute">Value</th>
				</tr>
			</thead>
			<tbody>
				<tr> <!-- Type -->
					<td class="attribute">
						<h5>Action
							<div class="tooltip_description">
								Define what the hotspot does.
							</div>
						</h5>
					</td>
					<td>
						<select name="hotspot_Type_amount" id="hotspot_Type_amount" class="xlarge_input corners">
							<option id="location" value="location" >Open a Location</option>
							<option id="hint" value="hint" >Open a textfield with information</option>
							<option id="trigger" value="trigger">Execute an action</option>
							<option id="url" value="url">Open an url</option>
							<option id="javascript" value="javascript">Execute Javascript</option>
						</select>
					</td>
				</tr>
				<tr> <!-- Type = Location -->
					<td class="attribute">
						<h5>
							<div class="tooltip_description">
								Define what the hotspot does.
							</div>
						</h5>
					</td>
					<td>
						<select name="hotspot_Type_location" id="hotspot_Type_location" class="xlarge_input corners">
							<?php foreach($locations as $location): ?>
								<option value="<?= $location->LocationId ?>"><?= $location->Name ?></option>
							<? endforeach; ?>
						</select>
					</td>
				</tr>
				<tr> <!-- Type = Hint -->
					<td class="attribute">
						<h5>
							<div class="tooltip_description">
								Define what the hotspot does.
							</div>
						</h5>
					</td>
					<td>
						<textarea id="hotspot_Type_hint" rows="5" cols="60"class="large_input corners" ></textarea>
					</td>
				</tr>
				<tr> <!-- Type = Trigger -->
					<td class="attribute">
						<h5>
							<div class="tooltip_description">
								Define what the hotspot does.
							</div>
						</h5>
					</td>
					<td>
						<input id="hotspot_Type_trigger" type="text" class="large_input corners" />
					</td>
				</tr>
				<tr> <!-- Type = Url -->
					<td class="attribute">
						<h5>
							<div class="tooltip_description">
								Define what the hotspot does.
							</div>
						</h5>
					</td>
					<td>
						<input id="hotspot_Type_url" type="text" class="large_input corners" />
					</td>
				</tr>
				<tr> <!-- Type = Javascript -->
					<td class="attribute">
						<h5>
							<div class="tooltip_description">
								Define what the hotspot does.
							</div>
						</h5>
					</td>
					<td>
						<input id="hotspot_Type_javascript" type="text" class="large_input corners" />
					</td>
				</tr>
				<tr> <!-- Keep -->
					<td class="attribute">
						<h5>Keep
							<div class="tooltip_description">
								fg
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Keep_amount" id="hotspot_Keep_amount" />
					</td>
				</tr>
				<tr> <!-- Devices -->
					<td class="attribute">
						<h5>Devices
							<div class="tooltip_description">
								Defines on which devices this hotspot element should be used.
								The setting can be any combination of these strings:
								all | flash | html5 | iphone | ipad | android | desktop | mobile | tablet

									* all - use this element on all devices
									* flash - use this element only in the krpano Flashplayer viewer
									  (Desktop and Android Flashplayer)
									* html5 - use this element only in the krpanoJS (HTML5) viewer
									* iphone - use this element only on the iPhone (and iPod Touch)
									* ipad - use this element only on the iPad
									* android - use this element only on a Android mobile device
									* desktop - use this element only on desktop (Flash and HTML5)
									* mobile - use this element only on mobiles (Flash and HTML5)
									* tablet - use this element only on tablets (Flash and HTML5)
							</div>
						</h5>
					</td>
					<td>
						<input type="hidden" name="hotspot_Devices_amount" id="hotspot_Devices_amount" class="xlarge_input corners" />
						<ul id="devices_checkbox">
							<li><input type="checkbox" name="hotspot_Devices_all" id="hotspot_Devices_all"><span>All</span></input></li>
							<li><input type="checkbox" name="hotspot_Devices_flash" id="hotspot_Devices_flash"><span>Flash</span></input></li>
							<li><input type="checkbox" name="hotspot_Devices_html5" id="hotspot_Devices_html5"><span>Html5</span></input></li>
							<li><input type="checkbox" name="hotspot_Devices_iphone" id="hotspot_Devices_iphone"><span>Iphone</span></input></li>
							<li><input type="checkbox" name="hotspot_Devices_ipad" id="hotspot_Devices_ipad"><span>Ipad</span></input></li>
							<li><input type="checkbox" name="hotspot_Devices_android" id="hotspot_Devices_android"><span>Android</span></input></li>
							<li><input type="checkbox" name="hotspot_Devices_desktop" id="hotspot_Devices_desktop"><span>Desktop</span></input></li>
							<li><input type="checkbox" name="hotspot_Devices_mobile" id="hotspot_Devices_mobile"><span>Mobile</span></input></li>
							<li><input type="checkbox" name="hotspot_Devices_tablet" id="hotspot_Devices_tablet"><span>Tablet</span></input></li>
						</ul>
					</td>
				</tr>
				<tr> <!-- Enabled -->
					<td class="attribute">
						<h5>Enabled
							<div class="tooltip_description">
								fcfc
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Enabled_amount" id="hotspot_Enabled_amount" />
					</td>
				</tr>
				<tr> <!-- Handcursor -->
					<td class="attribute">
						<h5>Handcursor
							<div class="tooltip_description">

							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Handcursor_amount" id="hotspot_Handcursor_amount" />
					</td>
				</tr>

				<tr> <!-- Capture -->
					<td class="attribute">
						<h5>Capture
							<div class="tooltip_description">

							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Capture_amount" id="hotspot_Capture_amount" />
					</td>
				</tr>
				<tr> <!-- Preload -->
					<td class="attribute">
						<h5>Preload
							<div class="tooltip_description">

							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Preload_amount" id="hotspot_Preload_amount" />
					</td>
				</tr>
				<tr> <!-- Children -->
					<td class="attribute">
						<h5>Children
							<div class="tooltip_description">

							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Children_amount" id="hotspot_Children_amount" />
					</td>
				</tr>
				<tr> <!-- Width -->
					<td class="attribute">
						<h5>Width
							<div class="tooltip_description">
								Destination size of the hotspot element - the source image will be scaled to that size.
								This can be a absolute pixel value or a relative (to the screenwidth or screenheight) percent value.
								When NOT set - the size of the loaded image will be used.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Width_amount" id="hotspot_Width_amount" class="xlarge_input corners"/>
					</td>
				</tr>
				<tr> <!-- Height -->
					<td class="attribute">
						<h5>Height
							<div class="tooltip_description">
								Destination size of the hotspot element - the source image will be scaled to that size.
								This can be a absolute pixel value or a relative (to the screenwidth or screenheight) percent value.
								When NOT set - the size of the loaded image will be used.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Height_amount" id="hotspot_Height_amount" class="xlarge_input corners"/>
					</td>
				</tr>
			</tbody>
		</table>
	</div><!-- END GLOBAL TAB -->
	<h3><a href="#">Posistioning</a></h3>
	<div>
		<table cellspacing="0" class="tableinformation corners_bottom">
			<thead>
				<tr>
					<th id="header_attribute">Attribute</th>
					<th id="header_value">Value</th>
				</tr>
			</thead>
			<tbody>
				<tr> <!-- Accuracy -->
					<td class="attribute">
						<h5>Accuracy
							<div class="tooltip_description">
								Accuracy of the hotspot image positioning:
								When set to 0 (the default) the pixel positions will be rounded to full pixel values. This avoids jumpy movements when changing the rendering quality of the Flashplayer. When set to 1 no rounding of the position values will be done.
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Accuracy .slider"></div>
						<input type="text" name="hotspot_Accuracy_amount" id="hotspot_Accuracy_amount" class="xsmall_input corners" />
					</td>
				</tr>
				<tr> <!-- Atv-->
					<td class="attribute">
						<h5>Atv
							<div class="tooltip_description">
							The spherical coordinates of the hotspot in degrees. There the hotspot image will be aligned by the in the edge setting defined point.
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Atv .slider"></div>
						<input type="text" name="hotspot_Atv_amount" id="hotspot_Atv_amount" class="xsmall_input corners" />
					</td>
				</tr>
				<tr> <!-- Ath -->
				<td class="attribute">
						<h5>Ath
							<div class="tooltip_description">
							The spherical coordinates of the hotspot in degrees. There the hotspot image will be aligned by the in the edge setting defined point.
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Ath .slider"></div>
						<input type="text" name="hotspot_Ath_amount" id="hotspot_Ath_amount" class="xsmall_input corners" />
					</td>
				</tr>
				<tr> <!-- Edge -->
					<td class="attribute">
						<h5>Edge
							<div class="tooltip_description">
								Edge / anchor-point of the hotspot element.
							</div>
						</h5>
					</td>
					<td>
						<select name="hotspot_Edge_amount" id="hotspot_Edge_amount" class="xlarge_input corners">
							<option id="lefttop" value="lefttop" >lefttop </option>
							<option id="left" value="left" >left</option>
							<option id="leftbottom" value="leftbottom">leftbottom</option>
							<option id="top" value="top">top</option>
							<option id="center" value="center">center</option>
							<option id="bottom" value="bottom">bottom</option>
							<option id="righttop" value="righttop">righttop</option>
							<option id="right" value="right">right</option>
							<option id="rightbottom " value="rightbottom ">rightbottom</option>
						</select>
					</td>
				</tr>
				<tr> <!-- Ox -->
					<td class="attribute">
						<h5>Ox
							<div class="tooltip_description">
							Offset / parallel-shift of the hotspot element from the edge point.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Ox_amount" id="hotspot_Ox_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Oy -->
					<td class="attribute">
						<h5>Oy
							<div class="tooltip_description">
							Offset / parallel-shift of the hotspot element from the edge point.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Oy_amount" id="hotspot_Oy_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Zoom -->
					<td class="attribute">
						<h5>Zoom
							<div class="tooltip_description">
								Should the size of the hotspot image change together with the pano when zooming.
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Zoom_amount" id="hotspot_Zoom_amount" />
					</td>
				</tr>
				<tr> <!-- Distorted -->
					<td class="attribute">
						<h5>Distorted
							<div class="tooltip_description">
								Should the hotspot image be distorted in the 3D space together with the current pano/viewing distortion. When distorted use rx / ry / rz settings to rotate the hotspot in 3D space.
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Distorted_amount" id="hotspot_Distorted_amount" />
					</td>
				</tr>
				<tr> <!-- Rx -->
					<td class="attribute">
						<h5>Rx
							<div class="tooltip_description">
								3D Rotation in degrees over the X / Y / Z axes. (axis order: Y-X-Z)
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Rx .slider"></div>
						<input type="text" name="hotspot_Rx_amount" id="hotspot_Rx_amount" class="xsmall_input corners" />
					</td>
				</tr>
				<tr> <!-- Ry -->
					<td class="attribute">
						<h5>Ry
							<div class="tooltip_description">
								3D Rotation in degrees over the X / Y / Z axes. (axis order: Y-X-Z)
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Ry .slider"></div>
						<input type="text" name="hotspot_Ry_amount" id="hotspot_Ry_amount" class="xsmall_input corners"/>
					</td>
				</tr>
				<tr> <!-- Rz -->
					<td class="attribute">
						<h5>Rz
							<div class="tooltip_description">
								3D Rotation in degrees over the X / Y / Z axes. (axis order: Y-X-Z)
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Rz .slider"></div>
						<input type="text" name="hotspot_Rz_amount" id="hotspot_Rz_amount" class="xsmall_input corners"/>
					</td>
				</tr>
				<tr> <!-- Inverserotation -->
					<td class="attribute">
						<h5>Inverserotation
							<div class="tooltip_description">
								Inverses the rotation and the axis order of the rx / ry / rz settings.
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Inverserotation_amount" id="hotspot_Inverserotation_amount" />
					</td>
				</tr>
				<tr> <!-- Flying -->
					<td class="attribute">
						<h5>Flying
							<div class="tooltip_description">
								This setting interpolates automatically the ath/atv and scale values to the current viewing values. The value range is from 0.0 to 1.0. At 1.0
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Flying .slider"></div>
						<input type="text" name="hotspot_Flying_amount" id="hotspot_Flying_amount" class="xsmall_input corners" />
					</td>
				</tr>
			</tbody>
		</table>
	</div><!-- END POSISTIONING TAB -->
	<h3><a href="#">Appereance</a></h3>
	<div>
		<table cellspacing="0" class="tableinformation corners_bottom">
			<thead>
				<tr>
					<th id="header_attribute">Attribute</th>
					<th id="header_value">Value</th>
				</tr>
			</thead>
			<tbody>
				<tr> <!-- Visible -->
					<td class="attribute">
						<h5>Visible
							<div class="tooltip_description">

							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Visible_amount" id="hotspot_Visible_amount" />
					</td>
				</tr>
				<tr> <!-- Alpha -->
					<td class="attribute">
						<h5>Alpha
							<div class="tooltip_description">
							Alpha value / transparency of the hotspot element.
							0.0 = fully transparent, 1.0 = fully visible
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Alpha .slider"></div>
						<input type="text" name="hotspot_Alpha_amount" id="hotspot_Alpha_amount" class="xsmall_input corners" />
					</td>
				</tr>
					<tr> <!-- Scale -->
					<td class="attribute">
						<h5>Scale
							<div class="tooltip_description">
								Scaling of the hotspot element.
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Scale .slider"></div>
						<input type="text" name="hotspot_Scale_amount" id="hotspot_Scale_amount" class="xsmall_input corners" />
					</td>
				</tr>
				<tr> <!-- Altscale -->
					<td class="attribute">
						<h5>Altscale
							<div class="tooltip_description">
								Alternative scaling for the krpanoJS Javascript/HTML5 viewer.
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Altscale .slider"></div>
						<input type="text" name="hotspot_Altscale_amount" id="hotspot_Altscale_amount" class="xsmall_input corners" />
					</td>
				</tr>
				<tr> <!-- Scalechildren -->
					<td class="attribute">
						<h5>Scalechildren
							<div class="tooltip_description">
								Should a child plugin element, that have been assigned by parent also be scaled when the current hotspot element will scaled.
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Scalechildren_amount" id="hotspot_Usecontentsize_amount" />
					</td>
				</tr>
				<tr> <!-- Scale9grid -->
					<td class="attribute">
						<h5>Scale9grid
							<div class="tooltip_description">
								Defines a grid in pixel coordinates that splits the hotspot image into 9 segments. And when scaling the hotspot via the width / height / scale values, the 'edge' segments will be kept unscaled and only the 'middle' segments will be scaled.

								Syntax:

								<pre>scale9grid="x-position|y-position|width|height"</pre>
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Scale9grid_amount" id="hotspot_Scale9grid_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Smoothing -->
					<td class="attribute">
						<h5>Smoothing
							<div class="tooltip_description">
								Pixel smoothing when scaling.
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Smoothing_amount" id="hotspot_Smoothing_amount" />
					</td>
				</tr>
				<tr> <!-- Rotate -->
					<td class="attribute">
						<h5>Rotate
							<div class="tooltip_description">
								Rotation of the hotspot element in degrees.
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Rotate .slider"></div>
						<input type="text" name="hotspot_Rotate_amount" id="hotspot_Rotate_amount" class="xsmall_input corners" />
					</td>
				</tr>
				<tr> <!-- Zorder -->
					<td class="attribute">
						<h5>Zorder
							<div class="tooltip_description">
							</div>
						</h5>
					</td>
					<td>
						<div id="hotspot_Zorder .slider"></div>
						<input type="text" name="hotspot_Zorder_amount" id="hotspot_Zorder_amount" class="xsmall_input corners" />
					</td>
				</tr>
				<tr> <!-- Blendmode -->
					<td class="attribute">
						<h5>Blendmode
							<div class="tooltip_description">
							</div>
						</h5>
					</td>
					<td>
						<select name="hotspot_Blendmode_amount" id="hotspot_Blendmode_amount" class="xlarge_input corners">
							<option id="normal" value="normal" >normal - The display object appears in front of the background.</option>
							<option id="layer" value="layer" >layer - Forces the creation of a transparency group for the display object.</option>
							<option id="screen" value="screen">screen - Multiplies the complement (inverse) of the display object color by the complement of the background color, resulting in a bleaching effect.</option>
							<option id="add" value="add">add - Adds the values of the constituent colors of the display object to the colors of its background, applying a ceiling of 0xFF.</option>
							<option id="subtract" value="subtract">subtract - Subtracts the values of the constituent colors in the display object from the values of the background color, applying a floor of 0.</option>
							<option id="difference" value="difference">difference - Compares the constituent colors of the display object with the colors of its background, and subtracts the darker of the values of the two constituent colors from the lighter value.</option>
							<option id="multiply" value="multiply">multiply - Multiplies the values of the display object constituent colors by the constituent colors of the background color, and normalizes by dividing by 0xFF, resulting in darker colors.</option>
							<option id="overlay" value="overlay">overlay - Adjusts the color of each pixel based on the darkness of the background.</option>
							<option id="lighten" value="lighten">lighten - Selects the lighter of the constituent colors of the display object and the colors of the background (the colors with the larger values).</option>
							<option id="darken" value="darken">darken - Selects the darker of the constituent colors of the hotspot and the colors of the background (the colors with the smaller values).</option>
							<option id="hardlight" value="hardlight">hardlight - Adjusts the color of each pixel based on the darkness of the display object.</option>
							<option id="invert" value="invert">invert - Inverts the background.</option>
						</select>
					</td>
				</tr>
				<tr> <!-- Style -->
					<td class="attribute">
						<h5>Style
							<div class="tooltip_description">
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Style_amount" id="hotspot_Style_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Effects -->
					<td class="attribute">
						<h5>Effects
							<div class="tooltip_description">
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Effects_amount" id="hotspot_Effects_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Usecontentsize -->
					<td class="attribute">
						<h5>Usecontentsize
							<div class="tooltip_description">
								When a .swf file will be loaded, then are two possibilities to determinate its size / dimension - either the size of full canvas of the flash object will be used (usecontentsize=false, the default) - or - only the size of the drawn content there (usecontentsize=true).
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="hotspot_Usecontentsize_amount" id="hotspot_Usecontentsize_amount" />
					</td>
				</tr>
				<tr> <!-- Crop -->
					<td class="attribute">
						<h5>Crop
							<div class="tooltip_description">
								Crop / cut out a rectangular area of the source image. Useful to use only one single image for several image elements.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Crop_amount" id="hotspot_Crop_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Onovercrop -->
					<td class="attribute">
						<h5>Onovercrop
							<div class="tooltip_description">
								different crop areas for mouse over states.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Onovercrop_amount" id="hotspot_Onovercrop_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Ondowncrop -->
					<td class="attribute">
						<h5>Ondowncrop
							<div class="tooltip_description">
								different crop areas for mouse down states.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Ondowncrop_amount" id="hotspot_Onovercrop_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Mask -->
					<td class="attribute">
						<h5>Mask
							<div class="tooltip_description">
								Use an other plugin or hotspot image as mask. The image should have an alpha channel (e.g. use a .png image for it). Without alpha channel the bounding box area of the plugin will be used as mask.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Mask_amount" id="hotspot_Mask_amount" class="xlarge_input corners" />
					</td>
				</tr>
			</tbody>
		</table>
	</div><!-- END APPEARANCE TAB -->
	<h3><a href="#">Events</a></h3>
	<div>
		<table cellspacing="0" class="tableinformation corners_bottom">
			<thead>
				<tr>
					<th id="header_attribute">Attribute</th>
					<th id="header_value">Value</th>
				</tr>
			</thead>
			<tbody>
				<tr> <!-- Onhover -->
					<td class="attribute">
						<h5>Onhover
							<div class="tooltip_description">
								Actions / functions that will be called in intervals (15 times per second) when the mouse stays over / hovers the plugin element.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Onhover_amount" id="hotspot_Onhover_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Onover -->
					<td class="attribute">
						<h5>Onover
							<div class="tooltip_description">
								Actions / functions that will be called when the mouse moves over the plugin element.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Onover_amount" id="hotspot_Onover_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Onout -->
					<td class="attribute">
						<h5>Onout
							<div class="tooltip_description">
								Actions / functions that will be called when the mouse moves out of the plugin element.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Onout_amount" id="hotspot_Onout_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Onclick -->
					<td class="attribute">
						<h5>Onclick
							<div class="tooltip_description">
								Actions / functions that will be called when there is a mouse click on the plugin element.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Onclick_amount" id="hotspot_Onclick_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Ondown -->
					<td class="attribute">
						<h5>Ondown
							<div class="tooltip_description">
							Actions / functions that will be called when the mouse button will be pressed down on the plugin element. 									</div>
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Ondown_amount" id="hotspot_Ondown_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Onup -->
					<td class="attribute">
						<h5>Onup
							<div class="tooltip_description">
							Actions / functions that will be called when the previously pressed mouse button will be released. 								</h5>
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Onup_amount" id="hotspot_Onup_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Onloaded -->
					<td class="attribute">
						<h5>Onloaded
							<div class="tooltip_description">
							Actions / functions that will be called when the loading of the plugin image is done.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Onloaded_amount" id="hotspot_Onloaded_amount" class="xlarge_input corners" />
					</td>
				</tr>
				<tr> <!-- Altonloaded -->
					<td class="attribute">
						<h5>Altonloaded
							<div class="tooltip_description">
							An 'alternative' onloaded event for the krpanoJS Javascript/HTML5 viewer.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="hotspot_Altonloaded_amount" id="hotspot_Altonloaded_amount" class="xlarge_input corners" />
					</td>
				</tr>
			</tbody>
		</table>
	</div><!-- END EVENTS TAB -->
</div><!-- END ALL HOTSPOT TABS -->