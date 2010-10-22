<ul>
<?php foreach( $project->actionitems->where( 'completed', 'IS', null )->find_all() as $item ): ?>
	<li><?php echo HTML::anchor( 'item/view/' . $item->id, HTML::chars( $item->item ) ); ?></li>
<?php endforeach; ?>
</ul>