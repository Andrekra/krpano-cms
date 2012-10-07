
body, html {
overflow: hidden;
}
body {
	background-color:#0066CC; 0050A0;
	background-image:url('../../../ ;');
	background-repeat:repeat-x;
	background-position:left top; 
	
	font-family: Arial, 'Times new Roman', _sans;
	margin: 0; /* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */
	padding: 0;
	text-align: center; /* this centers the container in IE 5* browsers. The text is then set to the left aligned default in the #container selector */
	color: #000000;
}
a{
font-weight: bold;
font-size: 10px;
}

a.sitemap:link, a.sitemap:visited{
color: #FFFFFF;
text-decoration: none;
}

a.sitemap:hover, a.sitemap:active{
background-color: #B30700;
color: #FFFFFF;
text-decoration: none;
}
img { 
	border: 0;
}
#container {
	width: 100%; /* this will create a container 100%; of the browser width */
	margin: 0 auto; the auto margins (in conjunction with a width) center the page */
	border: 0;
	text-align: left; /* this overrides the text-align: center on the body element. */
	height: 500px; /* initial height that gets overwritten with Javascript after page load. */
	padding: 0px;
}
#header {
	background-color: #0066CC;
	background-image:url('');
	background-repeat:repeat-x;
	background-position:left bottom; 
	height: 10px;
	padding: 0px;  
	margin: 0px;
}
h1 {
	margin: 0; 
	padding: 10px 0; 
	vertical-align:middle;
	letter-spacing: -1px;
	text-transform: lowercase;
	font-size: 3.8em;
	color:#FFFFFF;
}		
#footer { 
	padding: 0 10px; 
	background-color: #0066CC;
	background-image:url('header_shadow_b.png');
	background-repeat:repeat-x;
	background-position:right top; 
	height: 15px;
} 
#footer p {
	margin: 0; 
	padding: 10px 0; 
	line-height: normal;
	font-size: 10px;
	text-transform: uppercase;
	text-align: center;
	color: #A0A0A0;
}
#footerlogo {
	background-image:url('../../../leeg.jpg');
	background-repeat:no-repeat;
	background-position:center; 
	z-index: 1;
	height: 15px;
}	
#headerlogo {
	background-image:url('../../../leeg.jpg');
	background-repeat:no-repeat;
	background-position:left top; 
	z-index: 1;
	height: 10px;
}	
#CenterContent {
	width: 100%;
}
#mainContent {
	height: 100%;
	width: 100%;
}
#clearfloat { 
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}		
