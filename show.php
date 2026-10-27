<?php 

    $full_name = trim($_GET["full_name"]);

    $ch = require "initcurl.php";

    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/$full_name");

    $response = curl_exec($ch);

    $data=json_decode($response, true); //assoc array

    //curl_close($ch); -> not needed in php 8

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example REST API Client</title>
</head>
<body>
    <h1>Repository</h1>
    
    <dl>
        <dt>Name</dt>
        <dd><?= $data["name"] ?></dd>
        <dt>Description</dt>
        <dd><?= htmlspecialchars($data["description"]) ?></dd>
    </dl>

</body>
</html>