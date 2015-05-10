#Documentation

##/Home/
学生用户Controller

###TestController
测试用，使用前保证数据库内至少1学生用户，1打印店用户，且$uid=1,$pid=1，10条以上上传记录  
使用范例：http://mstc.nankai.edu.cn/Home/Test/gettest

####gettest()
主要内容：上传文件页面  
请求方式：get  
参数  
返回值  
特殊注意：默认post到posttest(),即使用七牛，多文件上传请点击网页最上方button  
异常 

####getsetting()
主要内容：获得公共配置  
请求方式：get  
参数  
返回值：配置文件中的'MAX_TRIES'，'UPLOAD_SITEIMG_QINIU'  
特殊注意  
异常：'MAX_TRIES'是原来就有的，'UPLOAD_SITEIMG_QINIU'是新加入的，前者输出为10，后者输出为null

####getfunc()
主要内容：调用公共函数  
请求方式：get  
参数  
返回值  
特殊注意：目前调用encode()能正常输出，可以尝试改为qiniu_encode()  
异常：调用新加入的公共函数会出错  

####getsplit()
主要内容：获得分页文件列表  
请求方式：get  
参数  
返回值  
特殊注意：保证数据库中有一定数量上传记录  
异常  

####postupyun()
主要内容：上传文件到upyun  
请求方式：post  
参数  
返回值：$Upload，$info  
特殊注意：使用前请补全账号配置  
异常  

####posttest()
主要内容：上传文件到qiniu  
请求方式：post  
参数  
返回值：文件下载链接（已防盗链）  
特殊注意：'foreach($_FILES as $file)'会出错，只能'$_FILES'直接上传。文件命名方式待更改  
异常  

###IndexController

####index()
主要内容：学生用户登录页面  
请求方式：get  
参数  
返回值  
特殊注意：已经登录了不显示表格  
异常  

####feedback()
主要内容：提交反馈  
请求方式：post  
参数  
返回值  
特殊注意：填写页面在哪里  
异常  

####backfeed()
查看反馈
####contact()
联系我们
####about()
关于云印
####privacy()
隐私条款
####_empty()
404页面

###EmptyController
####_empty()
404页面

###FileController
####index()
主要内容：用户文件上传历史页面  
请求方式：get  
参数  
返回值：用户所有文件  
特殊注意：要加入分页  
异常  

####add()
主要内容：文件上传页面  
请求方式：get  
参数  
返回值：  
特殊注意：  
异常  

####upload()
主要内容：文件上传入口  
请求方式：post  
参数  
返回值：  
特殊注意：先存文件再存数据然后再放入提醒表  
异常：多文件上传逻辑出错，文件已上传但未写入数据库  
####delete()
主要内容：删除文件  
请求方式：post  
参数：文件ID  
返回值：  
特殊注意：异步删除，不能从打印店页面消失  
异常：删除与打印时间同时发生出现竞争
####_empty()
404页面

###UserController
####index()
主要内容：学生用户信息管理页面  
请求方式：get  
参数：学生ID  
返回值：  
特殊注意：  
异常：
####auth()
主要内容：登陆或者注册  
请求方式：post  
参数：用户学号和密码  
返回值：  
特殊注意：缓存登陆多次密码错误，超过上限记录异常。
第一次登录即注册，通过urp验证函数。
如果第一次登录，记录名字到session，为notice()做准备  
异常：如果验证服务器关了，有阻塞
####notice()
主要内容：注册后的注意事项  
请求方式：get和post  
参数：密码和确认密码  
返回值：  
特殊注意：判断有木有第一次登录session记录的名字和ID，有的话才能改密码  
异常：
####forget()
主要内容：忘记密码  
请求方式：get和post  
参数：学生ID，然后urp密码，新密码和确认密码  
返回值：  
特殊注意：通过urp验证函数，然后重设密码  
异常：如果验证服务器关了，有阻塞
####change()
主要内容：修改密码  
请求方式：post  
参数：旧密码，新密码和确认密码  
返回值：  
特殊注意：改成功了之后要重新登录，建议此次加最大失败记录  
异常：
####logout()
主要内容：登出  
请求方式：get  
参数：  
返回值：  
特殊注意：删cookie和session  
异常：
####_empty()
404页面


##/Printer/
打印店用户Controller

###IndexController
####index()
主要内容：打印店用户登录页面  
请求方式：get  
参数：  
返回值：  
特殊注意：已经登录跳转到文件列表  
异常：跳转url大小写不统一
####feedback()
主要内容：提交反馈  
请求方式：post  
参数：  
返回值：  
特殊注意：填写页面在哪里  
异常：
####contact()
联系我们
####about()
关于云印
####_empty()
404页面

###PrinterController
####index()
主要内容：打印店用户信息管理页面  
请求方式：get  
参数：  
返回值：  
特殊注意：  
异常：
####changePwd()
主要内容：修改密码  
请求方式：post  
参数：旧密码，新密码和确认密码  
返回值：  
特殊注意：改成功了之后要重新登录，建议此次加最大失败记录  
异常:
####logout()
主要内容：登出  
请求方式：get  
参数：  
返回值：  
特殊注意：删cookie和session  
异常：
####signup()
主要内容：打印店用户注册页面  
请求方式：get  
参数：  
返回值：  
特殊注意：测试用，不对外开放  
异常：
####add()
主要内容：增加打印店用户  
请求方式：post  
参数：用户名，密码，名字，电话号码，qq，地址  
返回值：  
特殊注意：测试用，不对外开放  
异常：
####auth()
主要内容：打印店用户登录入口  
请求方式：post  
参数：用户名，密码  
返回值：  
特殊注意：有登录失败最大次数统计  
异常：
####_empty()
404页面

###FileController
####index()
主要内容：打印店文件管理页以及历史页面  
请求方式：get  
参数：文件状态status  
返回值：  
特殊注意：  
异常：
####refresh()
主要内容：异步周期刷新获取未处理文件  
请求方式：get  
参数：文件ID  
返回值：返回一个view，要改成json格式。websocket即时通讯？  
特殊注意：  
异常：
####set()
主要内容：文件状态操作  
请求方式：get  
参数：文件ID，状态status  
返回值：  
特殊注意：在view里面多个button共用，已打印文件消失。  
异常：
####_empty()
404页面

##Model
###FileViewModel
文件与打印店信息联合模型
###PrinterModel
打印店信息模型
###FeedbackModel
反馈信息模型
###FileModel
文件信息模型
###UserModel
学生用户信息模型
###NotificationModel
提示消息模型（临时）  
文件模型精简版
###TokenModel
令牌模型（临时）