<?php if( ! isset( $item ) ): ?>
<div class="content">
<?php
	echo Form::open( 'item/add/' );
	echo Form::label( 'item', 'New Item' );
	echo Form::input( 'item', HTML::chars( $item ) );
	echo Form::submit( 'submit', 'Add', array( 'class' => 'submit' ) );
	echo Form::close();
?>
</div>
<?php else: ?>
<div class="content">
	<p>Choose Project For Item</p>
</div>

<ul class="menu">
	<?php foreach( $projects as $project ): ?>
	<li><?php echo HTML::anchor( 'item/add?item=' . $item . '&project-id=' . $project->id, HTML::chars( $project->name ) ); ?></li>
	<?php endforeach; ?>
</ul>

<?php endif; ?>