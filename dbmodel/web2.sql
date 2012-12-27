-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2012 年 12 月 24 日 07:17
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `web2`
--

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `content` text COLLATE utf8_bin NOT NULL COMMENT '评论内容',
  `name` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '评论者',
  `uid` int(10) unsigned NOT NULL COMMENT 'userID',
  `did` int(10) unsigned NOT NULL COMMENT 'documentID',
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'commentID',
  `date` datetime NOT NULL COMMENT '日期',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `uid` (`uid`,`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='评论类' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`content`, `name`, `uid`, `did`, `cid`, `date`) VALUES
(0x4e69636520626f6f6b, 'kylejan', 1, 1, 1, '2012-12-18 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '文献标题',
  `author` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '文献作者',
  `pubdate` date NOT NULL COMMENT '出版时间',
  `description` varchar(150) COLLATE utf8_bin NOT NULL COMMENT '文献描述',
  `tag` varchar(100) COLLATE utf8_bin NOT NULL COMMENT '文献标签',
  `picture` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '封面路径',
  `good` int(10) unsigned NOT NULL,
  `bad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`did`),
  UNIQUE KEY `did` (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='MyNote文献列表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `document`
--

INSERT INTO `document` (`did`, `title`, `author`, `pubdate`, `description`, `tag`, `picture`, `good`, `bad`) VALUES
(1, '123', '123', '2012-12-03', '123', '123', '123', 0, 0),
(2, 'Harry Potter', 'J.K.loring', '2011-11-08', 'Harry Potter and Magical Stone', '', './images/book/1356320021.jpg', 0, 0),
(3, 'Harry Potter', 'J.K.loring', '2008-11-11', 'Harry Potter and Death', '', './images/book/Admin_pic.jpg', 0, 0),
(4, 'Harry Potter', 'J.K.loring', '2008-11-11', 'Harry Potter and Death', '', './images/book/Admin_pic.jpg', 0, 0),
(5, '哈利波特', 'J.K.罗伶', '2009-11-11', '哈利波特与混血王子', '', './images/book/Admin_pic.jpg', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `password` varchar(15) COLLATE utf8_bin NOT NULL COMMENT '用户密码',
  `nick` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '用户昵称',
  `email` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '用户邮箱',
  `gender` tinyint(1) NOT NULL COMMENT '用户性别',
  `signature` varchar(150) COLLATE utf8_bin NOT NULL COMMENT '用户签名',
  `picture` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '用户头像',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='MyNote用户列表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `name`, `password`, `nick`, `email`, `gender`, `signature`, `picture`) VALUES
(1, 'super', 'super', 'super', '', 1, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
