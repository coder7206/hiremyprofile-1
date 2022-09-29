ALTER TABLE `admin_rights`  ADD `videos` TINYINT(1) NOT NULL  AFTER `admins`;
ALTER TABLE `admin_rights` CHANGE `videos` `videos` INT(11) NOT NULL;

ALTER TABLE `admin_rights` ADD `instruction` INT(11) NOT NULL DEFAULT '1' AFTER `videos`; 

CREATE TABLE `videos` (
  `video_id` int(10) NOT NULL,
  `language_id` int(10) NOT NULL,
  `video_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_section` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `language_id`, `video_title`, `video_desc`, `video_url`, `video_section`) VALUES
(1, 1, 'Tim and Dan joo, Co founder', 'When you want to create a business bigger than your self, you need a lots of help.That\'s what fiverr does.', 'https://www.youtube.com/watch?v=YkCkPuFPAZI', 1),
(2, 1, 'Tim and Dan jo 1', 'When you want to create a business bigger than your self, you need a lots of help.That\'s what fiverr does.', 'https://www.gigtodo.com', 2),
(3, 1, 'Tim and Dan jo 2', 'When you want to create a business bigger than your self, you need a lots of help.That\'s what fiverr does.', 'https://www.gigtodo.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


-- --------------------------------------------------------

--
-- Table structure for table `home_section_5`
--

CREATE TABLE `home_section_5` (
  `section_id` int(10) NOT NULL,
  `language_id` int(10) NOT NULL,
  `section_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_short_heading` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_section_5`
--

INSERT INTO `home_section_5` (`section_id`, `language_id`, `section_heading`, `section_short_heading`, `video_url`) VALUES
(1, 1, 'A whole world of freelance talent at your fingertips', '&lt;ul&gt;\r\n  &lt;li&gt;The best for every budget Find high-quality services at every price point. No hourly rates, just project-based pricing.&lt;/li&gt;\r\n  &lt;li&gt;Quality work done quickly Find the right freelancer to begin working on your project within minutes.&lt;/li&gt;\r\n &lt;li&gt;Protected payments, every time Always know what you&amp;#39;ll pay upfront. Your payment isn&amp;#39;t released until you approve the work.&lt;/li&gt;\r\n  &lt;li&gt;24/7 support Questions? Our round-the-clock support team is available to help anytime, anywhere.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'https://youtu.be/9xwazD5SyVg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_section_5`
--
ALTER TABLE `home_section_5`
  ADD PRIMARY KEY (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_section_5`
--
ALTER TABLE `home_section_5`
  MODIFY `section_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;