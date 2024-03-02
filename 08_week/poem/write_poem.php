<?php
    // if the form has been sent, add the new verse to the file
    if ($_SERVER["REQUEST_METHOD"] == "POST") if (isset($_POST["new-verse"])) file_put_contents("poem.txt", "\n".$_POST["new-verse"], FILE_APPEND) or die("Something went wrong, try again!");
    // $write_poem = fopen("poem.txt", "a") or die("Something went wrong, try again!");
    // fwrite($write_poem, $_POST["new-verse"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write a poem</title>
</head>
<body>
    <h3>Write a poem</h3>

    <div id="poem">
        <?php
            // read the poem from file and display here
            print nl2br(file_get_contents("poem.txt"));
        ?>
    </div>

    <form action="write_poem.php" method="post">
        <textarea name="new-verse" rows="3" cols="50"></textarea><br>
        <input type="submit" name="add-to-poem" value="Add verse">
    </form>
    
</body>
</html>