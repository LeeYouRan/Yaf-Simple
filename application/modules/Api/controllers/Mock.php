<?php
/**
 * Created PhpStorm.
 * User:
 * Date: 2020-11-18
 * File: Demo.php
 * Desc: 样例控制器
 */

use app\modules\Api\service\TestService;

class MockController extends BaseApi
{

    /**
     * @var TestService
     */
    protected $_demoService;

    public function init()
    {
        # 继承父类初始化方法，不写则不继承
        parent::init();
        # 实例化Service
        $this->_demoService = new TestService();
    }

    public function testAction()
    {
        $param = request()->all();
        $id = getter($param,'id',0);
        $res = $this->_demoService->test($id);
        return message('success',true,$res);
    }

}
