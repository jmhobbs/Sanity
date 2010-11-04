<?php
	echo Form::open( 'project/add/' );
	echo Form::label( 'name', 'Name' );
	echo Form::input( 'name' );
	echo Form::submit( 'submit', 'Add', array( 'class' => 'submit' ) );
	echo Form::close();