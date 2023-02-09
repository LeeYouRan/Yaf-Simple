<?php
/**
 * Created PhpStorm.
 * User:
 * Date: 2020-10-16
 * File: Response.php
 * Desc: 生成请求、响应类实例
 */

class CommonPlugin extends Yaf_Plugin_Abstract
{
    public function routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {
        # 注册请求对象
        Yaf_Registry::set('request', new \app\library\core\Request($request));
    }

    public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {
        # 注册响应对象
        Yaf_Registry::set('response', new \app\library\core\Response($response));
    }
}