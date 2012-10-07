<div class="accordion" >
<?php
    //$categories = explode(',','action,area,autorotate,contextmenu,control,cursors,data,display,events,hotspot,image,lensflare,lensflareset,memory,network,plugin,preview,progress,scene,security,style,textstyle,view,xml');
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
            if($property->category == $cat && $property->view_only == 0){
            ?>
                <tr id="<?= $property->category.'_'.$property->property; ?>" class="<?php if($property->is_advanced == 1){ print "advanced";} ?>" ><!-- Type -->
                    <td class="attribute">
                        <h5><?= $property->property; ?>
                            <div class="tooltip">
                                <?= CHtml::encode($property->description); ?>
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
                                                $option = trim($option);
                                                if($this->get_value($property->category,$property->property) == $option)
                                                {
                                                ?>
                                                <span class="option amount current"><?= $option; ?></span>
                                                <?php } else { ?>
                                                <span class="option amount"><?= $option; ?></span>
                                                <?php }
                                            }
                                            ?>
                                    <?php
                                break;
                                case "text":
                                    ?>
                                    <input type="text" class="amount" value="<?= $this->get_value($property->category,$property->property); ?>" />
                                    <?php
                                break;
                                case "color":
                                    ?>
                                    <input type="color" class="amount" value="<?= $this->get_value($property->category,$property->property); ?>" />
                                    <?php
                                break;
                                case "slider":
                                    ?>
                                    <div class="slider" data-min="<?= $property->min; ?>" data-max="<?= $property->max; ?>" data-step="<?= $property->step; ?>" data-value="<?= $this->get_value($property->category,$property->property); ?>" ></div>
                                    <input type="text" class="amount" value="<?= $this->get_value($property->category,$property->property); ?>" />
                                    <?php
                                break;
                                case "spinner":
                                    ?>
                                    <input type="text" class="amount spinner" value="<?= $this->get_value($property->category,$property->property); ?>" data-min="<?= $property->min; ?>" data-max="100" />
                                    <?php
                                break;
                                case "boolean":
                                    ?>
                                    <input type="checkbox" class="amount" checked="<?= $this->get_value($property->category,$property->property) == 1 ? 'checked' : ''; ?>" />
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