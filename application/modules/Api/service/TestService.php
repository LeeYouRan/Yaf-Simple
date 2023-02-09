<?php
/**
 * Created PhpStorm.
 * User:
 * Date: 2020-11-25
 * File: DemoService.php
 * Desc: 示例逻辑层
 */

namespace app\modules\Api\service;

use TestModel;

class TestService
{
    public $id;

    protected $_demoModel;

    public function __construct()
    {
        $this->_demoModel = new TestModel();
    }

    public function test($id)
    {
        return TestModel::where('id', $id)->find();
    }

}