<?php
/**
 * Created by zhouketao.
 * Email: zhouketao@csu.edu.cn
 * Date: 2017/7/17
 */

/**
 * @format: 'uri_pattern' => ["{$pattern}" => ["{$controller}", "{$identification}"]
 */
return [
    'uri_pattern' => [
        'users\/(.*)' => ['User', 'id'],
        'users' => ['User'],
        'records\/(.*)' => ['Record', 'phone'],
        'records' => ['Record']
    ]
];