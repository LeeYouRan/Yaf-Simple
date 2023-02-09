<?php

/**
 * 基于thinkphp 5.1版本的封装抽取
 * Date: 2018\2\19 0019 15:42
 *
 */
class Controller extends \Yaf_Controller_Abstract
{
    /**
     * @var Request Request 实例
     */
    protected $request;

    protected function init()
    {
        $this->request = Request::instance();
    }

    /**
     * 获取参数
     * @author <2020-11-25>
     * @param string $name
     * @param null   $default
     * @param null   $type
     * @param bool   $isMust
     * @param string $msg
     * @return bool|mixed|null
     */
    public function all(string $name = '', $default = null, $type = null, bool $isMust = false, string $msg = '')
    {
        return request()->all($name, $default, $type, $isMust, $msg);
    }

    /**
     * 响应成功结果
     * @param              $data
     * @param array|string $responseStatus
     * @param array        $header
     */
    public function outputSuccess($data, $responseStatus = [], array $header = [])
    {
        response()->outputSuccess($data, $responseStatus, $header);
    }

    /**
     * 响应错误结果
     * @param array|string $responseStatus
     * @param string       $data
     * @param array        $header
     */
    public function outputError($responseStatus, string $data = '', array $header = [])
    {
        response()->outputError($responseStatus, $data, $header);
    }

    /**
     * 输出正常数据
     * @author <2021-03-25>
     * @param       $data
     * @param array $header
     */
    public function output($data, array $header = [])
    {
        response()->output($data, $header);
    }
}