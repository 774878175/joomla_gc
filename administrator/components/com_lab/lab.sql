
#实训室表
create table if not exists `gcxlzx_lab`(
	`lid` int unsigned auto_increment,							#实训室ID
	`labname` varchar(50) not null,								#实训室名称
	`lno` int unsigned,											#编号
	`place` varchar(50),										#地点
	`pnumber` smallint unsigned,								#人数限制
	`admin`	varchar(50),										#负责人
	`tel` varchar(20),											#联系电话
	`email` varchar(50),										#邮箱
	`booktime` varchar(50) not null,							#预约时段
	`bookday` varchar(50) not null,								#预约时间(周几)
	`opendate` date not null,									#开放日期
	`closedate` date not null,									#关闭日期
	`level` tinyint not null default 0,							#是否需要培训
	`explain` text, 											#说明
	primary key(`lid`)
)engine=myisam default charset=utf8 auto_increment=1;