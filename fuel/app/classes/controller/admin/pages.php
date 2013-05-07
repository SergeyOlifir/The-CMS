<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page
 *
 * @author juise_man
 */
class Controller_Admin_Pages extends Controller_Admin_Administration 
{
	public function action_index() {
		TCLocale::set_locale_from_name(Model_Local::find(1)->name);
		$data['pages'] = Model_Page::find('all');
		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/index', $data);
	}
	
	public function action_create($local_id = null) {
		TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
		if (Input::method() == 'POST') {
                    $forge = array(
                        'alias' => \Fuel\Core\Input::post('alias'),
                        'publish_date' => 'sdsd',
                    );
                    $model = Model_Page::forge($forge);
                    if($model->save_translitions(\Fuel\Core\Input::post(), $local_id) and $model->save()) {
                        $this->SetNotice('success', 'Created page #' . $model->id);
                        \Fuel\Core\Response::redirect('admin/pages');
                    } else {
                        Session::set_flash('error', 'Could not create page');
                    }
		}
		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/create', array('curr_local' => $local_id));

	}
        
        public function action_edit($id = null, $local_id = null) {
            TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
            is_null($id) and Response::redirect('admin/pages');
            if ( ! $page = Model_Page::find($id)) {
                $this->SetNotice('error', 'Could not find page #'.$id);
                Response::redirect('admin/pages');
            }
            if (Input::method() == 'POST') {
                  $page->alias = \Fuel\Core\Input::post('alias');
                  $page->publish_date = "kl";
                  if($page->save_translitions(\Fuel\Core\Input::post(), $local_id) and $page->save()) {
                    $this->SetNotice('success', 'Updated page #' . $id);
                    Response::redirect('admin/pages');
                  } else {
                      Session::set_flash('error', 'Could not update page #' . $id);
                  }
            }
            $this->template->set_global('page', $page, false);
            $this->template->title = "Pages";
            $this->template->content = View::forge('admin/pages/edit', array('curr_local' => $local_id));
        }
        
        public function action_delete($id = null) {
            !isset($id) and \Fuel\Core\Response::redirect('admin/pages');
            if($model = Model_Page::find($id)) {
                $model->delete_translitions();
                $model->delete();
                $this->SetNotice('success', 'Deleted page #' . $id);
            } else {
                 Session::set_flash('error', 'Could not delete page #' . $id);
            }
            \Fuel\Core\Response::redirect('admin/pages');
        }
}

?>
