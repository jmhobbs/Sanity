<?php if( $project->actionitems->where( 'completed', 'IS', null )->find_all()->count() == 0 ): ?>
	<p style="text-align: center;">No Items</p>
	<?php echo HTML::anchor( 'item/add/' . $project->id, 'Add Item', array( 'data-role' => 'button' ) ); ?>
	<?php echo HTML::anchor( 'project/delete/' . $project->id, 'Delete Project', array( 'data-role' => 'button' ) ); ?>
<?php else: ?>
<ul data-role="listview" data-inset="true">
	<li data-role="list-divider"><?php echo HTML::chars( $project->name ); ?></li>
<?php foreach( $project->actionitems->where( 'completed', 'IS', null )->find_all() as $item ): ?>
	<li><?php echo HTML::anchor( 'item/view/' . $item->id, HTML::chars( $item->item ) ); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
