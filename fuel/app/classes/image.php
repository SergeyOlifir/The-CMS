<?php
class Image extends Fuel\Core\Image {

	public static function image_width($image)
	{
		$src = getimagesize($image);
		return $src[0];
	}

	public static function image_height($image)
	{
		$src = getimagesize($image);
		return $src[1];
	}

	public static function calculate_dimensions($dimensions, $image)
	{
		$original_width  = static::image_width($image);
		$original_height = static::image_height($image);
		$width_ratio  = $dimensions['width']/$original_width;
		$height_ratio = $dimensions['height']/$original_height;

		if ($width_ratio < $height_ratio) {
			$width  = $original_width * $width_ratio;
			$height = $original_height * $width_ratio;
		} else {
			$width  = $original_width * $height_ratio;
			$height = $original_height * $height_ratio;
		}

		return array("width"=>$width, "height"=>$height);
	}

	public static function load_and_resize($picture, $dimensions, $suffix, $new_name = null)
	{
		if ($new_name == null) {
			$dimensions = static::calculate_dimensions($dimensions, $picture);
			return static::load($picture)->resize($dimensions['width'], $dimensions['height'])->save_pa('', $suffix);
		} else {
			$dimensions = static::calculate_dimensions($dimensions, $picture);
			return static::load($picture)->resize($dimensions['width'], $dimensions['height'])->save($new_name);
		}
	}

}
