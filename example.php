
<?php
require_once 'makemymails-sms/mmm.php';
$mmm_client = new MMM('api_key', 'device_id');
$result = $mmm_client->send_msg_via_curl("sms_body", "send_to_no");

print_r($result);

?>
