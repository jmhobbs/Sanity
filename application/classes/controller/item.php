<?php

	class Controller_Item extends Controller_Site {

		public function action_index () {
			$this->template->title = 'Recent Items';
			$this->template->left = array( 'text' => 'Dashboard', 'target' => 'user/' );
			$this->template->content->items = ORM::factory( 'actionitem' )->
				where( 'user_id', '=', Auth::instance()->get_user()->id )->
				where( 'completed', 'IS', null )->
				order_by( 'id', 'DESC' )->
				limit( 10 )->
				find_all();
		}

		public function action_view ( $id ) {
			$item = ORM::factory( 'actionitem', $id );
			if( ! $item->loaded() ) {
				Message::error( 'Item Does Not Exist' );
				Request::instance()->redirect( 'project/' );
				return;
			}

			if( $item->user_id != Auth::instance()->get_user()->id ) {
				Message::error( 'Item Does Not Belong To You' );
				Request::instance()->redirect( 'project/' );
				return;
			}

			$this->template->title = 'Item';
			$this->template->no_back_button = false;

			$this->template->content->item = $item;
		}

		public function action_complete ( $id ) {

			$item = ORM::factory( 'actionitem', $id );
			if( ! $item->loaded() ) {
				Message::error( 'Item Does Not Exist' );
				Request::instance()->redirect( 'project/' );
				return;
			}

			if( $item->user_id != Auth::instance()->get_user()->id ) {
				Message::error( 'Item Does Not Belong To You' );
				Request::instance()->redirect( 'project/' );
				return;
			}

			$item->completed = time();
			$item->save();
			if( $item->saved() ) {
				Message::success( 'Completed Item' );
				Request::instance()->redirect( 'project/view/' . $item->project_id );
			}
			else {
				Message::error( 'Could Not Complete Item' );
				Request::instance()->redirect( 'item/view/' . $item->id );
			}

		}

		public function action_delete ( $id ) {

			$item = ORM::factory( 'actionitem', $id );
			if( ! $item->loaded() ) {
				Message::error( 'Item Does Not Exist' );
				Request::instance()->redirect( 'project/' );
				return;
			}

			if( $item->user_id != Auth::instance()->get_user()->id ) {
				Message::error( 'Item Does Not Belong To You' );
				Request::instance()->redirect( 'project/' );
				return;
			}

			$item->delete();
			if( $item->saved() ) {
				Message::success( 'Deleted Item' );
				Request::instance()->redirect( 'project/view/' . $item->project_id );
			}
			else {
				Message::error( 'Could Not Delete Item' );
				Request::instance()->redirect( 'item/view/' . $item->id );
			}

		}

		public function action_add ( $project_id ) {

			$project = ORM::factory( 'project', $project_id );

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

			if( $_POST ) {
				$item = ORM::factory( 'actionitem' );
				$item->user_id = Auth::instance()->get_user()->id;
				$item->project_id = $project->id;
				$item->item = $_REQUEST['item'];
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

			$this->template->title = 'Add Item';
			$this->template->content->project = $project;
			$this->template->no_back_button = false;
		}

	}