<?php

return array(
	'LANG' => 'zh-cn',

	/*邮件系列*/
	'MAIL_FIRST' => array(//第一封邮件： 变量{$name}用户名
		'title'   => '云小印的第一封信',
		'content' => '<b>亲爱的{$name}同学,你好</b><p>我是云小印,云印南天的专属机器人。</p><p>很高兴很激动地告诉你：你已经在云印上成功绑这个邮箱啦，这是云小印给你发送通知的专用邮件哦！<br>我发现这是你第一次在此绑定邮箱，所以有些话我想对你说（为了不打扰你，下次你换邮箱我就不重复了）。</p><ol><li><h3>我的邮箱</h3><em>云小印现在只有两个邮箱：</em><ul><li>安全验证邮箱：verify@mail.yunyin.org（找回密码或者验证，不会主动发送任何信息）</li><li>紧急通知邮箱：notify@mail.yunyin.org（当有紧急事情，如校园卡丢失，通过此邮件通知）</li></ul><p>如果不能这封不能正常显示请，把我的邮箱设为联系人或者白名单吧,如果能反馈就更好了！<br>那啥，我现在还没学会人工智能，还看不懂你的回信，所以就不要给我回信啦！(吐槽feedback@yunyin.org,有真人回复，是真的！)</p></li><li><h3>我的主页</h3><p>如果你想了解更多内容可到我的主页查看www.yunyin.org（你也可以来编辑修改哦！）; 应用地址是yunyin.org记得分清哦,收藏更方便！<br>悄悄告诉你：<q>后续重要说明和教程指导什么的都会第一时间出现在这里！</q></p></li><li><h2>我们一起<strong>改造校园服务吧</strong></h2><p>感谢你对云印的信任和支持！我们竭力以极客态度和开源精神，重新为你打造更加安全便捷的校园服务。打印不仅仅可以有更好的体验！<br>我和你一样希望校园更加方便和简单。快来和我们的团队一起设计我们自己的校园服务！有你的参与，梦想和现实会一点点靠近的！</p><ul><li>如果你决得我们的文档有问题，你可以直接修改并提交（主页，文档和应用代码都是开源的并接受修改请求！）；</li><li>如果你觉得云印的那些内容不够好，你可以直接在为我们的开源地址上修改(包括我对你说的所有话，没错，就是这封邮件！)；</li><li>如果你觉得解决不了，告诉我们，我们一起来解决；</li><li>如果你觉得技术都不会，我们一起来讨论；</li><li>如果觉得哪里不好，就对我们疯狂吐槽吧；</li><li>如果觉得好就告诉同学一起来吧!</li></ul><p></p></li><li><h3>我的联系方式</h3><ol><li>帮助邮箱:help@yunyin.org;</li><li>微信账号:云印南天（YunYinNanTian）;</li><li>官方微博:云印南天(CloudPrint);</li><li>人人主页:云印南天;</li><li>项目地址:https://github.com/nkumstc/print</li></ol></li></ol><p>加油！我们一起努力吧！↖(^ω^)↗我始终坚信<strong><q>未来的校园，有你更精彩</q></strong>！</p><hr><p align="right"><strong>云小印(●`ω`●)</strong><br><strong>云印南天团队</strong></p>',
	),
	'MAIL_BIND' => array(//绑定邮箱：{$mail}绑定的邮箱；{$link}验证链接
		'title'   => '云印邮箱绑定验证',
		'content' => '欢迎加入云印的大家庭哦！<br/>云小印专注于为您提供最方便快捷的校园打印体验，让您随时打印，随手可取，无需“忧”盘！<br/>请点击以下链接绑定此的邮箱：({$mail}.) <a href="{$link}">{$link}</a>',
	),
	'MAIL_FINDPWD' => array(//找回密码：{$link}找回链接
		'title'   => '云印找回密码邮件',
		'content' => '您正在云印南天使用密码找回,<br>请点击以下链接重设密码： <a href="{$link}">{$link}</a>',
	),
	'MAIL_CARD' => array(//一卡通招领：{$name}接收者姓名,{$sender}拾卡人信息
		'title'   => '云印校园卡认领通知',
		'content' => '亲爱的<i>{$name}</i>同学：<br/>{$sender["school"]}的<i>{$sender}</i>同学说TA捡到了你的学子卡<br/>TA的手机号:<b><a herf="tel:{$sender["phone"]}">{$sender["phone"]}</a></b>;<br/>,TA的邮箱: <b><a href="mailto:{$sender["email"]}">{$sender["phone"]|default="无"}</a></b>;<br/>请尽快与其联系并认领吧。^_^',
	),

	'CARD_ACCOUNT_IS_DISABLE'=>'已封号',
	'CARD_PLEASE_BIND_PHONE'=>'使用此功能必须绑定手机号！',
	'CARD_NOT_SEND_TO_SELF'=>'不要用自己的做实验哦！',
	'CARD_ACCOUNT_BEEN_DISABLE'=>'由于恶意使用,您的此功能已被禁用',
	'CARD_NOT_ENOUGH_INFO'=>'信息不足',
	'CARD_NOT_PARTICIPATE'=>'尚未加入此平台',
	'CARD_INFO_CHECK_FAIL'=>'失主信息核对失败！',
	'CARD_FUCTION_DISABLE'=>'对方关闭此功能',
	'CARD_NO_BIND_INFO'=>'尚未绑定个人信息',
	'CARD_SEND_MESSAGE_SUCC'=>'短信已发送!\n',
	'CARD_SEND_MESSAGE_FAIL'=>'短信发送失败!\n',
	'CARD_SEND_MAIL_SUCC'=>'邮件已发送!\n',
	'CARD_SEND_MAIL_FAIL'=>'邮件发送失败!\n',
	'CARD_SEND_FAIL'=>'消息发送失败！请重试或者交由第三方平台！',
	'CARD_LOG_FAIL'=>'记录失败!!!\n',
	'CARD_BAD_PARAMETER'=>'参数不对！',



	'USER_FILE_PLEASE_CHOOSE_PRINTER'=>'请选择打印店！',
	'USER_FILE_UPLOAD_FAIL'=>'文件上传失败！',
	'USER_FILE_LOG_UPDATE_FAIL'=>'记录更新异常',
	'USER_FILE_CANNOT_DELETE'=>'文件不可删除',
	'USER_FILE_NOT_EXIST'=>'记录已不存在',
	'USER_FILE_CURRENT_STATUS_CANNOT_DELETE'=>'当前状态不允许删除！',

	'USER_PRINTERS_NO_PRICE_DATA'=>'打印店还没设置价钱',
	'USER_PRINTERS_NO_PRINTER_ID'=>'没提供打印店编号',

	'USER_AUTH_ID_FORMAT_ERROR'=>'学号格式错误！',
	'USER_AUTH_ID_PASSWORD_ERROR'=>'密码或者账号错误！',
	'USER_AUTH_PASSWORD_ERROR'=>'密码验证错误！',
	'USER_AUTH_BAN_ID'=>'此账号已被封禁',
	'USER_AUTH_NK_REGISTER_CLOSE'=>'对不起，由于南开内网原因，目前注册暂时关闭，请您谅解！',
	'USER_AUTH_NK_FIND_CLOSE'=>'sorry，由于南开内网原因，暂时不可使用此渠道找回密码！',
	'USER_AUTH_ID_FORMAT_NOT_EXIST'=>'你输入的学号{$number},不是南开或者天大在读学生的的学号，如果你是南开或者天大的在读学生请联系我们！',
	'USER_AUTH_ID_CHECK_FAIL'=>'，学校账号实名认证失败！',
	'USER_AUTH_REGISTER_SUCC'=>'注册成功！',
	'USER_AUTH_REGISTER_FAIL'=>'注册失败！',
	'USER_AUTH_NOT_NK_STUDENT'=>'好像不是南开或者的在读学生额>_ < ?',
	'USER_AUTH_ID_ERROR'=>'学号无效！',
	'USER_AUTH_PHONE_ALREADY_BIND'=>'此手机号已经绑定过账号！',
	'USER_AUTH_PHONE_BIND_SUCC'=>'手机绑定成功！',
	'USER_AUTH_PHONE_BIND_FAIL'=>'手机绑定失败！',
	'USER_AUTH_MAIL_ALREADY_BIND'=>'此邮箱已经绑定过账号！',
	'USER_AUTH_MAIL_BIND_SUCC'=>'邮箱绑定成功！',
	'USER_AUTH_MAIL_BIND_FAIL'=>'邮箱绑定失败！',



	'PRINTER_REFRESH_FAIL'=>'未成功刷新',
	'PRINTER_'=>'',
	'PRINTER_CANNOT_SET_STATUS'=>'状态不可设置',
	'PRINTER_DELETE_CANNOT_DOWNLOAD'=>'文件已删除，不能再下载！',
	'PRINTER_NOTIFY_MESSAGE_SEND_SUCC'=>'提醒信息已发送',
	'PRINTER_NOTIFY_MESSAGE_SEND_FAIL'=>'提醒信息发送失败',


	'GLOBLE_AUTH_ATTEMPT'=>'此账号尝试次数过多，已经暂时封禁，请于一小时后重试！（ps:你的行为已被系统记录）',
	'GLOBLE_AUTH_OLD_OPASSWORD_ERROR'=>'原密码错误！',
	'GLOBLE_AUTH_PASSWORD_RESET_SUCC'=>'密码重置成功！请重新登录',
	'GLOBLE_AUTH_PASSWORD_RESET_FAIL'=>'密码重置失败',
	'GLOBLE_AUTH_MAIL_SEND_FAIL'=>'验证邮件发送失败！',
	'GLOBLE_AUTH_INFO_LOSS_EFF'=>'验证信息已失效,请重新获取！',
	'GLOBLE_AUTH_ID_ERROR'=>'账号无效！',
	'GLOBLE_AUTH_PHONE_NOT_EXIST'=>'手机号不存在！',
	'GLOBLE_AUTH_MAIL_ADD_ERROR'=>'邮箱地址无效！',
	'GLOBLE_AUTH_SUCC'=>'验证成功！',
	'GLOBLE_AUTH_FAIL'=>'验证失败！',
	'GLOBLE_AUTH_INFO_ERROR'=>'验证信息错误',
	'GLOBLE_AUTH_MAIL_SEND_SUCC'=>'验证邮件已发送到{$email}请及时到邮箱查收!注意垃圾箱哦o(^▽^)o',
	'GLOBLE_AUTH_MAIL_SEND_FAIL'=>'验证邮件发送失败！',

	'GLOBLE_MAIL_NOT_MATCH_ID'=>'账号与邮箱不匹配！',
	'GLOBLE_PHONE_NOT_MATCH_ID'=>'账号与手机号不匹配！',
	'GLOBLE_PHONE_ERROR'=>'手机号无效！',
	'GLOBLE_PLEASE_LOGIN'=>'请登录！',
	'GLOBLE_MODIFY_FAIL'=>'修改失败!',
	'GLOBLE_MODIFY_SUCC'=>'修改成功!',
	'GLOBLE_OPERATION_FAIL'=>'操作失败!',
	'GLOBLE_OPERATION_SUCC'=>'操作成功!',
	'GLOBLE_SAVE_FAIL'=>'保存信息出错啦！',
	'GLOBLE_SAVE_SUCC'=>'保存信息成功!',
	'GLOBLE_PLEASE_FILL_IN'=>'内容不能为空！',
	'GLOBEL_NO_DATA'=>'不好意思，没找到数据',
	'GLOBEL_NO_BIND_PHONE'=>'尚未绑定手机',
	'GLOBEL_NO_BIND_MAIL'=>'尚未绑定邮箱',
	'GLOBEL_SEND_SUCC'=>'发送成功',
	'GLOBEL_SEND_FAIL'=>'发送失败',
	'GLOBEL_SEND_TOO_MUCH'=>'发送次数过多',
	'GLOBLE_INFO_FAIL'=>'信息生成失败！',
	'GLOBLE_UNKNOWN_ERROR'=>'未知错误！',
	'GLOBLE_INFO_NOT_ENOUGH'=>'信息不完整！',

);
