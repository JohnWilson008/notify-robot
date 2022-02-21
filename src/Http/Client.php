<?php


namespace JohnWilson008\NotifyRobot\Http;


class Client
{
    public function sendPost($url ,$data)
    {
        $curl = curl_init() ;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_HEADER,0);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false); //验证curl对等证书(一般只要此项)
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false); //检查服务器SSL证书中是否存在一个公用名
        curl_setopt($curl,CURLOPT_SSLVERSION,0);         //传递一个包含SSL版本的长参数。
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }
    public function uploadMedia($url ,$data)
    {
        /*
        POST https://qyapi.weixin.qq.com/cgi-bin/webhook/upload_media?key=693a91f6-7xxx-4bc4-97a0-0ec2sifa5aaa&type=file HTTP/1.1
        Content-Type: multipart/form-data; boundary=-------------------------acebdf13572468
        Content-Length: 220

        ---------------------------acebdf13572468
        Content-Disposition: form-data; name="media";filename="wework.txt"; filelength=6
        Content-Type: application/octet-stream

        mytext
        ---------------------------acebdf13572468--
        */
        $headerArray =[
            "Content-type:multipart/form-data;",
            "Content-Length: 220",
            "Content-Disposition:form-data; name='media';filename='wework.txt'; filelength=6;",
            "Content-Type: application/octet-stream",
        ];
        $curl = curl_init() ;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_HEADER,0);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false); //验证curl对等证书(一般只要此项)
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false); //检查服务器SSL证书中是否存在一个公用名
        curl_setopt($curl,CURLOPT_SSLVERSION,0);         //传递一个包含SSL版本的长参数。
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headerArray);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }

}