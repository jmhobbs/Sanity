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
		<?php
			if( is_array( $left ) ) {
				echo HTML::anchor( $left['target'], HTML::chars( $left['text'] ), array( 'class' => 'button', 'id' => 'homeButton' ) );
			}
			if( is_array( $right ) ) {
				echo HTML::anchor( $right['target'], HTML::chars( $right['text'] ), array( 'class' => 'button' ) );
			}
		?>
		<div class="panel">
			<?php echo $content; ?>
		</div>
	</body>
</html>
