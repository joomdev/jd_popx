CREATE TABLE IF NOT EXISTS `#__jdpopx_setting` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`option_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
`tmpl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
`effect` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
`after_subscribe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
`url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
`time_delay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
`listid` int(11) NOT NULL,
`cookie_time` int(11) NOT NULL,
`bar` text COLLATE utf8mb4_unicode_ci NOT NULL,
`light_box` text COLLATE utf8mb4_unicode_ci NOT NULL,
`small_sidebar` text COLLATE utf8mb4_unicode_ci NOT NULL,
`full_screen` text COLLATE utf8mb4_unicode_ci NOT NULL,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

INSERT INTO `#__jdpopx_setting` (`id`, `option_type`, `tmpl`, `effect`, `after_subscribe`, `url`, `time_delay`,`listid`,`cookie_time`, `bar`, `light_box`, `small_sidebar`, `full_screen`) VALUES
(1,'full_screen', '1', 'bounce', 'close', '', '5','','','', '', '', '{\"input_fields\":[\"name\",\"email\"],\"bg_color\":\"\",\"heading\":\"Hold On!\",\"description\":\"Get 10 % Discount Immediately\",\"button_text\":\"Submit\",\"button_color\":\"#08e4d7\",\"bottom_line\":\"We never spam your inbox\",\"tmpl\":\"1\",\"image\":\"\"}');

