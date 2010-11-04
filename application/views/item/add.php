<?php
	echo Form::open( 'item/add/' . $project->id );

	echo Form::label( 'project', "Project" );
	echo Form::input( 'project', HTML::chars( $project->name ), array( 'disabled' => 'disabled' ) );

	echo Form::label( 'item', 'New Item' );
	echo Form::input( 'item' );

	echo Form::submit( 'submit', 'Add', array( 'class' => 'submit' ) );
	echo Form::close();