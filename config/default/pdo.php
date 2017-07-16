<?php
/**
 * Created by zhouketao.
 * Email: zhouketao@csu.edu.cn
 * Date: 2017/7/16
 */
return [
    'default' => [
        'dsn' => 'mysql:host=127.0.0.1;port=3306',  // dsn字符串
        'name' => 'local',                          // 自定义名称
        'user' => 'root',                           // db用户名
        'pass' => '',                               // db密码
        'dbname' => 'demo',                         // db默认数据库
        'charset' => 'UTF8',                        // db默认编码
        'pconnect' => false,                        // 是否开启持久连接
        'ping' => 1,                                // 是否开始ping检测
        'pingtime' => 7200,                         // 连接超时时间
    ],
    'user' => [
        'dsn' => 'mysql:host=172.168.1.100;port=3306',  // dsn字符串
        'name' => 'user',                               // 自定义名称
        'user' => 'scott',                              // db用户名
        'pass' => 'tiger',                              // db密码
        'dbname' => 'user',                             // db默认数据库
        'charset' => 'UTF8',                            // db默认编码
        'pconnect' => false,                            // 是否开启持久连接
        'ping' => 1,                                    // 是否开始ping检测
        'pingtime' => 7200,                             // 连接超时时间
    ]
];