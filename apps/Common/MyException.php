<?php
/**
 * Created by zhouketao.
 * Email: zhouketao@csu.edu.cn
 * Date: 2017/7/17
 */

namespace Common;

/**
 * Class MyException
 * @desc 用户自定义异常类
 */
class MyException extends \Exception
{
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public static function failed()
    {
        $ret['error'] = Code::ERR_CODE_FAILED;
        $ret['message'] = Code::$msg[Code::ERR_CODE_FAILED];
        return $ret;
    }

    /**
     * @param string $message
     * @return array
     */
    public static function invalid($message = '')
    {
        $ret['error'] = Code::ERR_CODE_INVALID_OPERATION;
        if ($message) {
            $ret['message'] = $message;
        } else {
            $ret['message'] = Code::$msg[Code::ERR_CODE_INVALID_OPERATION];
        }
        return $ret;
    }
}