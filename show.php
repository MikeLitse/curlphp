<?php 

    require("token.php");

    $full_name = $_GET["full_name"];

    $headers = [
        "User-Agent: Example REST curl",
        "Authorization: token {$token}"
    ];

    $ch = curl_init("https://api.github.com/repos/$full_name");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //makes the curl return a string json

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