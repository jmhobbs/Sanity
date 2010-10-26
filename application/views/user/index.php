<div class="content">
<?php
	echo Form::open( '/item/add' );
	echo Form::label( 'item', 'New Item' );
	echo Form::input( 'item' );
	echo Form::submit( 'submit', 'Add', array( 'class' => 'submit' ) );
	echo Form::close();
?>
</div>

<ul class="menu">
	<li><?php echo HTML::anchor( 'project/', 'Projects' ); ?></li>
	<li><?php echo HTML::anchor( 'item/', 'Recent Items' ); ?></li>
</ul>

<br/>

<ul class="menu">
	<?php if( Session::instance()->get( 'mobile' ) ) : ?>
	<li><?php echo HTML::anchor( 'user?mobile=0', 'Non-Mobile View' ); ?></li>
	<?php else: ?>
	<li><?php echo HTML::anchor( 'user?mobile=1', 'Mobile View' ); ?></li>
	<?php endif; ?>
	<li><?php echo HTML::anchor( 'user/logout/', 'Logout' ); ?></li>
</ul>
