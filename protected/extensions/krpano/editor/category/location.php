<div class="accordion" >
	<h3><a href="#">Image</a></h3>
	<div>
		<table cellspacing="0" class="tableinformation corners_bottom">
			<thead>
				<tr>
					<th>Attribute</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<tr id="image_type"> <!-- Type -->
					<td class="attribute">
						<h5>Type of Panorama
							<div class="tooltip">
								Define the type of the panorama image.
							</div>
						</h5>
					</td>
					<td>
						<select name="image_type_amount" class="large_input corners amount">
							<option value="SPHERE" >Spherical</option>
							<option value="CUBE">Cubic</option>
							<option value="CYLINDER">Cylindrical Panorama</option>
							<option value="CUBESTRIPE">Cubestripe</option>
							<option value="QTVR">Quicktime VR</option>
							<option value="ZOOMIFY">Zoomify</option>
						</select>
					</td>
				</tr>
				<tr id="image_url"> <!-- Url -->
					<td class="attribute">
						<h5>Url
							<div class="tooltip">
								Defines the path/url of the panorama.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="image_url_amount" class="xlarge_input corners amount" />
					</td>
				</tr>
				<tr id="image_multires"> <!-- Multires -->
					<td class="attribute">
						<h5>Multires
							<div class="tooltip">
								Enables the usage of a tiled/sliced multi-resolution images.
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="image_multires_amount" />
					</td>
				</tr>
				<tr id="image_multiresthreshold"> <!-- Multiresthreshold -->
					<td class="attribute">
						<h5>Multiresthreshold
							<div class="tooltip">
								The threshold that controls when to switch from one multi-resolution level to the next one. Reasonable values are from -1.0 to +1.0 but lower or higher values are also possible.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_multiresthreshold_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_progressive"> <!-- Progressive -->
					<td class="attribute">
						<h5>Progressive
							<div class="tooltip">
								Progressive loading means that the multi-resolution pano will be loaded step by step from low to high resolution. Only the tiles in the current viewing range will be loaded from level level.
								When disabled, then the tiles for current resolution will be loaded at first, and then when the loading of all current visible tiles was done, it will start preloading the lower resolutions of the current view.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_progressive_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_levels"> <!-- Levels -->
					<td class="attribute">
						<h5>Levels
							<div class="tooltip">
								The number of Image Levels of the panorama.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_levels_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_levelsteps"> <!-- Levelsteps -->
					<td class="attribute">
						<h5>Levels.steps
							<div class="tooltip">
								With how much does the resolution drop with each level.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_levelsteps_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_levelaspreview"> <!--Levelaspreview-->
					<td class="attribute">
						<h5>Level.Aspreview
							<div class="tooltip">
								Use this level as preview. Loads the whole level.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_levelaspreview_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_leveldetails"> <!--Leveldetails-->
					<td class="attribute">
						<h5>Level.Details
							<div class="tooltip">
								This setting will overrule the default display.details setting.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_Leveldetails_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_leveldownload"> <!-- Leveldownload -->
					<td class="attribute">
						<h5>Level.download
							<div class="tooltip">
								Defines if all tiles from that level should be downloaded or only the onces that were currently need for viewing.
						</h5>
					</td>
					<td>
						<select name="image_Leveldownload_amount" class="large_input corners amount">
							<option value="all">all - All tiles from that level will be loaded.</option>
							<option value="view">view - Only the tiles that are needed for the current view will be downloaded.</option>
							<option value="auto">auto - When the level size is lower then 10 megapixel (=width*height < 10mp) then "all" tiles will be loaded, otherwise only the "view" tiles.</option>
						</select>
					</td>
				</tr>
				<tr id="image_leveldecode"> <!-- Leveldownload -->
					<td class="attribute">
						<h5>Level.decode
							<div class="tooltip">
								Defines if all tiles from that level should be decoded or only the onces that were currently need for viewing.
						</h5>
					</td>
					<td>
						<select name="image_Leveldecode_amount" class="large_input corners amount">
							<option value="all">all - All tiles from that level will be loaded.</option>
							<option value="view">view - Only the tiles that are needed for the current view will be downloaded.</option>
							<option value="auto">auto - When the level size is lower then 10 megapixel (=width*height < 10mp) then "all" tiles will be loaded, otherwise only the "view" tiles.</option>
						</select>
					</td>
				</tr>
				<tr id="image_tiled"> <!-- Tiled -->
					<td class="attribute">
						<h5>Tiled
							<div class="tooltip">
								Enables the usage of a tiled/sliced image.
								When set to true, then also the tiledimagewidth, the tiledimageheight and the tilesize attributes must be set to define the image and tilesize.
							</div>
						</h5>
					</td>
					<td>
						<input type="checkbox" name="image_Tiled_amount" />
					</td>
				</tr>
				<tr id="image_tiledimagewidth"> <!-- tiledimagewidth -->
					<td class="attribute">
						<h5>Tiledimagewidth
							<div class="tooltip">
								Set the full size of the tiled image.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="image_Tiledimagewidth_amount" class="xlarge_input corners amount"/> <h5>px</h5>
					</td>
				</tr>
				<tr id="image_tiledimageheight"> <!-- tiledimageheight -->
					<td class="attribute">
						<h5>Tiledimageheight
							<div class="tooltip">
								Set the full size of the tiled image.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="image_Tiledimageheight_amount" class="xlarge_input corners amount" /><h5> px</h5>
					</td>
				</tr>
				<tr id="image_tilesize"> <!-- tilesize -->
					<td class="attribute">
						<h5>Tilesize
							<div class="tooltip">
								Defines the tilesize for tiled or multires images.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="image_Tilesize_amount" class="xlarge_input corners amount" /><h5> px</h5>
					</td>
				</tr>
				<tr id="image_baseindex"> <!-- tiled.Baseindex -->
					<td class="attribute">
						<h5>Baseindex
							<div class="tooltip">
								Defines the Baseindex for tiled or multires images.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="image_Baseindex_amount" class="xlarge_input corners amount" />
					</td>
				</tr>
				<tr id="image_hfov"> <!-- Hfov -->
					<td class="attribute">
						<h5>Hfov
							<div class="tooltip">
								Defines the horizontal field of view (hfov) of the pano image in degrees.
								This is the visible range that was captured on the pano image.
								The default value is 360, which means a view all around. Use a smaller value for partial panos. For Flat panos (or normal images) the value "1.0" should be used.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_Hfov_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_vfov"> <!-- Vfov -->
					<td class="attribute">
						<h5>Vfov
							<div class="tooltip">
								Defines the vertical field of view (vfov) of the pano image in degrees.
								By default (when no value was set), this value will be calculated automatically by using the hfov, the type of the pano and the side aspect of the pano image.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_Vfov_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_voffset"> <!-- Voffset -->
					<td class="attribute">
						<h5>Voffset
							<div class="tooltip">
								Defines the vertical offset of the pano image in degrees.</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="image_voffset_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="image_prealign"> <!-- Prealign -->
					<td class="attribute">
						<h5>Prealign
							<div class="tooltip">
								With the prealign setting the pano image itself can be aligned/rotated. This can be used to correct a miss-aligned pano.
								The syntax:
								<pre>prealign="X|Y|Z" </pre>
								where X, Y, Z defines the rotation about these axis in degrees.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="image_prealign_amount" class="xlarge_input corners amount" />
					</td>
				</tr>
				<tr id="image_frames"> <!-- Frames -->
					<td class="attribute">
						<h5>Frames
							<div class="tooltip">
								Number of frames of the panorama.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="image_frames_amount" class="xlarge_input corners amount" />
					</td>
				</tr>
				<tr id="image_frame"> <!-- Frame -->
					<td class="attribute">
						<h5>Frame
							<div class="tooltip">
								Current frame of the panorama.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="image_frame_amount" class="xlarge_input corners amount" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
    <h3><a href="#">Camera/View</a></h3>
    <div>
		<table cellspacing="0" class="tableinformation corners_bottom">
			<thead>
				<tr>
					<th>Attribute</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<tr id="view_hlookat"> <!-- Hlookat -->
					<td class="attribute">
						<h5>Hlookat
							<div class="tooltip">
								The horizontal looking direction in spherical coordinates (-180 ... +180).
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="view_hlookat_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="view_vlookat"> <!-- Vlookat -->
					<td class="attribute">
						<h5>Vlookat
							<div class="tooltip">
								The veritcal looking direction in spherical coordinates (-90 ... +90).
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="view_vlookat_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="view_camroll"> <!-- Camroll -->
					<td class="attribute">
						<h5>Camroll
							<div class="tooltip">
								The roll/rotation of camera.
							</div>
						</h5>
					</td>
					<td>
						<div class="slider"></div>
						<input name="view_camroll_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr id="view_fov"> <!-- Fovtype -->
					<td class="attribute">
						<h5>Fovtype
							<div class="tooltip">
								Defines the type of fov (field of view).
							</div>
						</h5>
					</td>
					<td>
						<select name="view_Fovtype_amount" id="view_Fovtype_amount" onchange="" class="large_input corners amount">
							<option value="VFOV" >VFOV - vertical field of view, based on the screen height</option>
							<option value="HFOV">HFOV - horizontal field of view, based on the screen width</option>
							<option value="DFOV">DFOV - diagonal field of view, based on the screen diagonal</option>
							<option value="MFOV">MFOV - 'maximum' field of view (a dynamic mix of VFOV and HFOV)</option>
						</select>
					</td>
				</tr>
				<tr> <!-- Fov -->
					<td class="attribute">
						<h5>Fov
							<div class="tooltip">
								The current field of view (in degrees).
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Fov_slider"></div>
						<input id="view_Fov_amount" name="view_Fov_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Fovmin -->
					<td class="attribute">
						<h5>Fovmin
							<div class="tooltip">
								The minimum fov value, this will limit the in-zooming to this value.
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Fovmin_slider"></div>
						<input id="view_Fovmin_amount" name="view_Fovmin_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Fovmax -->
					<td class="attribute">
						<h5>Fovmax
							<div class="tooltip">
								The maximum fov value, this will limit the out-zooming to this value.
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Fovmax_slider"></div>
						<input id="view_Fovmax_amount" name="view_Fovmax_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Maxpixelzoom -->
					<td class="attribute">
						<h5>Maxpixelzoom
							<div class="tooltip">
								The maximum pixel zoom factor of the pano image.
								This will limit the fov automatically depending on the pano resolution and the current viewing window, e.g. 1.0 = limit to 100% zoom, no pixel scaling of the source image will be visible.
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Maxpixelzoom_slider"></div>
						<input id="view_Maxpixelzoom_amount" name="view_Maxpixelzoom_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Fisheye -->
					<td class="attribute">
						<h5>Fisheye
							<div class="tooltip">
							Fisheye distortion effect (0.0 - 1.0)
							This value contolls the interpolation between the normal rectiliniear view and the fisheye distorted view.

							0.0 = no distortion / rectiliniear
							1.0 = full distortion

							There are two fisheye modes:
							- normal (view.stereographic="false")
							- stereographic (view.stereographic="true")
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Fisheye_slider"></div>
						<input id="view_Fisheye_amount" name="view_Fisheye_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Fisheyefovlink -->
					<td class="attribute">
						<h5>Fisheyefovlink
							<div class="tooltip">
							The fov and fisheye settings are linked together (when zooming in - the fisheye effect will be reduced) this value is the correlation between these values:
							(0.0 - 3.0), 0=linear correlation, 3=dynamic correlation) - default="0.5"
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Fisheyefovlink_slider"></div>
						<input id="view_Fisheyefovlink_amount" name="view_Fisheyefovlink_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Limitfov -->
					<td class="attribute">
						<h5>Limitfov
							<div class="tooltip">
							This is a setting for using the fisheye distortion.
							When enabled the fov will be automatically limited to avoid seeing of the fisheye lens border. When disabled and with a fisheye=1.0 setting it will be possible to zoom-out to 180° to see the full fisheye circle.
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Limitfov_slider"></div>
						<input id="view_Limitfov_amount" name="view_Limitfov_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Stereographic -->
					<td class="attribute">
						<h5>Stereographic
							<div class="tooltip">
							Enables/disables the stereographic fisheye projection.
							The "strongness" of the projection it is controlled by the "fisheye" variable.
							The stereographic projection allowes very interessting panorama views like the Little Planet Views.
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Stereographic_slider"></div>
						<input id="view_Stereographic_amount" name="view_Stereographic_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Pannini -->
					<td class="attribute">
						<h5>Pannini
							<div class="tooltip">
								Enables/disables the "Pannini/Vedutismo" Projection.
								The "strongness" of the projection it is controlled by the "fisheye" variable.
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Pannini_slider"></div>
						<input id="view_Pannini_amount" name="view_Pannini_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Architectural -->
					<td class="attribute">
						<h5>Architectural
							<div class="tooltip">
								Architectural projection (0.0 - 1.0).
								This value interpolates between the current projection (0.0) and the architectural projection mode (1.0).
							</div>
						</h5>
					</td>
					<td>
						<div id="view_Architectural_slider"></div>
						<input id="view_Architectural_amount" name="view_Architectural_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Architecturalonlymiddle -->
					<td class="attribute">
						<h5>Architecturalonlymiddle
							<div class="tooltip">
								When enabled, the architectural projection will be only used in the 'middle' area of the pano. When looking more up and down then the architectural projection will slowly switch back to normal projection. </div>
						</h5>
					</td>
					<td>
						<div id="view_Architecturalonlymiddle_slider"></div>
						<input id="view_Architecturalonlymiddle_amount" name="view_Architecturalonlymiddle_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
				<tr> <!-- Limitview -->
				<td class="attribute">
					<h5>Limitview
						<div class="tooltip">
							Limit the viewing range in the pano.
						</div>
					</h5>
				</td>
				<td>
					<select name="view_Limitview_amount" id="view_Limitview_amount" onchange="" class="large_input corners amount">
						<option value="off" >no limiting at all</option>
						<option value="auto" >auto - automatic limiting (default)</option>
						<option value="lookat">lookat - limit the lookat variables direct to "hlookatmin", "hlookatmax", "vlookatmin", "vlookatmax" Panorama</option>
						<option value="range">range - limit to the area set by "hlookatmin", "hlookatmax", "vlookatmin", "vlookatmax", allow viewing only INSIDE this range</option>
						<option value="fullrange">fullrange - limit to the area set by "hlookatmin", "hlookatmax", "vlookatmin", "vlookatmax", but allow zooming out to see the whole image (usefull for FLAT panos!)</option>
						<option value="offrange">offrange - limit to the area set by "hlookatmin", "hlookatmax", "vlookatmin", "vlookatmax", but don't limit the zooming in any way.</option>
					</select>
				</td>
			</tr>
			<tr> <!-- hlookatmin -->
				<td class="attribute">
					<h5>Hlookatmin
						<div class="tooltip">
							The minimum horizontal looking position in spherical coordinates (-180 .. +180).
						</div>
					</h5>
				</td>
				<td>
					<div id="view_Hlookatmin_slider"></div>
					<input id="view_Hlookatmin_amount" name="view_Hlookatmin_amount" type="text" class="large_input corners amount" value="" disabled="true" />
				</td>
			</tr>
			<tr> <!-- hlookatmax -->
				<td class="attribute">
					<h5>Hlookatmax
						<div class="tooltip">
							The maximum horizontal looking position in spherical coordinates (-180 .. +180).
						</div>
					</h5>
				</td>
				<td>
					<div id="view_Hlookatmax_slider"></div>
					<input id="view_Hlookatmax_amount" name="view_Hlookatmax_amount" type="text" class="large_input corners amount" value="" disabled="true" />
				</td>
			</tr>
			<tr> <!-- vlookatmin -->
				<td class="attribute">
					<h5>Vlookatmin
						<div class="tooltip">
							The minimum vertical looking position in spherical coordinates (-90 .. +90).
						</div>
					</h5>
				</td>
				<td>
					<div id="view_Vlookatmin_slider"></div>
					<input id="view_Vlookatmin_amount" name="view_Vlookatmin_amount" type="text" class="large_input corners amount" value="" disabled="true" />
				</td>
			</tr>
			<tr> <!-- Vlookatmax -->
				<td class="attribute">
					<h5>Vlookatmax
						<div class="tooltip">
							The maximum vertical looking position in spherical coordinates (-90 .. +90).
						</div>
					</h5>
				</td>
				<td>
					<div id="view_Vlookatmax_slider"></div>
					<input id="view_Vlookatmax_amount" name="view_Vlookatmax_amount" type="text" class="large_input corners amount" value="" disabled="true" />
				</td>
			</tr>
			</tbody>
		</table>
	</div>
    <h3><a href="#">Preview</a></h3>
    <div>
		<table cellspacing="0" class="tableinformation corners_bottom">
			<thead>
				<tr>
					<th>Attribute</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<tr> <!-- Type -->
					<td class="attribute">
						<h5>Type of preview Panorama
							<div class="tooltip">
								Define the type of the panorama image used as preview.
							</div>
						</h5>
					</td>
					<td>
						<select name="preview_Type_amount" id="preview_Type_amount" class="large_input corners amount">
							<option value="">Automatic detection (2:1 = spherem 6:1 cubestripe)</option>
							<option value="SPHERE">sphere</option>
							<option value="CYLINDER">Cylinder</option>
							<option value="CUBESTRIP">Cubestrip</option>
							<option value="GRID">A preview Grid</option>
						</select>
					</td>
				</tr>
				<tr> <!-- Url -->
					<td class="attribute">
						<h5>Url
							<div class="tooltip">
								Defines the path/url of the panorama.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="preview_Url_amount" id="preview_Url_amount" class="xlarge_input corners amount" />
					</td>
				</tr>
				<tr> <!-- Striporder -->
					<td class="attribute">
						<h5>Striporder
							<div class="tooltip">
								Defines the order of the images in the cubestrip image.
							</div>
						</h5>
					</td>
					<td>
						<input type="text" name="preview_Striporder_amount" id="preview_Striporder_amount" class="xlarge_input corners amount" />
					</td>
				</tr>
				<tr> <!-- Details -->
					<td class="attribute">
						<h5>Details
							<div class="tooltip">
								Internal rendering tesslation details, a higher details value will result in a more detailed internal 3D-geometry. When using the Flashplayer 10 and cubical images without any distortion (fisheye,stereographic,...) then this setting will be ignored, because a tesslation will be no necessary.
							</div>
						</h5>
					</td>
					<td>
						<div id="preview_Details_slider"></div>
						<input id="preview_Details_amount" name="preview_Details_amount" type="text" class="large_input corners amount" value="" disabled="true" />
					</td>
				</tr>
			</tbody>
		</table>
    </div>
</div>