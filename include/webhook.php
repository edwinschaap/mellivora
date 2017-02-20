<?php

function fire_webhook($time,$challenge,$user_id,$correct) {

  $curl_handle = curl_init();

  $params = array(
    'time' => $time,
    'challenge' => $challenge,
    'user_id' => $user_id,
    'correct' => $correct
  );

  $options = array(
    CURLOPT_URL => CONFIG_WEBHOOK_URL,
    CURLOPT_CONNECTTIMEOUT => 2,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($params, '', '&'),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
    CURLINFO_HEADER_OUT => false,
    CURLOPT_HEADER => false,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_RETURNTRANSFER => true
  );

  curl_setopt_array($curl_handle, $options);

  $query = curl_exec($curl_handle);
  curl_close($curl_handle);

  return $response;
}
