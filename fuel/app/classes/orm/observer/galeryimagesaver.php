<?php
namespace Orm;

class Observer_GaleryImageSaver extends Observer
{
	public function before_save(Model $obj)
	{
		return $this->save_image($obj);
	}

	public function save_image($obj)
	{
		try {
			$count = count(\Upload::get_files());
		} catch (\FuelException $e) {
			$count = 0;
		} 
		
		if( $count > 0 ) {
		$config = \Config::get('settings.galery');
		$logo_path = $config['upload']['path'];
		foreach( \Upload::get_files() as $file ) {
				if($file['field'] == 'image') {
					$obj->origin = $file['saved_as'];
					$logo_name = $file['saved_as'];
					foreach($config['sizes'] as $name => $size) {
						//var_dump($key) . "  " . var_dump($value); die();
						$new_logo_name = str_replace(".{$file['extension']}", "{$name}." . \Str::lower($file['extension']) , $file['saved_as']);
						\Image::load($logo_path . DS . $logo_name)->resize($size['width'], $size['height'], true, false)
								->save($logo_path . DS . $new_logo_name);
						$obj->set($name, $new_logo_name);
					}
					
					return true;
				}
			}
		}
		return false;
	}
}
