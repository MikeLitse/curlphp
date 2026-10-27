<?php 
    require "header.html"
?>

    <h1>New Repository</h1>

    <form method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </form>

    <button>Submit</button>

<?php 
    require "footer.html"
?>