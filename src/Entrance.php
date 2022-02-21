<?php

/**
 * JohnWilson008 <JohnWilson008@protonmail.com>
 */

namespace JohnWilson008\NotifyRobot;

class Entrance
{

    public static function make($name)
    {
        $client =  'JohnWilson008\NotifyRobot\Channel\\' . $name . "Channel";

        return new $client();
    }

}