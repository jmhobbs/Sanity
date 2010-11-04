<?php
	echo Form::open();

	echo Form::open_slice( 'username' );
	echo Form::label( 'username', 'Username' );
	echo Form::input( 'username' );
	echo @Form::error( 'username', $errors );
	echo Form::close_slice();

	echo Form::open_slice( 'password' );
	echo Form::label( 'password', 'Password' );
	echo Form::password( 'password' );
	echo @Form::error( 'password', $errors );
	echo Form::close_slice();

	echo Form::submit( 'submit', 'Log In', array( 'class' => 'submit' ) );
	echo Form::close();