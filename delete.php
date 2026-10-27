<?php 
    
    $ch = require "initcurl.php";
    
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://api.github.com/repos/{$_POST['full_name']}",
        CURLOPT_CUSTOMREQUEST => "DELETE",
    ]);

    $response = curl_exec($ch);

    $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

    $data= json_decode($response, true); //assoc array

    if($status_code === 422){
        echo "Invalid data: ";
        print_r($data["errors"]);
        exit;
    }

    if($status_code !== 204){
        echo "Unexpected status code: $status_code";
        var_dump($data);
        exit;
    }

    //curl_close($ch); -> not needed in php 8
?>

<?php require "header.html" ?>

    <h1>Delete Repository</h1>

    <p>Repository deleted successfully
        <a href="index.php">Index</a>
    </p>

<?php require "footer.html" ?>