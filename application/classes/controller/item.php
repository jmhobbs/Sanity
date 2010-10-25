<?php

	class Controller_Item extends Controller_Site {

		public function action_add () {

			if( $_POST ) {
				if( isset( $_POST['project-id'] ) ) {
					$project = ORM::factory( 'project', $_POST['project-id'] );
					if( ! $project->loaded() ) {
						Message::error( 'Project Does Not Exist' );
						Request::instance()->redirect( 'project/' );
						return;
					}

					if( $project->user_id != Auth::instance()->get_user()->id ) {
						Message::error( 'Project Does Not Belong To You' );
						Request::instance()->redirect( 'project/' );
						return;
					}

					$item = ORM::factory( 'actionitem' );
					$item->user_id = Auth::instance()->get_user()->id;
					$item->project_id = $project->id;
					$item->item = $_POST['item'];
					$item->created = time();
					$item->save();

					if( $item->saved() ) {
						Message::success( 'Added Item' );
						Request::instance()->redirect( 'project/view/' . $project->id );
						return;
					}
					else {
						Message::error( 'Failed To Add Item' );
						Request::instance()->redirect( 'project/view/' . $project->id );
						return;
					}
				}
			}

		}

	}