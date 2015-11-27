-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 29, 2015 at 05:04 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cmswork`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmsw_logs`
--

CREATE TABLE `cmsw_logs` (
  `log_item` int(64) NOT NULL AUTO_INCREMENT,
  `log_date` varchar(32) NOT NULL,
  `log_sys_date` int(11) NOT NULL,
  `log_token` varchar(10) NOT NULL,
  `log_token_police` varchar(10) NOT NULL,
  `log_controller` varchar(32) NOT NULL DEFAULT '',
  `log_actfunction` varchar(32) NOT NULL DEFAULT '',
  `log_params` varchar(32) NOT NULL DEFAULT '',
  `log_post` varchar(512) NOT NULL DEFAULT '',
  `log_get` varchar(512) NOT NULL DEFAULT '',
  `log_cookie` varchar(512) NOT NULL DEFAULT '',
  `log_session` varchar(512) NOT NULL,
  `log_server` varchar(512) NOT NULL,
  PRIMARY KEY (`log_item`),
  UNIQUE KEY `talking_id` (`log_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cmsw_modes`
--

CREATE TABLE `cmsw_modes` (
  `mode_item` int(11) NOT NULL AUTO_INCREMENT,
  `mode_status` tinyint(1) NOT NULL,
  `mode_changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mode_item`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `cmsw_users`
--

CREATE TABLE `cmsw_users` (
  `user_item` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL DEFAULT '',
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_hash_email` varchar(64) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_mname` varchar(255) DEFAULT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_zip_code` varchar(11) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_region` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(510) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_birthday` int(10) NOT NULL,
  `user_notification` tinyint(1) NOT NULL DEFAULT '1',
  `user_active` tinyint(1) NOT NULL DEFAULT '0',
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_confirm` varchar(64) NOT NULL,
  `user_lastlogin` int(10) DEFAULT NULL,
  `user_status` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_item`),
  UNIQUE KEY `id` (`user_id`),
  UNIQUE KEY `email` (`user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;