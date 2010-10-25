<div class="content">
	<p><b>Created:</b> <?php echo Date::fuzzy_span( $item->created ); ?></p>
</div>

<ul>
	<li><?php echo HTML::anchor( 'item/complete/' . $item->id, 'Complete' ); ?></li>
	<li><?php echo HTML::anchor( 'item/delete/' . $item->id, 'Delete' ); ?></li>
</ul>