<?php
	defined('SYSPATH') or die('No direct script access.');

	class Controller_Site extends Controller_Template {
		public $template = 'site';

		public function __construct ( $request ) {

			$session = Session::instance();

			$mobile = $session->get( 'mobile' );

			if( isset( $_REQUEST['mobile'] ) )
				$mobile = ( true == $_REQUEST['mobile'] );

			if( is_null( $mobile ) ) {
				$ua = $_SERVER['HTTP_USER_AGENT'];
				$matches = array ( '/iPhone/i', '/iPod/i', '/iPad/i' );
				$mobile = false;
				foreach ( $matches as $match ) {
					if ( preg_match( $match, $ua ) ) {
						$mobile = true;
						break;
					}
				}
			}

			$session->set( 'mobile', $mobile );

			if( $mobile )
				$this->template = 'mobile';

			parent::__construct( $request );
		}


		/*
			We assume all pages are authorized for everyone.

			You can then block things off a bit at a time.
			'*' is a wildcard.

			Examples:

			$auth = array(
				// Only roles 'admin' can reach this
				'controller_one' => 'admin',
				// Only roles 'manager' and 'admin' can reach this
				'controller_two' => array( 'manager', 'admin'  ),
				// Anyone logged in can reach this
				'controller_three' => '*',
				// Any other controller can only be reached by those with the 'view' role
				'*' => 'view',
				// Anyone can access this controller
				'controller_four' => false
			);

		*/
		public $auth = array( '*' => '*' );

		public function before () {
			parent::before();

			$this->session = Session::instance();

			# Check user authentication
			$auth_result = true;
			$action_name = Request::instance()->action;
			if( array_key_exists( $action_name, $this->auth ) )
				$auth_result = $this->_check_auth( $action_name );
			else if ( array_key_exists( '*', $this->auth ) )
				$auth_result = $this->_check_auth( '*' );

			if( ! $auth_result ) {
				if( Auth::instance()->logged_in() ) {
					//! \todo Flash message.
					Request::instance()->redirect( 'user' );
				}
				else {
					Request::instance()->redirect( 'login' );
				}
			}

			// Try to pre-fetch the template. Doesn't have to succeed.
			try { $this->template->content = View::factory( Request::instance()->controller . '/' . Request::instance()->action ); }
			catch( Kohana_View_Exception $e ){}

			$this->template->title = ucwords( Request::instance()->action );
			$this->template->left = null;
			$this->template->right = null;
			$this->template->footer = null;
			$this->template->no_back_button = true;
			$this->template->menu = array();
		} // Controller_Site::before

		/**
		 * DRY out some of our auth code with an extra method.
		 */
		protected function _check_auth ( $action ) {
			$auth_result = true;
			if( is_array( $this->auth[$action] ) ) {
				foreach( $this->auth[$action] as $role ) {
					$auth_result = false;
					if( Auth::instance()->logged_in( $role ) ) {
						$auth_result = true;
						break;
					}
				}
			}
			else if ( '*' == $this->auth[$action] ) {
				$auth_result = Auth::instance()->logged_in();
			}
			else if ( false !== $this->auth[$action] ) {
				$auth_result = Auth::instance()->logged_in( $this->auth[$action] );
			}
			return $auth_result;
		} // Controller_Site::_check_auth
	} // Controller_Site