<div class="content">
<?php
	echo Form::open( 'item/add/' );
	echo Form::label( 'item', 'New Item' );
	echo Form::input( 'item' );
	echo Form::submit( 'submit', 'Add', array( 'class' => 'submit' ) );
	echo Form::close();
?>
</div>

<?php if( $items->count() == 0 ): ?>
<div class="content">
	<p style="text-align: center;"><b>No Items</b></p>
</div>
<?php else: ?>
<ul class="menu">
<?php foreach( $items as $item ): ?>
	<li><?php echo HTML::anchor( 'item/view/' . $item->id, HTML::chars( $item->item ) . ' <span class="item-project">' . HTML::chars( $item->project->name ) . '</span>' ); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>