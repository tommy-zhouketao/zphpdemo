<?php

/**
 * Created by zhouketao.
 * Email: zhouketao@csu.edu.cn
 * Date: 2017/7/17
 */
namespace Entity;

class User extends \ArrayObject
{
    const TABLE_NAME = 'user';

    /**
     * @return integer
     */
    public function id()
    {
        return $this['id'];
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this['name'];
    }

    /**
     * @return integer
     */
    public function phone()
    {
        return $this['phone'];
    }

    /**
     * @return string
     */
    public function email()
    {
        return $this['email'];
    }
}