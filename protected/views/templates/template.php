<?php
if(!empty($template)){
    foreach($template as $property){

        // Kint::dump($property);
        $class = "attribute";
        if($property->ipad_compatible == 0) $class .= " flashonly";
        if($property->is_advanced == 1) $class .= " advanced";
        if($property->read_only == 1) $class .= " readonly";
        if($property->view_only == 1) $class .= " viewonly";

        //don't show read-only properties
        if($property->read_only == false && $property->view_only == false){
        ?>
        <div id="<?= $property->property ?>" class="<?= $class ?>">
            <label title="<?= $property->description ?>"><?= $property->property ?></label>
            <?php
            switch($property->input_type){
                case "slider":
                    ?>
                        <div class="attribute-row">
                            <div class="cell">
                                <div class="slider" data-min="<?= $property->min ?>" data-max="<?= $property->max ?>" data-step="<?= $property->step ?>" data-value="<%= <?=$property->property;?> %>"></div>
                            </div>
                            <div class="cell">
                                <input type="text"class="amount spinner" value="<%= <?= $property->property ?> %>" />
                            </div>
                        </div>
                        <?php
                    break;
                case "spinner":
                    ?>
                        <input type="text" name="<?= $property->property ?>" class="amount spinner" data-min="<?= $property->min ?>" data-step="<?= $property->step ?>" value="<%= <?= $property->property ?> %>" />
                        <?php
                    break;
                case "color":
                    ?>
                        <input type="text" name="<?= $property->property ?>" class="amount color" value="<%= <?= $property->property ?> %>" />
                        <?php
                    break;
                case "boolean":
                    ?>
                            <input type="checkbox" name="showpolys" class="amount" <% if (<?= $property->property ?> == true){ "checked" } %> />
                        <?php
                        break;
                case "select":
                    $options = explode(',', $property->input_options);
                    print '<div class="radio">';
                    foreach($options as $option){
                        $option = trim($option);
                        ?>
                        <input type="radio" id="<?= $property->property . '_' . strtolower($option); ?>" value="<?= $option; ?>" name="<?= $property->property . '_radio' ?>"
                            <% if(<?=$property->property;?> == "<?= $option; ?>"){ "selected" } %>
                            />
                        <label for="<?= $property->property . '_' . strtolower($option); ?>"><?= ucfirst(strtolower($option))?></label>
                        <?php
                    }
                    print '</div>';
                    break;
                case "text":
                    ?>
                        <textarea id="<?= $property->property; ?>" class="amount"><%= <?= $property->property; ?>%></textarea>
                        <?php
                    break;
            }
            ?>
        </div>
        <?
        }
    }
}
?>