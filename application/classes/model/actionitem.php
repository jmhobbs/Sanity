<?php

	class Model_ActionItem extends ORM {
		protected $_belongs_to = array( 'user' => array(), 'project' => array() );
	}
