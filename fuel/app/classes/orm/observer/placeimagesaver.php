<?

namespace Orm;

class Observer_PlaceImageSaver extends Observer
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
				if($file['field'] == 'file-logo') {
					$logo_name = $file['saved_as'];
					$new_logo_name = str_replace(" ","_",$obj->name.'_'.md5(time()).'.'.$file['extension']);
					$new_iphone_logo = str_replace(" ","_",$obj->name.'_'.md5(time()).'-iphone.'.$file['extension']);
					\Image::load_and_resize("{$logo_path}/{$logo_name}", $config['sizes']['small'], "-{$size_name}", "{$logo_path}/{$new_logo_name}");
					\Image::load_and_resize("{$logo_path}/{$logo_name}", $config['sizes']['iphone'], "-{$size_name}", "{$logo_path}/{$new_iphone_logo}");
					$extension  = \Str::lower($file['extension']);
					$base_file_name = basename($logo_name, ".".$extension);
					$obj->logo = $new_logo_name;
					$obj->iphone_logo = $new_iphone_logo;
					return true;
				}
			}
		}

		return false;
	}
}
