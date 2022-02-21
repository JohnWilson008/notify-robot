<?php


namespace JohnWilson008\NotifyRobot\Channel;
require_once __DIR__ . '/Client.php';
use JohnWilson008\NotifyRobot\Channel\Client;



class WebhookChannel extends Client
{

    public static $urlHost = 'https://qyapi.weixin.qq.com/';
    public static $url = 'cgi-bin/webhook/send?key=%s';
    public static $urlUploadMedia = 'cgi-bin/webhook/upload_media?key=%s&type=file';



//    public function setTextMessage($message, $mentionedList = [], $mentionedMobileList = [])
//    {
//        $setMessage = [
//            'msgtype' => $this->msgTextType,
//            $this->msgTextType => [
//                'content' => $message,
//                'mentioned_list' => $mentionedList,
//                'mentioned_mobile_list' => $mentionedMobileList,
//            ],
//        ];
//        $this->message = $setMessage;
//        return $this;
//    }
//
//
//    public function setMarkdownMessage($message)
//    {
//        $setMessage = [
//            'msgtype' => $this->msgMarkdownType,
//            $this->msgMarkdownType => [
//                'content'=>$message
//            ],
//        ];
//        $this->message = $setMessage;
//        return $this;
//    }
//
//    public function setImageMessage($message,$isUrl=false)
//    {
//
//        if($isUrl){
//            $contentImage = file_get_contents($message);
//            $base64Content = base64_encode($contentImage);
//            $setMessage = [
//                'msgtype' => $this->msgImageType,
//                $this->msgImageType => [
//                    'base64' => $base64Content,
//                    'md5' => md5(base64_decode($base64Content)),
//                ],
//            ];
//        }else{
//            $setMessage = [
//                'msgtype' => $this->msgImageType,
//                $this->msgImageType => $message,
//            ];
//        }
//
//
//        $this->message = $setMessage;
//        return $this;
//    }
//
//    public function setNewsMessage($articles)
//    {
//        $setMessage = [
//            'msgtype' => $this->msgNewsType,
//            $this->msgNewsType => [
//                'articles'=>$articles
//            ],
//        ];
//        $this->message = $setMessage;
//        return $this;
//    }
//
//    public function setFileMessage($filePath)
//    {
//        $dataParams = $this->getHttpParams();
//        $url = $this->gettUrlToMediaId();
//        $data = $this->uploadMedia($url,$dataParams);
//        $this->setWebHookMediaId($data->media_id);
//        $media_id = $this->getWebHookMediaId();
//        $setMessage = [
//            'msgtype' => $this->msgFileType,
//            $this->msgFileType => [
//                'media_id'=>$media_id
//            ],
//        ];
//        $this->message = $setMessage;
//        return $this;
//    }
//
//    public function sendTemplateCard($message)
//    {
//        $setMessage = [
//            'msgtype' => $this->msgTemplateCardType,
//            $this->msgTemplateCardType => $message,
//        ];
//        $this->message = $setMessage;
//        return $this;
//    }


//    public function setMessageParams($messageType,$message)
//    {
//        $msgtype = "msg".$messageType."Type";
//        $setMessage = [
//            'msgtype' => $this->$msgtype,
//            $this->$msgtype => $message,
//        ];
//        $this->message = $setMessage;
//        return $this;
//    }


    public function setMessageParams($messageType,$message)
    {
        $msgWxHookTypeList = $this->msgWxHookTypeList();
        $msgtype = $msgWxHookTypeList[$messageType];
        $setMessage = [
            'msgtype' => $msgtype,
            $msgtype => $message,
        ];
        $this->message = $setMessage;
        return $this;
    }







    public function gettUrlToMediaId()
    {
        return sprintf(static::$urlHost . static::$urlUploadMedia, $this->getSecret());
    }
    public function getHttpUrl()
    {
        return sprintf(static::$urlHost . static::$url, $this->getSecret());
    }
    public function sendPostParams()
    {
        return $this->sendPost($this->getHttpUrl(),$this->getHttpParams());
    }



}