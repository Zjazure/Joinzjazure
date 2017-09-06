# 湛江一中IT社社员补登系统

本系统复刻自湛江一中IT社网络报名系统

## 安装

1. 下载Release版本，将MemberTracer目录的内容放置于Web目录中。

2. 本程序使用MySQL数据库系统。由于本程序会在数据表不存在时创建表，设置用户时，请额外给该用户添加mysql数据库的SELECT权限。

3. 本程序附有一个简单的管理后台，可以查看报名信息和设置数据库连接，位于/Admin目录，第一次使用时会要求设置密码。本程序会在程序根目录下创建config.json配置文件，请确保本程序有权限在该目录下读写文件。

4. 验证码、小组信息和首页提交页面提示信息都在JsonData目录下的相关文件内。


## 安全

* 本程序自带有适用于Apache的.htaccess文件以阻止恶意用户访问JsonData目录下的json文件和config.json，请打开Apache的重写功能。

* 使用Nginx或其他Web服务器的用户请自行添加规则屏蔽JsonData目录的json和config.json。

## 开发

* 开发本项目需要的工具：PHP、NPM。

* 克隆或下载源码后，请运行以下命令安装依赖并转译前端代码：

    ```bash
        cd ./MemberTracer/
        npm install
        webpack
    ```

## 作者
* 湛江一中IT社网络报名系统 - ASP.Net MVC版 作者：Henrycobaltech

* 湛江一中IT社网络报名系统 - PHP重制版 核心功能：Winglim LinZong 重构：SamLangTen

* 湛江一中IT社社员补登系统 复刻：SamLangTen