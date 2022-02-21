<?php


namespace JohnWilson008\NotifyRobot\Channel;

require_once __DIR__ . '/../Http/Client.php';
use JohnWilson008\NotifyRobot\Http\Client as HttpClient;

class Client
{
    protected $message = [];
    protected $secret = '';
    protected $mediaId = '';

    protected $msgTextType = 'text';
    protected $msgMarkdownType = 'markdown';
    protected $msgImageType = 'image';
    protected $msgNewsType = 'news';
    protected $msgFileType = 'file';
    protected $msgTemplateCardType = 'template_card';



    public function getSecret()
    {
        return $this->secret;
    }

    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }
     public function msgWxHookTypeList()
     {
         $msgTypeList = [
             $this->msgTextType=>$this->msgTextType,
             $this->msgMarkdownType=>$this->msgMarkdownType,
             $this->msgImageType=>$this->msgImageType,
             $this->msgNewsType=>$this->msgNewsType,
             $this->msgFileType=>$this->msgFileType,
             $this->msgTemplateCardType=>$this->msgTemplateCardType,
         ];
         return $msgTypeList;
     }

    public function setWebHookMediaId($mediaId)
    {

        $this->mediaId = $mediaId;
        return $this;
    }


    public function getWebHookMediaId()
    {
        return $this->mediaId;
    }


    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getHttpParams()
    {
        return json_encode($this->message);
    }

    public function sendPost($url ,$data)
    {
        $httpClient = new HttpClient();
        $data = $httpClient->sendPost($url ,$data);
        return $data;
    }
    public function uploadMedia($url ,$data)
    {
        $httpClient = new HttpClient();
        $data = $httpClient->uploadMedia($url ,$data);
        return $data;
    }
}