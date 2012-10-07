<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="css/twitter/bootstrap.css">
    <link rel="stylesheet" href="stylesheets/font-awesome.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="fonts/fonts.css">

    <link rel="stylesheet" href="stylesheets/elements.css">
    <link rel="stylesheet" href="stylesheets/icons.css">
    <link rel="stylesheet" href="stylesheets/form.css">
    <link rel="stylesheet" href="stylesheets/layout.css">
    <link rel="stylesheet" href="stylesheets/box.css">
    <link rel="stylesheet" href="stylesheets/nav.css">
    <link rel="stylesheet" href="stylesheets/main.css">
    <link rel="stylesheet" href="js/vendors/jqueryui/css/flick/jquery-ui-1.8.18.custom.css">
    <style type="text/css">
        .ui-spinner {position: relative; border: 0px solid white; }
        .ui-spinner-buttons {position: absolute}
        .ui-spinner-button {overflow: hidden}
        .ui-buttonset {
            margin-right: 0px;
            font-size: 79%;
        }
        .radio, .checkbox {
            padding-left: 0;
        }
        .attribute-row{
            display: table-row;
        }
        .cell{
            display: table-cell;
        }
        .attribute{
            padding: 10px;
            background-color: #ffffff;
        }
        .attribute:nth-child(odd) {
            background-color: #fafafa;
        }
        #content .left .cell input[type=text]{
            width: 32px;
            margin-left: 10px;
            text-align: center;
            margin-bottom: 0;
        }
        #content .left .cell .slider{
            width: 150px;
        }
        #sidebar table{
            width: 100%;
        }

    </style>

    <script type="text/javascript" src="js/vendors/jquery/jquery-min.js"></script>

    <script type="text/javascript" src="js/vendors/jqueryui/js/jquery-ui-1.8.18.custom.min.js"></script>
    <script type="text/javascript" src="js/vendors/jqueryui/js/jquery.ui.spinner.js"></script>
    <script type="text/javascript" src="js/vendors/twitter/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="js/vendors/twitter/bootstrap-popover.js"></script>

    <script type="text/javascript" src="js/vendors/underscore/underscore-min.js"></script>
    <script type="text/javascript" src="js/vendors/backbone/backbone-min.js"></script>
    <script>
        $(document).ready(function(){
            $('#loader').ajaxStart(function(){
                $(this).css('display', 'block');
            });

            $('#loader').ajaxComplete(function(){
                $(this).css('display', 'none');
            });
            $('.btn').tooltip();
        });
    </script>
</head>
<body>

<div id="loader" class="hidden"><img src='img/ajax-loader.gif' /></div>
<div id="container">

</div>
<script src="js/vendors/krpano/krpano.js"></script>
<script data-main="js/main" src="js/vendors/require/require.js"></script>
<script type="text/javascript">
    //function init(){
    var apiUrl = 'http://labs.panofy.com/projects/cms/api/';
    $(document).ready(function(){
        console.log('jquery init');

        require(['krpanojsf/app'], function(App){
            window.krApp = App;
            var content = {};
            App.initialize(content);

            //require(['krpanojsf/modules/HotspotEditor/HotspotEditor'], function(editor){
            //krApp.HotspotEditor = editor;
            // editor.init();
            //});
        });
    });


    //}
    /*
            var data = '';
    $.ajax({
      url: "js/krpanojsf/xml/custom.xml",
    dataType: 'xml',
    processData : false,
      success: function(xml){
       data = $("<p/>").append($(xml).find('krpano')).html();
      }
    });
    krpanojsf.call('loadxml('+data+',,KEEPALL|KEEPVIEW}MERGE)');
    */
</script>

<div class="helpers">
    <!-- delete confirmation -->
    <!--    <div class="modal" id="delete-confirmation">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Delete</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this project?</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary">Delete</a>
            <a href="#" class="btn">Cancel</a>
        </div>
    </div>-->
</div>
</body>
</html>
