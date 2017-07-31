-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 09:03 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'laravel', '2017-06-14 03:00:00', '2017-06-14 02:00:00'),
(2, 'Bootstrap', '2017-06-13 18:00:00', '2017-06-14 18:00:00'),
(3, 'css', '2017-06-14 12:18:26', '2017-06-14 12:18:26'),
(4, 'testing', '2017-06-25 05:19:25', '2017-06-25 05:19:25'),
(5, 'php', '2017-06-28 09:03:13', '2017-06-28 09:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(5, 'jake', 'jake@panda.zoo', 'very good', 1, 32, '2017-06-30 09:37:14', '2017-06-30 09:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_08_095502_create_posts_table', 1),
(4, '2017_06_08_095551_AddSlugToPosts', 1),
(5, '2017_06_13_185822_create_category_table', 1),
(6, '2017_06_13_190210_add_category_id_to_posts', 1),
(11, '2017_06_17_144636_create_tags_table', 2),
(13, '2017_06_17_155916_create_post_tag_table', 3),
(14, '2017_06_20_005634_create_comments_table', 3),
(18, '2017_06_27_103442_add_image_to_posts', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shihab@gmail.com', '$2y$10$aDLKLzcaFLaAPNaAe0Q7IeKqeCswTGVeyfuIs/J3y/n9O60tlDeKm', '2017-06-19 09:54:59'),
('shihab9921@gmail.com', '$2y$10$/R/T273ngHvchz8X1fSwUuyy59eJipr2S7Q.n.VeVbOZ.1KIUxWaa', '2017-06-19 10:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `image`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'How To Replace Password Reset Mail with Custom Mailable Template?', 'you can change 2 files to change password reset email template\r\n\r\npath: \\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Notifications\\ResetPassword.php ，functin toMail() ，you can edit email\'s title, password reset url, and button\'s content。\r\n\r\npath2: \\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\resources\\views\\email.blade.php , It\'s the view of password reset email template, like others blades.', 'laravel', NULL, 1, 1, '2017-06-13 13:28:34', '2017-06-13 13:28:34'),
(4, 'Laravel 5.4: Specified key was too long error', 'Laravel 5.4 made a change to the default database character set, and it’s now utf8mb4 which includes support for storing emojis. This only affects new applications and as long as you are running MySQL v5.7.7 and higher you do not need to do anything.\r\n\r\nFor those running MariaDB or older versions of MySQL you may hit this error when trying to run migrations:\r\n\r\n    [Illuminate\\Database\\QueryException]\r\n    SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table users add unique users_email_unique(email))\r\n\r\n    [PDOException]\r\n    SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes \r\n\r\nAs outlined in the Migrations guide to fix this all you have to do is edit your AppServiceProvider.php file and inside the boot method set a default string length:\r\n\r\nuse Illuminate\\Support\\Facades\\Schema;\r\n\r\npublic function boot()\r\n{\r\n    Schema::defaultStringLength(191);\r\n}\r\n\r\nAfter that everything should work as normal.', 'laravel-3', NULL, 1, 1, '2017-06-13 13:34:34', '2017-06-13 13:34:34'),
(11, 'Expected response code 250 but got code “535”, with message \"535-5.7.8', 'I  researched on the internet and some answers includes enabling the \"access for lesser app\" and \"unlocking gmail captcha\" which sadly didn\'t work for me until I found the 2-step verification.\r\n\r\nWhat I did the following was:\r\n\r\n1.    enable the 2-step verification to google HERE\r\n\r\n2.  Create App Password to be use by your system HERE\r\n\r\n3.   I selected Others (custom name) and clicked generate\r\n\r\n4.   Went to my env file in laravel and edited this\r\n\r\n5.   MAIL_USERNAME=talentscoutphil@gmail.com\r\n\r\n6.  MAIL_PASSWORD=thepasswordgenerated\r\n\r\n    Restarted my apache server and boom! It works again.', 'laravel-4', NULL, 3, 1, '2017-06-19 10:10:46', '2017-06-19 10:10:46'),
(30, 'test', '<img src=\"https://cloud.tinymce.com/stable/plugins/emoticons/img/smiley-sealed.gif\" alt=\"sealed\">', 'test-no1', NULL, 1, 4, '2017-06-28 10:48:14', '2017-06-28 10:49:33'),
(32, 'My first post', '<p>I don\'t want to put additions to this code if there isn\'t video to support it. The series is very popular and adding code that isn\'t explained through the video series confuses people, so i want the code here to only reflect what is explained in the video series. So while youre welcome to discuss it here, i dont want to pull it into the codebase because it isn\'t in a video to explain it.</p>\r\n<p>To do what you are looking for you will have to add logic to several elements of the project to get it to work together.</p>\r\n<ol><li>As noted by <a href=\"https://github.com/lloricode\">@lloricode</a>, you need to store the owner of a post in the DB in order to know who wrote the post later when you want to authorize a user. Create the migration to add a column in the DB which will store the user_id of the user that \"owns\" the post.</li>\r\n<li>Create a relationship with that column in the model. A post belongs to a user and a user has many posts. It is a one-to-many relationship and you will want to identify the relationship in the model so you can easily call it later.</li>\r\n<li>In the save() method of a post, you also want to make sure that you store the user\'s id in the new column, so that the relationship of the post owner can be defined.</li>\r\n<li>Finally add some logic in your show(), edit(), update(), and destroy() methods to check if the current user is the one that also owns the post. There are many ways to do this:\r\n<ol><li>The easy way is to add a basic if statement at the top of each method to compare the current user (probably using Auth::user()-&gt;id to the user id of the relationship we defined of the posts owner.</li>\r\n<li>A better way would be to define middleware which is basically the same thing as what is described above, but wrapped in middleware so you don\'t have to repeat yourself</li>\r\n<li>The best way would be to use the <a href=\"https://laravel.com/docs/5.4/authorization\">Authorization api </a>in Laravel to define user roles and protect it using the middleware already created such as $this-&gt;middleware(\'can:view_post\', $post-&gt;id)</li>\r\n</ol></li>\r\n</ol><p>Going into much more detail would really be a full written tutorial. But hopefully this gives you a sense for the direction to take to make this happen. edited</p>', 'curtis-1', NULL, 3, 1, '2017-06-29 14:03:18', '2017-06-30 09:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'php', '2017-06-29 01:55:14', '2017-06-29 01:55:14'),
(2, 'css', '2017-06-29 01:56:35', '2017-06-29 01:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pp` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `pp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shihab', 'shihab@gmail.com', '$2y$10$bYM/rZ3KRoSo3tBuVyK/3OLU9NoQpy7MwsAO1xnNo7S180nDDfhee', 'index.png', 'RShTH4EJp3x66E9PMknZPonGtwUEFnVOx1OvgTurtcsYz7MsXK4pKwmvy6SI', '2017-06-13 13:27:47', '2017-06-13 13:27:47'),
(3, 'J curtis', 'j.curtis@yahoo.com', '$2y$10$DbY4Jbpwez83xAgR7htOV.Iyo3.xVCowHyuKNE.vqBSVVvuzY4rXO', 'User3.jpg', 'WcgDyiZaW7BxyeJPR8dCC6CGAHgpCpRFYLNcdYhqepTVujW2cBF7PMLK7b85', '2017-06-29 13:58:20', '2017-07-02 04:04:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
