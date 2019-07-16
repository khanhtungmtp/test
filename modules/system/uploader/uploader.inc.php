<?php
    require_once('settings.php');

	if( isset( $_FILES['file'] ) ) {
		$uploaded = array();
		$len = count( $_FILES['file']['name'] );
		for( $i = 0; $i < $len; $i++ ) {
			//Get data
			$destination = strip_tags( $_POST['destination'] );
			$imageName = strip_tags( $_POST['image_name'] ) . '-' . ($i + 1);
			$file = $_FILES['file'];
			$type = $file['type'][$i];
			$type = explode( '/', $type );
			$type = '.' . $type[1];
			$image = $file['tmp_name'][$i];

			//Remove all special characters
			$destination = preg_replace( '/[^a-z]/', '', $destination );
			$imageName = preg_replace( '/[^a-zA-Z0-9_-]/', '', $imageName );


			/*Check file type, only allow image include png, jpeg, gif, swf*/
			if( !is_array( getimagesize( $image ) ) ) {
				echo '0|Chỉ cho phép upload hình ảnh!';
				exit;
			}

			//Check exists destination
			$target = TP_REL_UPLOADS . $destination . '/';
			if( !file_exists( $target ) ) {
				echo '0|Không tìm thấy thư mục upload';
				exit;
			}

			//Check if destination is writable
			if( !is_writable( $target ) ) {
				echo '0|Thư mục "' . $destination . '" không cho phép ghi file';
				exit;
			}

			$imageSrc = $target . $imageName . $type;
			$r = move_uploaded_file( $image, $imageSrc );
			$r ? array_push( $uploaded, $imageName . $type ) : false;
		}
		$r ? print( '1|' . json_encode( $uploaded ) ) : print( '0|Lỗi không xác định!' );
	}
?>
