<?php
/**
 * Created by zhouketao.
 * Email: zhouketao@csu.edu.cn
 * Date: 2017/7/17
 */

namespace Service;

use ZPHP\Core\Factory;
abstract class Base
{
    public function _init()
    {
    }

    /**
     * @param $className
     * @return mixed: instance of dao class
     */
    protected function getDao($className)
    {
        return Factory::getInstance("Dao\\{$className}");
    }
}