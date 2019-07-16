<?php 
	class Shop extends Exec {
		/**
		 * SHOP CLASS
		 * Helper for shop online type
		 * @date: Oct 24th, 2016
		 * @version: v1.0
		*/
		
		private $sql;			
		
		public function __construct( $host, $user, $pass, $dbname ) {
			parent::__construct( $host, $user, $pass, $dbname );
			
			$this -> sql = new Sql();
		}
		
		/**
		 * Get product with limit
		 * @param int $offset
		 * @param [int $length = 1000]
		*/
		public function get_product( $offset, $length = 1000 ) {
			$data = array(
				':offset' => $offset,
				':length' => $length
			);
			return parent::get( $this -> sql -> get( 500 ), $data, true );
		}
		
		/**
		 * Get cate by parent
		 * @param [int $cateParent = 0]
		*/
		public function get_cate( $cateParent = 0 ) {
			$data = array( ':cate_parent' => $cateParent );
			return parent::get( $this -> sql -> get( 501 ), $data );
		}
		
		/**
		 * Get cate by id
		*/
		public function get_cate_by_id( $id ) {
			$data = array( ':cate_id' => $id );
			return parent::get( $this -> sql -> get( 509 ), $data );
		}
		
		/**
		 * Get all cates
		*/
		public function get_all_cates() {
			return parent::get( $this -> sql -> get( 506 ) );
		}
		
		/**
		 * Get all menu of app
		 * @param string $menuName
		 */
		public function get_menu( $menuName ) {
			//Get menu_id
			$positionData = array( ':setting_name' => 'menu_position' );
			$position = parent::get( $this -> sql -> get( 502 ), $positionData );
			$position = json_decode( $position[0]['setting_value'], true );
			$id = isset( $position[$menuName] ) ? $position[$menuName] : 0;
			
			if( $id == 0 ) return false;
			
			//Get menu based on menu_id
			$data = array( ':setting_name' => 'menus' );
			$menus = parent::get( $this -> sql -> get( 502 ), $data );
			$menus = json_decode( $menus[0]['setting_value'], true );
			foreach( $menus as $key => $menu ) {
				if( (int)$menu['menu_id'] === $id ) {
					return $menu;
				}
			}
			return false;
		}
		
		/**
		 * Get product by url
		 * @param string $url
		*/
		public function get_product_by_url( $url ) {
			$data = array(
				':product_seo_url' => $url
			);
			return parent::get( $this -> sql -> get( 508 ), $data );
		}
		
		/**
		 * Get product by code
		 * @param string $productCode
		*/
		public function get_product_by_code( $productCode ) {
			$data = array(
				':product_code' => $productCode
			);
			return parent::get( $this -> sql -> get( 503 ), $data );
		}
		
		/**
		 * Get product by product id
		 * @param string $productId
		*/
		public function get_product_by_id( $productId ) {
			$data = array(
				':product_id' => $productId
			);
			return parent::get( $this -> sql -> get( 504 ), $data );
		}
		
		/**
		 * Send mail fn
		*/
		public function send_mail( $post, $orderCode, $products, $discount ) {
			$smtp = new Smtp( SMTP_HOST, SMTP_USER, SMTP_PASS, SMTP_PORT, MAIL_FROM, MAIL_REPLY_TO );
			$to = $post['email'];
			$sub = 'ĐƠN HÀNG ĐÃ ĐƯỢC TIẾP NHẬN';
			
			//Get product list
			$productList = '';
			$i = 0;
			$totalMoney = 0;
			foreach( $products as $key => $product ) {
				$i++;
				$image = json_decode( $product['product_images'], true );
				$image = '<img width="40" height="40" style="width: 100%; height: auto; display: block;" src="http://quatangtraotay.com.vn/uploads/media/' . $image[0] . '" />';
				$money = $product['product_price'] * $product['buy_amount'];
				$totalMoney += $money;	
				$money = number_format( $money, 0, ',', '.' );
				$color = array( 'odd' => '#f2f2f2', 'even' => '#FFFFFF' );
				$type = $i % 2 == 0 ? 'even' : 'odd';
				$productList .= '
					<tr style="background-color: ' . $color[$type] . ';">
						<td style="width: 10%; border-color: #ddd; padding: 5px 10px">' . $image . '</td>
						<td style="padding: 10px; border-color: #ddd;">' . $product['product_name'] . '</td>
						<td style="text-align: right; padding: 10px; border-color: #ddd;">' . number_format( $product['product_price'], 0, ',', '.' ) . '</td>
						<td style="width: 15%; text-align: center; padding: 10px; border-color: #ddd;">' . $product['buy_amount'] . '</td>
						<td style="text-align: right; padding: 10px; border-color: #ddd;">' . $money . '</td>
					</tr>
				';
			}		

			//Get promote list
			$promoteList = '';
			if( $discount['voucher'] > 0 ) {
				if( $discount['voucher'] <= 1 ) {
					$voucherInVND = $totalMoney*$discount['voucher']/100;
				}
				else {
					$voucherInVND = $discount['voucher'];
				}
				$promoteList .= '
					<tr>
						<td style="width: 70%;"><i>Mã khuyến mãi: </i></td>
						<td><span><b>- ' . number_format( $voucherInVND, 0, ',', '.' ) . ' VNĐ</b></span></td>
					</tr>
				';	
			}
			if( $discount['commission'] > 0 ) {
				$promoteList .= '
					<tr>
						<td style="width: 70%;"><i>Chiết khấu theo giá trị đơn hàng: </i></td>
						<td><span><b>- ' . number_format( $discount['commission'], 0, ',', '.' ) . ' VNĐ</b></span></td>
					</tr>
				';
			}
			if( $discount['balance'] > 0 ) {
				$promoteList .= '
					<tr>
						<td style="width: 70%;"><i>Tài khoản thưởng: </i></td>
						<td><span><b>- ' . number_format( $discount['balance'], 0, ',', '.' ) . ' VNĐ</b></span></td>
					</tr>
				';
			}
			
			$address = isset( $post['different_address'] ) ? $post['recipient_address'] : $post['user_address'];
			$finalMoney = $_SESSION['final_money'];
			$orderTime = date( 'H:i', time() );
			$orderDate = date( 'd/m/Y', time() );
			$contents = '
				<tr>
					<td style="padding: 0 40px; margin: 0 auto;">
						<table style="border-collapse: collapse; table-layout: fixed; width: 100%; margin-bottom: 30px;">
							<tr>
								<td style="padding: 10px;">Xin chào ' . $post['fullname'] . '</td>
							</tr>
							<tr>
								<td style="padding: 10px;"><b>Quatangtraotay.com.vn</b> đã nhận được Đơn đặt hàng của bạn lúc <b>' . $orderTime . '</b>, ngày <b>' . $orderDate . '</b>.<br /> Mã số đơn hàng: <b>' . $orderCode . '</b></td>
							</tr>
							<tr>
								<td style="padding: 10px; border: 2px solid #ddd;">
									<table border="1" style="border-collapse: collapse;table-layout: fixed; width: 100%; border: 1px solid #ddd;">
										<tr style="text-align: center; background-color: #eef7e9; color: #0a6746;">
											<td style="width: 10%; border-color: #ddd;"></td>
											<td style="padding: 10px; border-color: #ddd;"><b>Tên sản phẩm</b></td>
											<td style="padding: 10px; border-color: #ddd;"><b>Đơn giá</b></td>
											<td style="width: 15%; padding: 10px; border-color: #ddd;"><b>Số lượng</b></td>
											<td style="padding: 10px; border-color: #ddd;"><b>Thành tiền</b></td>
										</tr>
										' . $productList . '
									</table>
									<div style="border-bottom: 1px solid #ddd; width: 100%; margin: 20px 0;"></div>
									<table style="border-collapse: collapse;table-layout: fixed; width: 100%; text-align: right;">
										<tr>
											<td style="width: 70%;">Trị giá hàng hóa</td>
											<td><span><b>' . number_format( $totalMoney, 0, ',', '.' ) . '</b><span><span> VNĐ</span></td>
										</tr>
										' . $promoteList . '
										<tr>
											<td style="width: 70%;">
												<p style="margin: 0;"><b>Trị giá đơn hàng</b></p>
												<h5 style="font-weight: normal; margin: 0;">(Đã bao gồm VAT)</h5>
											</td>
											<td><span><b>' . number_format( $finalMoney, 0, ',', '.' ) . '</b><span><span> VNĐ</span></td>
										</tr>
										<tr>
											<td colspan="2" style="text-align: left; background-color: #eaf4e4; padding: 5px;">Địa chỉ giao hàng: ' . $address . '</td>
										</tr>
									</table>
									
								</td>
							</tr>
							<tr>
								<td style="padding: 5px 0;">Trong vòng 24 tiếng, Tổng Đài CSKH của chúng tôi sẽ gọi điện cho bạn để xác nhận đơn hàng này.</td>
							</tr>
							<tr>
								<td style="padding: 5px 0;"><i>Xin cảm ơn bạn đã đặt hàng tại Quatangtraotay.com.vn & kính chào trân trọng.</i></td>
							</tr>
						</table>
					</td>
				</tr>

			';
			
			$emailTpl = file_get_contents( _MODULES . '/home/email.tpl.php' );
			$contents = str_replace( '{@contents}', $contents, $emailTpl );
			return $smtp -> send( $to, $sub, $contents );
		}
		
		/**
		 * Connect vnpay fn
		*/
		public function connect_vnp( $bankCode, $orderCode ) {
			$vnp_Url = VNPAY_URL;
			$vnp_Returnurl = SITE_DOMAIN . 'thanhtoan/buoc-4?method=2&order_code=' . $orderCode;
			$vnp_Merchant = "VNPAY";
			$vnp_AccessCode = VNPAY_KEY;
			$hashSecret = VNPAY_SECRET;
			$vnp_TxnRef = $orderCode;
			$vnp_OrderInfo = 'Thanh toan don hang cho Anh Sao';
			$vnp_OrderType = 'billpayment';
			$vnp_Amount = $_SESSION['final_money'] * 100;
			$vnp_Locale = 'vn';

			$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
			$vnp_UserAgent = $_SERVER['HTTP_USER_AGENT'];
			$date = date('Y-m-d H:i:s');
			$newtimestamp = strtotime($date . '+ 15 minute');
			$ExpiredDate = date('Y-m-d H:i:s', $newtimestamp);
			
			$inputData = array(
				"vnp_BankCode" => $bankCode,
				"vnp_AccessCode" => $vnp_AccessCode,
				"vnp_Amount" => $vnp_Amount,
				"vnp_Command" => "pay",
				"vnp_CreateDate" => date('YmdHis'),
				"vnp_CurrCode" => "VND",
				"vnp_IpAddr" => $vnp_IpAddr,
				"vnp_Locale" => $vnp_Locale,
				"vnp_Merchant" => $vnp_Merchant,
				"vnp_OrderInfo" => $vnp_OrderInfo,
				"vnp_OrderType" => $vnp_OrderType,
				"vnp_ReturnUrl" => $vnp_Returnurl,
				"vnp_TxnRef" => $vnp_TxnRef,
				"vnp_Version" => "2.0.0",
			);

			ksort($inputData);
			$query = "";
			$i = 0;
			$hashdata = "";
			foreach ($inputData as $key => $value) {
				if ($i == 1) {
					$hashdata .= '&' . $key . "=" . $value;
				} else {
					$hashdata .= $key . "=" . $value;
					$i = 1;
				}
				$query .= urlencode($key) . "=" . urlencode($value) . '&';
			}

			$vnp_Url = $vnp_Url . "?" . $query;
			if (isset($hashSecret)) {
				$vnpSecureHash = md5($hashSecret . $hashdata);
				$vnp_Url .= 'vnp_SecureHashType=MD5&vnp_SecureHash=' . $vnpSecureHash;
			}
			return $vnp_Url;
		}
		
		/**
		 * Get minimum in stock setting
		*/
		public function get_minimum_in_stock() {
			$data = array(
				':setting_name' => 'minimum_in_stock'
			);
			$r = parent::get( $this -> sql -> get( 510 ), $data );
			return $r[0]['setting_value'];
		}
	}
?>