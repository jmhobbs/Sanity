<?php
	echo Form::open();
	echo Form::label( 'email', 'E-Mail' );
	echo Form::input( 'email' );
  echo @Form::error( 'email', $errors );
  echo '<br/>';
	echo Form::label( 'username', 'Username' );
	echo Form::input( 'username' );
	echo @Form::error( 'username', $errors );
	echo '<br/>';
	echo Form::label( 'password', 'Password' );
	echo Form::password( 'password' );
	echo @Form::error( 'password', $errors );
	echo '<br/>';
	echo Form::submit( 'submit', 'Register', array( 'class' => 'submit' ) );
	echo Form::close();

