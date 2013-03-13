<?php
namespace Orm;

class Observer_ImageSaver extends Observer
{
	public function before_save(Model $obj)
	{
		return $this->save_image($obj);
	}

	public function save_image($obj)
	{
		if( count(\Upload::get_files()) > 0 ) {
		$config = \Config::get('settings.logo');
		$logo_path = $config['upload']['path'];
		foreach( \Upload::get_files() as $file ) {
				if($file['field'] == 'image') {
					$size_name = "small";
					$logo_name = $file['saved_as'];
					$new_logo_name = str_replace(" ","_",md5(time()).'.'.$file['extension']);
					\Image::load_and_resize("{$logo_path}/{$logo_name}", $config['sizes']['small'], "-{$size_name}", "{$logo_path}/{$new_logo_name}");
					$extension  = \Str::lower($file['extension']);
					$base_file_name = basename($logo_name, ".".$extension);
					$obj->image = $new_logo_name;
					return true;
				}
			}
		}
		return false;
	}
}
