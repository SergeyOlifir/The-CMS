<?php
class Controller_Admin_Links extends Controller_Admin_Administration {

    public function before() {
	parent::before();
	Controller_Application::$current_page = 'links';
    }

    public function action_index() {
	    TCLocale::set_locale_from_name(Model_Local::find(1)->name);
	    $data['links'] = Model_Link::find('all', array(
						    'order_by' => array('weight' => 'asc')
			    ));
	    $this->template->title = "Links";
	    $this->template->content = View::forge('admin/links/index', $data);
    }

    public function action_view($id = null)
    {
	    TCLocale::set_locale_from_name(Model_Local::find(1)->name);
	    is_null($id) and Response::redirect('Links');

	    if ( ! $data['link'] = Model_Link::find($id))
	    {
		    Session::set_flash('error', 'Could not find link #'.$id);
		    Response::redirect('Links');
	    }

	    $this->template->title = "Link";
	    $this->template->content = View::forge('admin/links/view', $data);

    }

    public function action_create($local_id = null) {
	    TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
	    if (Input::method() == 'POST') {
		    $config = \Config::get('settings.logo.upload');
		    Upload::process($config);
		    if (Upload::is_valid()) {
			    Upload::save();
			    $link = Model_Link::forge(array(
				    'image' => Input::post('image'),
				    'page_id' => \Fuel\Core\Input::post('uritype') === 'page_id' ? Input::post('page_id') : -1,
				    'weight' => Input::post('weight'),
				    'uri' => \Fuel\Core\Input::post('uritype') === 'page_uri' ? Input::post('page_uri') : null,
				    'public' => Input::post('public') == 1 ? 1 : 0,
			    ));
			    if ($link and $link->save_translitions(\Fuel\Core\Input::post(), $local_id) and $link->save()) {
				$this->SetNotice('success', 'Added link #' . $link->id . ' (' . Model_Local::find($local_id)->name . ')');
				Response::redirect('admin/links');
			    } else {
				    $this->SetNotice('error', 'Could not save link.');
			    }
		    }
		    else {
			    $this->SetNotice('error', 'Error');
		    }
	    }
	    $this->template->title = "Links";
	    $this->template->content = View::forge('admin/links/create', array('curr_local' => $local_id));

    }

    public function action_edit($id = null, $local_id = null) {
	    TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
	    is_null($id) and Response::redirect('admin/Links');
	    if ( ! $link = Model_Link::find($id)) {
		    $this->SetNotice('error', 'Could not find link #'.$id);
		    Response::redirect('admin/Links');
	    }
	    $config = \Config::get('settings.logo.upload');
	    if(\Fuel\Core\Input::post()) {
		Upload::process($config);	
		if(Upload::is_valid()) {
		    Upload::save();
		}
		//var_dump(Input::post('uritype')); die();
		if(\Fuel\Core\Input::post('uritype') === 'page_id') {
		    $link->page_id = Input::post('page_id');
		    $link->uri = null;
		} else {
		    $link->page_id = -1;//Input::post('page_id');
		    $link->uri = Input::post('page_uri');
		}

		$link->weight = Input::post('weight');
		$link->public = Input::post('public') == 1 ? 1 : 0;

		if ($link->save_translitions(\Fuel\Core\Input::post(), $local_id) and $link->save()) {
		    $this->SetNotice('success', 'Updated link #' . $id . ' (' . Model_Local::find($local_id)->name . ')');
		    Response::redirect('admin/links');
		} else {
		    $this->SetNotice('error', 'Could not update link #' . $id);
		}
	    }
	    $this->template->set_global('link', $link, false);
	    $this->template->title = "Links";
	    $this->template->content = View::forge('admin/links/edit', array('id' => $id, 'curr_local' => $local_id));

    }

    public function action_delete($id = null) {
	    is_null($id) and Response::redirect('Links');
	    if ($link = Model_Link::find($id)) {
		    $link->delete();
		    $this->SetNotice('success', 'Deleted link #'.$id);
	    } else {
		    $this->SetNotice('error', 'Could not delete link #'.$id);
	    }
	    Response::redirect('admin/links');
    }

}