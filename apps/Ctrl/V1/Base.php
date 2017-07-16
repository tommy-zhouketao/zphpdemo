<?php
/**
 * Created by zhouketao.
 * Email: zhouketao@csu.edu.cn
 * Date: 2017/7/17
 */
namespace Ctrl\V1;

use ZPHP\Controller\IController,
    ZPHP\Controller\RESTController,
    ZPHP\Core\Config as ZConfig,
    ZPHP\Core\Factory,
    ZPHP\Session\Factory as ZSession;
use ZPHP\Protocol\Request;
use ZPHP\Common\Utils as ZUtils;
use Common\MyException;
use Common\Code;

abstract class Base implements IController, RESTController
{
    /**
     * @return bool
     * @throws \Exception
     * @desc 前置控制器，session自动开启判断， 输入参数过滤
     */
    public function _before()
    {
        if (ZConfig::getField('project', 'auto_session', false)) {
            ZSession::start();
        }
        if (!empty($_POST)) {
            $_POST = $this->_filter($_POST);
        }
        if (!empty($_GET)) {
            $_GET = $this->_filter($_GET);
        }
        $params = Request::getParams();
        if (!empty($params)) {
            $params = $this->_filter($params);
            $_REQUEST = $params;
            Request::setParams($params);
        }

        return true;
    }

    private function _filter($params)
    {
        foreach ($params as &$val) {
            if (is_array($val)) {
                $val = $this->_filter($val);
            } else {
                $val = addslashes(trim($val));
            }
        }
        unset($val);
        return $params;
    }

    /**
     * @desc 后置控制器
     */
    public function _after()
    {
    }

    /**
     * @param string $key 参数名
     * @param null $default 当没有此参数时的默认值
     * @param array|null $params 数据源（默认$this->parmas）
     * @param bool|false $abs 是否取绝对值
     * @param bool|false $notNull 是否允许未定义
     * @return int|null|number
     * @throws \common\MyException
     * @desc 获取int型参数
     */
    protected function getInteger($key, $default = null, array $params = null, $notNull = false, $abs = false)
    {
        if (empty($params)) {
            $params = Request::getParams();
        }
        if (!isset($params[$key])) {
            if ($notNull && null === $default) {
                throw new MyException("empty param of {$key}", Code::ERR_CODE_INVALID_PARAM);
            }
            return $default;
        }
        $integer = \intval($params[$key]);
        return $abs ? \abs($integer) : $integer;
    }

    /**
     * @param string $key 参数名
     * @param null $default 当没有此参数时的默认值
     * @param array|null $params 数据源（默认$this->parmas）
     * @param bool|false $abs 是否取绝对值
     * @param bool|false $notNull 是否允许未定义
     * @return float|null
     * @throws \common\MyException
     * @desc 获取浮点型参数
     */
    protected function getFloat($key, $default = null, $notNull = false, $abs = false, array $params = null)
    {
        if (empty($params)) {
            $params = Request::getParams();
        }
        if (!isset($params[$key])) {
            if ($notNull && null === $default) {
                throw new MyException("empty param of {$key}", Code::ERR_CODE_INVALID_PARAM);
            }
            return $default;
        }
        $float = \floatval($params[$key]);
        return $abs ? \abs($float) : $float;
    }

    /**
     * @param string $key 参数名
     * @param null $default 当没有此参数时的默认值
     * @param array|null $params 数据源（默认$this->parmas）
     * @param bool|false $notNull 是否允许未定义
     * @return int|null|number
     * @throws \common\MyException
     * @desc 获取字符串参数
     */
    protected function getString($key, $default = null, $notNull = false, array $params = null)
    {
        if (empty($params)) {
            $params = Request::getParams();
        }

        if (!isset($params[$key])) {
            if ($notNull && null === $default) {
                throw new MyException("empty param of {$key}", Code::ERR_CODE_INVALID_PARAM);
            }
            return $default;
        }
        $string = $params[$key];
        return $string;
    }

    /**        $stime = $this->getString('stime', null, null, true);
     * @param $key
     * @param null $default
     * @param array|null $params
     * @param bool|true $notEmpty
     * @return array|null
     * @throws \common\MyException
     * @desc 获取数组类型的参数
     */
    protected function getArray($key, $default = null, $notEmpty = true, array $params = null)
    {
        if (empty($params)) {
            $params = Request::getParams();
        }
        if (empty($params[$key])) {
            if ($notEmpty && null === $default) {
                throw new MyException("empty param of {$key}", Code::ERR_CODE_INVALID_PARAM);
            }
            return $default;
        }
        $arr = $params[$key];
        if (!is_array($arr)) {
            throw new MyException("empty param of {$key}", Code::ERR_CODE_INVALID_PARAM);
        }
        return $arr;
    }

    /**
     * @param $key
     * @param null $default
     * @param array|null $params
     * @param bool $notNull
     * @return mixed|null|string
     * @throws \common\MyException
     * @desc 获取json类型参数，转换为数组
     */
    protected function getJson($key, $default = null, $notNull = true, array $params = null)
    {
        if (empty($params)) {
            $params = Request::getParams();
        }
        if (empty($params[$key])) {
            if ($notNull && null === $default) {
                throw new MyException("empty param of {$key}", Code::ERR_CODE_INVALID_PARAM);
            }
            return $default;
        }
        $data = \json_decode($params[$key], true);
        return $data;
    }

    /**
     * @param array $data
     * @return array
     * @desc ctrl数据输出
     *       两个特殊变量 _view_mode: 强制指定view输出格式 （默认受 config中view_mode参数控制）
     *                  _tpl_file:  强制指定模版文件     (默认为 ctrl/method.php)
     */
    protected function getView($data = array())
    {
        $result = [
            'code' => 0,
            'message' => '成功',
            'data' => $data,
        ];
        if (ZUtils::isAjax()) {
            $result['_view_mode'] = 'Json';
        }
        return $result;
    }

    protected function getService($service)
    {
        return Factory::getInstance("Service\\{$service}");
    }
}