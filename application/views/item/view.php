<p><?php echo HTML::chars( $item->item ); ?></p>

<p>
	<b>Project:</b> <?php echo HTML::chars( $item->project->name ); ?><br/>
	<b>Created:</b> <?php echo Date::fuzzy_span( $item->created ); ?>
</p>

<ul data-role="listview" data-inset="true">
	<li><?php echo HTML::anchor( 'item/complete/' . $item->id, 'Complete', array( 'onclick' => 'return ( true == confirm("Complete This Item?") );' ) ); ?></li>
	<li><?php echo HTML::anchor( 'item/delete/' . $item->id, 'Delete', array( 'onclick' => 'return ( true == confirm("Delete This Item?") );' )  ); ?></li>
</ul>