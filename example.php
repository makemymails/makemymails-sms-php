
<?php
require_once 'makemymails-sms/mmm.php';
$mmm_client = new MMM('api_key', 'device_id');

// To send request via curl(requires PHP cURL as a dependency)
$result = $mmm_client->send_msg_via_curl("sms_body", "send_to_no");

// to send request without using cURL(requires php>=5.2.0)
$result = $mmm_client->send_msg("sms_body", "send_to_no");

print_r($result);

?>
