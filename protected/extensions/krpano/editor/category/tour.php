<div class="accordion" >
	<h3><a href="#">Display</a></h3>
	<div> 
		<table cellspacing="0" class="tableinformation corners_bottom">
			<thead>
				<tr>
					<th>Attribute</th>
					<th>Value</th>	
				</tr>
			</thead>
			<tbody>
				<tr id="display_flash10"> <!-- Flash10 -->
					<td class="attribute">
						<h5>Flash10
							<div class="tooltip">
								<p>flash10="on|off" - enable/disable use of the new Flash10 rendering possibilities</p>
								<ul>
									<li>without a Flashplayer 10 the standard Flash9 rendering is used</li>
									<li>Flash10 allows a perfect 3D distorted drawing of "flat/linear" 3D images
									<li>for optimal quality and performance use cubical panorama images
									<li>for spherical and fisheye distorted panoramas the usage of Flash9 rendering is recommended for better performance</li>
								</ul>
							</div>
						</h5>
					</td>
					<td>
						<input name="display_Flash10_amount" type="checkbox" class="large_input corners amount" <?php if($display->Flash10 == "on"){ ?> checked="checked" <?php } ?> />
					</td>
				</tr>
				<tr id="display_details" > <!-- Details -->
					<td class="attribute">
						<h5>Details
							<div class="tooltip">
								<p>Rendering details. The more details, the more exact the 3d geometry is and reduces 'wave-distortion-effects' but alsoo decreases performance.</p>
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input  name="display_Details_amount" type="text" class="large_input corners amount" value="10" />
					</form>
					</td>
				</tr>
				<tr id="display_tessmode" > <!-- Tessmode -->
					<td class="attribute">
						<h5>Tessmode
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="display_Tessmode_amount" type="text" class="large_input corners amount" value="<?= $display->Tessmode ?>" disabled="true" />
						
					</td>
				</tr>
				<tr id="display_fps" > <!-- Fps -->
					<td class="attribute">
						<h5>Frames per Second (FPS)
							<div class="tooltip">
								<p>The framerate in frames per second (fps) of the Flashplayer.
								It should be something between 30 and 100, the default is 60.</p>
								<p>
								Note - in the Flashplayer there is only one global framerate, this means the framerate setting can affect other flash elements when their animation is based on the framerate.</p>			
							</div>	
						</h5>	
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="display_Fps_amount" type="text" class="large_input corners amount" value="<?= $display->Fps ?>" disabled="true" />
					</td>
				</tr>
				<tr id="display_movequality" > <!-- Movequality -->
					<td class="attribute">
						<h5>Movequality
							<div class="tooltip">
								<p>The Flashplayer rendering quality while moving.</p>		 					
							</div>
						</h5>
					</td>
					<td>
						<select name="display_movequality_amount"  class="large_input corners amount">
							<option id="movequality_BEST" value="BEST">Best quality</option>
							<option id="movequality_HIGHSHARP" value="HIGHSHARP">High quality with sharpening</option>
							<option id="movequality_HIGH" value="HIGH">High quality</option>
							<option id="movequality_LOW" value="LOW">Normal quality</option>
						</select>							
					</td>
				</tr>
				<tr id="display_stillquality" > <!-- Stillquality -->
					<td class="attribute">
						<h5>Stillquality
							<div class="tooltip">
								<p>The Flashplayer rendering quality when not moving for <u>Stilltime</u> seconds.</p>			 					
							</div>
						</h5>
					</td>
					<td>
						<select name="display_stillquality_amount"  class="large_input corners amount">
							<option id="stillquality_BEST" value="BEST">Best quality</option>
							<option id="stillquality_HIGHSHARP" value="HIGHSHARP">High quality with sharpening</option>
							<option id="stillquality_HIGH" value="HIGH">High quality</option>
							<option id="stillquality_LOW" value="LOW">Normal quality</option>
						</select>							
					</td>
				</tr>
				<tr id="display_stilltime" > <!-- Stilltime -->
					<td class="attribute">
						<h5>Stilltime
							<div class="tooltip">
								<p>How many seconds, after moving the panorama, should the quality switch from Movequality to Stillquality?</p>			 					
							</div>
						</h5>
					</td>
					<td>
					<<div class="slider"></div>
					<input name="display_stilltime_amount" type="text" class="large_input corners amount" value="<?= $display->Stilltime ?>" disabled="true" /></td>
				</tr>
				<tr id="display_showpolys" > <!-- Showpolys -->
					<td class="attribute">
						<h5>Showpolys
							<div class="tooltip">
								<p>Show the polygons of the internal 3D geometry.</p>			 					
							</div>
						</h5>
					</td>
					<td>
						<input name="display_showpolys" type="checkbox" class="large_input corners amount" <?php if($display->Showpolys){ ?> checked="checked" <?php } ?> />
					</td>
				</tr>
			</tbody>
		</table>							
	</div>  <!-- END DISPLAY TAB -->
	<h3><a href="#">Network</a></h3>
	<div> 
		<table cellspacing="0" class="tableinformation">
			<thead>
				<tr>
					<th>Attribute</th>
					<th>Value</th>	
				</tr>
			</thead>
			<tbody>
				<tr id="network_downloadqueues" > <!-- Downloadqueues -->
					<td class="attribute">
						<h5>Downloadqueues
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input  name="network_downloadqueues_amount" type="text" class="large_input corners amount" value="<?= $network->Downloadqueues ?>" disabled="true"/>
					</td>
				</tr>
				<tr id="network_decodequeues" > <!-- Decodequeues -->
					<td class="attribute">
						<h5>Decodequeues
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="network_decodequeues_amount" type="text" class="large_input corners amount" value="<?= $network->Decodequeues ?>" disabled="true" />
					</td>
				</tr>
				<tr id="network_retrycount" > <!-- Retrycount -->
					<td class="attribute">
						<h5>Retrycount
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="network_retrycount_amount" type="text" class="large_input corners amount" value="<?= $network->Retrycount ?>" disabled="true" />
					</td>
				</tr>
				<tr id="network_caching" > <!-- Caching -->
					<td class="attribute">
						<h5>Caching
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
							<input name="network_Caching_amount" type="checkbox" class="large_input corners amount" <?php if($network->Caching){ ?> checked="checked" <?php } ?> />
					</td>
				</tr>
				<tr id="network_cachesize" > <!-- Cachesize -->
					<td class="attribute">
						<h5>Cachesize
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="network_cachesize_amount" type="text" class="large_input corners amount" value="<?= $network->Cachesize ?>" disabled="true" />
					</td>
				</tr>
			</tbody>
		</table>							
	</div> <!-- END NETWORK TAB -->
	<h3><a href="#">Memory</a></h3>
	<div> 
		<table cellspacing="0" class="tableinformation">
			<thead>
				<tr>
					<th>Attribute</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<tr id="memory_maxmem" > <!-- Maxmem -->
					<td class="attribute">
						<h5>Maxmem
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="memory_maxmem_amount" type="text" class="large_input corners amount" value="<?= $memory->Maxmem ?> mb" disabled="true" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>  <!-- END MEMORY TAB -->
	<h3><a href="#">Control</a></h3>
	<div> 
		<table cellspacing="0" class="tableinformation">
			<thead>
				<tr>
					<th>Attribute</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<tr id="control_mousetype" > <!-- Mousetype -->
					<td class="attribute">
						<h5>Mousetype
							<div class="tooltip">
								<p>Description</p>			 					
							</div>
						</h5>
					</td>
					<td>
						<select name="control_mousetype_amount"  class="large_input corners amount">
							<option id="mousetype_drag2d" value="drag2d">2 dimensional drag (tilt/pan)</option>
							<option id="mousetype_drag3d" value="drag3d">3 dimensional drag (tilt/pan/rotation)</option>
							<option id="mousetype_moveto" value="moveto">click and follow mouse</option>
							<!-- to do custom hotspot -->
						</select>							
					</td>
				</tr>
				<tr id="control_mouseaccelerate" > <!-- Mouseaccelerate -->
					<td class="attribute">
						<h5>Mouseaccelerate			
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input  name="control_mouseaccelerate_amount" type="text" class="large_input corners amount" value="<?= $control->Mouseaccelerate ?>" disabled="true"/>
					</td>						
				</tr>
				<tr id="control_mousespeed" > <!-- Mousespeed -->
					<td class="attribute">
						<h5>Mousespeed
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input  name="control_mousespeed_amount" type="text" class="large_input corners amount" value="<?= $control->Mousespeed ?>" disabled="true"/>
					</td>
				</tr>
				<tr id="control_mousefriction" > <!-- Mousefriction -->
					<td class="attribute">
						<h5>Mousefriction
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_mousefriction_amount" type="text" class="large_input corners amount" value="<?= $control->Mousefriction ?>" disabled="true"/>
					</td>
				</tr>
				<tr id="control_mousefovchange" > <!-- Mousefovchange -->
					<td class="attribute">
						<h5>Mousefovchange
							<div class="tooltip">
								<p>The mouse wheel fov (zoom) change in degrees (=mouse wheel zoom sensibility). </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_mousefovchange_amount" type="text" class="large_input corners amount" value="<?= $control->Mousefovchange ?>" disabled="true"/>
					</td>
				</tr>
				<tr id="control_keybaccelerate" > <!-- Keybaccelerate -->
					<td class="attribute">
						<h5>Keybaccelerate
							<div class="tooltip">
								<p>The acceleration of the keyboard / button controlled moving.</p>							
							</div>
						</h5>
					</td>
					<td>
						<<div class="slider"></div>	
						<input  name="control_keybaccelerate_amount" type="text" class="large_input corners amount" value="<?= $control->Keybaccelerate ?>" disabled="true"/>
					</td>
				</tr>
				<tr id="control_keybspeed" > <!-- Keybspeed -->
					<td class="attribute">
						<h5>Keybspeed
							<div class="tooltip">
								<p>The maximum moving speed of the keyboard / button controlled moving. </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_keybspeed_amount" type="text" class="large_input corners amount" value="<?= $control->Keybspeed ?>" disabled="true"/>
					</td>
				</tr>					
				<tr id="control_keybfriction" > <!-- Keybfriction -->
					<td class="attribute">
						<h5>Keybfriction
							<div class="tooltip">
								<p>The moving friction of the keyboard / button controlled moves. </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_keybfriction_amount" type="text" class="large_input corners amount" value="<?= $control->Keybfriction ?>" disabled="true"/>
					</td>
				</tr>					
				<tr id="control_keybfovchange" > <!-- Keybfovchange -->
					<td class="attribute">
						<h5>Keybfovchange
							<div class="tooltip">
								<p>The keyboard / button fov (zoom) change in degrees (=zoom sensibility). </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_keybfovchange_amount" type="text" class="large_input corners amount" value="<?= $control->Keybfovchange ?>" disabled="true"/>
					</td>
				</tr>					
				<tr id="control_keybinvert" > <!-- Keybinvert -->
					<td class="attribute">
						<h5>Keybinvert
							<div class="tooltip">
								<p>Invert keyboard / button up and down moves. </p>							
							</div>
						</h5>
					</td>
					<td>
						<input name="control_keybinvert_amount" type="checkbox" class="large_input corners amount" <?php if($control->Keybinvert){ ?> checked="checked" <?php } ?> />
					</td>
				</tr>						
				<tr id="control_fovspeed" > <!-- Fovspeed -->
					<td class="attribute">
						<h5>Fovspeed
							<div class="tooltip">
								<p>The maximum fov change / zooming speed. </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_fovspeed_amount" type="text" class="large_input corners amount" value="<?= $control->Fovspeed ?>" disabled="true"/>
					</td>
				</tr>					
				<tr id="control_fovfriction" > <!-- Fovfriction -->
					<td class="attribute">
						<h5>Fovfriction
							<div class="tooltip">
								<p>The friction of fov changes / zoomings. </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_fovfriction_amount" type="text" class="large_input corners amount" value="<?= $control->Fovfriction ?>" disabled="true"/>
					</td>
				</tr>	
				<tr id="control_movetocursor" > <!-- Movetocursor -->
					<td class="attribute">
						<h5>Movetocursor
							<div class="tooltip">
								<p>Enable a direction cursor for the "moveto" mousetype.</p>							
							</div>
						</h5>
						</h5>
					</td>
					<td>
						<select name="control_movetocursor_amount"  class="large_input corners amount">
							<option id="Movetocursor_vector" value="vector">a direction vector cursor</option>
							<option id="Movetocursor_arrow" value="arrow"> a rotating arrow cursor </option>
							<option id="Movetocursor_none" value="none">no special cursor, use the default system arrow cursor</option>
							<!-- to do custom hotspot -->
						</select>								
					</td>
				</tr>	
				<tr id="control_cursorsize" > <!-- Cursorsize -->
					<td class="attribute">
						<h5>Cursorsize
							<div class="tooltip">
								<p>Size of the <u>movetocursor</u> cursor. </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_cursorsize_amount" type="text" class="large_input corners amount" value="<?= $control->Cursorsize ?>" disabled="true"/>
					</td>
				</tr>	
				<tr id="control_headswing" > <!-- Headswing -->
					<td class="attribute">
						<h5>Headswing
							<div class="tooltip">
								<p>Swing / tilt the head / view when fast moving left or right (moveto mode only).
This value sets the strength of this effect, from 0 to 10 and higher.</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="control_headswing_amount" type="text" class="large_input corners amount" value="<?= $control->Headswing ?>" disabled="true"/>
					</td>
				</tr>							
				<tr id="control_keycodesleft" > <!-- Keycodesleft -->
					<td class="attribute">
						<h5>Keycodesleft
							<div class="tooltip">
								<p>Keyboard keycodes for moving left, default="37" (cursor left) </p>							
							</div>
						</h5>
					</td>
					<td>
						<input  name="control_keycodesleft_amount" type="text" class="xlarge_input corners" value="<?= $control->Keycodesleft ?>" disabled="true" />
					</td>		
				</tr>
				<tr id="control_keycodesright" > <!-- Keycodesright -->
					<td class="attribute">
						<h5>Keycodesright
							<div class="tooltip">
								<p>Keyboard keycodes for moving right, default="39" (cursor right) </p>							
							</div>
						</h5>
					</td>
					<td>
						<input  name="control_keycodesright_amount" type="text" class="xlarge_input corners" value="<?= $control->Keycodesright ?>" disabled="true" />
					</td>		
				</tr>
				<tr id="control_keycodesup" > <!-- Keycodesup -->
					<td class="attribute">
						<h5>Keycodesup
							<div class="tooltip">
								<p>Keyboard keycodes for moving up, default="38" (cursor up) </p>							
							</div>
						</h5>
					</td>
					<td>
						<input  name="control_keycodesup_amount" type="text" class="xlarge_input corners" value="<?= $control->Keycodesup ?>" disabled="true"/>
					</td>		
				</tr>
				<tr id="control_keycodesdown" > <!-- Keycodesdown -->
					<td class="attribute">
						<h5>Keycodesdown
							<div class="tooltip">
								<p>Keyboard keycodes for moving down, default="40" (cursor down)  </p>							
							</div>
						</h5>
					</td>
					<td>
						<input  name="control_keycodesdown_amount" type="text" class="xlarge_input corners" value="<?= $control->Keycodesdown ?>" disabled="true" />
					</td>	
				</tr>
				<tr id="control_keycodesin" > <!-- Keycodesin -->
				<td class="attribute">
						<h5>Keycodesin
							<div class="tooltip">
								<p>Keyboard keycodes for zooming in.
default="16,65,107" (Shift-key,A-key,Plus-key) </p>							
							</div>
						</h5>
					</td>
					<td>
						<input  name="control_keycodesin_amount" type="text" class="xlarge_input corners" value="<?= $control->Keycodesin ?>" disabled="true" />
					</td>						

				</tr>
				<tr id="control_keycodesout" > <!-- Keycodesout -->
				<td class="attribute">
						<h5>Keycodesout
							<div class="tooltip">
								<p>Keyboard keycodes for zooming out.
default="17,89,90,109" (CTRL-key,Y-key,Z-key,Minus-key) </p>							
							</div>
						</h5>
					</td>
					<td>
						<input name="control_keycodesout_amount" type="text" class="xlarge_input corners" value="<?= $control->Keycodesout ?>" disabled="true"/>
					</td>						
				</tr>
				<tr id="control_zZoomtocursor" > <!-- Zoomtocursor -->
					<td class="attribute">
						<h5>Zoomtocursor
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
				        <input name="control_zoomtocursor_amount" type="checkbox" class="large_input corners amount" <?php if($control->Zoomtocursor){ ?> checked="checked" <?php } ?> />
					</td>
				</tr>			
				<tr id="control_zoomoutcursor" > <!-- Zoomoutcursor -->
					<td class="attribute">
						<h5>Zoomoutcursor
							<div class="tooltip">
								<p>Description</p>							
							</div>
						</h5>
					</td>
					<td>
						<input name="control_zoomoutcursor_amount" type="checkbox" class="large_input corners amount" <?php if($control->Zoomoutcursor){ ?> checked="checked" <?php } ?> />
                    </td>
				</tr>			
				<tr id="control_trackpadzoom" > <!-- Trackpadzoom -->
					<td class="attribute">
						<h5>Trackpadzoom
							<div class="tooltip">
								<p>On Android there are not zooming gestures at the moment, so with this setting it is possible to use the trackpad for zooming instead. </p>							
							</div>
						</h5>
					</td>
					<td>
						<input name="control_trackpadzoom_amount" type="checkbox" class="large_input corners amount" <?php if($control->Trackpadzoom){ ?> checked="checked" <?php } ?> />
					</td>
				</tr>		
				<tr id="control_touchfriction" > <!-- Touchfriction -->
					<td class="attribute">
						<h5>Touchfriction
							<div class="tooltip">
								<p>The moving friction for touch controls (iPhone/iPad/Android). </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input  name="control_touchfriction_amount" type="text" class="large_input corners amount" value="<?= $control->Touchfriction ?>" disabled="true" />
					</td>
				</tr>		
				<tr id="control_usercontrol" > <!-- Usercontrol -->
					<td class="attribute">
						<h5>Usercontrol
							<div class="tooltip">
								<p>Description</p>			 					
							</div>
						</h5>
					</td>
					<td>
						<select name="control_usercontrol_amount"  class="large_input corners amount">
							<option id="all" value="all" >Allow mouse and keyboard to move the panorama</option>
							<option id="keyb" value="keyb" >Allow only keyboard to move the panorama</option>
							<option id="mouse" value="mouse" >Allow only the mouse to move the panorama</option>
							<option id="off" value="off" >Don't allow any movement, except programmed</option>
							<!-- to do custom hotspot -->
						</select>							
					</td>
				</tr>					
			</tbody>
		</table>
	</div> <!-- END CONTROL TAB -->
	<h3><a href="#">Autorotate</a></h3>
	<div> 
		<table cellspacing="0" class="tableinformation">
			<thead>
				<tr>
					<th>Attribute</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<tr id="autorotate_enabled" > <!-- Enabled -->
					<td class="attribute">
						<h5>Enabled
							<div class="tooltip">
								<p>Enable/disable the automatic rotation.  </p>							
							</div>
						</h5>
					</td>
					<td>
						<input name="autorotate_enabled_amount" type="checkbox" class="large_input corners amount" <?php if($autorotate->Enabled){ ?> checked="checked" <?php } ?> />
					</td>
				</tr>		
				<tr id="autorotate_waittime" > <!-- Waittime -->
					<td class="attribute">
						<h5>Waittime
							<div class="tooltip">
								<p>The time in seconds to wait after the last user-interaction before starting the automatic rotation.  </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input  name="autorotate_waittime_amount" type="text" class="large_input corners amount" value="<?= $autorotate->Waittime ?>" disabled="true" />
					</td>
				</tr>		
				<tr id="autorotate_speed" > <!-- Speed -->
					<td class="attribute">
						<h5>Speed
							<div class="tooltip">
								<p>The maximum rotation speed in degrees/second.
Use a negative value for a rotation to left. </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="autorotate_speed_amount" type="text" class="large_input corners amount" value="<?= $autorotate->Speed ?>" disabled="true"/>
					</td>
				</tr>		
				<tr id="autorotate_accel" > <!-- Accel -->
					<td class="attribute">
						<h5>Accel
							<div class="tooltip">
								<p>The rotation acceleration in degrees/second². </p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input  name="autorotate_accel_amount" type="text" class="large_input corners amount" value="<?= $autorotate->Accel ?>" disabled="true"/>
					</td>
				</tr>		
				<tr class="autorotate_horizon"> <!-- Horizon -->
					<td class="attribute">
						<h5>Horizon
							<div class="tooltip">
								<p>Move / rotate to the given horizon (0.0 = middle of the pano).
Set the value to "off" or any other non-number value to disable it.</p>							
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>	
						<input name="autorotate_horizon_amount" type="text" class="large_input corners amount" value="<?= $autorotate->Accel ?>" disabled="true"/>
					</td>
				</tr>		
			</tbody>
		</table>
	</div> <!-- END AUTOROTATE TAB -->
</div>