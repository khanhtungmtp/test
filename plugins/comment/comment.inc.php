<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();
	if( isset( $_SESSION['hhvt_logged'] ) ) {
		$user = unserialize( $_SESSION['hhvt_user_data'] );
		$fullname = $user['user_fullname'];
		$username = $user['user_username'];
		$email = $user['user_email'];
		$readonly = 'readonly';
		//$user_id = $user['user_id'];
	} else {
		echo '<p style="clear: both; background-color: #ddd; color: #888; padding: 5px 10px;">Vui lòng <a href="' . TP_REL_ROOT . 'login?redirect=' . $_GET['params'] . '">đăng nhập</a> để bình luận.</p>';
        return;
	}

	$data_img = array(
		'setting_name' => 'default_avatar'
	);
	$img = $exec -> get( $sql -> get( 1000 ), $data_img );
	$avatar = $img[0]['setting_value'];
	$avatar = json_decode( $avatar, true );
	$avatar = $avatar[0];
	$comment_url = $_GET['params'];
	$name = ( $fullname == '' ) ? $username : $fullname ;
	$html = '
	<div class="row">
		<div class="col-3 chat-box">
			<form action="" method="post">
				<input type="hidden" name="comment_url" value="' . $comment_url . '" />
				<input type="hidden" name="comment_parent" value=0 />
				<input type="text" name="comment_author_name" value="' . $name . '" placeholder="Nhập tên" ' . $readonly . ' required/>
				<input type="email" name="comment_author_email" value="' . $email . '" placeholder="Nhập email" ' . $readonly . ' required oninvalid="this.setCustomValidity(\'Vui lòng điền email\')" oninput="this.setCustomValidity(\'\')"/>
				<textarea placeholder="Nhập ý kiến của bạn" name="comment_contents" required></textarea>
				<input type="submit" name="submit" value="Gửi" disabled/>
			</form>
		</div>
		<div class="col-3"></div>
	</div>';

	$data_post = array(
		'comment_url' => $comment_url
	);
	$cmt_arr = $exec -> get( $sql -> get( 1001 ), $data_post );
	foreach( $cmt_arr as $key => $c ) {
		$html .= '
			<div class="row">
				<div class="col-4 comment">
					<div class="row">
						<div class="col-6 comment-content">
							<div class="avatar">
								<img src="' . TP_REL_ROOT . 'uploads/public/' . $avatar . '" alt="avatar"/>
							</div>
							<div class="info">
								<span class="user">' . $c['comment_author_name'] . '</span>
								<span class="time"><i>' . date( "H:i:s d-m-Y", $c['comment_time'] ) . '</i></span>
							</div>
							' . $c['comment_contents'] . '
						</div>
					</div>
					<div class="row">
						<div class="col-1 reply">
							<span><i>Trả lời</i></span>
						</div>
					</div>
					<div class="reply-box">
						<div class="row reply-input">
							<div class="col-4 chat-box-reply">
								<form action="" method="post">
									<input type="hidden" name="comment_url" value="' . $comment_url . '" />
									<input type="hidden" name="comment_parent" value="' . $c['comment_id'] . '" />
									<input type="text" name="comment_author_name" value="' . $fullname . '" placeholder="Nhập tên" ' . $readonly . ' required/>
									<input type="email" name="comment_author_email" value="' . $email . '" placeholder="Nhập email" ' . $readonly . ' required oninvalid="this.setCustomValidity(\'Vui lòng điền email\')" oninput="this.setCustomValidity(\'\')"/>
									<textarea placeholder="Nhập bình luận" name="comment_contents" required></textarea>
									<input type="submit" name="submit" value="Gửi" disabled/>
								</form>
							</div>
							<div class="col-2"></div>
						</div>';
						$data_cmt_child = array(
							'comment_id' => $c['comment_id']
						);
						$cmt_child = $exec -> get( $sql -> get( 1002 ), $data_cmt_child );
						foreach( $cmt_child as $key => $cc ) {
							$html .= '
								<div class="row">
									<div class="col-6 comment-reply">
										<div class="avatar-reply">
											<img src="' . TP_REL_ROOT . 'uploads/public/' . $avatar . '" alt="avatar"/>
										</div>
										<div class="info-reply">
											<span class="user">' . $cc['comment_author_name'] . '</span>
											<span class="time"><i>' . date( "H:i:s d-m-Y", $cc['comment_time'] ) . '</i></span>
										</div>
										' . $cc['comment_contents'] . '
									</div>
								</div>
							';
						};
						$html .= '
					</div>
				</div>
				<div class="col-2"></div>
			</div>
		';
	};

	echo $html;
?>
