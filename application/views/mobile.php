<html>
	<head>
		<title><?php echo $title; ?></title>
		<!--// http://joehewitt.com/files/iphone/navigation.html //-->
		<meta name="viewport" content="width=device-width,user-scalable=no" />
		<link rel="apple-touch-icon" href="<?php echo URL::site( 'image/iphone.png' ); ?>" />
		<?php echo HTML::style( 'style/iphone/iphone.css' ); ?>
	</head>
	<body>
		<h1 id="pageTitle"><?php echo $title; ?></h1>
		<a id="homeButton" class="button" href="#albums">Albums</a>
		<a class="button" href="#searchForm">Search</a>
		<div class="panel">
			<?php echo $content; ?>
		</div>
	</body>
</html>