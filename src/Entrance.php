<?php

/**
 * JohnWilson008 <JohnWilson008@protonmail.com>
 */

namespace JohnWilson008\NotifyRobot;
require_once __DIR__ . '/Channel/WebhookChannel.php';
require_once __DIR__ . '/Channel/DingtalkChannel.php';

use JohnWilson008\NotifyRobot\Channel\WebhookChannel;
use JohnWilson008\NotifyRobot\Channel\DingtalkChannel;


class Entrance
{

    public static function make($name)
    {
        $client =  'JohnWilson008\NotifyRobot\Channel\\' . $name . "Channel";

        return new $client();
    }

}