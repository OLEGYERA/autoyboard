<?php
$url    = 'https://u248209.your-storagebox.de/test/photo_0.jpg';
$c = curl_init($url);
$authString = 'u248209:seaeVhSM5iKvqMqp';
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_USERPWD, $authString);

$content = curl_exec($c);
$contentType = curl_getinfo($c, CURLINFO_CONTENT_TYPE);
header('Content-Type:'.$contentType);
print $content;
