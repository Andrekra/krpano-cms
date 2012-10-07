<div class="sidebar">
    <div class="tabs">
        <ul>
            <li><a href="#tab-design"><span>Theme&Design </span></a></li>
            <li><a href="#tab-tour"><span>Tour</span></a></li>
            <li><a href="#tab-location"><span>Location</span></a></li>
            <li><a href="#tab-hotspot"><span>Hotspot</span></a></li>
        </ul>

        <div id="tab-design">
           <?php /*$this->render('editor.category.theme');*/ ?>
        </div>
        <div id="tab-tour">
             <?php /*$this->render('editor.category.tour', array(
                                        'network' => $this->project->network,
                                        'display' =>  $this->project->display,
                                        'memory' =>  $this->project->memory,
                                        'control' =>  $this->project->control,
                                        'autorotate' =>  $this->project->autorotate,
                                        'krpanoproperties' =>  $this->krpanoproperties,
                                     ));*/
                 $this->render('editor.category._form', array(
                                         'categories' => array('display','control','network','memory','autorotate')
                                     ));
            ?>
        </div>
        <div id="tab-location">
            <?php /*$this->render('editor.category.location', array(
                                        'hotspots' => $this->default_location->hotspots,
                                        'view' =>  $this->default_location->view,
                                        'preview' =>  $this->default_location->preview,
                                        'image' =>  $this->default_location->image
                                     ));*/
            ?>
        </div>
        <div id="tab-hotspot">
            <?php
                $this->render('editor.category._form', array(
                     'categories' => array('hotspot')
                 ));
            ?>
        </div>
    </div>
</div>