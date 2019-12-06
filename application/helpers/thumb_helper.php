<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Thumb()
 * A TimThumb-style function to generate image thumbnails on the fly.
 *
 * @author Darren Craig
 * @author Lozano Hernán <hernantz@gmail.com>
 * @access public
 * @param string $src
 * @param int $width
 * @param int $height
 * @param string $image_thumb
 * @return String
 *
 */



function create_directory($path){
		if(!is_dir($path)){
			$oldmask = umask(0);
			mkdir($path, 0777);
			umask($oldmask);
		}
		return true;
}

/*** To remove the directory ***/

function remove_directory($path) {
			if (is_dir($path)) {
				$files = glob( $path . DIRECTORY_SEPARATOR . '*');
				foreach( $files as $file ){
					 if($file == '.' || $file == '..'){continue;}
					 if(is_dir($file)){
						  remove_directory( $file );
					 }else{
						  unlink( $file );
					 }
				}
				rmdir( $path ); 
			}
		return true;
}	


function thumb($src, $width, $height,$movefolder, $image_thumb = '', $type = 'resize', $image_ratio = 1 ) {
	$src = trim($src); 
	// Get the CodeIgniter super object
	$CI = &get_instance();

	// get src file's dirname, filename and extension
	$path = pathinfo($src);
	
	    // Path to image thumbnail
    if( !$image_thumb ) {
        // Hack for creating folder with backward reference from not existing directory (mkdir /not_exists/../dir/)
        if (!is_dir($path['dirname'])) {
            $oldmask = umask(0);
            $res = mkdir($path['dirname'], 0777, true);
            umask($oldmask);
        }
        if (!is_dir($path['dirname'] .'/'.$movefolder)) {
            $oldmask = umask(0);
            $res = mkdir($path['dirname'] .'/'.$movefolder, 0777, TRUE);
            umask($oldmask);
        }

        $image_thumb = $path['dirname'] .'/'.$movefolder. DIRECTORY_SEPARATOR . sha1($path['filename']) . "." . $path['extension'];
    }

	if (!file_exists($image_thumb) ) {

		// LOAD LIBRARY
		$CI->load->library('image_lib');

		if(!file_exists($src))
					return false;

		list($original_width, $original_height, $file_type, $attr) = getimagesize($src);

		if($type == "crop_and_resize" ) {
				$image_config["source_image"] = $src;
				$image_config['create_thumb'] = FALSE;
				$image_config['maintain_ratio'] = TRUE;
				$image_config['new_image'] = $image_thumb;
				$image_config['quality'] = "100%";
				$image_config['width'] = $width;
				$image_config['height'] = $height;
	
				$dim = (intval($original_width) / intval($original_height)) - ($image_config['width'] / $image_config['height']);
				$image_config['master_dim'] = ($dim > 0)? "height" : "width";
			 
				$CI->image_lib->initialize($image_config);
				$CI->image_lib->resize();
				$CI->image_lib->clear();
			
				// get our image attributes
			if(!file_exists($image_thumb))
				return false;


			list($original_width, $original_height, $file_type, $attr) = getimagesize($image_thumb);

				$crop_x = ($original_width / 2) - ($width / 2);
				$crop_y = ($original_height / 2) - ($height / 2);

				$image_config["source_image"] =  $image_thumb;
				$image_config['new_image'] =  $image_thumb;
				$image_config['quality'] = "100%";
				$image_config['maintain_ratio'] = FALSE;
					$image_config['width'] = $width;
				$image_config['height'] = $height;
				$image_config['x_axis'] = $crop_x;
				$image_config['y_axis'] = $crop_y;
				$CI->image_lib->initialize($image_config);
				$CI->image_lib->crop();
				$CI->image_lib->clear();

		} else {

				// CONFIGURE IMAGE LIBRARY
				$config['source_image'] = $src;
				$config['new_image'] = $image_thumb;
				if( $image_ratio ) {
					if(  $original_width < $width )
							$width = $original_width;
					if(  $original_height < $height )
							$height = $original_height;
				}
				$config['width'] = $width;
				$config['height'] = $height;

				$CI->image_lib->initialize($config);
				$CI->image_lib->resize();
				$CI->image_lib->clear();

				// get our image attributes
				if(!file_exists($image_thumb))
					return false;

				list($original_width, $original_height, $file_type, $attr) = getimagesize($image_thumb);

				// set our cropping limits.
				$crop_x = ($original_width / 2) - ($width / 2);
				$crop_y = ($original_height / 2) - ($height / 2);
		
				// initialize our configuration for cropping
				$config['source_image'] = $image_thumb;
				$config['new_image'] = $image_thumb;
				$config['x_axis'] = $crop_x;
				$config['y_axis'] = $crop_y;
				if( $image_ratio ) {
					$config['maintain_ratio'] = TRUE;
				}else
					$config['maintain_ratio'] = FALSE;
				$CI->image_lib->initialize($config);
				if($type == 'crop')
				$CI->image_lib->crop();
				else
				$CI->image_lib->resize();
		}
		$CI->image_lib->clear();
		
	}
	if(!file_exists($image_thumb))
		return false;

	return basename($image_thumb);
}
/* End of file thumb_helper.php */
/* Location: ./application/helpers/thumb_helper.php */
