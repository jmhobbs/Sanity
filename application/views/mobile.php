<html>
	<head>
		<title>Sanity</title>
		<meta name="apple-mobile-web-app-capable" content="yes"/> 
		<link rel="apple-touch-icon" href="<?php echo URL::site( 'image/iphone.png' ); ?>" />
		<link rel="favicon" href="<?php echo URL::site( 'image/iphone.png' ); ?>" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.css" />
		<script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="b">

			<div data-role="header" data-position="inline" <?php if( $no_back_button ): ?>data-nobackbtn="true"<?php endif; ?> data-theme="b">
				<?php
					if( is_array( $left ) ) {
						echo HTML::anchor(
							$left['target'],
							HTML::chars( $left['text'] ),
							array( 'data-role' => 'button', 'data-icon' => 'arrow-l' )
						);
					}
				?>
				<h1><?php echo HTML::chars( $title ); ?></h1>
				<?php
					if( is_array( $right ) ) {

						$attributes = array( 'class' => 'ui-btn-right', 'data-role' => 'button' );
						if( isset( $right['attributes'] ) and is_array( $right['attributes'] ) ) {
							$attributes = array_merge( $attributes, $right['attributes'] );
						}

						echo HTML::anchor(
							$right['target'],
							HTML::chars( $right['text'] ),
							$attributes
						);
					}
				?>
			</div>

		<div data-role="content">
			<?php echo Message::display(); ?>
			<?php echo $content; ?>
		</div>

		<?php if( is_array( $footer ) ): ?>
		<div data-role="footer" class="ui-bar">
			<?php
				foreach( $footer as $button ) {
					echo HTML::anchor(
						$button['target'],
						HTML::chars( $button['text'] ),
						$button['attributes']
					);
				}
			?>
		</div>
		<?php endif; ?>
	</body>
</html>
