<?php echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">' ?>
<?php echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">' ?>
<head>
	<title><?= $project->Name ?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="description" content="<?= $project->Description ?>" />
	<meta name="keywords" content="<?= $project->Keywords ?>" />
	<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<link rel="shortcut icon" href="" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="theme/style.css" />

	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
</head>
<body>
<script type="text/javascript">
jQuery.event.add(window, "load", resizeFrame);
jQuery.event.add(window, "resize", resizeFrame);
function resizeFrame()
{
    var h = $(window).height();
    var w = $(window).width();
	var headerheight = $("#header").css('height'); //120px
	var footerheight = $("#footer").css('height'); //50px
	var newContentHeight = parseInt(h) - parseInt(headerheight) - parseInt(footerheight);
	$("#container").css('height', h); //Container with all elements resized to fit the screen without scrollbars
	$("#krpanoDIV").css('height', newContentHeight);
    $("#CenterContent").css('height', newContentHeight); //Content resized to fit the rest of the screen without scrollbars
}
function openPopup(t,linktourl,w,h,type)
{
	$.fancybox(
			{
				'title'			: t,
				'width'			: w,
				'height'		: h,
				'href'			: linktourl,
				'type'			: type,
				'autoScale'		: 'true',
				'overlayColor'  : '#000000',
				'overlayAlpha'	: '0.3'
			}
		);

}
function getrandomvalue()
{
	krpanoObj = document.getElementById('krpanoSWFObject');
	var today = new Date();
	var fivemin = 1000 * 60 * 5;
	var randy = Math.ceil(today.getTime()/(fivemin));
	krpanoObj.set('timestamp', randy);
}
</script>
<div id="container">
	<div id="header">
	  <div id="headerlogo"></div>
	</div>
	<div id="CenterContent">
		<div id="mainContent">
			<div id="krpanoDIV">
			</div>
		</div>
	</div><span class="clearfloat" />
	<div id="footer">
		  <div id="footerlogo">
			<!-- todo Copyright, sitemap etc-->
		  </div>
	</div>
</div>
<script src="js/swfkrpano.js"></script>
<script>
	var viewer = createPanoViewer({swf:"krpano.swf", id:"krpanoSWFObject", target:"krpanoDIV"});
	//viewer.useHTML5("whenpossible");		// incomment to use the HTML5 krpanoJS viewer always when possible (Safari5)
	if( viewer.isDevice("iPhone|iPod|Android") ){
		viewer.addVariable("xml", "krpano_mobile.xml");
	}
	else{
		viewer.addVariable("xml", "xml/photo_<?php echo $DefaultLocation->LocationId; ?>.xml?t=" + new Date().getTime());
	}
	viewer.embed();

</script>

<!-- Google Analytics code snippet -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("");
	pageTracker._setDomainName("none");
	pageTracker._setAllowLinker(true);
	pageTracker._setCustomVar(1, "<?= $project->Name ?>", "Index", 3);
	pageTracker._trackPageview();
	} catch(err) {}
</script>
</body>
</html>
