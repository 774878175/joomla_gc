
#实验仪器表
create table if not exists `gcxlzx_device`(
	`id` int unsigned auto_increment,									#实验仪器ID
	`devicename` varchar(50) not null,									#实验仪器名称
	`dno` int not null default 0,										#编号
	`labname` varchar(50) not null default '',							#所属实训室名称
	`state` int not null default 1,										#发布状态(发布or未发布)
	`pic` varchar(100) not null default '',								#图片
	`mode` varchar(50) not null default '',								#型号
	`standard` varchar(50) not null default '',							#技术指标
	`importdate` date not null default '0000-00-00',					#购进日期
	`orign` varchar(50) not null default '',							#国别厂家
	`inprice` varchar(10) not null default '',							#校内收费
	`outprice` varchar(10) not null default '',							#校外收费
	`admin`	varchar(50) not null default '',							#负责人
	`phone` varchar(20) not null default '',							#联系电话
	`email` varchar(50) not null default '',							#邮箱
	`booktime` varchar(50) not null,									#预约时段
	`bookday` varchar(50) not null,										#预约时间(周几)
	`opendate` date not null,											#开放日期
	`closedate` date not null,											#关闭日期
	`level` tinyint not null default 0,									#是否需要培训
	`description` text, 												#说明
	`publish_up` datetime NOT null DEFAULT '0000-00-00 00:00:00',		#上架时间
	`publish_down` datetime NOT null DEFAULT '0000-00-00 00:00:00',		#下架时间
	primary key(`id`),
	foreign key(`labname`) references `gcxlzx_lab`(`labname`)
)engine=myisam default charset=utf8 auto_increment=1;