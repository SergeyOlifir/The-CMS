<?php
class Controller_Api_Data extends Controller_Api_Apis {

	protected $rest_format = 'json';

	public function get_index()
	{
		/* pages (id, name, alias, header) */
		$result_pages = Format::forge(Model_Page::find('all'))->to_array();

		/* content (id, name, description, image, page_id) */
		$result_content = Format::forge(Model_Content::find('all'))->to_array();

		/* links (id, name, description, image, page_id, weight, public) */
		$result_links = Format::forge(Model_Link::find()->where('public', '=', 1)->order_by('weight', 'desc')->get())->to_array();

		$this->response(json_encode(array('pages' => $result_pages, 'content' => $result_content, 'links' => $result_links)), 200);
	}
}
