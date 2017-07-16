<?php
/**
 * Created by zhouketao.
 * Email: zhouketao@csu.edu.cn
 * Date: 2016/12/21
 * Time: 10:58
 */
namespace ZPHP\Controller;

Interface RESTController
{
    /**
     * @desc GET URI
     */
    function get();

    /**
     * @desc POST URI
     */
    function post();

    /**
     * @desc PUT URI
     */
    function put();

    /**
     * @desc PATCH URI
     */
    function patch();

    /**
     * @desc DELETE URI
     */
    function delete();

    //function head();

    //function option();
}