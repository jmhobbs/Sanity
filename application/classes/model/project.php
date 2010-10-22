<?php

	class Model_Project extends ORM {
		protected $_belongs_to = array( 'user' => array() );
		protected $_has_many = array( 'actionitems' => array() );
	}
