<?php

class TestController extends CController
{
  public function actionIndex()
  {
    $api = '';
    $secret = '';
    $timestamp = time();

    $params = array(
      'ApiKey' => $api,
      'Hash' => substr(md5($api . $timestamp . $secret), 0, 16),
      'Timestamp' => $timestamp
    );

    //$params['PageToken'] = 'ZXZlMjAw';
    $params['RunetId'] = 35287;
    $this->apiRequest('/api/user/get', $params);
  }

  private function apiRequest($url, $params)
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_TIMEOUT, 60);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $url = $this->createAbsoluteUrl($url, $params);

    echo $url;

    curl_setopt($curl, CURLOPT_URL, $url);


    $result = curl_exec($curl);

    echo '<pre>';
    print_r($result);

    echo  curl_error ($curl);
    $result = json_decode($result);

    print_r($result);
    echo '</pre>';
  }
}
