<?php


class MMM {
    public $apikey;
    public $msg;
    public $sms_to;
    public $device_id;
    public $url = "http://www.makemymails.com/sms/api-single-sms/";
    public function __construct($apikey=null, $device_id=null) {
        if(!$apikey) $apikey = getenv('MMM_APIKEY');
        if(!$apikey) throw new Error('You must provide a MMM API key');
        $this->apikey = $apikey;

        if(!$device_id) $apikey = getenv('MMM_device_id');
        if(!$device_id) throw new Exception('You must provide a MMM device id');
        $this->device_id = $device_id;
    }

    public function send_msg_via_curl($msg, $sms_to ){
        // We simply post the msg to our url...

        $to_post =  array(
                          "api_key" => $this->apikey,
                           "device_id" => $this->device_id,
                           "sms_to" => $this->sms_to,
                           "sms_body" => $this->msg
                           );

        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$this->url);
        curl_setopt($ch,CURLOPT_POST,count($to_post));
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($to_post));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  
        //execute post
        $result = curl_exec($ch);
    }

    public function send_msg($msg, $sms_to ){
        // We simply post the msg to our url...

        $to_post =  array(
                          "api_key" => $this->apikey,
                           "device_id" => $this->device_id,
                           "sms_to" => $sms_to,
                           "sms_body" => $msg
                           );

        $options = array(
                  'http' => array(
                  'header'  => "Content-type: application/json",
                  'method'  => 'POST',
                  'content' => json_encode($to_post),
                ),
            );
        print_r($to_post);
        $context = stream_context_create($options);
        $result = file_get_contents($this->url, false, $context);
        print_r($result);
    }

}    


?>
