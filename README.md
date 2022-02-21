# notify-robot

Webhook notify

```php

// Text Message
Factory::Webhook()
    ->setSecret('693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa')
    ->setTextMessage([
        'content'               => 'This is content.',
        // 'mentioned_list'        => ["wangqing", "@all"],
        // 'mentioned_mobile_list' => ["13800001111", "@all"],
    ])->send();

```
