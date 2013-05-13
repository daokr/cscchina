
-- --------------------------------------------------------

--
-- 表的结构 `ik_admin`
--

DROP TABLE IF EXISTS `ik_admin`;
CREATE TABLE `ik_admin` (
  `userid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` smallint(5) NOT NULL,
  `last_ip` varchar(15) NOT NULL,
  `last_time` int(10) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `user_name` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员' AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- 表的结构 `ik_user`
--
DROP TABLE IF EXISTS `ik_user`;
CREATE TABLE `ik_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码',  
  `username` char(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '用户email',
  `fuserid` int(11) NOT NULL DEFAULT '0' COMMENT '来自邀请用户',
  `doname` char(32) NOT NULL DEFAULT '',  
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `phone` char(16) NOT NULL DEFAULT '' COMMENT '电话号码',
  `roleid` int(11) NOT NULL DEFAULT '1' COMMENT '角色ID',
  `areaid` int(11) NOT NULL DEFAULT '0' COMMENT '区县ID',
  `path` char(32) NOT NULL DEFAULT '' COMMENT '头像路径',
  `face` char(64) NOT NULL DEFAULT '' COMMENT '会员头像',
  `signed` char(64) NOT NULL DEFAULT '' COMMENT '签名',
  `blog` char(32) NOT NULL DEFAULT '' COMMENT '博客',
  `about` char(255) NOT NULL DEFAULT '' COMMENT '关于我',
  `ip` varchar(16) NOT NULL DEFAULT '' COMMENT '登陆IP',
  `address` char(64) NOT NULL DEFAULT '',
  `qq_openid` char(32) NOT NULL DEFAULT '',
  `qq_access_token` char(32) NOT NULL DEFAULT '' COMMENT 'access_token',
  `count_score` int(11) NOT NULL DEFAULT '0' COMMENT '统计积分',
  `count_follow` int(11) NOT NULL DEFAULT '0' COMMENT '统计用户跟随的',
  `count_followed` int(11) NOT NULL DEFAULT '0' COMMENT '统计用户被跟随的',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是管理员',
  `isenable` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否启用：0启用1禁用',
  `isverify` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未验证1验证',
  `verifycode` char(11) NOT NULL DEFAULT '' COMMENT '验证码',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `uptime` int(11) DEFAULT '0' COMMENT '登陆时间',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `qq_openid` (`qq_openid`),
  KEY `fuserid` (`fuserid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户';
-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- 表的结构 `ik_setting`
--
DROP TABLE IF EXISTS `ik_setting`;
CREATE TABLE `ik_setting` (
  `name` char(32) NOT NULL DEFAULT '' COMMENT '选项名字',
  `data` char(255) NOT NULL DEFAULT '' COMMENT '选项内容',
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统管理配置';

--
-- 转存表中的数据 `ik_system_options`
--

INSERT INTO `ik_setting` (`name`, `data`) VALUES
('site_title', '爱客网(IKPHP)开源社区'),
('site_subtitle', '又一个爱客网(IKPHP)开源社区'),
('site_url', 'http://'),
('site_email', 'admin@admin.com'),
('site_icp', '正在备案中'),
('site_keywords', '12ik'),
('site_desc', '又一个爱客网(IKPHP)开源社区'),
('site_theme', 'blue'),
('isgzip', '0'),
('timezone', '8'),
('isinvite', '0'),
('charset', 'UTF-8'),
('integrate_code', 'default'),
('integrate_config', ''),
('avatar_size', '24,32,48,64,100,200'),
('attr_allow_exts', 'jpg,gif,png,jpeg'),
('attr_allow_size', '2048'),
('attach_path', 'data/upload/'),
('simg', 'a:2:{s:5:"width";s:3:"120";s:6:"height";s:3:"120";}'),
('mimg', 'a:2:{s:5:"width";s:3:"500";s:6:"height";s:3:"500";}'),
('bimg', 'a:2:{s:5:"width";s:4:"1000";s:6:"height";s:4:"1000";}');

-- --------------------------------------------------------
--
-- 表的结构 `ik_area`
--
DROP TABLE IF EXISTS `ik_area`;
CREATE TABLE `ik_area` (
  `areaid` int(11) NOT NULL AUTO_INCREMENT,
  `areaname` varchar(32) NOT NULL DEFAULT '',
  `zm` char(1) NOT NULL DEFAULT '' COMMENT '首字母',
  `referid` int(11) NOT NULL DEFAULT '0',
  `ishot` int(1) NOT NULL DEFAULT '0',
  `pinyin` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`areaid`),
  KEY `referid` (`referid`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8 COMMENT='本地化';

-- ----------------------------
-- Records of ik_area
-- ----------------------------
INSERT INTO `ik_area` VALUES ('1', '北京', 'B', '0', '1', 'beijing');
INSERT INTO `ik_area` VALUES ('2', '上海', 'S', '0', '1', 'shanghai');
INSERT INTO `ik_area` VALUES ('3', '广东', 'G', '0', '0', 'guangdong');
INSERT INTO `ik_area` VALUES ('4', '江苏', 'J', '0', '0', 'jiangsu');
INSERT INTO `ik_area` VALUES ('5', '浙江', 'Z', '0', '0', 'zhejiang');
INSERT INTO `ik_area` VALUES ('6', '山东', 'S', '0', '0', 'shandong');
INSERT INTO `ik_area` VALUES ('7', '四川', 'S', '0', '0', 'sichuan');
INSERT INTO `ik_area` VALUES ('8', '湖北', 'H', '0', '0', 'hubei');
INSERT INTO `ik_area` VALUES ('9', '福建', 'F', '0', '0', 'fujian');
INSERT INTO `ik_area` VALUES ('10', '河南', 'H', '0', '0', 'henan');
INSERT INTO `ik_area` VALUES ('11', '辽宁', 'L', '0', '0', 'liaoning');
INSERT INTO `ik_area` VALUES ('12', '陕西', 'S', '0', '0', 'shanxi');
INSERT INTO `ik_area` VALUES ('13', '湖南', 'H', '0', '0', 'hunan');
INSERT INTO `ik_area` VALUES ('14', '河北', 'H', '0', '0', 'hebei');
INSERT INTO `ik_area` VALUES ('15', '安徽', 'A', '0', '0', 'anhui');
INSERT INTO `ik_area` VALUES ('16', '黑龙江', 'H', '0', '0', 'heilongjiang');
INSERT INTO `ik_area` VALUES ('17', '重庆', 'C', '0', '0', 'zhongqing');
INSERT INTO `ik_area` VALUES ('18', '天津', 'T', '0', '0', 'tianjin');
INSERT INTO `ik_area` VALUES ('19', '广西', 'G', '0', '0', 'guangxi');
INSERT INTO `ik_area` VALUES ('20', '山西', 'S', '0', '0', 'shanxi');
INSERT INTO `ik_area` VALUES ('21', '江西', 'J', '0', '0', 'jiangxi');
INSERT INTO `ik_area` VALUES ('22', '吉林', 'J', '0', '0', 'jilin');
INSERT INTO `ik_area` VALUES ('23', '云南', 'Y', '0', '0', 'yunnan');
INSERT INTO `ik_area` VALUES ('24', '内蒙古', 'N', '0', '0', 'neimenggu');
INSERT INTO `ik_area` VALUES ('25', '贵州', 'G', '0', '0', 'guizhou');
INSERT INTO `ik_area` VALUES ('26', '甘肃', 'G', '0', '0', 'gansu');
INSERT INTO `ik_area` VALUES ('27', '新疆', 'X', '0', '0', 'xinjiang');
INSERT INTO `ik_area` VALUES ('28', '海南', 'H', '0', '0', 'hainan');
INSERT INTO `ik_area` VALUES ('29', '宁夏', 'N', '0', '0', 'ningxia');
INSERT INTO `ik_area` VALUES ('30', '青海', 'Q', '0', '0', 'qinghai');
INSERT INTO `ik_area` VALUES ('31', '西藏', 'X', '0', '0', 'xicang');
INSERT INTO `ik_area` VALUES ('32', '香港', 'X', '0', '0', 'xianggang');
INSERT INTO `ik_area` VALUES ('33', '澳门', 'A', '0', '0', 'aomen');
INSERT INTO `ik_area` VALUES ('34', '台湾', 'T', '0', '0', 'taiwan');
INSERT INTO `ik_area` VALUES ('35', '钓鱼岛', 'D', '0', '0', 'diaoyudao');
INSERT INTO `ik_area` VALUES ('36', '东城区', 'D', '1', '0', 'dongchengqu');
INSERT INTO `ik_area` VALUES ('37', '西城区', 'X', '1', '0', 'xichengqu');
INSERT INTO `ik_area` VALUES ('38', '朝阳区', 'C', '1', '0', 'chaoyangqu');
INSERT INTO `ik_area` VALUES ('39', '丰台区', 'F', '1', '0', 'fengtaiqu');
INSERT INTO `ik_area` VALUES ('40', '石景山区', 'S', '1', '0', 'shijingshanqu');
INSERT INTO `ik_area` VALUES ('41', '海淀区', 'H', '1', '0', 'haidianqu');
INSERT INTO `ik_area` VALUES ('42', '门头沟区', 'M', '1', '0', 'mentougouqu');
INSERT INTO `ik_area` VALUES ('43', '房山区', 'F', '1', '0', 'fangshanqu');
INSERT INTO `ik_area` VALUES ('44', '通州区', 'T', '1', '0', 'tongzhouqu');
INSERT INTO `ik_area` VALUES ('45', '顺义区', 'S', '1', '0', 'shunyiqu');
INSERT INTO `ik_area` VALUES ('46', '昌平区', 'C', '1', '0', 'changpingqu');
INSERT INTO `ik_area` VALUES ('47', '大兴区', 'D', '1', '0', 'daxingqu');
INSERT INTO `ik_area` VALUES ('48', '怀柔区', 'H', '1', '0', 'huairouqu');
INSERT INTO `ik_area` VALUES ('49', '平谷区', 'P', '1', '0', 'pingguqu');
INSERT INTO `ik_area` VALUES ('50', '密云县', 'M', '1', '0', 'miyunxian');
INSERT INTO `ik_area` VALUES ('51', '延庆县', 'Y', '1', '0', 'yanqingxian');
INSERT INTO `ik_area` VALUES ('52', '地安门', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('53', '和平里', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('54', '王府井/东单', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('55', '建国门/北京站', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('56', '东四', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('57', '安定门', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('58', '朝阳门', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('59', '东直门', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('60', '广渠门', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('61', '左安门', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('62', '沙子口', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('63', '前门', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('64', '崇文门', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('65', '天坛', '', '36', '0', '');
INSERT INTO `ik_area` VALUES ('85', '杨浦区', 'Y', '2', '0', 'yangpuqu');
INSERT INTO `ik_area` VALUES ('83', '闸北区', 'Z', '2', '0', 'zhabeiqu');
INSERT INTO `ik_area` VALUES ('82', '普陀区', 'P', '2', '0', 'putuoqu');
INSERT INTO `ik_area` VALUES ('80', '长宁区', 'C', '2', '0', 'changningqu');
INSERT INTO `ik_area` VALUES ('79', '徐汇区', 'X', '2', '0', 'xuhuiqu');
INSERT INTO `ik_area` VALUES ('78', '黄浦区', 'H', '2', '0', 'huangpuqu');
INSERT INTO `ik_area` VALUES ('84', '虹口区', 'H', '2', '0', 'hongkouqu');
INSERT INTO `ik_area` VALUES ('81', '静安区', 'J', '2', '0', 'jinganqu');
INSERT INTO `ik_area` VALUES ('66', '呼和浩特', 'H', '24', '0', 'huhehaote');
INSERT INTO `ik_area` VALUES ('67', '包头', 'B', '24', '0', 'baotou');
INSERT INTO `ik_area` VALUES ('68', '呼伦贝尔', 'H', '24', '0', 'hulunbeier');
INSERT INTO `ik_area` VALUES ('69', '赤峰', 'C', '24', '0', 'chifeng');
INSERT INTO `ik_area` VALUES ('70', '鄂尔多斯', 'E', '24', '0', 'eerduosi');
INSERT INTO `ik_area` VALUES ('71', '通辽', 'T', '24', '0', 'tongliao');
INSERT INTO `ik_area` VALUES ('72', '锡林郭勒', 'X', '24', '0', 'xilinguole');
INSERT INTO `ik_area` VALUES ('73', '巴彦淖尔', 'B', '24', '0', 'bayannaoer');
INSERT INTO `ik_area` VALUES ('74', '兴安盟', 'X', '24', '0', 'xinganmeng');
INSERT INTO `ik_area` VALUES ('75', '乌海', 'W', '24', '0', 'wuhai');
INSERT INTO `ik_area` VALUES ('76', '乌兰察布', 'W', '24', '0', 'wulanchabu');
INSERT INTO `ik_area` VALUES ('77', '阿拉善盟', 'A', '24', '0', 'alashanmeng');
INSERT INTO `ik_area` VALUES ('86', '闵行区', '', '2', '0', 'xingqu');
INSERT INTO `ik_area` VALUES ('87', '宝山区', 'B', '2', '0', 'baoshanqu');
INSERT INTO `ik_area` VALUES ('88', '嘉定区', 'J', '2', '0', 'jiadingqu');
INSERT INTO `ik_area` VALUES ('89', '浦东新区', 'P', '2', '0', 'pudongxinqu');
INSERT INTO `ik_area` VALUES ('90', '金山区', 'J', '2', '0', 'jinshanqu');
INSERT INTO `ik_area` VALUES ('91', '松江区', 'S', '2', '0', 'songjiangqu');
INSERT INTO `ik_area` VALUES ('92', '青浦区', 'Q', '2', '0', 'qingpuqu');
INSERT INTO `ik_area` VALUES ('93', '奉贤区', 'F', '2', '0', 'fengxianqu');
INSERT INTO `ik_area` VALUES ('94', '崇明县', 'C', '2', '0', 'chongmingxian');
INSERT INTO `ik_area` VALUES ('95', '广州', 'G', '3', '1', 'guangzhou');
INSERT INTO `ik_area` VALUES ('96', '深圳', 'S', '3', '1', 'shen');
INSERT INTO `ik_area` VALUES ('97', '东莞', 'D', '3', '1', 'dong');
INSERT INTO `ik_area` VALUES ('98', '佛山', 'F', '3', '0', 'foshan');
INSERT INTO `ik_area` VALUES ('99', '汕头', 'S', '3', '0', 'shantou');
INSERT INTO `ik_area` VALUES ('100', '珠海', 'Z', '3', '0', 'zhuhai');
INSERT INTO `ik_area` VALUES ('101', '惠州', 'H', '3', '0', 'huizhou');
INSERT INTO `ik_area` VALUES ('102', '中山', 'Z', '3', '0', 'zhongshan');
INSERT INTO `ik_area` VALUES ('103', '江门', 'J', '3', '0', 'jiangmen');
INSERT INTO `ik_area` VALUES ('104', '揭阳', 'J', '3', '0', 'jieyang');
INSERT INTO `ik_area` VALUES ('105', '湛江', 'Z', '3', '0', 'zhanjiang');
INSERT INTO `ik_area` VALUES ('106', '茂名', 'M', '3', '0', 'maoming');
INSERT INTO `ik_area` VALUES ('107', '潮州', 'C', '3', '0', 'chaozhou');
INSERT INTO `ik_area` VALUES ('108', '梅州', 'M', '3', '0', 'meizhou');
INSERT INTO `ik_area` VALUES ('109', '肇庆', 'Z', '3', '0', 'zhaoqing');
INSERT INTO `ik_area` VALUES ('110', '韶关', 'S', '3', '0', 'shaoguan');
INSERT INTO `ik_area` VALUES ('111', '清远', 'Q', '3', '0', 'qingyuan');
INSERT INTO `ik_area` VALUES ('112', '河源', 'H', '3', '0', 'heyuan');
INSERT INTO `ik_area` VALUES ('113', '汕尾', 'S', '3', '0', 'shanwei');
INSERT INTO `ik_area` VALUES ('114', '阳江', 'Y', '3', '0', 'yangjiang');
INSERT INTO `ik_area` VALUES ('115', '云浮', 'Y', '3', '0', 'yunfu');
INSERT INTO `ik_area` VALUES ('116', '南京', 'N', '4', '0', 'nanjing');
INSERT INTO `ik_area` VALUES ('117', '苏州', 'S', '4', '0', 'suzhou');
INSERT INTO `ik_area` VALUES ('118', '昆山', 'K', '4', '0', 'kunshan');
INSERT INTO `ik_area` VALUES ('119', '常熟', 'C', '4', '0', 'changshu');
INSERT INTO `ik_area` VALUES ('120', '张家港', 'Z', '4', '0', 'zhangjiagang');
INSERT INTO `ik_area` VALUES ('121', '太仓', 'T', '4', '0', 'taicang');
INSERT INTO `ik_area` VALUES ('122', '无锡', 'W', '4', '0', 'wuxi');
INSERT INTO `ik_area` VALUES ('123', '江阴', 'J', '4', '0', 'jiangyin');
INSERT INTO `ik_area` VALUES ('124', '常州', 'C', '4', '0', 'changzhou');
INSERT INTO `ik_area` VALUES ('125', '徐州', 'X', '4', '0', 'xuzhou');
INSERT INTO `ik_area` VALUES ('126', '南通', 'N', '4', '0', 'nantong');
INSERT INTO `ik_area` VALUES ('127', '如皋', 'R', '4', '0', 'rugao');
INSERT INTO `ik_area` VALUES ('128', '启东', 'Q', '4', '0', 'qidong');
INSERT INTO `ik_area` VALUES ('129', '扬州', 'Y', '4', '0', 'yangzhou');
INSERT INTO `ik_area` VALUES ('130', '盐城', 'Y', '4', '0', 'yancheng');
INSERT INTO `ik_area` VALUES ('131', '连云港', 'L', '4', '0', 'lianyungang');
INSERT INTO `ik_area` VALUES ('132', '镇江', 'Z', '4', '0', 'zhenjiang');
INSERT INTO `ik_area` VALUES ('133', '泰州', 'T', '4', '0', 'taizhou');
INSERT INTO `ik_area` VALUES ('134', '淮安', 'H', '4', '0', 'huaian');
INSERT INTO `ik_area` VALUES ('135', '宿迁', 'S', '4', '0', 'suqian');
INSERT INTO `ik_area` VALUES ('136', '杭州', 'H', '5', '1', 'hangzhou');
INSERT INTO `ik_area` VALUES ('137', '温州', 'W', '5', '0', 'wenzhou');
INSERT INTO `ik_area` VALUES ('138', '宁波', 'N', '5', '0', 'ningbo');
INSERT INTO `ik_area` VALUES ('139', '台州', 'T', '5', '0', 'taizhou');
INSERT INTO `ik_area` VALUES ('140', '金华', 'J', '5', '0', 'jinhua');
INSERT INTO `ik_area` VALUES ('141', '嘉兴', 'J', '5', '0', 'jiaxing');
INSERT INTO `ik_area` VALUES ('142', '绍兴', 'S', '5', '0', 'shaoxing');
INSERT INTO `ik_area` VALUES ('143', '湖州', 'H', '5', '0', 'huzhou');
INSERT INTO `ik_area` VALUES ('144', '丽水', 'L', '5', '0', 'lishui');
INSERT INTO `ik_area` VALUES ('145', '衢州', 'Q', '5', '0', 'quzhou');
INSERT INTO `ik_area` VALUES ('146', '舟山', 'Z', '5', '0', 'zhoushan');
INSERT INTO `ik_area` VALUES ('147', '青岛', 'Q', '6', '1', 'qingdao');
INSERT INTO `ik_area` VALUES ('148', '济南', 'J', '6', '0', 'jinan');
INSERT INTO `ik_area` VALUES ('149', '烟台', 'Y', '6', '0', 'yantai');
INSERT INTO `ik_area` VALUES ('150', '潍坊', 'W', '6', '0', 'weifang');
INSERT INTO `ik_area` VALUES ('151', '临沂', 'L', '6', '0', 'linyi');
INSERT INTO `ik_area` VALUES ('152', '淄博', 'Z', '6', '0', 'zibo');
INSERT INTO `ik_area` VALUES ('153', '济宁', 'J', '6', '0', 'jining');
INSERT INTO `ik_area` VALUES ('154', '威海', 'W', '6', '0', 'weihai');
INSERT INTO `ik_area` VALUES ('155', '泰安', 'T', '6', '0', 'taian');
INSERT INTO `ik_area` VALUES ('156', '聊城', 'L', '6', '0', 'liaocheng');
INSERT INTO `ik_area` VALUES ('157', '东营', 'D', '6', '0', 'dongying');
INSERT INTO `ik_area` VALUES ('158', '枣庄', 'Z', '6', '0', 'zaozhuang');
INSERT INTO `ik_area` VALUES ('159', '菏泽', 'H', '6', '0', 'heze');
INSERT INTO `ik_area` VALUES ('160', '日照', 'R', '6', '0', 'rizhao');
INSERT INTO `ik_area` VALUES ('161', '德州', 'D', '6', '0', 'dezhou');
INSERT INTO `ik_area` VALUES ('162', '滨州', 'B', '6', '0', 'binzhou');
INSERT INTO `ik_area` VALUES ('163', '莱芜', 'L', '6', '0', 'laiwu');
INSERT INTO `ik_area` VALUES ('164', '成都', 'C', '7', '1', 'chengdu');
INSERT INTO `ik_area` VALUES ('165', '绵阳', 'M', '7', '0', 'mianyang');
INSERT INTO `ik_area` VALUES ('166', '南充', 'N', '7', '0', 'nanchong');
INSERT INTO `ik_area` VALUES ('167', '德阳', 'D', '7', '0', 'deyang');
INSERT INTO `ik_area` VALUES ('168', '达州', 'D', '7', '0', 'dazhou');
INSERT INTO `ik_area` VALUES ('169', '乐山', 'L', '7', '0', 'leshan');
INSERT INTO `ik_area` VALUES ('170', '宜宾', 'Y', '7', '0', 'yibin');
INSERT INTO `ik_area` VALUES ('171', '内江', 'N', '7', '0', 'neijiang');
INSERT INTO `ik_area` VALUES ('172', '自贡', 'Z', '7', '0', 'zigong');
INSERT INTO `ik_area` VALUES ('173', '泸州', '', '7', '0', 'zhou');
INSERT INTO `ik_area` VALUES ('174', '遂宁', 'S', '7', '0', 'suining');
INSERT INTO `ik_area` VALUES ('175', '广安', 'G', '7', '0', 'guangan');
INSERT INTO `ik_area` VALUES ('176', '眉山', 'M', '7', '0', 'meishan');
INSERT INTO `ik_area` VALUES ('177', '广元', 'G', '7', '0', 'guangyuan');
INSERT INTO `ik_area` VALUES ('178', '攀枝花', 'P', '7', '0', 'panzhihua');
INSERT INTO `ik_area` VALUES ('179', '资阳', 'Z', '7', '0', 'ziyang');
INSERT INTO `ik_area` VALUES ('180', '凉山', 'L', '7', '0', 'liangshan');
INSERT INTO `ik_area` VALUES ('181', '巴中', 'B', '7', '0', 'bazhong');
INSERT INTO `ik_area` VALUES ('182', '雅安', 'Y', '7', '0', 'yaan');
INSERT INTO `ik_area` VALUES ('183', '阿坝', 'A', '7', '0', 'aba');
INSERT INTO `ik_area` VALUES ('184', '甘孜', 'G', '7', '0', 'ganzi');
INSERT INTO `ik_area` VALUES ('185', '武汉', 'W', '8', '0', 'wuhan');
INSERT INTO `ik_area` VALUES ('186', '宜昌', 'Y', '8', '0', 'yichang');
INSERT INTO `ik_area` VALUES ('187', '荆州', 'J', '8', '0', 'jingzhou');
INSERT INTO `ik_area` VALUES ('188', '襄阳', 'X', '8', '0', 'xiangyang');
INSERT INTO `ik_area` VALUES ('189', '十堰', 'S', '8', '0', 'shiyan');
INSERT INTO `ik_area` VALUES ('190', '黄冈', 'H', '8', '0', 'huanggang');
INSERT INTO `ik_area` VALUES ('191', '黄石', 'H', '8', '0', 'huangshi');
INSERT INTO `ik_area` VALUES ('192', '孝感', 'X', '8', '0', 'xiaogan');
INSERT INTO `ik_area` VALUES ('193', '荆门', 'J', '8', '0', 'jingmen');
INSERT INTO `ik_area` VALUES ('194', '咸宁', 'X', '8', '0', 'xianning');
INSERT INTO `ik_area` VALUES ('195', '恩施', 'E', '8', '0', 'enshi');
INSERT INTO `ik_area` VALUES ('196', '随州', 'S', '8', '0', 'suizhou');
INSERT INTO `ik_area` VALUES ('197', '鄂州', 'E', '8', '0', 'ezhou');
INSERT INTO `ik_area` VALUES ('198', '仙桃', 'X', '8', '0', 'xiantao');
INSERT INTO `ik_area` VALUES ('199', '天门', 'T', '8', '0', 'tianmen');
INSERT INTO `ik_area` VALUES ('200', '潜江', 'Q', '8', '0', 'qianjiang');
INSERT INTO `ik_area` VALUES ('201', '神农架林区', 'S', '8', '0', 'shennongjialinqu');
