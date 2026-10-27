<?php 
    
    $ch = require "initcurl.php";
    
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user/repos");

    $response = curl_exec($ch);

    $data=json_decode($response, true); //assoc array

    //curl_close($ch); -> not needed in php 8

?>

<?php require "header.html" ?>
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

    <a href="new.php">New</a>

<?php require("footer.html") ?>