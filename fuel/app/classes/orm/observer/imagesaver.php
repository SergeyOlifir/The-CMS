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
		try {
			$count = count(\Upload::get_files());
		} catch (\FuelException $e) {
			$count = 0;
		} 
		
		if( $count > 0 ) {
		$config = \Config::get('settings.logo');
		$logo_path = $config['upload']['path'];
		foreach( \Upload::get_files() as $file ) {
				if($file['field'] == 'image') {
					$logo_name = $file['saved_as'];
					$new_logo_name = str_replace(".{$file['extension']}", "-cropt." . \Str::lower($file['extension']) , $file['saved_as']);
					\Image::load($logo_path . DS . $logo_name)->resize(\Arr::get($config, 'sizes.small.width'), \Arr::get($config, 'sizes.small.height'), true, false)
							->save($logo_path . DS . $new_logo_name);
					$obj->image = $new_logo_name;
					return true;
				}
			}
		}
		return false;
	}
}
