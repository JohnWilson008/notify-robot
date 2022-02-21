# notify-robot

Webhook notify

```php
use JohnWilson008\NotifyRobot\Entrance;
// Text Message
Entrance::Webhook()
    ->setSecret('693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa')
    ->setMessageParams('text',[
        'content'               => 'This is content.',
        // 'mentioned_list'        => ["wangqing", "@all"],
        // 'mentioned_mobile_list' => ["13800001111", "@all"],
    ])->sendPostParams();

```
