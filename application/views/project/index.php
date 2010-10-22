<div class="content">
<?php
	echo Form::open( 'project/add/' );
	echo Form::label( 'name', 'Name' );
	echo Form::input( 'name' );
	echo Form::submit( 'submit', 'Add', array( 'class' => 'submit' ) );
	echo Form::close();
?>
</div>

<ul class="menu">
	<?php foreach( $projects as $project ): ?>
	<li><?php echo HTML::anchor( 'project/view/' . $project->id, $project->actionitems->find_all()->count() . ' - ' . HTML::chars( $project->name ) ); ?></li>
	<?php endforeach; ?>
</ul>