<?php

	class Controller_Project extends Controller_Site {

		public function action_index () {
			$this->template->title = 'Projects';
			$this->template->left = array( 'text' => 'Dashboard', 'target' => 'user/' );
			$this->template->content->projects = Auth::instance()->get_user()->projects->order_by( 'name' )->find_all();
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

		public function action_add () {
			$this->template->title = 'Add Project';
			$this->template->left = array( 'text' => 'Projects', 'target' => 'project/' );

			if( $_POST ) {
				if( empty( $_POST['name'] ) ) {
					Message::error( 'Projects must have a name!' );
					Request::instance()->redirect( 'project/' );
					return;
				}
				$project = ORM::factory( 'project' );
				$project->name = $_POST['name'];
				$project->user_id = Auth::instance()->get_user()->id;
				$project->slug = URL::title( $_POST['name'] );
				$project->save();
				if( $project->saved() ) {
					Message::success( 'Created new project, ' . HTML::chars( $project->name ) );
					Request::instance()->redirect( 'project/view/' . $project->id );
				}
				else {
					Message::error( 'Could not create project.' );
				}
			}

		}

	}
