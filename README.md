# notify-robot

Webhook notify


```php

// Text Message
Factory::DngTalk()
    ->setToken('c44fec1ddaa8a833156efb77b7865d62ae13775418030d94d05da08bfca73e')
    ->setSecret('SECc32bb7345c0f73da2b9786f0f7dd5083bd768a29b82e6d460149d730eee51730')
    ->setTextMessage([
        'content'   => 'This is content(keyword).',
        // 'atMobiles' => [13948484984],
        // 'atUserIds' => [123456],
        // 'isAtAll'   => false,
    ])->send();

```

```php

// Text Message
Factory::Webhook()
    ->setToken('c44fec1ddaa8a833156efb77b7865d62ae13775418030d94d05da08bfca73e')
    ->setSecret('SECc32bb7345c0f73da2b9786f0f7dd5083bd768a29b82e6d460149d730eee51730')
    ->setTextMessage([
        'content'               => 'This is content.',
        // 'mentioned_list'        => ["wangqing", "@all"],
        // 'mentioned_mobile_list' => ["13800001111", "@all"],
    ])->send();

```
