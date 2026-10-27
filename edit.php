<?php 

    $full_name = trim($_GET["full_name"]);

    $ch = require "initcurl.php";

    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/$full_name");

    $response = curl_exec($ch);

    $data=json_decode($response, true); //assoc array

    //curl_close($ch); -> not needed in php 8

?>

<?php require("header.html") ?>
        <h1>Repository</h1>
    
        <form method="POST" action="create.php">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $data["name"] ?>">

            <label for="description">Description</label>
            <textarea name="description" id="description">
                <?= $data["description"] ?>
            </textarea>

            <button>Submit</button>
        </form>
   
    
<?php require("footer.html") ?>
