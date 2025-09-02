-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2025 at 07:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base`
--

-- --------------------------------------------------------

--
-- Table structure for table `ha_logins`
--

CREATE TABLE `ha_logins` (
  `id` int(11) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `loginProvider` varchar(50) NOT NULL,
  `loginProviderIdentifier` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `state_id`, `created_on`, `updated_on`, `created_by_id`) VALUES
(1, 'xay', 1, '2025-08-20 16:39:26', '2025-08-20 16:39:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `comment` text DEFAULT NULL,
  `state_id` int(11) DEFAULT 1,
  `type_id` int(11) DEFAULT 0,
  `created_on` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_queue`
--

CREATE TABLE `tbl_email_queue` (
  `id` int(11) NOT NULL,
  `from_email` varchar(128) DEFAULT NULL,
  `to_email` varchar(128) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `model_type` varchar(128) DEFAULT NULL,
  `email_account_id` int(11) DEFAULT NULL,
  `message_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_email_queue`
--

INSERT INTO `tbl_email_queue` (`id`, `from_email`, `to_email`, `message`, `subject`, `date_published`, `last_attempt`, `date_sent`, `attempts`, `state_id`, `model_id`, `model_type`, `email_account_id`, `message_id`) VALUES
(1, 'admin@toxsl.in', 'admin@queeny.me', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\">\n		<p> Hello		<p>\n		Thank you for registering with	 AdminProject.\n	 Your login Credentials are	\n	<br>\n	Email admin@queeny.me	<br>\n	Password admin123	<br>\n		\n		<p>Follow the link</p>\n\n		<p><a href=\"http://localhost/pet-paradise/user/login\">http://localhost/pet-paradise/user/login</a></p>\n	</td>\n</tr>\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'Welcome! You new account is ready ToXSL Technologies', '2025-08-20 04:59:54', NULL, '2025-08-20 16:59:54', NULL, 0, NULL, NULL, NULL, NULL),
(2, '', 'admin@pp.org', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\"\n		style=\"font-family: Lato, sans-serif; padding-top: 30px; padding-bottom: 0; color: #333333;\"><h3\n			style=\"margin: 0; font-weight: 500; font-size: 19px;\">Hi ,</h3></td>\n</tr>\n\n<tr>\n\n	<td align=\"left\">\n		<p\n			style=\"font-size: 14px; padding: 0 0px 23px; border-bottom: 1px solid #ececec; text-align: left; margin-bottom: 8px;\">\n			A User <b> </b> has sent a new request.<br> User\'s\n			request details is given below; <br> <b>Name:</b>			<br> <b>Email:</b> 			<br> <b>Message:</b> 			\n			<br>\n		</p>\n	</td>\n</tr>\n\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'New Contact:', '2025-08-25 06:18:52', NULL, '2025-08-25 18:18:52', NULL, 0, NULL, NULL, NULL, NULL),
(3, '', 'admin@pp.org', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\"\n		style=\"font-family: Lato, sans-serif; padding-top: 30px; padding-bottom: 0; color: #333333;\"><h3\n			style=\"margin: 0; font-weight: 500; font-size: 19px;\">Hi ,</h3></td>\n</tr>\n\n<tr>\n\n	<td align=\"left\">\n		<p\n			style=\"font-size: 14px; padding: 0 0px 23px; border-bottom: 1px solid #ececec; text-align: left; margin-bottom: 8px;\">\n			A User <b> </b> has sent a new request.<br> User\'s\n			request details is given below; <br> <b>Name:</b>			<br> <b>Email:</b> 			<br> <b>Message:</b> 			\n			<br>\n		</p>\n	</td>\n</tr>\n\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'New Contact:', '2025-08-25 06:19:11', NULL, '2025-08-25 18:19:11', NULL, 0, NULL, NULL, NULL, NULL),
(4, '', 'admin@pp.org', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\"\n		style=\"font-family: Lato, sans-serif; padding-top: 30px; padding-bottom: 0; color: #333333;\"><h3\n			style=\"margin: 0; font-weight: 500; font-size: 19px;\">Hi ,</h3></td>\n</tr>\n\n<tr>\n\n	<td align=\"left\">\n		<p\n			style=\"font-size: 14px; padding: 0 0px 23px; border-bottom: 1px solid #ececec; text-align: left; margin-bottom: 8px;\">\n			A User <b> </b> has sent a new request.<br> User\'s\n			request details is given below; <br> <b>Name:</b>			<br> <b>Email:</b> 			<br> <b>Message:</b> 			\n			<br>\n		</p>\n	</td>\n</tr>\n\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'New Contact:', '2025-08-25 06:19:41', NULL, '2025-08-25 18:19:41', NULL, 0, NULL, NULL, NULL, NULL),
(5, '', 'admin@pp.org', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\"\n		style=\"font-family: Lato, sans-serif; padding-top: 30px; padding-bottom: 0; color: #333333;\"><h3\n			style=\"margin: 0; font-weight: 500; font-size: 19px;\">Hi ,</h3></td>\n</tr>\n\n<tr>\n\n	<td align=\"left\">\n		<p\n			style=\"font-size: 14px; padding: 0 0px 23px; border-bottom: 1px solid #ececec; text-align: left; margin-bottom: 8px;\">\n			A User <b> </b> has sent a new request.<br> User\'s\n			request details is given below; <br> <b>Name:</b>			<br> <b>Email:</b> 			<br> <b>Message:</b> 			\n			<br>\n		</p>\n	</td>\n</tr>\n\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'New Contact:', '2025-08-25 06:21:04', NULL, '2025-08-25 18:21:04', NULL, 0, NULL, NULL, NULL, NULL),
(6, '', 'admin@pp.org', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\"\n		style=\"font-family: Lato, sans-serif; padding-top: 30px; padding-bottom: 0; color: #333333;\"><h3\n			style=\"margin: 0; font-weight: 500; font-size: 19px;\">Hi ,</h3></td>\n</tr>\n\n<tr>\n\n	<td align=\"left\">\n		<p\n			style=\"font-size: 14px; padding: 0 0px 23px; border-bottom: 1px solid #ececec; text-align: left; margin-bottom: 8px;\">\n			A User <b> </b> has sent a new request.<br> User\'s\n			request details is given below; <br> <b>Name:</b>			<br> <b>Email:</b> 			<br> <b>Message:</b> 			\n			<br>\n		</p>\n	</td>\n</tr>\n\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'New Contact:', '2025-08-25 06:21:09', NULL, '2025-08-25 18:21:09', NULL, 0, NULL, NULL, NULL, NULL),
(7, '', 'admin@pp.org', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\"\n		style=\"font-family: Lato, sans-serif; padding-top: 30px; padding-bottom: 0; color: #333333;\"><h3\n			style=\"margin: 0; font-weight: 500; font-size: 19px;\">Hi ,</h3></td>\n</tr>\n\n<tr>\n\n	<td align=\"left\">\n		<p\n			style=\"font-size: 14px; padding: 0 0px 23px; border-bottom: 1px solid #ececec; text-align: left; margin-bottom: 8px;\">\n			A User <b> </b> has sent a new request.<br> User\'s\n			request details is given below; <br> <b>Name:</b>			<br> <b>Email:</b> 			<br> <b>Message:</b> 			\n			<br>\n		</p>\n	</td>\n</tr>\n\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'New Contact:', '2025-08-25 06:21:27', NULL, '2025-08-25 18:21:27', NULL, 0, NULL, NULL, NULL, NULL),
(8, '', 'admin@pp.org', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\"\n		style=\"font-family: Lato, sans-serif; padding-top: 30px; padding-bottom: 0; color: #333333;\"><h3\n			style=\"margin: 0; font-weight: 500; font-size: 19px;\">Hi ,</h3></td>\n</tr>\n\n<tr>\n\n	<td align=\"left\">\n		<p\n			style=\"font-size: 14px; padding: 0 0px 23px; border-bottom: 1px solid #ececec; text-align: left; margin-bottom: 8px;\">\n			A User <b> </b> has sent a new request.<br> User\'s\n			request details is given below; <br> <b>Name:</b>			<br> <b>Email:</b> 			<br> <b>Message:</b> 			\n			<br>\n		</p>\n	</td>\n</tr>\n\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'New Contact:', '2025-08-25 06:32:27', NULL, '2025-08-25 18:32:27', NULL, 0, NULL, NULL, NULL, NULL),
(9, 'test@gmail.com', 'admin@pp.org', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<style>\nbody {\n	font-family: \"Lato\", sans-serif;\n}\n\np {\n	line-height: 25px;\n	margin: 0;\n}\n\n.border-radius {\n	border-radius: 4px;\n}\n</style>\n</head>\n<body>\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n		<tr>\n			<td align=\"center\" valign=\"top\">\n				<table class=\"border-radius\" width=\"630px\" cellpadding=\"15\"\n					cellspacing=\"0\" style=\"border: 1px solid #eee;\">\n					<thead>\n						<tr>\n							<th align=\"left\" bgcolor=\"#00A65A\"\n								style=\"border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important; border-radius: 4px; padding: 5px 13px 3px;\"><h3\n									style=\"font-size: 16px; font-weight: 400; color: #fff;\">AdminProject</h3></th>\n						</tr>\n					</thead>\n					<tbody>\n					<td><tr>\n	<td align=\"left\"\n		style=\"font-family: Lato, sans-serif; padding-top: 30px; padding-bottom: 0; color: #333333;\"><h3\n			style=\"margin: 0; font-weight: 500; font-size: 19px;\">Hi Sukh,</h3></td>\n</tr>\n\n<tr>\n\n	<td align=\"left\">\n		<p\n			style=\"font-size: 14px; padding: 0 0px 23px; border-bottom: 1px solid #ececec; text-align: left; margin-bottom: 8px;\">\n			A User <b>Sukh </b> has sent a new request.<br> User\'s\n			request details is given below; <br> <b>Name:</b>Sukh			<br> <b>Email:</b> test@gmail.com			<br> <b>Message:</b> hlkjhklhl			\n			<br>\n		</p>\n	</td>\n</tr>\n\n</td>\n<tr>\n	<td align=\"left\" style=\"padding-top: 8px; padding-bottom: 3px;\">\n		<p\n			style=\"font-size: 14px; border-top: 1px solid #ececec; padding: 16px 0px 4px; text-align: left; color: #666; margin-top: 10px;\"></p>\n		<p\n			style=\"font-size: 14px; padding: 0 0px 20px; text-align: left; color: #666\">\n			Thanks & Regards,<br>AdminProject Team.</p>\n	</td>\n</tr>\n</tbody>\n\n<tfoot>\n	<tr>\n		<td\n			style=\"border-radius: 4px; border-top-left-radius: 0px; border-top-right-radius: 0px; height: 25px; font-family: Lato, sans-serif; border-top: 1px solid #ebebeb; border-bottom: 0;\"\n			align=\"left\" bgcolor=\"#00A65A\"><h3\n				style=\"font-size: 15px; font-weight: 400; color: #fff; margin: 0;\">Copyright\n									&copy; AdminProject</h3></td>\n	</tr>\n</tfoot>\n</table>\n</td>\n</tr>\n</table>\n</body>\n</html>', 'New Contact: jjkkjg', '2025-08-25 06:48:05', NULL, '2025-08-25 18:48:05', NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feed`
--

CREATE TABLE `tbl_feed` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `model_type` varchar(128) NOT NULL,
  `model_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT 0,
  `type_id` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_feed`
--

INSERT INTO `tbl_feed` (`id`, `content`, `model_type`, `model_id`, `state_id`, `type_id`, `created_on`, `updated_on`, `created_by_id`) VALUES
(1, 'Added new Post : <a href=\"http://localhost/pet-paradise/post/view/1/sdasd\">sdasd</a>', 'app\\models\\Post', 1, 1, 0, '2025-08-20 16:17:33', '2025-08-20 16:17:33', 1),
(2, 'Added new Category : <a href=\"http://localhost/pet-paradise/category/view/1/xay\">xay</a>', 'app\\models\\Category', 1, 1, 0, '2025-08-20 16:39:26', '2025-08-20 16:39:26', 1),
(3, 'Added new Petcategory : <a href=\"http://localhost/pet-paradise/petcategory/view/1/dog\">Dog</a>', 'app\\models\\Petcategory', 1, 1, 0, '2025-08-20 16:46:39', '2025-08-20 16:46:39', 1),
(4, 'Added new Petcategory : <a href=\"http://localhost/pet-paradise/petcategory/view/2/cat\">Cat</a>', 'app\\models\\Petcategory', 2, 1, 0, '2025-08-20 16:46:51', '2025-08-20 16:46:51', 1),
(5, 'Added new Petcategory : <a href=\"http://localhost/pet-paradise/petcategory/view/3/bird\">bird</a>', 'app\\models\\Petcategory', 3, 1, 0, '2025-08-20 16:47:05', '2025-08-20 16:47:05', 1),
(6, 'Added new Petcategory : <a href=\"http://localhost/pet-paradise/petcategory/view/4/bird\">bird</a>', 'app\\models\\Petcategory', 4, 1, 0, '2025-08-20 16:47:05', '2025-08-20 16:47:05', 1),
(7, 'Added new User : <a href=\"http://localhost/pet-paradise/user/view/2/sdasds\">sdasds</a>', 'app\\models\\User', 2, 1, 0, '2025-08-20 16:59:55', '2025-08-20 16:59:55', 1),
(8, 'Modified Post ', 'app\\models\\Post', 1, 1, 0, '2025-08-20 17:12:21', '2025-08-20 17:12:21', 1),
(9, 'Modified Post ', 'app\\models\\Post', 1, 1, 0, '2025-08-20 17:36:13', '2025-08-20 17:36:13', 1),
(10, 'Added new User : <a href=\"http://localhost/pet-paradise/user/view/3/sukh\">Sukh</a>', 'app\\models\\User', 3, 1, 0, '2025-08-20 17:47:03', '2025-08-20 17:47:03', NULL),
(11, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/1/3\">3</a>', 'app\\models\\LoginHistory', 1, 1, 0, '2025-08-20 17:58:59', '2025-08-20 17:58:59', NULL),
(12, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/2/3\">3</a>', 'app\\models\\LoginHistory', 2, 1, 0, '2025-08-20 18:02:47', '2025-08-20 18:02:47', NULL),
(13, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/3/3\">3</a>', 'app\\models\\LoginHistory', 3, 1, 0, '2025-08-20 18:11:38', '2025-08-20 18:11:38', NULL),
(14, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/4/3\">3</a>', 'app\\models\\LoginHistory', 4, 1, 0, '2025-08-20 18:12:27', '2025-08-20 18:12:27', NULL),
(15, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/5/3\">3</a>', 'app\\models\\LoginHistory', 5, 1, 0, '2025-08-20 18:14:40', '2025-08-20 18:14:40', NULL),
(16, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/6/2\">2</a>', 'app\\models\\LoginHistory', 6, 1, 0, '2025-08-21 14:29:39', '2025-08-21 14:29:39', NULL),
(17, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/7/1\">1</a>', 'app\\models\\LoginHistory', 7, 1, 0, '2025-08-21 14:31:30', '2025-08-21 14:31:30', NULL),
(18, 'Modified Post ', 'app\\models\\Post', 1, 1, 0, '2025-08-21 14:50:33', '2025-08-21 14:50:33', 1),
(19, 'Modified Post ', 'app\\models\\Post', 1, 1, 0, '2025-08-21 14:52:04', '2025-08-21 14:52:04', 1),
(20, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/8/3\">3</a>', 'app\\models\\LoginHistory', 8, 1, 0, '2025-08-21 15:30:07', '2025-08-21 15:30:07', NULL),
(21, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/9/3\">3</a>', 'app\\models\\LoginHistory', 9, 1, 0, '2025-08-21 16:03:48', '2025-08-21 16:03:48', NULL),
(22, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/10/2\">2</a>', 'app\\models\\LoginHistory', 10, 1, 0, '2025-08-21 16:04:01', '2025-08-21 16:04:01', NULL),
(23, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/11/2\">2</a>', 'app\\models\\LoginHistory', 11, 1, 0, '2025-08-21 16:04:45', '2025-08-21 16:04:45', NULL),
(24, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/12/3\">3</a>', 'app\\models\\LoginHistory', 12, 1, 0, '2025-08-21 16:05:10', '2025-08-21 16:05:10', NULL),
(25, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/13/1\">1</a>', 'app\\models\\LoginHistory', 13, 1, 0, '2025-08-21 16:05:33', '2025-08-21 16:05:33', NULL),
(26, 'Added new Pet : <a href=\"http://localhost/pet-paradise/pet/view/1/zimmy\">Zimmy</a>', 'app\\models\\Pet', 1, 1, 0, '2025-08-21 21:05:56', '2025-08-21 21:05:56', 1),
(27, 'Added new Post : <a href=\"http://localhost/pet-paradise/post/view/2/posts\">Posts</a>', 'app\\models\\Post', 2, 1, 0, '2025-08-21 21:36:53', '2025-08-21 21:36:53', 1),
(28, 'Modified Post ', 'app\\models\\Post', 2, 1, 0, '2025-08-21 21:41:45', '2025-08-21 21:41:45', 1),
(29, 'Modified Post ', 'app\\models\\Post', 2, 1, 0, '2025-08-21 21:42:58', '2025-08-21 21:42:58', 1),
(30, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/14/3\">3</a>', 'app\\models\\LoginHistory', 14, 1, 0, '2025-08-21 22:43:54', '2025-08-21 22:43:54', NULL),
(31, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/15/1\">1</a>', 'app\\models\\LoginHistory', 15, 1, 0, '2025-08-23 20:22:25', '2025-08-23 20:22:25', NULL),
(32, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/16/1\">1</a>', 'app\\models\\LoginHistory', 16, 1, 0, '2025-08-23 20:26:31', '2025-08-23 20:26:31', NULL),
(33, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/17/1\">1</a>', 'app\\models\\LoginHistory', 17, 1, 0, '2025-08-23 20:27:43', '2025-08-23 20:27:43', NULL),
(34, 'Modified Petcategory ', 'app\\models\\Petcategory', 3, 1, 0, '2025-08-23 20:33:37', '2025-08-23 20:33:37', 1),
(35, 'Modified Petcategory ', 'app\\models\\Petcategory', 4, 1, 0, '2025-08-23 20:34:00', '2025-08-23 20:34:00', 1),
(36, 'Modified Petcategory ', 'app\\models\\Petcategory', 4, 1, 0, '2025-08-23 22:23:32', '2025-08-23 22:23:32', 1),
(37, 'Modified Petcategory ', 'app\\models\\Petcategory', 4, 1, 0, '2025-08-23 22:27:41', '2025-08-23 22:27:41', 1),
(38, 'Modified Petcategory ', 'app\\models\\Petcategory', 3, 1, 0, '2025-08-23 22:35:17', '2025-08-23 22:35:17', 1),
(39, 'Modified Petcategory ', 'app\\models\\Petcategory', 2, 1, 0, '2025-08-23 22:35:41', '2025-08-23 22:35:41', 1),
(40, 'Modified Petcategory ', 'app\\models\\Petcategory', 1, 1, 0, '2025-08-23 22:36:04', '2025-08-23 22:36:04', 1),
(41, 'Modified Pet ', 'app\\models\\Pet', 2, 1, 0, '2025-08-24 13:33:38', '2025-08-24 13:33:38', 1),
(42, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/18/1\">1</a>', 'app\\models\\LoginHistory', 18, 1, 0, '2025-08-24 14:31:16', '2025-08-24 14:31:16', NULL),
(43, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/19/1\">1</a>', 'app\\models\\LoginHistory', 19, 1, 0, '2025-08-24 14:47:46', '2025-08-24 14:47:46', NULL),
(44, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 14:58:40', '2025-08-24 14:58:40', 1),
(45, 'Modified Pet ', 'app\\models\\Pet', 7, 1, 0, '2025-08-24 14:59:15', '2025-08-24 14:59:15', 1),
(46, 'Modified Pet ', 'app\\models\\Pet', 6, 1, 0, '2025-08-24 14:59:30', '2025-08-24 14:59:30', 1),
(47, 'Modified Pet ', 'app\\models\\Pet', 5, 1, 0, '2025-08-24 14:59:41', '2025-08-24 14:59:41', 1),
(48, 'Modified Pet ', 'app\\models\\Pet', 4, 1, 0, '2025-08-24 14:59:52', '2025-08-24 14:59:52', 1),
(49, 'Modified Pet ', 'app\\models\\Pet', 2, 1, 0, '2025-08-24 15:00:31', '2025-08-24 15:00:31', 1),
(50, 'Modified Pet ', 'app\\models\\Pet', 3, 1, 0, '2025-08-24 15:00:54', '2025-08-24 15:00:54', 1),
(51, 'Modified Pet ', 'app\\models\\Pet', 1, 1, 0, '2025-08-24 15:01:14', '2025-08-24 15:01:14', 1),
(52, 'Modified Pet ', 'app\\models\\Pet', 7, 1, 0, '2025-08-24 15:02:00', '2025-08-24 15:02:00', 1),
(53, 'Modified Pet ', 'app\\models\\Pet', 7, 1, 0, '2025-08-24 15:07:40', '2025-08-24 15:07:40', 1),
(54, 'Modified Pet ', 'app\\models\\Pet', 4, 1, 0, '2025-08-24 15:08:27', '2025-08-24 15:08:27', 1),
(55, 'Modified Pet ', 'app\\models\\Pet', 1, 1, 0, '2025-08-24 15:12:06', '2025-08-24 15:12:06', 1),
(56, 'Modified Pet ', 'app\\models\\Pet', 2, 1, 0, '2025-08-24 15:12:33', '2025-08-24 15:12:33', 1),
(57, 'Modified Pet ', 'app\\models\\Pet', 2, 1, 0, '2025-08-24 15:14:16', '2025-08-24 15:14:16', 1),
(58, 'Modified Pet ', 'app\\models\\Pet', 2, 1, 0, '2025-08-24 15:14:33', '2025-08-24 15:14:33', 1),
(59, 'Modified Pet ', 'app\\models\\Pet', 2, 1, 0, '2025-08-24 15:15:48', '2025-08-24 15:15:48', 1),
(60, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:23:46', '2025-08-24 15:23:46', 1),
(61, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:24:19', '2025-08-24 15:24:19', 1),
(62, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:24:37', '2025-08-24 15:24:37', 1),
(63, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:25:24', '2025-08-24 15:25:24', 1),
(64, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:25:39', '2025-08-24 15:25:39', 1),
(65, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:27:38', '2025-08-24 15:27:38', 1),
(66, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:29:54', '2025-08-24 15:29:54', 1),
(67, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:32:56', '2025-08-24 15:32:56', 1),
(68, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:46:36', '2025-08-24 15:46:36', 1),
(69, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:46:51', '2025-08-24 15:46:51', 1),
(70, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:47:24', '2025-08-24 15:47:24', 1),
(71, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:47:51', '2025-08-24 15:47:51', 1),
(72, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:47:59', '2025-08-24 15:47:59', 1),
(73, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:48:54', '2025-08-24 15:48:54', 1),
(74, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:49:08', '2025-08-24 15:49:08', 1),
(75, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:49:17', '2025-08-24 15:49:17', 1),
(76, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:53:47', '2025-08-24 15:53:47', 1),
(77, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 15:54:02', '2025-08-24 15:54:02', 1),
(78, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 16:00:31', '2025-08-24 16:00:31', 1),
(79, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 16:00:56', '2025-08-24 16:00:56', 1),
(80, 'Modified Pet ', 'app\\models\\Pet', 1, 1, 0, '2025-08-24 16:01:34', '2025-08-24 16:01:34', 1),
(81, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/20/1\">1</a>', 'app\\models\\LoginHistory', 20, 1, 0, '2025-08-24 17:33:00', '2025-08-24 17:33:00', NULL),
(82, 'Modified Pet ', 'app\\models\\Pet', 1, 1, 0, '2025-08-24 17:36:02', '2025-08-24 17:36:02', 1),
(83, 'Modified Pet ', 'app\\models\\Pet', 1, 1, 0, '2025-08-24 17:36:56', '2025-08-24 17:36:56', 1),
(84, 'Modified Pet ', 'app\\models\\Pet', 1, 1, 0, '2025-08-24 17:41:10', '2025-08-24 17:41:10', 1),
(85, 'Modified Pet ', 'app\\models\\Pet', 1, 1, 0, '2025-08-24 17:41:36', '2025-08-24 17:41:36', 1),
(86, 'Modified Pet ', 'app\\models\\Pet', 8, 1, 0, '2025-08-24 17:50:05', '2025-08-24 17:50:05', 1),
(87, 'Added new Login History : <a href=\"http://localhost/pet-paradise/login-history/view/21/1\">1</a>', 'app\\models\\LoginHistory', 21, 1, 0, '2025-08-26 10:27:37', '2025-08-26 10:27:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `model_id` text NOT NULL,
  `model_type` text NOT NULL,
  `target_url` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `filename_user` text NOT NULL,
  `filename_path` text NOT NULL,
  `extension` varchar(255) NOT NULL,
  `public` int(11) NOT NULL,
  `size` bigint(20) NOT NULL,
  `download_count` bigint(20) DEFAULT 0,
  `file_type` int(11) DEFAULT 1,
  `mimetype` varchar(255) NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_alt` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT 0,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logger_log`
--

CREATE TABLE `tbl_logger_log` (
  `id` int(11) NOT NULL,
  `error` varchar(256) NOT NULL,
  `api` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `state_id` int(11) NOT NULL DEFAULT 1,
  `link` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_history`
--

CREATE TABLE `tbl_login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `failer_reason` varchar(255) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_login_history`
--

INSERT INTO `tbl_login_history` (`id`, `user_id`, `user_ip`, `user_agent`, `failer_reason`, `state_id`, `type_id`, `code`, `created_on`) VALUES
(1, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-20 17:58:59'),
(2, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-20 18:02:47'),
(3, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-20 18:11:38'),
(4, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-20 18:12:27'),
(5, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-20 18:14:40'),
(6, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 14:29:39'),
(7, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 14:31:30'),
(8, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 15:30:07'),
(9, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 16:03:47'),
(10, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 16:04:01'),
(11, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 16:04:45'),
(12, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 16:05:10'),
(13, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 16:05:33'),
(14, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-21 22:43:54'),
(15, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-23 20:22:24'),
(16, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-23 20:26:31'),
(17, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-23 20:27:43'),
(18, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-24 14:31:16'),
(19, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-24 14:47:46'),
(20, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-24 17:33:00'),
(21, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '', 1, 0, 'http://localhost/pet-paradise/user/login', '2025-08-26 10:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media_gallery`
--

CREATE TABLE `tbl_media_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `alt` varchar(256) DEFAULT NULL,
  `file` varchar(256) NOT NULL,
  `thumb_file` varchar(256) DEFAULT NULL,
  `size` varchar(256) NOT NULL,
  `extension` varchar(256) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `createBy` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `model_type` varchar(128) NOT NULL,
  `model_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT 0,
  `type_id` int(11) DEFAULT 0,
  `created_on` datetime DEFAULT NULL,
  `created_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `description` text DEFAULT NULL,
  `model_id` int(11) NOT NULL,
  `model_type` varchar(256) NOT NULL,
  `is_read` tinyint(2) DEFAULT 0,
  `state_id` int(11) DEFAULT 0,
  `type_id` int(11) DEFAULT 0,
  `created_on` datetime NOT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `state_id` int(11) DEFAULT 1,
  `type_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pet`
--

CREATE TABLE `tbl_pet` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` int(11) DEFAULT 0,
  `about_me` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `breed` varchar(100) DEFAULT 'not define',
  `profile_picture` varchar(255) NOT NULL,
  `price` int(11) DEFAULT 100,
  `pet_category_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_pet`
--

INSERT INTO `tbl_pet` (`id`, `name`, `content`, `date_of_birth`, `gender`, `about_me`, `contact_no`, `address`, `breed`, `profile_picture`, `price`, `pet_category_id`, `state_id`, `type_id`, `created_on`, `updated_on`, `created_by_id`) VALUES
(1, 'Zimmy', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', 2, ' Buddy is a friendly and energetic Golden Retriever. He loves playing fetch, going on long walks, and is great with kids. Fully vaccinated and ready for adoption.', '', '', '', 'pet-1756031494-profile_picture-user_id_1.jpg', 100, 2, 1, 2, '2025-08-21 21:05:55', '2025-08-24 17:41:36', 1),
(2, 'Mimmy', ' Buddy is a friendly and energetic Golden Retriever. He loves playing fetch, going on long walks, and is great with kids. Fully vaccinated and ready for adoption.', '2025-08-21', NULL, '', '', '', '', 'pet-1756028748-profile_picture-user_id_1.jpg', 100, 4, 1, 1, '2025-08-21 21:05:55', '2025-08-24 15:15:48', 1),
(3, 'tinny', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756027854-profile_picture-user_id_1.jpg', 100, 1, 1, 1, '2025-08-21 21:05:55', '2025-08-24 15:00:54', 1),
(4, 'ocar', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756028306-profile_picture-user_id_1.jpeg', 100, 4, 1, 1, '2025-08-21 21:05:55', '2025-08-24 15:08:26', 1),
(5, 'Lisa', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756027781-profile_picture-user_id_1.jpg', 100, 2, 1, 1, '2025-08-21 21:05:55', '2025-08-24 14:59:41', 1),
(6, 'Poo', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756027770-profile_picture-user_id_1.jpg', 100, 4, 1, 1, '2025-08-21 21:05:55', '2025-08-24 14:59:30', 1),
(7, 'liny', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', 0, '', '', '', '', 'pet-1756028260-profile_picture-user_id_1.jpg', 100, 3, 1, 1, '2025-08-21 21:05:55', '2025-08-24 15:07:40', 1),
(8, 'ocar', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', 1, '', '', '', 'Golder retriever', 'pet-1756031431-profile_picture-user_id_1.jpg', 100, 1, 1, 1, '2025-08-21 21:05:55', '2025-08-24 17:50:05', 1),
(9, 'Zimmy', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756031494-profile_picture-user_id_1.jpg', 100, 2, 1, 1, '2025-08-21 21:05:55', '2025-08-24 16:01:34', 1),
(10, 'Mimmy', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756028748-profile_picture-user_id_1.jpg', 100, 4, 1, 1, '2025-08-21 21:05:55', '2025-08-24 15:15:48', 1),
(11, 'tinny', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756027854-profile_picture-user_id_1.jpg', 100, 1, 1, 1, '2025-08-21 21:05:55', '2025-08-24 15:00:54', 1),
(12, 'ocar', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756028306-profile_picture-user_id_1.jpeg', 100, 4, 1, 1, '2025-08-21 21:05:55', '2025-08-24 15:08:26', 1),
(13, 'Lisa', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756027781-profile_picture-user_id_1.jpg', 100, 2, 1, 1, '2025-08-21 21:05:55', '2025-08-24 14:59:41', 1),
(14, 'Poo', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', NULL, '', '', '', '', 'pet-1756027770-profile_picture-user_id_1.jpg', 100, 4, 1, 1, '2025-08-21 21:05:55', '2025-08-24 14:59:30', 1),
(15, 'liny', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', 0, '', '', '', '', 'pet-1756028260-profile_picture-user_id_1.jpg', 100, 3, 1, 1, '2025-08-21 21:05:55', '2025-08-24 15:07:40', 1),
(16, 'ocar', 'TuGii Model Generator\r\nThis generator generates two ActiveRecord class for the specified database table. An empty one you can extend and a Base one which is the same as the original model generatior.\r\n\r\n', '2025-08-21', 1, '', '', '', 'Golder retriever', 'pet-1756031431-profile_picture-user_id_1.jpg', 100, 1, 1, 1, '2025-08-21 21:05:55', '2025-08-24 16:00:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pet_category`
--

CREATE TABLE `tbl_pet_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pet_icon` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_pet_category`
--

INSERT INTO `tbl_pet_category` (`id`, `title`, `pet_icon`, `state_id`, `type_id`, `created_on`, `updated_on`, `created_by_id`) VALUES
(1, 'Dog', 'petcategory-1755968764-pet_icon-user_id_1.avif', 1, 0, '2025-08-20 16:46:39', '2025-08-23 22:36:04', 1),
(2, 'Cat', 'petcategory-1755968741-pet_icon-user_id_1.png', 1, 0, '2025-08-20 16:46:51', '2025-08-23 22:35:41', 1),
(3, 'Horse', 'petcategory-1755968717-pet_icon-user_id_1.jpg', 1, 0, '2025-08-20 16:47:05', '2025-08-23 22:35:17', 1),
(4, 'Brid', 'petcategory-1755968261-pet_icon-user_id_1.webp', 1, 0, '2025-08-20 16:47:05', '2025-08-23 22:27:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `image_file` varchar(1024) DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `keywords`, `image_file`, `view_count`, `state_id`, `type_id`, `created_on`, `updated_on`, `created_by_id`, `pet_id`) VALUES
(1, 'sdasd', 'My favorite stick. There are many like it, but this one is mine.My favorite stick. There are many like it, but this one is mine.My favorite stick. There are many like it, but this one is mine.', '', 'post-1755768124-image_file-user_id_1.png', 0, 1, 0, '2025-08-20 16:17:33', '2025-08-21 14:52:04', 1, 1),
(2, 'Posts', 'Self hosted, you owned Grok Companion, a container of souls of waifu, cyber livings to bring them into our worlds, wishing to achieve Neuro-sama\'s altitude. Capable of realtime voice chat', '', 'post-1755792778-image_file-user_id_1.jpeg', 0, 1, 0, '2025-08-21 21:36:53', '2025-08-21 21:42:58', 1, 1),
(3, 'Posts', 'Self hosted, you owned Grok Companion, a container of souls of waifu, cyber livings to bring them into our worlds, wishing to achieve Neuro-sama\'s altitude. Capable of realtime voice chat', '', 'post-1755792705-image_file-user_id_1.png', 0, 1, 0, '2025-08-21 21:36:53', '2025-08-21 21:41:45', 3, 1),
(4, 'Posts', 'Self hosted, you owned Grok Companion, a container of souls of waifu, cyber livings to bring them into our worlds, wishing to achieve Neuro-sama\'s altitude. Capable of realtime voice chat', '', 'post-1755792705-image_file-user_id_1.png', 0, 1, 0, '2025-08-21 21:36:53', '2025-08-21 21:41:45', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_queue`
--

CREATE TABLE `tbl_queue` (
  `id` int(11) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `job` blob NOT NULL,
  `pushed_at` int(11) NOT NULL,
  `ttr` int(11) NOT NULL,
  `delay` int(11) NOT NULL DEFAULT 0,
  `priority` int(11) UNSIGNED NOT NULL DEFAULT 1024,
  `reserved_at` int(11) DEFAULT NULL,
  `attempt` int(11) DEFAULT NULL,
  `done_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `model_type` varchar(256) NOT NULL,
  `rating` double NOT NULL,
  `title` varchar(256) NOT NULL,
  `comment` text DEFAULT NULL,
  `state_id` int(11) DEFAULT 1,
  `type_id` int(11) DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seo`
--

CREATE TABLE `tbl_seo` (
  `id` int(11) NOT NULL,
  `route` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seo_analytics`
--

CREATE TABLE `tbl_seo_analytics` (
  `id` int(11) NOT NULL,
  `account` varchar(512) NOT NULL,
  `domain_name` varchar(512) NOT NULL,
  `additional_information` varchar(512) DEFAULT NULL,
  `state_id` int(11) NOT NULL DEFAULT 1,
  `type_id` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seo_redirect`
--

CREATE TABLE `tbl_seo_redirect` (
  `id` int(11) NOT NULL,
  `old_url` varchar(255) NOT NULL,
  `new_url` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT 0,
  `type_id` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `type_id` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT 0,
  `created_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `key`, `title`, `value`, `type_id`, `state_id`, `created_by_id`) VALUES
(1, 'appConfig', 'App Configration', '{\"companyUrl\":{\"type\":0,\"value\":\"https://www.toxsl.com\",\"required\":true},\"company\":{\"type\":0,\"value\":\"ToXSL Technologies\",\"required\":true},\"companyEmail\":{\"type\":0,\"value\":\"admin@toxsl.in\",\"required\":true},\"companyContactEmail\":{\"type\":0,\"value\":\"admin@toxsl.in\",\"required\":false},\"companyContactNo\":{\"type\":0,\"value\":\"9569127788\",\"required\":false},\"companyAddress\":{\"type\":0,\"value\":\"C-127, 2nd floor, Phase 8, Industrial Area, Sector 72, Mohali, Punjab\",\"required\":false},\"loginCount\":{\"type\":2,\"value\":2,\"required\":false}}', NULL, 0, 1),
(2, 'smtp', 'SMTP Configration', '{\"host\":{\"type\":0,\"value\":\"\",\"required\":true},\"username\":{\"type\":0,\"value\":\"\",\"required\":true},\"password\":{\"type\":0,\"value\":\"\",\"required\":true},\"port\":{\"type\":0,\"value\":\"\",\"required\":true},\"encryption\":{\"type\":0,\"value\":\"\",\"required\":false}}', NULL, 0, 1),
(3, 'firebaseSettings', 'Firebase Configration', '{\"authKey\":{\"type\":0,\"value\":\"\",\"required\":true}}', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` int(11) DEFAULT 0,
  `about_me` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `latitude` varchar(512) DEFAULT NULL,
  `longitude` varchar(512) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `profile_file` varchar(255) DEFAULT NULL,
  `tos` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT 0,
  `last_visit_time` datetime DEFAULT NULL,
  `last_action_time` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `login_error_count` int(11) DEFAULT NULL,
  `activation_key` varchar(128) DEFAULT NULL,
  `access_token` varchar(128) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `email`, `password`, `date_of_birth`, `gender`, `about_me`, `contact_no`, `address`, `latitude`, `longitude`, `city`, `country`, `zipcode`, `language`, `email_verified`, `profile_file`, `tos`, `role_id`, `state_id`, `type_id`, `last_visit_time`, `last_action_time`, `last_password_change`, `login_error_count`, `activation_key`, `access_token`, `timezone`, `created_on`, `updated_on`, `created_by_id`) VALUES
(1, 'Sukhq', 'admin@pp.org', '$2y$13$Ljr1PyAt.lCQc85bU6Y0a.K4DDv723LW.BDo/h07kQD082myvnNle', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, 0, '2025-08-31 20:37:41', NULL, NULL, NULL, 'yAGptBNHikTqeIhEBHo1HHu00ZoekpJZ_1755682117', 'dqHoFECE8Lhy0sAsTFbB4ph-ToirM09j', NULL, '2025-08-20 14:58:37', '2025-08-20 14:58:37', NULL),
(2, 'sdasds', 'admin@queeny.me', '$2y$13$02ZfZKC0o/3rOEXG9vpysuzvRo6ZBmhYYgFHksii7xZV1M7mohQK2', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 2, 1, 0, '2025-08-21 16:04:45', NULL, NULL, NULL, '4G27EgtPy2BLkfM-t3BYpQpffGdE7Zz5_1755689394', 'cI0qRUfl3zFfnRhOO-AzxNNZN6N7MOxJ', NULL, '2025-08-20 16:59:54', '2025-08-20 16:59:54', 1),
(3, 'Sukh', 'sukh@queeny.me', '$2y$13$2G3OQTKPSOtalA9jnAWmAu9kcARI39Dj0mXJg6akF1kw3O93PdTOC', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 2, 1, 0, '2025-08-21 22:43:54', NULL, NULL, NULL, 'XvWqPqp0djOszvEx4jmvKG2KlTeXmE4F_1755692223', 'thlPW3GsNmHGivRj0S57aUoPNT2LXdIz', NULL, '2025-08-20 17:47:03', '2025-08-20 17:47:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ha_logins`
--
ALTER TABLE `ha_logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loginProvider_2` (`loginProvider`,`loginProviderIdentifier`),
  ADD KEY `loginProvider` (`loginProvider`),
  ADD KEY `loginProviderIdentifier` (`loginProviderIdentifier`),
  ADD KEY `userId` (`userId`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`id`),
  ADD KEY `fk_ha_logins_created_by` (`user_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `FK_category_created_by_id` (`created_by_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_created_by_id` (`created_by_id`);

--
-- Indexes for table `tbl_email_queue`
--
ALTER TABLE `tbl_email_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feed`
--
ALTER TABLE `tbl_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_files_created_by_id` (`created_by_id`),
  ADD KEY `fk_files_updated_by_id` (`updated_by_id`);

--
-- Indexes for table `tbl_logger_log`
--
ALTER TABLE `tbl_logger_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_history`
--
ALTER TABLE `tbl_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_media_gallery`
--
ALTER TABLE `tbl_media_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notice_created_by` (`created_by_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notification_created_by` (`created_by_id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_page_created_by_id` (`created_by_id`);

--
-- Indexes for table `tbl_pet`
--
ALTER TABLE `tbl_pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pet_created_by` (`created_by_id`),
  ADD KEY `fk_pet_category` (`pet_category_id`);

--
-- Indexes for table `tbl_pet_category`
--
ALTER TABLE `tbl_pet_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pet_category_created_by` (`created_by_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `keywords` (`keywords`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `created_on` (`created_on`),
  ADD KEY `FK_post_created_by_id` (`created_by_id`),
  ADD KEY `FK_post_pet_id` (`pet_id`) USING BTREE;

--
-- Indexes for table `tbl_queue`
--
ALTER TABLE `tbl_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channel` (`channel`),
  ADD KEY `reserved_at` (`reserved_at`),
  ADD KEY `priority` (`priority`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_rating_created_by_id` (`created_by_id`);

--
-- Indexes for table `tbl_seo`
--
ALTER TABLE `tbl_seo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seo_idx_route` (`route`);

--
-- Indexes for table `tbl_seo_analytics`
--
ALTER TABLE `tbl_seo_analytics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seo_analytics_created_by_id` (`created_by_id`);

--
-- Indexes for table `tbl_seo_redirect`
--
ALTER TABLE `tbl_seo_redirect`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seo_redirect_created_by_id` (`created_by_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_setting_created_by_id` (`created_by_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ha_logins`
--
ALTER TABLE `ha_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_email_queue`
--
ALTER TABLE `tbl_email_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_feed`
--
ALTER TABLE `tbl_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_logger_log`
--
ALTER TABLE `tbl_logger_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login_history`
--
ALTER TABLE `tbl_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_media_gallery`
--
ALTER TABLE `tbl_media_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pet`
--
ALTER TABLE `tbl_pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pet_category`
--
ALTER TABLE `tbl_pet_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_queue`
--
ALTER TABLE `tbl_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seo`
--
ALTER TABLE `tbl_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seo_analytics`
--
ALTER TABLE `tbl_seo_analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seo_redirect`
--
ALTER TABLE `tbl_seo_redirect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ha_logins`
--
ALTER TABLE `ha_logins`
  ADD CONSTRAINT `fk_ha_logins_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `FK_category_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `fk_comment_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD CONSTRAINT `fk_files_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `fk_files_updated_by_id` FOREIGN KEY (`updated_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD CONSTRAINT `fk_notice_created_by` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD CONSTRAINT `fk_notification_created_by` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD CONSTRAINT `fk_page_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_pet`
--
ALTER TABLE `tbl_pet`
  ADD CONSTRAINT `fk_pet_category` FOREIGN KEY (`pet_category_id`) REFERENCES `tbl_pet_category` (`id`),
  ADD CONSTRAINT `fk_pet_created_by` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_pet_category`
--
ALTER TABLE `tbl_pet_category`
  ADD CONSTRAINT `fk_pet_category_created_by` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `FK_rating_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_seo_analytics`
--
ALTER TABLE `tbl_seo_analytics`
  ADD CONSTRAINT `fk_seo_analytics_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_seo_redirect`
--
ALTER TABLE `tbl_seo_redirect`
  ADD CONSTRAINT `fk_seo_redirect_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD CONSTRAINT `fk_setting_created_by_id` FOREIGN KEY (`created_by_id`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
