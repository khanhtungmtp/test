<?php
	class Sql {

		public function get( $int ) {
			$var = '_' . $int;
			$db = unserialize( TP_DB_PARAMS );
			$prefix = $db['DB_TABLE_PREFIX'];
			return str_replace( 'hhvt_', $prefix, $this -> $var );
		}

		//Cpanel
		private $_1 = "SELECT * FROM hhvt_admins WHERE admin_username = :admin_username OR admin_email = :admin_email LIMIT 1;" ; // autho/login.inc.php
		private $_2 = "SELECT * FROM hhvt_admins WHERE admin_username = :admin_username OR admin_email = :admin_email LIMIT 1;"; // autho/resetpass.inc.php
		private $_3 = "UPDATE hhvt_admins SET admin_resetpass_string = :string WHERE admin_email = :admin_email;"; // autho/resetpass.inc.php
		private $_4 = "UPDATE hhvt_admins SET admin_password = :admin_password WHERE admin_id = :admin_id;"; // autho/changepass.inc.php
		private $_5 = "SELECT admin_id FROM hhvt_admins WHERE admin_resetpass_string = :admin_resetpass_string AND admin_email = :admin_email;"; // autho/changepass.inc.php
		private $_6 = "INSERT INTO hhvt_cates( cate_id, cate_name, cate_parent, cate_page_title, cate_seo_url, cate_meta_description, cate_meta_keywords, cate_image ) VALUES( :cate_id, :cate_name, :cate_parent, :cate_page_title, :cate_seo_url, :cate_meta_description, :cate_meta_keywords, :cate_image );"; // cpanel.product.category/save.inc.php
		private $_7 = "UPDATE hhvt_cates SET cate_name = :cate_name, cate_parent = :cate_parent, cate_page_title = :cate_page_title, cate_seo_url = :cate_seo_url, cate_meta_description = :cate_meta_description, cate_meta_keywords = :cate_meta_keywords, cate_image = :cate_image WHERE cate_id = :cate_id ;"; // cpanel.product.category/save.inc.php
		private $_8 = "SELECT * FROM hhvt_cates;"; // cpanel.product.category/list.inc.php
		private $_9 = "DELETE FROM hhvt_cates WHERE cate_id = :cate_id OR cate_parent = :cate_id;"; //cpanel.product.category/delete.inc.php
		private $_105 = "SELECT user_fullname, user_username FROM hhvt_users WHERE user_id = :user_id;";
		private $_106 = "SELECT state_name FROM hhvt_state WHERE state_id = :state_id;";
		private $_107 = "SELECT * FROM hhvt_orders WHERE order_code = :order_code;";
		private $_108 = "SELECT payment_name FROM hhvt_payment WHERE payment_id = :payment_id;";
		private $_109 = "SELECT product_id, product_code, product_name, product_avatar, cate_id, product_price, product_amount_by_branch FROM hhvt_products ORDER BY product_order DESC;";
		private $_110 = "SELECT * FROM hhvt_users ORDER BY user_id DESC LIMIT 5 OFFSET :offset;";
		private $_111 = "SELECT * FROM hhvt_users WHERE user_id = :user_id;";
		private $_112 = "SELECT order_timeline FROM hhvt_orders WHERE order_code = :order_code;";
		private $_113 = "UPDATE hhvt_orders SET state_id = :state_id, order_timeline = :order_timeline WHERE order_code = :order_code;";
		private $_114 = "SELECT order_code, user_id, state_id, order_total_money, order_time, order_shipping_infos FROM hhvt_orders WHERE order_code LIKE :order_code ORDER BY order_id DESC LIMIT 5 OFFSET :offset;";
		private $_115 = "SELECT COUNT(*) AS number FROM hhvt_orders WHERE state_id NOT IN (5,6);";
		private $_116 = "SELECT * FROM hhvt_reorders ORDER BY reorder_id DESC LIMIT 5 OFFSET :offset;";
		private $_117 = "SELECT order_code, user_id FROM hhvt_orders WHERE order_id = :order_id;";
		private $_118 = "SELECT user_username, user_fullname, user_mobile FROM hhvt_users WHERE user_id = :user_id;";
		private $_119 = "SELECT * FROM hhvt_state WHERE state_id = :state_id;";
		private $_120 = "UPDATE hhvt_reorders SET state_id = :state_id WHERE reorder_id = :reorder_id;";
		private $_121 = "SELECT * FROM hhvt_pages;";
		private $_122 = "SELECT * FROM hhvt_pages WHERE page_id = :page_id;";
		private $_123 = "UPDATE hhvt_pages SET page_name = :page_name, page_page_title = :page_page_title, page_seo_url = :page_seo_url, page_meta_description = :page_meta_description, page_meta_keywords = :page_meta_keywords, page_contents = :page_contents, page_publish =:page_publish WHERE page_id = :page_id;";
		private $_128 = "INSERT INTO hhvt_pages( page_name, page_page_title, page_seo_url, page_meta_description, page_meta_keywords, page_contents, page_publish ) VALUES ( :page_name, :page_page_title, :page_seo_url, :page_meta_description, :page_meta_keywords, :page_contents, :page_publish );";
		private $_124 = "INSERT INTO hhvt_commission( commission_area, commission_level, commission_value ) VALUES ( :commission_area, :commission_level, :commission_value );";
		private $_125 = "SELECT * FROM hhvt_commission;";
		private $_126 = "UPDATE hhvt_commission SET commission_area = :commission_area, commission_level = :commission_level, commission_value = :commission_value WHERE commission_id = :commission_id;";
		private $_127 = "DELETE FROM hhvt_commission WHERE commission_id = :commission_id;";
		private $_129 = "INSERT INTO hhvt_vouchers( voucher_name, voucher_value, voucher_points, voucher_start, voucher_end, voucher_code ) VALUES ( :voucher_name, :voucher_value, :voucher_points, :voucher_start, :voucher_end, :voucher_code );";
		private $_130 = "SELECT * FROM hhvt_vouchers ORDER BY voucher_end DESC;";
		private $_131 = "SELECT * FROM hhvt_vouchers WHERE voucher_id = :voucher_id;";
		private $_132 = "UPDATE hhvt_vouchers SET voucher_name = :voucher_name, voucher_value = :voucher_value, voucher_points = :voucher_points, voucher_start = :voucher_start, voucher_end = :voucher_end WHERE voucher_id = :voucher_id;";
		private $_133 = "DELETE FROM hhvt_vouchers WHERE voucher_id = :voucher_id;";
		private $_134 = "DELETE FROM hhvt_pages WHERE page_id = :page_id;";
		private $_150 = "SELECT * FROM hhvt_mailbox ORDER BY mailbox_id DESC LIMIT 5 OFFSET :offset;";
		private $_151 = "UPDATE hhvt_mailbox SET mailbox_seen = 0 WHERE mailbox_id = :mailbox_id;";
		private $_152 = "UPDATE hhvt_mailbox SET mailbox_important = :mailbox_important WHERE mailbox_id = :mailbox_id;";
		private $_153 = "SELECT mailbox_important FROM hhvt_mailbox WHERE mailbox_id = :mailbox_id;";
		private $_154 = "DELETE FROM hhvt_mailbox WHERE mailbox_id = :mailbox_id;";
		private $_155 = "UPDATE hhvt_users SET group_id = :group_id, user_fullname = :user_fullname, user_username = :user_username, user_email = :user_email, user_mobile = :user_mobile, user_address_book = :user_address_book, user_points = :user_points WHERE user_id = :user_id;";
		private $_156 = "INSERT INTO hhvt_users( group_id, user_fullname, user_username, user_password, user_email, user_mobile, user_started, user_resetpass_string, user_address_book, user_points ) VALUES( :group_id, :user_fullname, :user_username, :user_password, :user_email, :user_mobile, :user_started, :user_resetpass_string, :user_address_book, :user_points );";
		private $_157 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = :setting_name;";
		private $_158 = "UPDATE hhvt_settings SET setting_value = :setting_value WHERE setting_name = :setting_name;";
		private $_159 = "SELECT COUNT(*) AS number FROM hhvt_mailbox";
		private $_160 = "INSERT INTO hhvt_posts ( admin_id, blog_cate_id, post_title, post_page_title, post_contents, post_compact, post_meta_description, post_meta_keywords, post_seo_url, post_allow_comment, post_as_draff, post_thumbnail, post_time ) VALUES( :admin_id, :blog_cate_id, :post_title, :post_page_title, :post_contents, :post_compact, :post_meta_description, :post_meta_keywords, :post_seo_url, :post_allow_comment, :post_as_draff, :post_thumbnail, :post_time )";
		private $_161 = "SELECT * FROM hhvt_posts ORDER BY post_time DESC LIMIT 5 OFFSET :offset;";
		private $_162 = "SELECT COUNT(*) AS amount FROM hhvt_comments WHERE comment_url = :comment_url;";
		private $_1631 = "SELECT blog_cate_name FROM hhvt_blog_cates WHERE blog_cate_id = :id;";
		private $_1632 = "SELECT * FROM hhvt_blog_cates;";
        private $_1611 = "SELECT * FROM hhvt_posts WHERE blog_cate_id LIKE :cate_id ORDER BY post_time DESC LIMIT 5 OFFSET :offset;";
		private $_164 = "SELECT user_block FROM hhvt_users WHERE user_id = :user_id;";
		private $_165 = "UPDATE hhvt_users SET user_block = :user_block WHERE user_id = :user_id;";
		private $_166 = "SELECT COUNT(*) AS number FROM hhvt_users;";
		private $_167 = "SELECT * FROM hhvt_posts WHERE post_id = :id;";
		private $_168 = "UPDATE hhvt_posts SET admin_id = :admin_id, blog_cate_id = :blog_cate_id, post_title = :post_title, post_contents = :post_contents, post_thumbnail = :post_thumbnail, post_compact = :post_compact, post_meta_description = :post_meta_description, post_meta_keywords = :post_meta_keywords, post_page_title = :post_page_title, post_seo_url = :post_seo_url, post_allow_comment = :post_allow_comment, post_as_draff = :post_as_draff, post_time = :post_time WHERE post_id = :post_id;";
		private $_169 = "DELETE FROM hhvt_posts WHERE post_id = :post_id;";
		private $_170 = "SELECT COUNT(*) AS number FROM hhvt_posts;";
		private $_171 = "SELECT * FROM hhvt_comments ORDER BY comment_id DESC LIMIT 5 OFFSET :offset;";
		private $_172 = "SELECT COUNT(*) AS number FROM hhvt_comments;";
		private $_173 = "SELECT comment_publish FROM hhvt_comments WHERE comment_id = :comment_id;";
		private $_174 = "UPDATE hhvt_comments SET comment_publish = :comment_publish WHERE comment_id = :comment_id;";
		private $_175 = "SELECT order_code FROM hhvt_orders WHERE order_id <> :order_id AND state_id NOT IN ( 4,5 ) LIMIT 1;";
		private $_176 = "UPDATE hhvt_orders SET order_note = :order_note WHERE order_id = :order_id;";
		private $_177 = "SELECT COUNT(*) AS number FROM hhvt_reorders;";
		private $_178 = "SELECT order_id FROM hhvt_orders WHERE order_code LIKE :order_code ORDER BY order_id DESC;";
		private $_179 = "SELECT * FROM hhvt_reorders WHERE order_id = :order_id ORDER BY reorder_id DESC LIMIT 10 OFFSET :offset;";
		private $_180 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = :setting_name;";
		private $_181 = "SELECT * FROM hhvt_admins WHERE admin_id = :admin_id;";
		private $_182 = "UPDATE hhvt_admins SET group_id = :group_id, admin_fullname = :admin_fullname, admin_username = :admin_username, admin_email = :admin_email, admin_mobile = :admin_mobile WHERE admin_id = :admin_id;";
		private $_183 = "INSERT INTO hhvt_admins( group_id, admin_fullname, admin_username, admin_password, admin_email, admin_mobile ) VALUES( :group_id, :admin_fullname, :admin_username, :admin_password, :admin_email, :admin_mobile );";
		private $_184 = "SELECT * FROM hhvt_admins;";
		private $_185 = "SELECT admin_blocked FROM hhvt_admins WHERE admin_id = :admin_id;";
		private $_186 = "UPDATE hhvt_admins SET admin_blocked = :admin_blocked WHERE admin_id = :admin_id;";
		private $_187 = "SELECT * FROM hhvt_settings;";
		private $_188 = "UPDATE hhvt_settings SET setting_value = :setting_value WHERE setting_name = :setting_name;";
		private $_189 = "SELECT * FROM hhvt_questions ORDER BY question_id DESC LIMIT 5 OFFSET :offset;";
		private $_190 = "UPDATE hhvt_questions SET question_title = :question_title, question_description = :question_description WHERE question_id = :question_id;";
		private $_191 = "INSERT INTO hhvt_questions( question_title, question_description ) VALUES( :question_title, :question_description );";
		private $_192 = "DELETE FROM hhvt_questions WHERE question_id = :question_id;";
		private $_193 = "SELECT * FROM hhvt_questions WHERE question_id = :question_id;";
		private $_194 = "SELECT * FROM hhvt_orders WHERE order_time > :order_time OR order_time = :order_time;";
		private $_195 = "DELETE FROM hhvt_admins WHERE admin_id = :admin_id;";
		private $_196 = "SELECT * FROM hhvt_admins WHERE admin_id = :admin_id;";
		private $_197 = "UPDATE hhvt_admins SET admin_fullname = :admin_fullname, admin_email = :admin_email, admin_mobile = :admin_mobile, admin_password = :admin_password, admin_resetpass_string = :admin_resetpass_string WHERE admin_id = :admin_id;";
		private $_198 = "UPDATE hhvt_admins SET admin_fullname = :admin_fullname, admin_email = :admin_email, admin_mobile = :admin_mobile WHERE admin_id = :admin_id;";
		private $_199 = "SELECT SUM( order_final_money ) AS revenue FROM hhvt_orders WHERE state_id = 4 AND order_time >= :order_time;";
		private $_200 = "SELECT COUNT( * ) AS account FROM hhvt_users WHERE user_started >= :user_started;";
		private $_201 = "SELECT Status FROM ipn WHERE OrderId = :order_code;";
		private $_202 = "SELECT * FROM hhvt_notifications;";
		private $_203 = "UPDATE hhvt_notifications SET notification_number = 0, notification_read = 1 WHERE notification_type = :notification_type;";
		private $_204 = "SELECT COUNT(*) AS number FROM hhvt_questions;";
		private $_205 = "SELECT * FROM hhvt_orders WHERE order_time >= :order_time_start AND order_time <= :order_time_end AND state_id <> 5;";
		private $_206 = "SELECT t1.* FROM hhvt_orders AS t1 JOIN hhvt_users AS t2 ON t1.user_id = t2.user_id WHERE t2.user_fullname LIKE :keyword OR t2.user_username LIKE :keyword LIMIT 5 OFFSET :offset;";
		private $_207 = "SELECT t1.order_id FROM hhvt_orders AS t1 JOIN hhvt_users AS t2 ON t1.user_id = t2.user_id WHERE t2.user_fullname LIKE :keyword OR t2.user_username LIKE :keyword;";
		private $_208 = "SELECT COUNT(*) AS rows FROM hhvt_orders WHERE order_code LIKE :order_code;";
		private $_209 = "SELECT COUNT(*) AS rows FROM hhvt_orders AS t1 JOIN hhvt_users AS t2 ON t1.user_id = t2.user_id WHERE t2.user_fullname LIKE :keyword OR t2.user_username LIKE :keyword;";
		private $_210 = "UPDATE hhvt_users SET user_city = :user_city, user_balance = :user_balance WHERE user_id = :user_id;";
		private $_211 = "SELECT * FROM hhvt_users;";
		private $_212 = "SELECT * FROM hhvt_users WHERE user_fullname REGEXP :keyword OR user_mobile = :keyword2 OR user_email REGEXP :keyword3 LIMIT 5 OFFSET :offset;";
		private $_213 = "SELECT COUNT(*) AS rows FROM hhvt_users WHERE user_fullname REGEXP :keyword OR user_mobile = :keyword2 OR user_email REGEXP :keyword3;";
		private $_214 = "SELECT * FROM hhvt_orders;";
		private $_215 = "SELECT * FROM hhvt_users;";
		private $_216 = "SELECT * FROM hhvt_products;";
		private $_217 = "SELECT * FROM hhvt_logs WHERE log_time BETWEEN :start AND :end;";
		private $_218 = "SELECT COUNT(*) AS highest FROM hhvt_logs GROUP BY log_session_id, log_time;";
		private $_249 = "SELECT * FROM hhvt_temp_orders WHERE order_shipping_infos LIKE '%time%';";
		private $_250 = "UPDATE hhvt_temp_orders SET order_shipping_time = :order_shipping_time WHERE order_id = :order_id;";
		private $_251 = "SELECT group_id FROM hhvt_users WHERE user_id = :user_id;";
		private $_252 = "SELECT * FROM hhvt_cates;";
		private $_253 = "SELECT * FROM hhvt_orders WHERE order_time BETWEEN :start AND :end;";
		private $_254 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = :setting_name;";
		private $_256 = "SELECT order_id FROM hhvt_reorders WHERE shipped = 0 AND reorder_time BETWEEN :start AND :end;";
		private $_257 = "SELECT * FROM hhvt_orders WHERE order_id = :order_id";
		private $_258 = "SELECT order_id FROM hhvt_reorders WHERE shipped = 1 AND reorder_time BETWEEN :start AND :end;";
		private $_259 = "SELECT COUNT(*) AS total FROM hhvt_reorders;";

		//Home
		private $_10 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = :setting_name;"; //home.faq/faq.inc.php, home.autho/city.inc.php
		private $_11 = "INSERT INTO hhvt_mailbox( mailbox_time, mailbox_contents, mailbox_title, mailbox_sender_email ) VALUES( :mailbox_time, :mailbox_contents, :mailbox_title, :mailbox_sender_email );";
		private $_12 = "INSERT INTO hhvt_users( group_id, user_username, user_password, user_email, user_mobile, user_started ) VALUES ( :group_id, :user_username, :user_password, :user_email, :user_mobile, :user_started );";
		private $_13 = "SELECT * FROM hhvt_users WHERE user_username = :user_username OR user_email = :user_username;";
		private $_14 = "SELECT user_resetpass_string FROM hhvt_users WHERE user_email = :user_email;";
		private $_15 = "UPDATE hhvt_users SET user_resetpass_string = null, user_confirm_email = 1;";
		private $_16 = "UPDATE hhvt_users SET user_password = :user_password WHERE user_email = :user_email OR user_mobile = :user_mobile;";
		private $_17 = "SELECT * FROM hhvt_vouchers WHERE voucher_code LIKE BINARY :voucher_code;";
		private $_18 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = 'minimum_order_value';";
		private $_19 = "SELECT * FROM hhvt_delive WHERE delive_id = :delive_id;";
		private $_20 = "SELECT * FROM hhvt_payment;";
		private $_21 = "INSERT INTO hhvt_orders( state_id, branch_id, user_id, payment_id, order_code, delive_id, order_product, order_note, order_discount, order_total_money, order_shipping_infos, order_who_make_infos, order_time, order_recipient_infos, order_bill_infos, order_timeline, order_final_money ) VALUES( :state_id, :branch_id, :user_id, :payment_id, :order_code, :delive_id, :order_product, :order_note, :order_discount, :order_total_money, :order_shipping_infos, :order_who_make_infos, :order_time, :order_recipient_infos, :order_bill_infos, :order_timeline, :order_final_money );";
		private $_22 = "SELECT MAX( order_id ) AS id FROM hhvt_orders;";
		private $_23 = "SELECT * FROM hhvt_products WHERE product_id = :product_id;";
		private $_24 = "UPDATE hhvt_users SET user_points = :user_points WHERE user_id = :user_id;";
		private $_25 = "UPDATE hhvt_orders SET order_vnp_id = :id WHERE order_code = :order_code;";
		private $_26 = "SELECT * FROM hhvt_pages WHERE page_seo_url = :url;";
		private $_40 = "UPDATE hhvt_users SET user_password = :user_password WHERE user_username = :user_username;";
		private $_41 = "UPDATE hhvt_users SET user_fullname = :user_fullname, user_mobile = :user_mobile, user_email = :user_email WHERE user_username = :user_username;";
		private $_42 = "UPDATE hhvt_users SET user_address_book = :user_address_book WHERE user_username = :user_username;";
		private $_43 = "SELECT * FROM hhvt_orders WHERE order_code = :order_code";
		private $_44 = "SELECT payment_name FROM hhvt_payment WHERE payment_id = :payment_id";
		private $_45 = "SELECT state_name FROM hhvt_state WHERE state_id = :state_id";
		private $_46 = "SELECT * FROM hhvt_orders WHERE user_id = :user_id ORDER BY order_id DESC;";
		private $_47 = "INSERT INTO hhvt_reorders( order_id, state_id, reorder_note, reorder_time, shipped ) VALUES( :order_id, :state_id, :reorder_note, :reorder_time, :shipped );";
		private $_48 = "UPDATE hhvt_orders SET state_id = :state_id, order_timeline = :order_timeline WHERE order_id = :order_id;";
		private $_49 = "UPDATE hhvt_vouchers SET voucher_code = :voucher_code WHERE voucher_id = :voucher_id;";
		private $_50 = "UPDATE hhvt_users SET user_points = :user_points WHERE user_id = :user_id;";
		private $_51 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = :setting_name;";
		private $_52 = "SELECT * FROM hhvt_commission WHERE commission_area = :commission_area ORDER BY commission_level ASC;";
		private $_53 = "UPDATE hhvt_products SET product_amount_by_branch = :amount WHERE product_id = :product_id;";
		private $_54 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = :setting_name OR setting_name = :setting_name2;";
		private $_55 = "UPDATE hhvt_posts SET post_view_count = post_view_count + 1 WHERE post_id = :post_id;";
		private $_56 = "SELECT user_username FROM hhvt_users WHERE user_email = :user_email OR user_mobile = :user_mobile;";
		private $_57 = "SELECT * FROM hhvt_questions;";
		private $_58 = "UPDATE hhvt_orders SET payment_id = :payment_id, order_product = :order_product, order_note = :order_note, order_discount = :order_discount, order_total_money = :order_total_money, order_final_money = :order_final_money, order_shipping_infos = :order_shipping_infos, order_recipient_infos = :order_recipient_infos, order_bill_infos = :order_bill_infos, order_who_make_infos = :order_who_make_infos WHERE order_code = :order_code;";

		//Route dynamic
		private $_400 = "SELECT product_seo_url FROM hhvt_products WHERE product_publish = 1;";
		private $_401 = "SELECT cate_seo_url FROM hhvt_cates;";
		private $_402 = "SELECT blog_cate_seo_url FROM hhvt_blog_cates;";
		private $_403 = "SELECT post_seo_url FROM hhvt_posts WHERE post_as_draff = 0;";
		private $_404 = "SELECT page_seo_url FROM hhvt_pages WHERE page_publish = 1;";

		//Blog class
		private $_800 = "SELECT * FROM hhvt_posts WHERE post_as_draff = 0;";
		private $_801 = "SELECT * FROM hhvt_posts WHERE blog_cate_id LIKE :url;";
		private $_802 = "SELECT COUNT(*) AS amount FROM hhvt_comments WHERE comment_url = :comment_url;";
		private $_803 = "SELECT admin_fullname FROM hhvt_admins WHERE admin_id = :admin_id;";
		private $_804 = "SELECT * FROM hhvt_posts WHERE post_seo_url = :post_seo_url;";
		private $_805 = "SELECT * FROM hhvt_blog_cates WHERE blog_cate_seo_url = :blog_cate_seo_url;";

		//Comment
		private $_1000 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = :setting_name;";
		private $_1001 = "SELECT * FROM hhvt_comments WHERE comment_url = :comment_url AND comment_parent = 0 AND comment_publish = 1;";
		private $_1002 = "SELECT * FROM hhvt_comments WHERE comment_parent = :comment_id AND comment_publish = 1;";
		private $_1003 = "INSERT INTO hhvt_comments( comment_url, user_id, comment_parent, comment_contents, comment_time, comment_author_name, comment_author_email ) VALUES( :comment_url, :user_id, :comment_parent, :comment_contents, :comment_time, :comment_author_name, :comment_author_email );";

        //Frontview
        private $_2000 = "SELECT * FROM hhvt_posts ORDER BY post_time DESC LIMIT 1;";
        private $_2001 = "SELECT * FROM hhvt_posts ORDER BY post_view_count DESC LIMIT :limit OFFSET :offset;";
        private $_2002 = "SELECT setting_value FROM hhvt_settings WHERE setting_name = :name;";
        private $_2003 = "SELECT * FROM hhvt_posts;";
        private $_2004 = "SELECT * FROM hhvt_blog_cates WHERE blog_cate_id = :id;";
        private $_2005 = "SELECT * FROM hhvt_posts WHERE blog_cate_id LIKE :id ORDER BY post_time DESC LIMIT 1;";
        private $_2006 = "SELECT * FROM hhvt_posts WHERE blog_cate_id LIKE :id ORDER BY post_time DESC LIMIT 5 OFFSET 1;";
        private $_2007 = "SELECT * FROM hhvt_posts WHERE blog_cate_id LIKE :id ORDER BY post_time DESC;";
        private $_2008 = "SELECT * FROM hhvt_posts WHERE post_title LIKE :keyword OR post_contents LIKE :keyword ORDER BY post_time DESC;";
        private $_2009 = "SELECT * FROM hhvt_blog_cates WHERE blog_cate_seo_url = :url;";
        private $_2010 = "SELECT * FROM hhvt_posts WHERE blog_cate_id LIKE :id ORDER BY post_time DESC LIMIT 20;";
        private $_2011 = "SELECT * FROM hhvt_posts ORDER BY post_time DESC LIMIT 5;";
        private $_2012 = "SELECT * FROM hhvt_posts ORDER BY post_view_count DESC LIMIT 5;";
        private $_2013 = "SELECT * FROM hhvt_posts WHERE post_seo_url = :url;";
        private $_2014 = "SELECT * FROM hhvt_admins WHERE admin_id = :id;";
        private $_2015 = "SELECT COUNT(*) as amount FROM hhvt_comments WHERE comment_url = :url;";
        private $_2016 = "UPDATE hhvt_posts SET post_view_count = post_view_count + 1 WHERE post_seo_url = :url;";
        private $_2017 = "SELECT * FROM hhvt_pages WHERE page_seo_url = :url;";
        private $_2018 = "SELECT * FROM hhvt_users WHERE user_username = :username;";
        private $_2019 = "INSERT INTO hhvt_users(user_username, user_fullname, user_password, user_email) VALUES (:username, :fullname, :password, :email);";
        private $_2020 = "SELECT * FROM hhvt_posts WHERE blog_cate_id LIKE :id ORDER BY post_time DESC LIMIT :limit OFFSET :offset;";
        private $_2021 = "SELECT * FROM hhvt_members;";
        private $_2022 = "INSERT INTO hhvt_visit(visit_ip, visit_time) VALUES (:visit_ip, :visit_time);";
        private $_2023 = "UPDATE hhvt_visit SET visit_time = :visit_time WHERE visit_ip = :visit_ip AND visit_time BETWEEN :start AND :end;";
        private $_2024 = "SELECT * FROM hhvt_visit WHERE visit_time BETWEEN :start AND :end;";
        private $_2025 = "SELECT * FROM hhvt_visit;";

        // Crawler
        private $_2026 = "SELECT COUNT(*) as amount FROM hhvt_posts WHERE post_seo_url = :url;";
    }
?>
