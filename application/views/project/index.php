<ul data-role="listview" data-inset="true">
	<li data-role="list-divider">Active Projects</li>
	<?php
		$empty_projects = array();
		foreach( $projects as $project ) {
			$count = $project->actionitems->where( 'completed', 'IS', null )->find_all()->count();
			if( 0 == $count ) {
				$empty_projects[] = $project;
				continue;
			}
	?>
	<li>
		<?php echo HTML::anchor( 'project/view/' . $project->id, HTML::chars( $project->name ) ); ?>
		<span class="ui-li-count"><?php echo $count; ?></span>
	</li>
	<?php
		}
	?>
</ul>

<ul data-role="listview" data-inset="true">
	<li data-role="list-divider">Inactive Projects</li>
	<?php foreach( $empty_projects as $project ): ?>
	<li>
		<?php echo HTML::anchor( 'project/view/' . $project->id, HTML::chars( $project->name ) ); ?>
		<span class="ui-li-count">0</span>
	</li>
	<?php endforeach; ?>
</ul>
