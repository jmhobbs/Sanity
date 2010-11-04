<?php
	echo Form::open();

	echo Form::open_slice( 'email' );
	echo Form::label( 'email', 'E-Mail' );
	echo Form::input( 'email' );
	echo @Form::error( 'email', $errors );
	echo Form::close_slice();

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

	echo Form::submit( 'submit', 'Register', array( 'class' => 'submit' ) );
	echo Form::close();