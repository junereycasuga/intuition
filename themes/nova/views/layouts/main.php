<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Intuition</title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <?php
    // theme specific styles
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/bootstrap.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/bootstrap-responsive.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/font-awesome.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/main.css');
    // Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/sl-slide.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/simpletextrotator.css');

    // modernizr
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js');
    ?>
</head>
<body>
	<?php
	if(!Yii::app()->user->isGuest) {
		$this->renderPartial('//layouts/header');
	} else {
		$this->renderPartial('//layouts/guestHeader');
	}
	?>

	<?php echo $content; ?>
	<?php $this->renderPartial('//layouts/footer'); ?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&sensor=false"></script>
	<?php 
	// theme specific scripts
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/vendor/jquery-1.9.1.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/vendor/bootstrap.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/main.js');

	// js for slider
	// Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery.ba-cond.min.js');
	// Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery.slitslider.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery.simple-text-rotator.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/map.js');
	?>

	<script>
		$(function() {
		    var Page = (function() {

		        var $navArrows = $( '#nav-arrows' ),
		        slitslider = $( '#slider' ).slitslider( {
		            autoplay : true
		        } ),

		        init = function() {
		            initEvents();
		        },
		        initEvents = function() {
		            $navArrows.children( ':last' ).on( 'click', function() {
		                slitslider.next();
		                return false;
		            });

		            $navArrows.children( ':first' ).on( 'click', function() {
		                slitslider.previous();
		                return false;
		            });
		        };

		        return { init : init };

		    })();

		    Page.init();
		});
	</script>
</body>
</html>