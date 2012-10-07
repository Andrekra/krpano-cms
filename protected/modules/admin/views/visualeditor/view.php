<div id="sidebar-left">
    <div class="padding editor" >
        <?php
            //Kint::dunp($default_location);
            $this->beginWidget('ext.krpano.editor.KrpanoEditorWidget', array(
                'project'=>$project,
                'locations'=>$locations,
                'default_location'=>$default_location,
                'krpanoproperties'=>$krpanoproperties,
            ));
            $this->endWidget();

        ?>
    </div>
</div>
    <!--
<div id="sidebar-toggle" class="span-1">
    <a href="#" id="showHideNav">show/hide</a>
</div> --> 
<div id="main">
    <div class="inner">
        <div class="container sub">
                <div class="viewer padding">
                    <?php
                        $this->beginWidget('ext.krpano.viewer.KrpanoWidget', array(
                          'image_url' => $default_location->image->url,
                          'image_type' => $default_location->image->type,
                        ));
                        $this->endWidget();
                    ?>
                </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!--<div id="sidebar-right"></div>-->
