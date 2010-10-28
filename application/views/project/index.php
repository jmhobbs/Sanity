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
	<?php
		$empty_projects = array();
		foreach( $projects as $project ) {
			$count = $project->actionitems->where( 'completed', 'IS', null )->find_all()->count();
			if( 0 == $count ) {
				$empty_projects[] = $project;
				continue;
			}
	?>
	<li><?php echo HTML::anchor( 'project/view/' . $project->id, $count . ' - ' . HTML::chars( $project->name ) ); ?></li>
	<?php
		}
	?>
</ul>

<br/>

<ul class="menu empty-projects">
	<?php foreach( $empty_projects as $project ): ?>
	<li><?php echo HTML::anchor( 'project/view/' . $project->id, '0 - ' . HTML::chars( $project->name ) ); ?></li>
	<?php endforeach; ?>
</ul>
