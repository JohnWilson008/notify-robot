<?php


namespace JohnWilson008\NotifyRobot\Channel;

require_once __DIR__ . '/../Http/Client.php';
use JohnWilson008\NotifyRobot\Http\Client as HttpClient;

class Client
{
    protected $message = [];
    protected $uploadMediaOption = [];
    protected $curlOption = [];
    protected $secret = '';
    protected $token = '';
    protected $mediaId = '';
    protected $curl_file = '';
    protected $file_media_info = '';

    protected $msgTextType = 'text';
    protected $msgMarkdownType = 'markdown';
    protected $msgImageType = 'image';
    protected $msgNewsType = 'news';
    protected $msgFileType = 'file';
    protected $msgTemplateCardType = 'template_card';
    protected $msgLinkType = 'link';
    protected $msgActionCardType = 'actionCard';
    protected $msgFeedCardType = 'feedCard';


    public function getUploadMediaOption()
    {
        return $this->uploadMediaOption;
    }

    public function setUploadMediaOption($uploadMediaOption)
    {
        $this->uploadMediaOption = $uploadMediaOption;
        return $this;
    }


    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

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
    public function msgDingtalkTypeList()
    {
        $msgTypeList = [
            $this->msgTextType=>$this->msgTextType,
            $this->msgLinkType=>$this->msgLinkType,
            $this->msgMarkdownType=>$this->msgMarkdownType,
            $this->msgActionCardType=>$this->msgActionCardType,
            $this->msgFeedCardType=>$this->msgFeedCardType,

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

    public function setCurlOption($curlOption)
    {
        $this->curlOption = $curlOption;
        return $this;
    }

    public function getCurlOption()
    {
        return $this->curlOption;
    }

    public function getHttpParams()
    {
        return json_encode($this->message);
    }

    public function sendPost($url ,$data,$option=[])
    {
        $httpClient = new HttpClient();
        $data = $httpClient->sendPost($url ,$data,$option);
        return $data;
    }

    public function uploadMedia($url ,$data,$option=[])
    {
        $httpClient = new HttpClient();
        $data = $httpClient->uploadMedia($url ,$data,$option);
        return $data;
    }
}