<?php 
    
    $ch = require "initcurl.php";
    
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://api.github.com/user/repos",
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($_POST)//this sends the $_POST[] 
    ]);

    $response = curl_exec($ch);

    $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

    $data= json_decode($response, true); //assoc array

    if($status_code === 422){
        echo "Invalid data: ";
        print_r($data["errors"]);
        exit;
    }

    if($status_code !== 201){
        echo "Unexpected status code: $status_code";
        var_dump($data);
        exit;
    }

    //curl_close($ch); -> not needed in php 8
?>

<?php require "header.html" ?>

    <h1>New Repository</h1>

    <p>Repository created successfully
        <a href="show.php?full_name=<?= $data["full_name"] ?>">Show</a>
    </p>

<?php require "footer.html" ?>