<?php

    require_once("token.php");

    $headers = [
        "User-Agent: Example REST curl",
        "Authorization: token {$token}"//your token here
    ];

    $ch = curl_init("https://api.github.com/user/repos");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //makes the curl return a string json

    return $ch;

?>