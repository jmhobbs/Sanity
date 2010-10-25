<div class="content">
<?php
	echo Form::open( 'item/add/' );
	echo Form::label( 'item', 'New Item' );
	echo Form::input( 'item' );
	echo Form::hidden( 'project-id', $project->id );
	echo Form::submit( 'submit', 'Add', array( 'class' => 'submit' ) );
	echo Form::close();
?>
</div>

<?php if( $project->actionitems->where( 'completed', 'IS', null )->find_all()->count() == 0 ): ?>
<div class="content">
	<p style="text-align: center;"><b>No Items</b></p>
</div>
<?php else: ?>
<ul>
<?php foreach( $project->actionitems->where( 'completed', 'IS', null )->find_all() as $item ): ?>
	<li><?php echo HTML::anchor( 'item/view/' . $item->id, HTML::chars( $item->item ) ); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>