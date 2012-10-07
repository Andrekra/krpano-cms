<?php
class YoutubeEmbedWidget extends CWidget
{
    public $code;
    public $style = array("width" => 270, "height" => 190, "border" => "none", "overflow" => "hidden");

    public function init()
    {

    }
    public function run()
    {
        echo '<div class="youtube-wrapper">';
        echo '<iframe
                    src="http://www.youtube.com/embed/' . $this->code . '"
                    scrolling="no"
                    frameborder="0"
                    allowTransparency="true"
                    allowfullscreen
                    style="
                        width:' . $this->style['width'] . 'px;
                        height:' . $this->style['height'] . 'px;
                        border:' . $this->style['border'] . 'px;
                        overflow:' . $this->style['overflow'] .
             '">
              </iframe>';
        echo '</div>';
    }
}
