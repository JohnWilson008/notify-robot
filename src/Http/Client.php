<?php


namespace JohnWilson008\NotifyRobot\Http;


class Client
{
    public function sendPost($url ,$data=[],$curlSetoptParams=[],$timeout=3,$connectTimeout=2)
    {

        $curlSetopt = [
            CURLOPT_SSL_VERIFYPEER=>false,
            CURLOPT_SSL_VERIFYHOST=>false,
            CURLOPT_SSLVERSION=>0,
        ];
        $curlSetopt = $this->getCurlSetoptParams($curlSetopt,$curlSetoptParams);

        $output = $this->curlPublicSend($url,$data,$curlSetopt,$timeout,$connectTimeout);
        return $output;


    }

    public function uploadMedia($url ,$data=[],$curlSetoptParams=[],$timeout=3,$connectTimeout=2)
    {

        $curlSetopt = [
            CURLOPT_SAFE_UPLOAD=>true,
            CURLOPT_RETURNTRANSFER=>1,
        ];
        $curlSetopt = $this->getCurlSetoptParams($curlSetopt,$curlSetoptParams);
        $output = $this->curlPublicSend($url,$data,$curlSetopt,$timeout,$connectTimeout);

        return  $output;

    }

    public function curlPublicSend($url,$data=[],$curlSetopt=[],$timeout=3,$connectTimeout=2)
    {
        $curl = curl_init() ;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_HEADER,0);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

        if(!empty($data)){
            curl_setopt($curl,CURLOPT_POST,1);
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        }

        if (!empty($curlSetopt)) {
//            foreach ($curlSetopt as $key => $val) {
//                curl_setopt($curl, $key, $val);
//            }

//            $curlSetopt = array(
//                CURLOPT_URL => $this->webhookUrl,
//                CURLOPT_HTTPHEADER => array('Content-type: application/json'),
//                CURLOPT_POSTFIELDS => $postString
//            );
//            if (defined('CURLOPT_SAFE_UPLOAD')) {
//                $options[CURLOPT_SAFE_UPLOAD] = true;
//            }

            curl_setopt_array($curl, $curlSetopt);
//            curl_setopt($curl, CURLOPT_SAFE_UPLOAD, false);
        }
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $connectTimeout);
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);

//        $ssl = preg_match('/^https:\/\//i',$url) ? TRUE : FALSE;
//        if($ssl){
//            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
//            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
//        }

        $data = curl_exec($curl);
        curl_close($curl);
        return $data;

    }

    public function getCurlSetoptParams($curlSetopt,$curlSetoptParams)
    {
        if (!empty($curlSetoptParams)) {
            foreach ($curlSetoptParams as $key => $val) {
                $curlSetopt[$key] = $val;
            }
        }
        return $curlSetopt;
    }

}