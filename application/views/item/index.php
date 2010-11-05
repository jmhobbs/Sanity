<?php if( $items->count() == 0 ): ?>
	<p style="text-align: center;"><b>No Items</b></p>
<?php else: ?>
<ul data-role="listview" data-inset="true">
<?php foreach( $items as $item ): ?>
	<li>
		<?php echo HTML::anchor( 'item/view/' . $item->id, HTML::chars( $item->item ) ); ?>
	</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
