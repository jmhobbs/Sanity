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
	<li><?php echo HTML::anchor( 'item/', 'Items' ); ?></li>
</ul>

<br/>

<ul class="menu">
	<li><?php echo HTML::anchor( 'user/logout/', 'Logout' ); ?></li>
</ul>
