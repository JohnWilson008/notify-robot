<?php

require_once './vendor/autoload.php';
require_once './src/Entrance.php';
require_once './src/Channel/Client.php';
require_once './src/Channel/WebhookChannel.php';
use JohnWilson008\NotifyRobot\Entrance;


//
$entrance = new Entrance();
var_dump($entrance);
//$entrance::make('Webhook');





// Text Message
$ret = Entrance::make('Webhook')
    ->setSecret('f87c4ca6-9f24-4ae9-a860-1e5dfad43437')
    ->setMessageParams('text',[
        'content'               => '广州今日天气：29度，大部分多云，降雨概率：60%',
        // 'mentioned_list'        => ["wangqing", "@all"],
        // 'mentioned_mobile_list' => ["13800001111", "@all"],
    ]);
var_dump($ret);