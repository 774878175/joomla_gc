
#实训室表
create table if not exists `gcxlzx_lab`(
	`id` int unsigned auto_increment,									#实训室ID
	`labname` varchar(50) not null,										#实训室名称
	`lno` varchar(30) not null default '',								#编号
	`place` varchar(50),												#地点
	`status` int not null deafult 1,									#状态(可预约or不可预约)
	`state` int not null deafult 1,										#发布状态(发布or未发布)
	`pic` varchar(100),													#图片
	`pnumber` smallint unsigned,										#人数限制
	`admin`	varchar(50),												#负责人
	`phone` varchar(20),												#联系电话
	`email` varchar(50),												#邮箱
	`booktime` varchar(50) not null,									#预约时段
	`bookday` varchar(50) not null,										#预约时间(周几)
	`opendate` date not null,											#开放日期
	`closedate` date not null,											#关闭日期
	`level` tinyint not null default 0,									#是否需要培训
	`description` text, 												#说明
	`publish_up` datetime NOT null DEFAULT '0000-00-00 00:00:00',		#上架时间
	`publish_down` datetime NOT null DEFAULT '0000-00-00 00:00:00',		#下架时间
	primary key(`lid`)
)engine=myisam default charset=utf8 auto_increment=1;