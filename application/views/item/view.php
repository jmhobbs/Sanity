<div class="content">
	<p><b>Created:</b> <?php echo Date::fuzzy_span( $item->created ); ?></p>
</div>

<ul class="menu">
	<li><?php echo HTML::anchor( 'item/complete/' . $item->id, 'Complete', array( 'onclick' => 'return ( true == confirm("Complete This Item?") );' ) ); ?></li>
	<li><?php echo HTML::anchor( 'item/delete/' . $item->id, 'Delete', array( 'onclick' => 'return ( true == confirm("Delete This Item?") );' )  ); ?></li>
</ul>