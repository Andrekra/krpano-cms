<?php
class FacebookCommentsWidget extends CWidget
{
    public $id;
    public $width = 500;
    public $maxposts = 2;

    public function init()
    {
        $this->id = comments_url($this->id);
    }


    public function run()
    {
        echo '<div class="comments-wrapper">';
            echo '<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>';
            echo '<fb:comments href="'.$this->id.'" num_posts="'.$this->maxposts.'" width="'.$this->width.'"></fb:comments>';
        echo '</div>';
    }
}
