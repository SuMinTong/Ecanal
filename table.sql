

-- 后台管理工作人员表
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `e_staffs`;
CREATE TABLE `e_staffs` (
  `staffId` int(11) NOT NULL AUTO_INCREMENT,
  `loginName` varchar(40) NOT NULL,
  `loginPwd` varchar(50) NOT NULL,
  `secretKey` int(32) NOT NULL,
  `staffName` varchar(50) NOT NULL,
  `staffNo` varchar(20) DEFAULT NULL,
  `staffPhoto` varchar(150) DEFAULT NULL,
  `staffRoleId` int(11) NOT NULL,
  `workStatus` tinyint(4) NOT NULL DEFAULT '1',
  `staffStatus` tinyint(4) NOT NULL DEFAULT '0',
  `staffFlag` tinyint(4) NOT NULL DEFAULT '1',
  `createTime` datetime NOT NULL,
  `lastTime` datetime DEFAULT NULL,
  `lastIP` char(16) DEFAULT NULL,
  PRIMARY KEY (`staffId`),
  KEY `loginName` (`loginName`),
  KEY `staffStatus` (`staffStatus`,`staffFlag`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;


INSERT INTO `e_staffs` VALUES ('1', 'admin', '9875e806ef6f9494e0de4ae1bbf9f815', '9365', 'admin', '001', 'Upload/staffs/2015-04/55306cf76bc1f.jpg', '3', '1', '1', '1', '2014-04-06 11:47:20', '2015-06-02 22:50:57', '127.0.0.1'),
('14', 'system', 'a0da805e0b77f6cc05cdf0ef6ca8caad', '2508', '系统管理员', 'sn001', null, '3', '1', '1', '1', '2014-12-20 00:13:36', null, null),
 ('15', 'goodsAdmin', '1600195af828b21c1f586b1e01cb89fc', '1729', '商品管理员', 'sn001', 'Upload/staffs/2014-12/5496376a7ff89.jpg', '1', '1', '1', '1', '2014-12-21 10:58:40', null, null);




-- 后台管理工作人员权限表
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `e_roles`
-- ----------------------------
DROP TABLE IF EXISTS `e_roles`;
CREATE TABLE `e_roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(30) NOT NULL,
  `grant` text,
  `createTime` datetime NOT NULL,
  `roleFlag` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`roleId`),
  KEY `roleFlag` (`roleFlag`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of e_roles
-- ----------------------------
INSERT INTO `e_roles` VALUES ('1', '商品管理员', 'spfl_00,spfl_01,spfl_02,spfl_03,ppgl_00,ppgl_01,ppgl_02,ppgl_03,splb_00,splb_04,splb_03,spsh_00,spsh_04,spsh_03,sppl_00,sppl_04,sppl_03', '2014-11-02 12:07:12', '1');
INSERT INTO `e_roles` VALUES ('2', '门店管理员', 'dplb_00,dplb_01,dplb_02,dplb_03,dpsh_00,dpsh_04,dpsh_03', '2014-11-02 12:09:05', '1');
INSERT INTO `e_roles` VALUES ('3', '系统管理员', 'spgl_00,spfl_00,spfl_01,spfl_02,spfl_03,ppgl_00,ppgl_01,ppgl_02,ppgl_03,splb_00,splb_04,spsh_00,spsh_04,sppl_00,sppl_04,sppl_03,ddgl_00,ddlb_00,tk_00,tk_04,dpgl_00,dplb_00,dplb_01,dplb_02,dplb_03,dpsh_00,dqgl_00,dqlb_00,dqlb_01,dqlb_02,dqlb_03,sqlb_00,sqlb_01,sqlb_02,sqlb_03,wzgl_00,wzlb_00,wzlb_01,wzlb_02,wzlb_03,wzfl_00,wzfl_01,wzfl_02,wzfl_03,hygl_00,hydj_00,hydj_01,hydj_02,hydj_03,hylb_00,hylb_01,hylb_02,hylb_03,hyzh_00,hyzh_04,xtgl_00,jsgl_00,jsgl_01,jsgl_02,jsgl_03,zylb_00,zylb_01,zylb_02,zylb_03,dlrz_00,scsz_00,scxx_00,scxx_02,dhgl_00,dhgl_01,dhgl_02,dhgl_03,yqlj_00,yqlj_01,yqlj_02,yqlj_03,gggl_00,gggl_01,gggl_02,gggl_03,yhgl_00,yhgl_01,yhgl_02,yhgl_03,zfgl_00,zfgl_01,zfgl_02,zfgl_03', '2014-11-02 12:09:09', '1');
INSERT INTO `e_roles` VALUES ('4', '客服', 'sppl_00,sppl_04,sppl_03', '2014-12-20 00:08:53', '1');




-- 存储文章的数据表
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `e_articles`
-- ----------------------------
DROP TABLE IF EXISTS `e_articles`;
CREATE TABLE `e_articles` (
  `articleId` int(11) NOT NULL AUTO_INCREMENT,
  `catId` int(11) NOT NULL,
  `articleTitle` varchar(200) NOT NULL,
  `articleImg` varchar(150) NOT NULL,
  `isShow` tinyint(4) NOT NULL DEFAULT '1',
  `articleContent` text NOT NULL,
  `articleKey` varchar(255) DEFAULT NULL,
  `staffId` int(11) NOT NULL,
  `createTime` datetime NOT NULL,
  PRIMARY KEY (`articleId`),
  KEY `catId` (`catId`,`isShow`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of e_articles
-- ----------------------------
INSERT INTO `e_articles` VALUES ('1', '1', 'ecanal正式上线', '', '1', '热烈庆祝ecanal正式上线 &amp;nbsp;帐户自助服务', 'ecanal', '1', '2015-03-14 16:48:58'),
('2', '2', '帐户自助服务', '', '1', '&amp;nbsp;帐户自助服务&amp;nbsp;帐户自助服务', '帐户自助服务', '1', '2015-04-09 21:37:30'),
('3', '3', '支付方式', '', '1', '支付方式&amp;nbsp;支付方式&amp;nbsp;支付方式&lt;br /&gt;', '支付方式', '1', '2015-04-09 21:37:56'),
('4', '4', '运费说明', '', '1', '运费说明 这里是运费说明', '运费说明', '1', '2015-04-09 21:38:12'),
('5', '5', '退换货原则和流程', '', '1', '&lt;p&gt;\n  &amp;nbsp; &amp;nbsp; &amp;nbsp; 退换货原则和流程 &amp;nbsp;\n&lt;/p&gt;\n&lt;p&gt;\n &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;退换货原则和流程\n&lt;/p&gt;\n&lt;p&gt;\n &amp;nbsp; &amp;nbsp; &amp;nbsp; 退换货原则和流程\n&lt;/p&gt;', '退换货原则和流程', '1', '2015-04-09 21:38:45'),
('6', '6', '帐号&amp;密码问题', '', '1', '&lt;u&gt;111111111111111&amp;nbsp;&lt;/u&gt;', '帐号&amp;密码问题', '1', '2015-04-09 21:39:06');






-- 存储文章目录的数据表
-- cats：目录
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `e_article_cats`
-- ----------------------------
DROP TABLE IF EXISTS `e_article_cats`;
CREATE TABLE `e_article_cats` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) NOT NULL,
  `catType` tinyint(4) NOT NULL DEFAULT '0',
  `isShow` tinyint(4) NOT NULL DEFAULT '1',
  `catName` varchar(20) NOT NULL,
  `catSort` int(11) NOT NULL DEFAULT '0',
  `catFlag` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`catId`),
  KEY `isShow` (`catType`,`catFlag`,`isShow`) USING BTREE,
  KEY `parentId` (`catFlag`,`parentId`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of e_article_cats
-- ----------------------------
INSERT INTO `e_article_cats` VALUES ('1', '0', '0', '0', '商城快讯', '0', '1'),
('2', '0', '1', '1', '新手上路', '0', '1'),
('3', '0', '1', '1', '如何付款', '0', '1'),
('4', '0', '1', '1', '配送说明', '0', '1'),
('5', '0', '1', '1', '售后服务', '0', '1'),
('6', '0', '1', '1', '常见问题', '0', '1');





-- 会员表

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `e_users`
-- ----------------------------
DROP TABLE IF EXISTS `e_users`;
CREATE TABLE `e_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `loginName` varchar(20) NOT NULL,
  `loginSecret` int(11) NOT NULL,
  `loginPwd` varchar(50) NOT NULL,
  `userSex` tinyint(4) DEFAULT '0',
  `userType` tinyint(4) DEFAULT '0',
  `userName` varchar(20) DEFAULT NULL,
  `userQQ` varchar(20) DEFAULT NULL,
  `userPhone` char(11) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userScore` int(11) DEFAULT '0',
  `userPhoto` varchar(150) DEFAULT NULL,
  `userTotalScore` int(11) DEFAULT '0',
  `userStatus` tinyint(4) DEFAULT '1',
  `userFlag` tinyint(4) DEFAULT '1',
  `createTime` datetime DEFAULT NULL,
  `lastIP` varchar(16) DEFAULT NULL,
  `lastTime` datetime DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `userStatus` (`userStatus`,`userFlag`),
  KEY `loginName` (`loginName`),
  KEY `userPhone` (`userPhone`),
  KEY `userEmail` (`userEmail`),
  KEY `userType` (`userType`,`userFlag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of e_users
-- ----------------------------
