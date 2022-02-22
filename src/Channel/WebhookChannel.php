<?php


namespace JohnWilson008\NotifyRobot\Channel;

require_once __DIR__ . '/Client.php';
use JohnWilson008\NotifyRobot\Channel\Client;



class WebhookChannel extends Client
{

    public static $urlHost = 'https://qyapi.weixin.qq.com/';
    public static $url = 'cgi-bin/webhook/send?key=%s';
    public static $urlUploadMedia = 'cgi-bin/webhook/upload_media?key=%s&type=file';


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

    public function setUploadFileParamByPath($filePath,$fileName='' , $fileType='application/octet-stream')
    {
//        $curlFile = new \CURLFile($filePath);
//        if ($itemId === '') {
//            //upload or create new file in destination target
//            $properties = array('name' => $name, 'parent' => array('id' => $parentId));
//            $url = self::UPLOAD_URL . '/files/content';
//        } else {
//            //update existing file in destination target
//            $properties = array('name' => $name);
//            $url = self::UPLOAD_URL . '/files/' . $itemId . '/content';
//        }



//        $finfo    = finfo_open(FILEINFO_MIME_TYPE);
//        $mime = finfo_file($finfo, $upload_file_path);
//        finfo_close($finfo);
//        $curlFile = curl_file_create(
//            $upload_file_path,
//            $mime,
//            pathinfo(
//                $upload_file_path,
//                PATHINFO_BASENAME
//            )
//        );



        if(empty($fileName)){
            $fileName = pathinfo($filePath,PATHINFO_BASENAME);
        }
//        $fileType = mime_content_type($filePath);

        if (class_exists('\CURLFile')) {
            $curlFile = new \CURLFile($filePath,$fileType,$fileName);
//            $curlFile = curl_file_create(
//                $filePath,
//                $fileType,
//                pathinfo($filePath,PATHINFO_BASENAME)
//            );
        } else {
            $curlFile = '@' . $filePath . ';type=' . $fileType . ';filename=' . $fileName . ';name="media"' ;
        }

        $post_data = [
            'name'=> 'media',
            'file'=> $curlFile,
        ];
        $this->curl_file = $post_data;

        return $this;
    }

    public function setUploadFileParams($curl_file)
    {
        $this->curl_file = $curl_file;
        return $this;
    }

    public function getUploadFileParams()
    {
        return $this->curl_file;
    }

    public function setFileMediaInfo($file_media_info)
    {
        $this->file_media_info = $file_media_info;
        return $this;
    }

    public function getFileMediaInfo()
    {
        return $this->file_media_info;
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

    public function sendUploadMediaParams()
    {
        $wxMediaRet = $this->uploadMedia($this->gettUrlToMediaId(),$this->getUploadFileParams(),$this->getUploadMediaOption());

        $this->setFileMediaInfo($wxMediaRet);

        $retArr = json_decode($wxMediaRet,true);
        if(empty($retArr['errcode']) && $retArr['errmsg'] == 'ok'){
            $media_id = $retArr['media_id'];
            $ret = $this->setMessageParams('file',['media_id' => $media_id,])->sendPostParams();
            return $ret;
        }
        return $wxMediaRet;

    }




}