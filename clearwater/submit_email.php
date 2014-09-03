<?php
  $API_KEY = "695d516ec38912c755518dd8c8f1f19e";
  $BASE_URL = "http://api2.getresponse.com";
  $campaign = "CjH5";
  $name = "Friend";
  $email = $_POST['email'];
  $params = array($API_KEY, array('campaign' => $campaign, 'name' => $name,
			    'email' => $email));
  $request = json_encode(array('method' => 'add_contact', 'params' => $params, 'id' => null));
  $handle = curl_init($BASE_URL);
  curl_setopt($handle, CURLOPT_POST, 1);
  curl_setopt($handle, CURLOPT_POSTFIELDS, $request);
  curl_setopt($handle, CURLOPT_HEADER, 'Content-type: application/json');
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);	  			   
  $response = json_decode(curl_exec($handle));
  if(curl_error($handle)) echo(curl_error($handle));
  $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
  if(!(($httpCode == '200') || ($httpCode == '204'))) echo('API call failed. Server returned status code '.$httpCode);
  curl_close($handle);
  if(!$response->error) return $response->result;
?>