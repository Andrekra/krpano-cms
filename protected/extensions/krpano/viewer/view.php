<script src="<?= $this->assetsUrl; ?>swfkrpano.js"></script>
<div id="pano" style="width:100%; height:100%;">
    <noscript><table style="width:100%;height:100%;"><tr style="valign:middle;"><td><div style="text-align:center;">ERROR:<br/><br/>Javascript not activated<br/><br/></div></td></tr></table></noscript>
    <script>
        var viewer = createPanoViewer({swf:"<?= $this->assetsUrl; ?>krpano.swf", xml:"<?= $this->assetsUrl.$this->xml_url; ?>", target:"pano"});
        viewer.addParam("wmode", "<?= $this->wmode; ?>");
        viewer.addVariable("image.type", "<?= strtolower($this->image_type); ?>");
        viewer.addVariable("image.<?= strtolower($this->image_type); ?>.url", "<?= $this->image_url; ?>");
        viewer.embed();
     </script>
 </div>
