<?php
/**
 * Created by zhouketao.
 * Email: zhouketao@csu.edu.cn
 * Date: 2017/7/17
 */
namespace Common;

/**
 * Class Code
 * @desc 用户自定义返回错误码与对应解释信息
 */
class Code
{
    const ERR_CODE_INVALID_PARAM = 401;
    const ERR_CODE_INVALID_OPERATION = 402;
    const ERR_CODE_EXCEPTION = 500;
    const ERR_CODE_FAILED = 501;
    const ERR_CODE_ACCESS_DENY = 403;

    public static $msg = [
        401 => 'please check the request params',
        402 => 'please check some invalid operations',
        403 => 'please login or apply for permission',
        500 => 'some unexpected exception occurred',
        501 => 'some known error occurred',
    ];
}
