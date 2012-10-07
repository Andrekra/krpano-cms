<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/admin/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/admin/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/admin/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/admin/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/admin/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/admin/css/editor.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="visual-editor container">

    <div id="header">
        <div class="container">
		    <div id="logo">
                <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
            </div>
            <div id="menu">
                <div class="inner">
                    <ul class="user-navigation">
                        <li><a href="#">link 1</a></li>
                        <li><a href="#">link 2</a></li>
                        <li><a href="#">link 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</div><!-- header -->
    <div id="wrapper">
        <div class="container">
           <?php echo $content; ?>
        </div>
    </div>
    <div id="footer">
        <div class="container">
            <?php $this->renderPartial('admin.views.layouts.editor._footer'); ?>
        </div>
    </div>

</body>
</html>