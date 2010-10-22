<?php

	class Controller_Project extends Controller_Site {

		public function action_index () {
			$this->template->title = 'Projects';
			$this->template->left = array( 'text' => 'Dashboard', 'target' => 'user/' );
			$this->template->content->projects = Auth::instance()->get_user()->projects->find_all();
		}

		public function action_view ( $id ) {
			$project = ORM::factory( 'project', $id );
			if( ! $project->loaded() ) {
				Message::error( 'No Such Project' );
				Request::instance()->redirect( 'project/' );
			}

			if( Auth::instance()->get_user()->id != $project->user_id ) {
				Message::error( 'That Project Doesn\'t Belong To You' );
				Request::instance()->redirect( 'project/' );
			}

			$this->template->title = 'Project: ' . $project->name;
			$this->template->left = array( 'text' => 'Projects', 'target' => 'project/' );

			$this->template->content->project = $project;
		}

	}