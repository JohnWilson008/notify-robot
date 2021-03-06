<?php

require'./vendor/autoload.php';
require_once './src/Entrance.php';
//require_once './src/Channel/Client.php';
//require_once './src/Channel/WebhookChannel.php';
use JohnWilson008\NotifyRobot\Entrance;




// Text Message
$ret = Entrance::make('Webhook')
    ->setSecret('f87c4ca6-9f24-1e5dfad43437')
    ->setMessageParams('text',[
        'content'               => '广州今日天气：29度，大部分多云，降雨概率：60%',
        // 'mentioned_list'        => ["wangqing", "@all"],
        // 'mentioned_mobile_list' => ["13800001111", "@all"],
    ])->sendPostParams();
var_dump($ret);



$contentMarkDown = "实时新增用户反馈<font color='warning'>132例</font>，请相关同事注意。\n
         >类型:<font color='comment'>用户反馈</font>
         >普通用户反馈:<font color='comment'>117例</font>
         >VIP用户反馈:<font color='comment'>15例</font>";
$ret = Entrance::make('Webhook')
    ->setSecret('f87c4ca6-9f24-1e5dfad43437')
    ->setMessageParams('markdown',[
        'content' => $contentMarkDown,
    ])->sendPostParams();
var_dump($ret);
echo PHP_EOL;




$imageUrl = 'https://www.baidu.com/img/flexible/logo/pc/result.png';
$content = file_get_contents($imageUrl);
$base64 = base64_encode($content);
$ret = Entrance::make('Webhook')
    ->setSecret('f87c4ca6-9f24-1e5dfad43437')
    ->setMessageParams('image',[
        // 图片内容的base64编码
        'base64' => $base64,
        // 图片内容（base64编码前）的md5值
        'md5' => md5(base64_decode($base64)),
    ])->sendPostParams();
var_dump($ret);
echo PHP_EOL;



$articles=[
    [
        'title'=>"Mid-Autumn Festival Gift Collection",
        "description"=>"This year's Mid-Autumn Festival company has a great gift to give",
        "url"=>"www.qq.com",
        'picurl'=>'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png',
    ],
    [
        'title'=>"Mid-Autumn Festival Gift Collection",
        "description"=>"This year's Mid-Autumn Festival company has a great gift to give",
        "url"=>"www.qq.com",
        'picurl'=>'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png',
    ],
];
$ret = Entrance::make('Webhook')
    ->setSecret('f87c4ca6-9f24-1e5dfad43437')
    ->setMessageParams('news',[
        'articles'=>$articles
    ])->sendPostParams();
var_dump($ret);
echo PHP_EOL;




$articlesTextNotice=[
    'card_type' => 'text_notice',
    'source'=>[
        'icon_url'=>'https://wework.qpic.cn/wwpic/252813_jOfDHtcISzuodLa_1629280209/0',
        'desc'=>'Enterprise WeChat',
        'desc_color'=>0,
    ],
    'main_title'=>[
        'title'=>'Welcome to use Enterprise WeChat',
        'desc'=>'Your friend is inviting you to join Enterprise WeChat',
    ],
    'emphasis_content'=>[
        "title"=>"100",
        "desc"=>"desc",
    ],
    "sub_title_text"=>"Download Enterprise WeChat also can grab red packets！",
    "horizontal_content_list"=>[
        [
            "keyname"=>"Invitees",
            "value"=>"Zhang San",
            'userid'=>''
        ],
        [
            "keyname"=>"Enterprise Micro official website",
            "value"=>"Click to visit",
            "type"=>1,
            "url"=>"https://work.weixin.qq.com/?from=openApi"
        ],
    ],
    "jump_list"=>[
        [
            "type"=>1,
            "url"=>"https://work.weixin.qq.com/?from=openApi",
            "title"=>"Enterprise Micro official website"
        ],
    ],
    "card_action"=>[
        "type"=>1,
        "url"=>"https://work.weixin.qq.com/?from=openApi",
        "appid"=>"APPID",
        "pagepath"=>"PAGEPATH"
    ]

];
$ret = Entrance::make('Webhook')
    ->setSecret('f87c4ca6-9f24-1e5dfad43437')
    ->setMessageParams('template_card',$articlesTextNotice)->sendPostParams();
var_dump($ret);
echo PHP_EOL;





















