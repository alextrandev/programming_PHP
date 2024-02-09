<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php
        if ($_POST["name"] !== "" && $_POST["email"] !== "" && $_POST["password1"] !== "" && $_POST["password1"] == $_POST["password2"]) {
            echo '<p>Welcome to ...! Please check your email for the account activation link!</p>';
        } else {
            if ($_POST["name"] == "") {
                echo '<p>Name cannot be empty.</p>';
            }
            if ($_POST["email"] == "") {
                echo '<p>E-mail cannot be empty.</p>';
            }
            if ($_POST["password1"] == "") {
                echo '<p>Password cannot be empty.</p>';
            }
            if ($_POST["password1"] !== $_POST["password2"]) {
                echo '<p>Password does not match.</p>';
            }
            echo '<button onclick="history.go(-1);">Return to form</button>';
            }
    ?>
</body>
</html>

