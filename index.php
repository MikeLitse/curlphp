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

//when you first open the website the REQEUST_METHOD === "GET" always
    //(to init)

    //can set method and other vars on the url
    
    //GET all
    //? is used to pass parameters to the API like method and id
    /*
    $url="http://localhost/chess/";

    curl_setopt_array($ch, [
        
        CURLOPT_URL => $url,
        CURLOPT_HTTPGET => true
        
    ]); 
    */
    //GET single
    //? is used to pass parameters to the API like method and id
    /*
    $url="http://localhost/chess/?" . http_build_query([
        'method' => 'GET',
        'id' => 1
    ]);

    curl_setopt_array($ch, [
        
        CURLOPT_URL => $url,
        CURLOPT_HTTPGET => true
        
    ]); 
    */

    //POST
    /*
    $url="http://localhost/chess/";

    $data=[
        "user" => "user",
        "pass" => "pass"
    ];

    $payload = json_encode($data);
    
    curl_setopt_array($ch, [
        
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
        
    ]);
    */
    //DELETE
    /*
    $idtodelete = 8;

    $url="http://localhost/chess/?" . http_build_query([
        'method' => 'DELETE',
        'id' => $idtodelete
    ]);

    curl_setopt_array($ch, [
        
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => "DELETE"
        
    ]); 
    */
    //PATCH
    /*
    $data=["user" => "mike",
           "pass" => "litse"
    ];

    $payload = json_encode($data);

    $idtoupdate=7;

    $url="http://localhost/chess/?" . http_build_query([
        'method' => 'PATCH',
        'id' => $idtoupdate
    ]);

    curl_setopt_array($ch, [
        
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => "PATCH",
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
        
    ]); 
    */