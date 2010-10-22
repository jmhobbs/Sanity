<?php
	defined('SYSPATH') or die('No direct script access.');

	class Controller_User extends Controller_Site {

		public $auth = array(
			'login' => false,
			'logout' => false,
			'register' => false,
			'*' => '*'
		);

		public function action_index () {
			$this->template->title = 'Sanity';
		}

		/**
		 * Log a user into the system.
		 **/
		public function action_login () {
			if( Auth::instance()->logged_in() != 0 ) { Request::instance()->redirect( 'user/' ); }

			if( $_POST ) {
				$user = ORM::factory('user');
				$status = $user->login( $_POST );
				if( $status ) {
					Request::instance()->redirect( 'user/' );
				}
				else {
					$this->template->content->errors = $_POST->errors( 'login' );
				}
			}

			$this->template->right = array( 'text' => 'Register', 'target' => '/user/register' );

		} // Controller_User::action_login

		/**
		 * Log out the current user.
		 **/
		public function action_logout () {
			Auth::instance()->logout();
			Request::instance()->redirect( 'login' );
		} // Controller_User::action_logout

		/**
		 * Create a new user.
		 **/
		public function action_register () {
			if( Auth::instance()->logged_in() != 0 ) { Request::instance()->redirect( 'user/' ); }

			if( $_POST ) {
				$user = ORM::factory( 'user' );
				$user->email = $_REQUEST['email'];
				$user->username = $_REQUEST['username'];
				$user->password = $_REQUEST['password'];
				$user->save();

	      $login_role = new Model_Role( array( 'name' => 'login' ) );
				$user->add( 'roles', $login_role );

				Request::instance()->redirect( 'user/' );
			}

			$this->template->left = array( 'text' => 'Login', 'target' => '/user/login' );
		} 

	}
