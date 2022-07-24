<?php
require_once __DIR__ . "/dts/config.php";
require_once __DIR__ . "/dts/dbaSis.php";

// http://localhost/apibrk/?placa=

header("Content-type:application/json");

if (isset($_GET['placa'])) {
  $placa =  $_GET['placa'];
  switch ($_GET['placa']) {
    case $placa:
      $data['placa'] = read('carros', "placa='$placa'");
      $data['status'] = 'SUCCESS';
      $data['data'] = 'API runing  OK!';
      break;
    default:
      $data['status'] = 'ERROR';
      break;
  }
} else {
  $data['status'] = 'ERROR';
}

$json_pretty = json_encode($data, JSON_PRETTY_PRINT);
echo $json_pretty;