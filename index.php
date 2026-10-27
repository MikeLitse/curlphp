<?php 

    require("token.php");

    $headers = [
        "User-Agent: Example REST curl",
        "Authorization: token {$token}"//your token here
    ];

    $ch = curl_init("https://api.github.com/user/repos");

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
    <h1>Repositories</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $repository): ?>

            <tr>
                <td>
                    <a href="show.php?full_name= <?= $repository["full_name"] ?>">
                    <?= htmlspecialchars($repository["name"]) ?>
                </a>
                </td>
                <td><?= htmlspecialchars($repository["description"]) ?></td>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>