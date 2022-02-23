<?php


namespace JohnWilson008\NotifyRobot\Channel;

require_once __DIR__ . '/Client.php';
use JohnWilson008\NotifyRobot\Channel\Client;



class DingtalkChannel extends Client
{

    public static $urlHost = 'https://oapi.dingtalk.com/';
    public static $url = 'robot/send?access_token=%s';


    public function __construct()
    {
        $initCurlOption = [
            CURLOPT_HTTPHEADER=>['Content-Type: application/json;charset=utf-8'],
        ];
        $this->setCurlOption($initCurlOption);
    }

    public function setMessageParams($messageType,$message=[],$at=[])
    {

        $msgDingtalkTypeList = $this->msgDingtalkTypeList();


        $msgtype = $msgDingtalkTypeList[$messageType];
        $setMessage = [
            'msgtype' => $msgtype,
            $msgtype => $message,
        ];
        if(!empty($at)){
            $setMessage['at'] = $at;
        }
        $this->message = $setMessage;
        return $this;
    }

    public function getHttpUrl()
    {
        $apiUrl = sprintf(static::$urlHost . static::$url, $this->getToken());
        if (!empty($this->secret)) {
            $apiUrl = $this->signUrl($apiUrl);
        }
        return $apiUrl;
    }

    /**
     * add sign api params
     *
     * @param string $url
     * @return void
     */
    protected function signUrl($url)
    {
        $time      = time() * 1000;
        $strToSign = $time . "\n" . $this->secret;
        $sign      = hash_hmac('sha256', $strToSign, $this->secret, true);
        $sign      = base64_encode($sign);
        $sign      = urlencode($sign);
        return $url . '&timestamp=' . $time . '&sign=' . $sign;
    }

    public function sendPostParams()
    {
        return $this->sendPost($this->getHttpUrl(),$this->getHttpParams(),$this->getCurlOption());
    }




}