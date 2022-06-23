<?php

require './vendor/autoload.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

$params = array(
    'credentials' => array(
        'key' => 'AKIAXEOJVBNV4IW5UVUT',
        'secret' => 'S3Ad5QxnKTKU6rk6jkza6js2M4iNkluZhWggGxLn',
    ),
    'region' => 'ap-southeast-1', // < your aws from SNS Topic region
    'version' => 'latest'
);
$sns = new \Aws\Sns\SnsClient($params);

$args = array(
    "MessageAttributes" => [
                // 'AWS.SNS.SMS.SenderID' => [
                //     'DataType' => 'String',
                //     'StringValue' => 'YOUR_SENDER_ID'
                // ],
                'AWS.SNS.SMS.SMSType' => [
                    'DataType' => 'String',
                    'StringValue' => 'Transactional'
                ]
            ],
    "Message" => "Hello World",
    "PhoneNumber" => "+6282271056498"
);


$result = $sns->publish($args);
echo "<pre>";
var_dump($result);
echo "</pre>";