
# Simple-yaf Framework for PHP 
##
根据源生Yaf框架，封装的框架。

参考了:

1.[laruence/yaf](https://github.com/laruence/yaf)

2.[Weiyixmm/yaf](https://github.com/Weiyixmm/yaf)

3.[yumufeng/thinkyaf](https://github.com/yumufeng/thinkyaf)

4.[liaoshengping/yaf_init](https://github.com/liaoshengping/yaf_init)

整合了thinkphp-orm，利用yaf的高性能，整合了一些网上的轮子和API接口需要的组件，致力于提高生产环境下的运行性能和开发环境下的开发效率。

核心库高效封装常用库和操作,兼容php5.6及以上，在PHP7.1上性能爆发。

## 版本

#### Version 1.0.0
> 源生Yaf框架(使用yaf_cg生成)，未做任何修改。

#### Version 2.*
> 根据源生Yaf框架，进行了简单的封装，未引入composer包(引入composer，会影响框架性能，后续版本会引入)。数据库类包使用Medoo，日志使用Seaslog扩展。

## 要求
> 扩展安装请注意相对应的PHP版本要求，框架并未严格要求PHP版本，最低版本要求为PHP 7以上。
- PHP >= 7
- Nginx 1.12.0
- mysql >= 5.6
- [Yaf](https://pecl.php.net/package/yaf) >= 3.2.5 扩展
- [Seaslog](https://pecl.php.net/package/seaslog) >= 2.* 扩展


## 目录结构(2.*)

```
├── application
│   ├── Bootstrap.php               # 引导文件
│   ├── cli                        
│   │   └── Demo.php                # Cli示例文件
│   ├── controllers               
│   │   ├── Error.php               # 全局错误收集
│   │   └── Index.php               # 默认控制器
│   ├── library                    
│   │   ├── BaseApi.php             # modules下Api基类
│   │   ├── core                   
│   │   │   ├── Request.php         # 请求处理
│   │   │   ├── Response.php        # 响应处理
│   │   │   └── ResponseStatus.php  # 状态码文件
│   │   ├── database
│   │   │   ├── BaseDB.php          # 数据库单例基类
│   │   │   └── Medoo.php           # 数据库操作类
│   │   ├── readme.txt
│   │   └── redis
│   │       └── Redis.php           # Redis操作类
│   ├── models
│   │   ├── Demo.php                # Model示例
│   │   └── Sample.php              # 原生Model
│   ├── modules                     # 模块
│   │   └── Api                     # Api模块(可以添加多个) 
│   │       ├── controllers
│   │       │   └── Demo.php        # 示例控制器
│   │       └── service
│   │           └── DemoService.php # 示例逻辑处理
│   ├── plugins
│   │   ├── Common.php              # 通用中间件
│   │   └── Sample.php              # 原生中间件
│   └── views
│       ├── error
│       │   └── error.phtml
│       └── index
│           └── index.phtml
├── composer.json
├── conf
│   └── application.ini             # 配置文件
├── public
│   ├── cli.php                     # cli入口文件
│   └── index.php                   # 入口文件
└── readme.md
```
# 推荐安装环境

1.yaf >= 3.2.5

2.PHP版本 >= 7.0

3.Nginx 1.12.0

4.mysql >= 5.6

支持以下特性

**1. 数据库ORM**
*   基于ThinkPHP5.1的ORM独立封装，PDO底层
*   支持Mysql、Pgsql、Sqlite、SqlServer、Oracle和Mongodb
*   支持Db类和查询构造器
*   支持事务
*   支持模型和关联

**2. 缓存**

*   驱动方式（支持file/memcache/redis/xcache/wincache/sqlite）

使用File作为缓存驱动时，请设置 runtime目录为 777 可读可写权限

**3 .数据验证**

**4 .Yar RPC接口开发**

**5 .Restful接口设计**

#封装了以下轮子

* 非对称加密库 - Rsa
* 快速随机数生成器 - Random
* 输入过滤库 - input
* 微信小程序类 - Weapp
* Cookie和Session的操作
* Mail邮件类 - 发送验证码\通知等
* 支付宝、微信支付接口

## 使用
框架内有使用示例，关于Yaf框架，请参照[Yaf 手册](https://www.laruence.com/manual/index.html)

更多用法，见文档[看云文档地址](https://www.kancloud.cn/yumufeng/thinkyaf)
