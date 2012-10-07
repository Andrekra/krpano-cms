<div class="accordion" >
<?php
    //$categories = explode(',','action,area,autorotate,contextmenu,control,cursors,data,display,events,hotspot,image,lensflare,lensflareset,memory,network,plugin,preview,progress,scene,security,style,textstyle,view,xml');
    $categories = explode(',','area,autorotate,control,display,events,image,memory,network,plugin,preview,progress,scene,security,view,xml');
    foreach($categories as $cat){
?>
    <h3><a href="#"><?= $cat; ?></a></h3>
    <div>
        <table cellspacing="0" class="tableinformation corners_bottom">
        <thead>
            <tr>
                <th>Attribute</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>

        <?php
        foreach($this->krpanoproperties as $property){
            if($property->category == $cat){
            ?>
                <tr id="<?= $property->category.'_'.$property->property; ?>"> <!-- Type -->
                    <td class="attribute">
                        <h5><?= $property->property; ?>
                            <div class="tooltip">
                                <?= $property->description; ?>
                            </div>
                        </h5>
                    </td>
                    <td>
                        <?php
                            switch($property->input_type){
                                case "select":
                                    ?>
                                        <!--<select class="large_input corners amount">
                                            <?php
                                                foreach(explode(',',$property->input_options) as $option){
                                                    ?>
                                                       <option value="<?= $option; ?>"><?= $option; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>-->
                                        <?php
                                            foreach(explode(',',$property->input_options) as $option){
                                                ?>
                                        <span class="option amount "><?= $option; ?></span>
                                         <?php
                                                }
                                            ?>
                                    <?php
                                break;
                                case "text":
                                    ?>
                                    <input type="text" class="amount" value="<?= $property->default; ?>" />
                                    <?php
                                break;
                                case "color":
                                    ?>
                                    <input type="color" class="amount" value="<?= $property->default; ?>" />
                                    <?php
                                break;
                                case "slider":
                                    ?>
                                    <div class="slider" data-min="<?= $property->min; ?>" data-max="<?= $property->max; ?>" data-step="<?= $property->step; ?>" data-value="<?= $property->default; ?>" ></div>
                                    <input type="text" class="amount" value="<?= $property->default; ?>" />
                                    <?php
                                break;
                                case "spinner":
                                    ?>
                                    <input type="text" class="amount spinner" value="<?= $property->default; ?>" data-min="<?= $property->min; ?>" data-max="100" />
                                    <?php
                                break;
                                case "boolean":
                                    ?>
                                    <input type="checkbox" class="amount" checked="<?= $property->default == 1 ? 'checked' : ''; ?>" />
                                    <?php
                                break;
                            }
                        ?>
                    </td>
                </tr>
            <?php
            } //end if category
         } //end property loop
        ?>
        </tbody>
        </table>
    </div>
<?php } //end category loop ?>
</div>