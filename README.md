# notify-robot

Webhook 、Dingtalk notify


<details>
<summary><b>WeWork</b></summary>


```php

composer require johnwilson008/notify-robot


require_once __DIR__ . '/../../../../vendor/johnwilson008/notify-robot/src/Entrance.php';
use JohnWilson008\NotifyRobot\Entrance;




// Text Message
$ret = Entrance::make('Webhook')
    ->setSecret('693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa')
    ->setMessageParams('text',[
        'content'               => '广州今日天气：29度，大部分多云，降雨概率：60%',
        // 'mentioned_list'        => ["wangqing", "@all"],
        // 'mentioned_mobile_list' => ["13800001111", "@all"],
    ])->sendPostParams();
var_dump($ret);


// MarkDown Message
$contentMarkDown = "实时新增用户反馈<font color='warning'>132例</font>，请相关同事注意。\n
         >类型:<font color='comment'>用户反馈</font>
         >普通用户反馈:<font color='comment'>117例</font>
         >VIP用户反馈:<font color='comment'>15例</font>";
$ret = Entrance::make('Webhook')
    ->setSecret('693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa')
    ->setMessageParams('markdown',[
        'content' => $contentMarkDown,
    ])->sendPostParams();
var_dump($ret);
echo PHP_EOL;




$imageUrl = 'https://www.baidu.com/img/flexible/logo/pc/result.png';
$content = file_get_contents($imageUrl);
$base64 = base64_encode($content);
$ret = Entrance::make('Webhook')
    ->setSecret('693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa')
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
    ->setSecret('693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa')
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
    ->setSecret('693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa')
    ->setMessageParams('template_card',$articlesTextNotice)->sendPostParams();
var_dump($ret);
echo PHP_EOL;

$fileName = 'reports.csv';
$filePath = storage_path('logs/wx_hook_media_id/media_id_file/'.$fileName);
$ret = Entrance::make('Webhook')
    ->setSecret('693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa')
    ->setUploadFileParamByPath($filePath)->sendUploadMediaParams();

var_dump($ret);
echo PHP_EOL;


$ret = '{"errcode":0,"errmsg":"ok"}';
$ret = '{"errcode":44001,"errmsg":"empty media data, hint: [1645511211206732567358835], from ip: 183.242.42.7, more info at https://open.work.weixin.qq.com/devtool/query?e=44001"}';

```
</details>


<details>
<summary><b>DingTalk</b></summary>


```php

// Text Message
$ret = Entrance::make('Dingtalk')
    ->setSecret('69a16-7xx-4b4-970-0e2sfa5a')
    ->setToken('579b9238c91ddf19c4d825e6756a597a')
    ->setMessageParams('text',[
        'content'               => '广州今日天气：29度，大部分多云，降雨概率：60%',
    ])->sendPostParams();
var_dump($ret);




$contentMarkDown = "## 杭州天气 **@150XXXXXXXX** \n";
$contentMarkDown .= "#### *9*度，西北风1级，空气良*89*，相对温度73% \n";
$contentMarkDown .= "### 发布 \n > ###### 10点20分发布 [天气](https://www.dingtalk.com) \n > ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n > #### 10点30分发布 [天气](https://www.dingtalk.com) \n";
$contentMarkDown .= "![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n";
$contentMarkDown .= "### 实时新增用户反馈 \n > ###### 类型: 用户反馈 \n > #### 普通用户反馈: 117例 \n > ##### VIP用户反馈: 15例 \n";
$contentMarkDown .= "## 无序列表 \n - item1 \n - item2 \n";
$contentMarkDown .= "## 有序列表 \n 1. item1 \n 2. item2 \n";

$titleMarkDown = '实时新增用户反馈';
$ret = Entrance::make('Dingtalk')
    ->setSecret('69a16-7xx-4b4-970-0e2sfa5a')
    ->setToken('579b9238c91ddf19c4d825e6756a597a')
    ->setMessageParams('markdown',[
        'title' => $titleMarkDown,
        'text' => $contentMarkDown,
    ])->sendPostParams();
var_dump($ret);
echo PHP_EOL;



$ret = Entrance::make('Dingtalk')
    ->setSecret('69a16-7xx-4b4-970-0e2sfa5a')
    ->setToken('579b9238c91ddf19c4d825e6756a597a')
    ->setMessageParams('link',[
        'title' => '时代的火车向前开',
        'text' => '这个即将发布的新版本，创始人xx称它为红树林。',
        'picUrl' => 'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png',
        'messageUrl' => 'https://open.dingtalk.com/document/group/custom-robot-access',
    ])->sendPostParams();
var_dump($ret);
echo PHP_EOL;



$actionCard=[
    "title"=>"乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身",
        "text"=>"![screenshot](https://gw.alicdn.com/tfs/TB1ut3xxbsrBKNjSZFpXXcXhFXa-846-786.png) 
 ### 乔布斯 20 年前想打造的苹果咖啡厅 
 Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划",
        "btnOrientation"=>"0",
        "singleTitle" =>"阅读全文",
        "singleURL" =>"https://open.dingtalk.com/document/group/custom-robot-access",
];
$ret = Entrance::make('Dingtalk')
    ->setSecret('69a16-7xx-4b4-970-0e2sfa5a')
    ->setToken('579b9238c91ddf19c4d825e6756a597a')
    ->setMessageParams('actionCard',$actionCard)->sendPostParams();
var_dump($ret);
echo PHP_EOL;


$actionCard=[
    "title"=>"我 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身",
        "text"=>"![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n\n #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划",
        "btnOrientation"=>"0",
        // btns more 3
        "btns"=>[
            [
                "title"=>"内容不错",
                "actionURL"=>"https://open.dingtalk.com/document/group/custom-robot-access"
            ],
            [
                "title"=>"不感兴趣",
                "actionURL"=>"https://www.dingtalk.com/"
            ],
            [
                "title"=>"你才",
                "actionURL"=>"https://www.dingtalk.com/"
            ],
        ],
];
$ret = Entrance::make('Dingtalk')
    ->setSecret('69a16-7xx-4b4-970-0e2sfa5a')
    ->setToken('579b9238c91ddf19c4d825e6756a597a')
    ->setMessageParams('actionCard',$actionCard)->sendPostParams();
var_dump($ret);
echo PHP_EOL;


$actionCard=[
    "links"=>[
        [
            "title"=>"中秋时代的火车向前开1",
            "messageURL"=>"https://www.dingtalk.com/",
            "picURL"=>"https://gw.alicdn.com/tfs/TB1ut3xxbsrBKNjSZFpXXcXhFXa-846-786.png",
        ],
        [
            "title"=>"中秋好礼时代的火车向前开2",
            "messageURL"=>"http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png",
            "picURL"=>"http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png",
        ],
        [
            "title"=>"时代的火车向前开3",
            "messageURL"=>"https://open.dingtalk.com/document/group/custom-robot-access",
            "picURL"=>"https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png",
        ],
    ],
];
$ret = Entrance::make('Dingtalk')
    ->setSecret('69a16-7xx-4b4-970-0e2sfa5a')
    ->setToken('579b9238c91ddf19c4d825e6756a597a')
    ->setMessageParams('feedCard',$actionCard)->sendPostParams();
var_dump($ret);
echo PHP_EOL;



$ret = '{"errcode":0,"errmsg":"ok"}';
$ret = '{"errcode":400602,"errmsg":"miss param : feedCard-\u003Elinks"}';

```
</details>