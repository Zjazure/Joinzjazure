# 湛江一中IT社网络报名系统 - PHP重制版

## 安装

1. 克隆本Git库或下载源码，将JoinzjazurePHP目录的内容放置于Web目录中。

2. 本程序的数据库配置位于*JoinzjazurePHP/config.json*内，请打开该文件填入正确的数据库配置。

3. 本程序使用MySQL数据库系统。由于本程序会在数据表不存在时创建表，设置用户时，请额外给该用户添加mysql数据库的SELECT权限。

4. 验证码、小组信息和首页提交页面提示信息都在JsonData目录下的相关文件内。


## 安全

* 本程序自带有适用于Apache的.htaccess文件以阻止恶意用户访问XMLData目录下的xml文件和config.json，请打开Apache的重写功能。

* 使用Nginx或其他Web服务器的用户请自行添加规则屏蔽XMLData目录的xml和config.json。

## 鸣谢
* 湛江一中IT社网络报名系统 - ASP.Net MVC版 作者：Henrycobaltech

* 湛江一中IT社网络报名系统 - PHP重制版 核心功能：Winglim LinZong