<?php
/**
 * redis 简单用例
 * 使用前需要先下载组件，配置php.ini扩展
 */
$redis = new Redis();
$redis->connect('127.0.0.1',80);//指定连接ip和端口号
echo 'service redis status is '.$redis->ping();

//队列
$redis->lpush('firstList','top');
$redis->lpush('firstList','mid');
$redis->lpush('firstList','bot');
while(TRUE) {
    $t = $redis->lpop('firstList');
    //do something ...
    print_r($t);
}