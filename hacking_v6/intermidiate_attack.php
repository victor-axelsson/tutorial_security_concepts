<?php
$url = 'http://localhost:8888/hacking/hacking_v6/index.php';
$data = array('data' => 'Malicious attack MTF');
$options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

//Redirect
header("Location: https://ownyourawesome.files.wordpress.com/2012/10/bill-murray-awesome.jpg");
die();
?>