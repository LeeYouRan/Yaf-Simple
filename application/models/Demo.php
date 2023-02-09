<?php
/**
 * Created PhpStorm.
 * User:
 * Date: 2020-11-18
 * File: Demo.php
 * Desc: 示例表
 */

class DemoModel extends \app\library\database\Medoo
{
    protected $_table = 'user';

    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    /**
     * 查询数据库使用示例
     * @author <2021-12-30>
     * @param $id
     * @return false|mixed|void
     */
    public function showUsageForSelectDB($id)
    {
        # 数据库查询方法
        return $this->get($this->_table, '*', ['id' => $id]);
    }

    /**
     * Model中途报错
     * @author <2021-12-30>
     */
    public function modelOutputError()
    {
        outputError('Model中途报错');
    }
}