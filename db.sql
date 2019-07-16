-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 17, 2019 lúc 08:16 AM
-- Phiên bản máy phục vụ: 5.5.62-0ubuntu0.14.04.1
-- Phiên bản PHP: 7.2.13-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hhvt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_admins`
--

CREATE TABLE `hhvt_admins` (
  `admin_id` int(11) NOT NULL,
  `group_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_mobile` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_ips` text COLLATE utf8_unicode_ci,
  `admin_last_session` int(11) DEFAULT NULL,
  `admin_blocked` tinyint(1) DEFAULT '0',
  `admin_resetpass_string` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hhvt_admins`
--

INSERT INTO `hhvt_admins` (`admin_id`, `group_id`, `admin_username`, `admin_password`, `admin_fullname`, `admin_email`, `admin_mobile`, `admin_ips`, `admin_last_session`, `admin_blocked`, `admin_resetpass_string`) VALUES
(1, '1', 'admin', '$2a$08$vTbUxc0I2HVYDKbnoBWxDuxiWBgI1WvZpNp/RERWyUjb8ff52wbXe', 'Tran Xuan Tu', 'dp0613@yandex.com', '0948 223 995', NULL, NULL, 0, NULL),
(14, '1', 'test', '$2a$08$raTKdn.vaymrq2R1uclyY.CiG4DoYYcQfNoffhA/LCis6rZfD8SPy', 'test', 'test@gmail.com', '02115548854', NULL, NULL, 1, NULL),
(15, '1', 'huutha', '$2a$08$RAga3X9hr868U7rScBRsqe5tlgI3FDA.dqgboO/H8tw1WD8YvVhbi', 'huutha', 'huutha999@gmail.com', '0377148204', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_blog_cates`
--

CREATE TABLE `hhvt_blog_cates` (
  `blog_cate_id` int(11) NOT NULL,
  `blog_cate_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_cate_parent` int(11) DEFAULT NULL,
  `blog_cate_page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_cate_seo_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_cate_meta_description` text COLLATE utf8_unicode_ci,
  `blog_cate_meta_keywords` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hhvt_blog_cates`
--

INSERT INTO `hhvt_blog_cates` (`blog_cate_id`, `blog_cate_name`, `blog_cate_parent`, `blog_cate_page_title`, `blog_cate_seo_url`, `blog_cate_meta_description`, `blog_cate_meta_keywords`) VALUES
(1, 'Tin tức sự kiện', NULL, 'Tin tức sự kiện', 'tin-tuc-su-kien', 'Hiệp hội vận tải tỉnh Kiên Giang', 'hiep hoi van tai, kien giang, van tai'),
(2, 'Tin của hiệp hội cơ sở', NULL, 'Tin của hiệp hội cơ sở', 'tin-cua-hiep-hoi-co-so', 'Hiệp hội vận tải tỉnh Kiên Giang', 'hiep hoi van tai, kien giang, van tai'),
(3, 'Tin hoạt động của hội viên', NULL, 'Tin hoạt động của hội viên', 'tin-hoat-dong-cua-hoi-vien', 'Hiệp hội vận tải tỉnh Kiên Giang', 'hiep hoi van tai, kien giang, van tai'),
(4, 'An toàn giao thông', NULL, 'An toàn giao thông', 'an-toan-giao-thong', 'Hiệp hội vận tải tỉnh Kiên Giang', 'hiep hoi van tai, kien giang, van tai'),
(5, 'Tin vận tải ôtô', NULL, 'Tin vận tải ôtô', 'tin-van-tai-oto', 'Hiệp hội vận tải tỉnh Kiên Giang', 'hiep hoi van tai, kien giang, van tai'),
(6, 'Văn bản mới', NULL, 'Văn bản mới', 'van-ban-moi', 'Hiệp hội vận tải tỉnh Kiên Giang', 'hiep hoi van tai, kien giang, van tai'),
(7, 'Diễn đàn', NULL, 'Diễn đàn', 'dien-dan', 'Hiệp hội vận tải tỉnh Kiên Giang', 'hiep hoi van tai, kien giang, van tai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_comments`
--

CREATE TABLE `hhvt_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_url` text COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `comment_parent` int(11) DEFAULT NULL,
  `comment_contents` text COLLATE utf8_unicode_ci,
  `comment_time` int(10) UNSIGNED DEFAULT NULL,
  `comment_author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_author_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_like_amount` int(10) UNSIGNED DEFAULT '0',
  `comment_publish` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_members`
--

CREATE TABLE `hhvt_members` (
  `member_id` int(10) NOT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_pages`
--

CREATE TABLE `hhvt_pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_seo_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_meta_description` text COLLATE utf8_unicode_ci,
  `page_meta_keywords` text COLLATE utf8_unicode_ci,
  `page_contents` text COLLATE utf8_unicode_ci,
  `page_publish` tinyint(1) DEFAULT '1',
  `page_view_amount` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hhvt_pages`
--

INSERT INTO `hhvt_pages` (`page_id`, `page_name`, `page_page_title`, `page_seo_url`, `page_meta_description`, `page_meta_keywords`, `page_contents`, `page_publish`, `page_view_amount`) VALUES
(1, 'Giới Thiệu', 'Giới Thiệu', 'gioi-thieu', 'chưa có nội dung', 'noi dung', '<p>Nam malesuada turpis elit, et consectetur metus scelerisque eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque nulla orci, volutpat id sapien eu, congue porttitor turpis. Pellentesque mi augue, dignissim fermentum nulla at, euismod lacinia erat. Morbi at pharetra arcu. Fusce feugiat sapien sed gravida lobortis. Nam congue lorem ut ex ullamcorper pretium. Mauris nec lobortis magna. Maecenas at accumsan orci, non porta libero. Curabitur et imperdiet tortor. Etiam mi dui, vehicula at porttitor blandit, aliquet id libero. Phasellus quam neque, fermentum sed luctus ut, fermentum non sem. Fusce viverra suscipit lectus, id condimentum nulla sodales nec.</p>\r\n<p>Nunc ut odio sem. Phasellus ac massa dui. Duis id erat nec augue dapibus sodales. Nunc tortor nulla, tempus non lectus porttitor, rutrum ultrices lectus. Suspendisse potenti. Suspendisse lacinia, ante et eleifend dapibus, est est scelerisque mi, vestibulum hendrerit lorem lacus ac dui. Proin sit amet laoreet ipsum. Integer consequat sed nunc vitae aliquet. Nunc eget ex interdum, malesuada enim eget, convallis neque. Fusce eget consequat leo.</p>\r\n<p>&nbsp;</p>\r\n<p>The end!</p>\r\n<ul>\r\n<li>Hữu th&agrave;nh</li>\r\n</ul>', 1, NULL),
(2, 'Liên hệ', 'Liên hệ', 'lien-he', 'Liên hệ', 'Liên hệ', '<p>Nam malesuada turpis elit, et consectetur metus scelerisque eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque nulla orci, volutpat id sapien eu, congue porttitor turpis. Pellentesque mi augue, dignissim fermentum nulla at, euismod lacinia erat. Morbi at pharetra arcu. Fusce feugiat sapien sed gravida lobortis. Nam congue lorem ut ex ullamcorper pretium. Mauris nec lobortis magna. Maecenas at accumsan orci, non porta libero. Curabitur et imperdiet tortor. Etiam mi dui, vehicula at porttitor blandit, aliquet id libero. Phasellus quam neque, fermentum sed luctus ut, fermentum non sem. Fusce viverra suscipit lectus, id condimentum nulla sodales nec.</p>\r\n<p>Nunc ut odio sem. Phasellus ac massa dui. Duis id erat nec augue dapibus sodales. Nunc tortor nulla, tempus non lectus porttitor, rutrum ultrices lectus. Suspendisse potenti. Suspendisse lacinia, ante et eleifend dapibus, est est scelerisque mi, vestibulum hendrerit lorem lacus ac dui. Proin sit amet laoreet ipsum. Integer consequat sed nunc vitae aliquet. Nunc eget ex interdum, malesuada enim eget, convallis neque. Fusce eget consequat leo.</p>', 0, NULL),
(3, 'Hội viên', 'Hội viên', 'hoi-vien', 'Hội viên', 'Hội viên', '<p>Nam malesuada turpis elit, et consectetur metus scelerisque eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque nulla orci, volutpat id sapien eu, congue porttitor turpis. Pellentesque mi augue, dignissim fermentum nulla at, euismod lacinia erat. Morbi at pharetra arcu. Fusce feugiat sapien sed gravida lobortis. Nam congue lorem ut ex ullamcorper pretium. Mauris nec lobortis magna. Maecenas at accumsan orci, non porta libero. Curabitur et imperdiet tortor. Etiam mi dui, vehicula at porttitor blandit, aliquet id libero. Phasellus quam neque, fermentum sed luctus ut, fermentum non sem. Fusce viverra suscipit lectus, id condimentum nulla sodales nec.</p>\r\n<p>Nunc ut odio sem. Phasellus ac massa dui. Duis id erat nec augue dapibus sodales. Nunc tortor nulla, tempus non lectus porttitor, rutrum ultrices lectus. Suspendisse potenti. Suspendisse lacinia, ante et eleifend dapibus, est est scelerisque mi, vestibulum hendrerit lorem lacus ac dui. Proin sit amet laoreet ipsum. Integer consequat sed nunc vitae aliquet. Nunc eget ex interdum, malesuada enim eget, convallis neque. Fusce eget consequat leo.</p>', 0, NULL),
(4, 'Điều lệ', 'Điều lệ', 'dieu-le', 'Điều lệ', 'Điều lệ', '<p>Nam malesuada turpis elit, et consectetur metus scelerisque eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque nulla orci, volutpat id sapien eu, congue porttitor turpis. Pellentesque mi augue, dignissim fermentum nulla at, euismod lacinia erat. Morbi at pharetra arcu. Fusce feugiat sapien sed gravida lobortis. Nam congue lorem ut ex ullamcorper pretium. Mauris nec lobortis magna. Maecenas at accumsan orci, non porta libero. Curabitur et imperdiet tortor. Etiam mi dui, vehicula at porttitor blandit, aliquet id libero. Phasellus quam neque, fermentum sed luctus ut, fermentum non sem. Fusce viverra suscipit lectus, id condimentum nulla sodales nec.</p>\r\n<p>Nunc ut odio sem. Phasellus ac massa dui. Duis id erat nec augue dapibus sodales. Nunc tortor nulla, tempus non lectus porttitor, rutrum ultrices lectus. Suspendisse potenti. Suspendisse lacinia, ante et eleifend dapibus, est est scelerisque mi, vestibulum hendrerit lorem lacus ac dui. Proin sit amet laoreet ipsum. Integer consequat sed nunc vitae aliquet. Nunc eget ex interdum, malesuada enim eget, convallis neque. Fusce eget consequat leo.</p>', 0, NULL),
(5, 'Liên Kêt', 'lien-ket', 'lien-ket', 'lien ket', 'lien ket', '<p>chưa c&oacute; noi dung</p>', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_posts`
--

CREATE TABLE `hhvt_posts` (
  `post_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `blog_cate_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_contents` text COLLATE utf8_unicode_ci,
  `post_compact` text COLLATE utf8_unicode_ci,
  `post_meta_description` text COLLATE utf8_unicode_ci,
  `post_meta_keywords` text COLLATE utf8_unicode_ci,
  `post_seo_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_allow_comment` tinyint(1) DEFAULT '1',
  `post_as_draff` tinyint(1) DEFAULT '1',
  `post_thumbnail` text COLLATE utf8_unicode_ci,
  `post_time` int(10) UNSIGNED DEFAULT NULL,
  `post_view_count` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_settings`
--

CREATE TABLE `hhvt_settings` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting_value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hhvt_settings`
--

INSERT INTO `hhvt_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES
(1, 'ads', '[{\"item_id\":1559497553038,\"item_image\":\"[\\\"ahdau-2-1.jpeg\\\"]\",\"item_title\":\"ahdau\",\"item_alt\":\"uaduha\",\"item_link\":\"http:\\/\\/abc.com\"},{\"item_id\":1559497553039,\"item_image\":\"[\\\"audhuah-1.jpeg\\\"]\",\"item_title\":\"audhuah\",\"item_alt\":\"aid\",\"item_link\":\"http:\\/\\/anjd.com\"}]'),
(2, 'default_avatar', '[\"default_avatar-1.png\"]'),
(3, 'company_information', '{\"company_name\":\"HI\\u1ec6P H\\u1ed8I V\\u1eacN T\\u1ea2I T\\u1ec8NH KI\\u00caN GIANG\",\"company_address\":\"1190 Nguy\\u1ec5n Trung Tr\\u1ef1c, Ph\\u01b0\\u1eddng An B\\u00ecnh, TP. R\\u1ea1ch Gi\\u00e1, T\\u1ec9nh Ki\\u00ean Giang\",\"company_phone\":\"0123456789\",\"company_main_logo\":\"[\\\"logo_main-1.jpeg\\\"]\",\"company_footer_logo\":\"[\\\"logo_footer-1.jpeg\\\"]\",\"company_banner_xl\":\"[\\\"banner_xl-1.jpeg\\\"]\",\"company_banner_l\":\"[\\\"banner_l-1.jpeg\\\"]\",\"company_banner_m\":\"[\\\"banner_m-1.jpeg\\\"]\",\"company_banner_s\":\"[\\\"banner_s-1.jpeg\\\"]\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_users`
--

CREATE TABLE `hhvt_users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hhvt_visit`
--

CREATE TABLE `hhvt_visit` (
  `visit_id` int(10) UNSIGNED NOT NULL,
  `visit_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visit_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hhvt_admins`
--
ALTER TABLE `hhvt_admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_mobile` (`admin_mobile`),
  ADD UNIQUE KEY `admin_resetpass_string` (`admin_resetpass_string`);

--
-- Chỉ mục cho bảng `hhvt_blog_cates`
--
ALTER TABLE `hhvt_blog_cates`
  ADD PRIMARY KEY (`blog_cate_id`),
  ADD UNIQUE KEY `blog_cate_name` (`blog_cate_name`),
  ADD UNIQUE KEY `blog_cate_seo_url` (`blog_cate_seo_url`),
  ADD UNIQUE KEY `c_b_c` (`blog_cate_name`,`blog_cate_parent`);

--
-- Chỉ mục cho bảng `hhvt_comments`
--
ALTER TABLE `hhvt_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `hhvt_members`
--
ALTER TABLE `hhvt_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Chỉ mục cho bảng `hhvt_pages`
--
ALTER TABLE `hhvt_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `page_name` (`page_name`),
  ADD UNIQUE KEY `page_seo_url` (`page_seo_url`);

--
-- Chỉ mục cho bảng `hhvt_posts`
--
ALTER TABLE `hhvt_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_seo_url` (`post_seo_url`);

--
-- Chỉ mục cho bảng `hhvt_settings`
--
ALTER TABLE `hhvt_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `setting_name` (`setting_name`);

--
-- Chỉ mục cho bảng `hhvt_users`
--
ALTER TABLE `hhvt_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Chỉ mục cho bảng `hhvt_visit`
--
ALTER TABLE `hhvt_visit`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hhvt_admins`
--
ALTER TABLE `hhvt_admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `hhvt_blog_cates`
--
ALTER TABLE `hhvt_blog_cates`
  MODIFY `blog_cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hhvt_comments`
--
ALTER TABLE `hhvt_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hhvt_members`
--
ALTER TABLE `hhvt_members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hhvt_pages`
--
ALTER TABLE `hhvt_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hhvt_posts`
--
ALTER TABLE `hhvt_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hhvt_settings`
--
ALTER TABLE `hhvt_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hhvt_users`
--
ALTER TABLE `hhvt_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hhvt_visit`
--
ALTER TABLE `hhvt_visit`
  MODIFY `visit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
